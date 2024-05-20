<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Article']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have to login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    private function loadArticleView($page, $data)
    {
        $data['pages'] = "pages/dashboard/article/{$page}";
        $this->load->view('pages/index', $data);
    }

    public function index()
    {
        $data['title'] = 'Article';
        $data['articles'] = $this->M_Article->list_dashboard();
        $this->loadArticleView('v_article', $data);
    }

    public function create()
    {
        $data['title'] = 'Create article';
        $data['categories'] = $this->M_Article->category();
        $data['authors'] = $this->M_Article->authors();
        $data['tags'] = $this->M_Article->tags();

        $errors = [
            'categories' => "Article's category is empty. Please add some category before you can create a new article.",
            'tags' => "Article's tag is empty. Please add some tag before you can create a new article.",
            'authors' => "Article's author is empty. Please add some author before you can create a new article."
        ];

        foreach ($errors as $key => $message) {
            if (!$data[$key]) {
                $this->session->set_flashdata('message_error', $message);
                $this->loadArticleView($this->getErrorView($key), $data);
                return;
            }
        }

        $this->loadArticleView('v_create', $data);
    }

    private function getErrorView($key)
    {
        $views = [
            'categories' => 'v_category',
            'tags' => 'v_tag',
            'authors' => 'v_author'
        ];

        return $views[$key];
    }

    public function store()
    {
        $user_id = $this->session->userdata('user_id');
        $judul_artikel = trim($this->input->post('judul_artikel'));
        $slug = url_title($judul_artikel, 'dash', TRUE);
        $now = date('Y-m-d H:i:s');
        $old_slug = $this->uri->segment(4);
        $submit_action = $this->input->post('submit');

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit;

        if ($old_slug) {
            if ($submit_action == 'update_nama') {
                $this->updateArticleData($old_slug, $slug, $now, $user_id, $judul_artikel);
            } elseif ($submit_action == 'update_photo') {
                $this->updateArticlePhoto($old_slug, $slug, $now, $user_id);
            } else {
                show_error('Invalid action.');
            }
        } else {
            $this->validateArticleForm();
            if ($this->form_validation->run() === FALSE) {
                $this->setFormValidationErrors();
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->createNewArticle($slug, $now, $user_id, $judul_artikel);
            }
        }
    }

    private function updateArticleData($old_slug, $slug, $now, $user_id, $judul_artikel)
    {
        $article = $this->M_Article->detail($old_slug);
        $current_tags = $this->input->post('tags');

        $data = [
            'id_category' => $this->input->post('kategori_artikel'),
            'judul' => $judul_artikel,
            'headline' => trim($this->input->post('headline_artikel')),
            'content' => trim($this->input->post('isi_artikel')),
            'keywords' => trim($this->input->post('keywords')),
            'author' => $this->input->post('author_id'),
            'slug' => trim($slug),
            'updated_at' => $now,
            'updated_by' => $user_id
        ];

        $this->M_Article->update_article($data, $old_slug);

        // Ambil daftar tag yang terkait dengan artikel sebelumnya dari database
        $previous_tags = $this->M_Article->get_article_tags($article['Id']); // Anda perlu mengganti ini dengan cara Anda mengambil daftar tag sebelumnya

        // Tentukan tag yang ditambah atau dikurangi
        $added_tags = array_diff($current_tags, $previous_tags);
        $removed_tags = array_diff($previous_tags, $current_tags);

        // Hapus tag yang tidak dipilih dari tabel article_tags
        foreach ($removed_tags as $tag_id) {
            $this->M_Article->remove_article_tag($article['Id'], $tag_id); // Anda perlu mengganti ini dengan cara Anda menghapus tag yang tidak dipilih
        }

        // Tambahkan tag baru ke tabel article_tags
        foreach ($added_tags as $tag_id) {

            $data_tag = [
                'article_id' => $article['Id'],
                'tag_id' => $tag_id
            ];
            $this->M_Article->add_article_tag($data_tag); // Anda perlu mengganti ini dengan cara Anda menambahkan tag baru
        }
        // exit;

        $this->session->set_flashdata('message_name', 'The article updated successfully.');
        redirect('dash/article/edit/' . $slug);
    }

    private function updateArticlePhoto($old_slug, $slug, $now, $user_id)
    {
        $old_data = $this->M_Article->detail($old_slug);
        $old_photo = $old_data['photo'];
        $path = 'assets/front/images/articles/' . $old_photo;
        if (file_exists($path)) {
            unlink($path);
        }

        $new_photo_file_name = $this->uploadPhoto($old_slug);

        $data = [
            'photo' => $new_photo_file_name,
            'updated_at' => $now,
            'updated_by' => $user_id
        ];

        $this->M_Article->update_article($data, $old_slug);
        $this->session->set_flashdata('message_name', 'The article updated successfully.');
        redirect('dash/article/edit/' . $slug);
    }

    private function validateArticleForm()
    {
        $this->form_validation->set_rules('judul_artikel', 'The Title ', 'required');
        $this->form_validation->set_rules('kategori_artikel', 'The Category ', 'required');
        $this->form_validation->set_rules('headline_artikel', 'The Headline ', 'required');
        $this->form_validation->set_rules('isi_artikel', 'The Content ', 'required');
        $this->form_validation->set_rules('author_id', 'Author ', 'required');
        $this->form_validation->set_rules('keywords', 'Keyword ', 'required');
    }

    private function setFormValidationErrors()
    {
        $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));
        $this->session->set_flashdata('judul_artikel', set_value('judul_artikel'));
        $this->session->set_flashdata('kategori_artikel', set_value('kategori_artikel'));
        $this->session->set_flashdata('headline_artikel', set_value('headline_artikel'));
        $this->session->set_flashdata('isi_artikel', set_value('isi_artikel'));
        $this->session->set_flashdata('keywords', set_value('keywords'));
    }

    private function createNewArticle($slug, $now, $user_id, $judul_artikel)
    {
        $newPhotoFileName = $this->uploadPhoto($slug);

        $data = [
            'id_category' => $this->input->post('kategori_artikel'),
            'judul' => $judul_artikel,
            'headline' => trim($this->input->post('headline_artikel')),
            'content' => trim($this->input->post('isi_artikel')),
            'keywords' => trim($this->input->post('keywords')),
            'author' => $this->input->post('author_id'),
            'photo' => $newPhotoFileName,
            'slug' => trim($slug),
            'created_at' => $now,
            'created_by' => $user_id,
        ];

        $article_id = $this->M_Article->add_article($data);

        $tags = $this->input->post('tags');

        foreach ($tags as $tag_id) {
            $data_tag = [
                'article_id' => $article_id,
                'tag_id' => $tag_id
            ];

            $this->M_Article->add_article_tag($data_tag);
        }

        $this->session->set_flashdata('message_name', 'Artikel berhasil ditambahkan');
        redirect('dash/article');
    }

    private function uploadPhoto($slug)
    {
        $photo = $_FILES['foto_artikel']['name'];
        $pathInfo = pathinfo($photo);
        $extension = $pathInfo['extension'];
        $newPhotoFileName = $slug . '.' . $extension;

        $config = [
            'upload_path' => FCPATH . 'assets/front/images/articles/',
            'allowed_types' => 'jpeg|jpg|JPEG|JPG|PNG|png',
            'overwrite' => TRUE,
            'max_size' => '99999999999',
            'max_height' => '2000',
            'max_width' => '2500',
            'file_name' => $newPhotoFileName,
        ];

        // echo '<pre>';
        // print_r($config);
        // echo '</pre>';
        // exit;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_artikel')) {
            $this->setFormValidationErrors();
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', 'Error message: ' . $error);
            redirect($_SERVER['HTTP_REFERER']);
        }

        return $newPhotoFileName;
    }

    public function edit()
    {
        $slug = $this->uri->segment(4);
        $article = $this->M_Article->detail($slug);

        $data = [
            'title' => 'Edit artikel',
            'categories' => $this->M_Article->category(),
            'authors' => $this->M_Article->authors(),
            'article' => $article,
            'tags' => $this->M_Article->tags(),
            'article_tags' => $this->M_Article->get_article_tags($article['Id']),
        ];

        $this->loadArticleView('v_create', $data);
    }

    public function update_photo($slug)
    {
        $user_id = $this->session->userdata('user_id');
        $old_data = $this->M_Article->detail($slug);
        $old_photo = $old_data['photo'];
        $path = 'assets/front/images/articles/' . $old_photo;
        if (file_exists($path)) {
            unlink($path);
        }

        $newPhotoFileName = $this->uploadPhoto($slug);

        $data = [
            'photo' => $newPhotoFileName,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user_id
        ];

        $this->M_Article->update_photo($data, $slug);
        $this->session->set_flashdata('message_name', 'The photo has been successfully modified.');
        redirect('dash/article/edit/' . $slug);
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);
        $article = $this->M_Article->detail($slug);
        $photo = $article['photo'];
        $path = "assets/front/images/articles/" . $photo;

        if (file_exists($path)) {
            unlink($path);
        }

        $this->M_Article->delete($slug);
        $this->session->set_flashdata('message_name', 'The article has been successfully deleted.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tag()
    {
        $data['title'] = "Article Attribut";
        $data['categories'] = $this->M_Article->category();
        $data['tags'] = $this->M_Article->tags();
        $this->loadArticleView('v_tag', $data);
    }

    public function addNewTag()
    {
        $tag_name = $this->input->post('tag_name');
        $user_id = $this->session->userdata('user_id');
        $slug = url_title($tag_name, 'dash', TRUE);

        if ($this->M_Article->detail_tag($slug)) {
            $this->session->set_flashdata('message_error', $tag_name . ' in article tag is already available.');
        } else {
            $data = [
                'name' => $tag_name,
                'slug' => $slug,
                'created_by' => $user_id,
            ];
            $this->M_Article->add_tag($data);
            $this->session->set_flashdata('message_name', $tag_name . ' added successfully.');
        }

        redirect('dash/article/tag');
    }

    public function author()
    {
        $data['title'] = "Author";
        $data['authors'] = $this->M_Article->authors();
        $this->loadArticleView('v_author', $data);
    }

    public function addNewAuthor()
    {
        $author_name = $this->input->post('author_name');
        $author_email = $this->input->post('author_email');
        $user_id = $this->session->userdata('user_id');
        $slug = url_title($author_name, 'dash', TRUE);

        if ($this->M_Article->detail_author($slug)) {
            $this->session->set_flashdata('message_error', $author_name . ' in article author is already available.');
        } else {
            $data = [
                'name' => $author_name,
                'email' => $author_email,
                'slug' => $slug,
                'created_by' => $user_id,
            ];
            $this->M_Article->add_author($data);
            $this->session->set_flashdata('message_name', $author_name . ' added successfully.');
        }

        redirect('dash/article/author');
    }
}
