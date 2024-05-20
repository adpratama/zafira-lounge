<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

    private function loadCategoryView($page, $data)
    {
        $data['title'] = 'Category';
        $data['pages'] = "pages/dashboard/article/{$page}";
        $this->load->view('pages/index', $data);
    }

    public function index()
    {
        $data['categories'] = $this->M_Article->category();
        $this->loadCategoryView('v_category', $data);
    }

    public function store()
    {
        $old_slug = $this->uri->segment(4);
        $category_name = $this->input->post('category_name');

        $user_id = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');

        if ($old_slug) {
        } else {
            $slug = url_title($category_name, 'dash', TRUE);

            $cek = $this->M_Article->detail_category($slug);

            $data = [
                'category_name' => $category_name,
                'slug' => $slug,
                'created_at' => $now,
                'created_by' => $user_id,
            ];

            if ($cek) {
                $this->session->set_flashdata('message_error', $category_name . ' in article category is already available.');
            } else {
                $this->M_Article->add_category($data);
                $this->session->set_flashdata('message_name', $category_name . ' added successfully.');
            }

            redirect('dash/category');
        }
    }
}
