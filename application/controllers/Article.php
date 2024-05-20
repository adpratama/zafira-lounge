<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url', 'date']);
        $this->load->model(['M_Article']);
        $this->load->library(['pagination']);
    }

    public function index()
    {
        $config['base_url'] = base_url('article/index');
        $config['total_rows'] = $this->M_Article->get_published_count();
        $config['per_page'] = 5;
        $config['num_link'] = 5;
        $config['full_tag_open'] = '<div class="wg-pagination"><ul class="justify-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = TRUE;
        $config['last_link'] = TRUE;
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="icon-chevrons-left"></i>';
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="icon-chevrons-right"></i>';
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" class="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;

        $this->pagination->initialize($config);

        // Use 'page' instead of 'per_page'
        $from = $this->uri->segment(3);
        $limit = $config['per_page'];

        $data = [
            'title' => "Artikel",
            'pages' => 'pages/article/v_article',
            'article' => $this->M_Article->list_limit($limit, $from),
            'categories' => $this->M_Article->category(),
            // 'articles' => $this->M_Article->list_limit('3', '0'),
        ];
        $this->load->view('index', $data);
    }

    public function read()
    {
        $slug = $this->uri->segment(3);

        $detail = $this->M_Article->get_article_by_slug($slug);
        // print_r($detail);
        // exit;

        $data = [
            "title" => $detail['judul'],
            'pages' => 'pages/article/v_detail',
            'article' => $detail,
            'articles' => $this->M_Article->list_limit('3', '0'),
            'categories' => $this->M_Article->category(),
            'tags' => $this->M_Article->tags(),
        ];

        $this->load->view('index', $data);
    }


    public function tags()
    {
        $tag = $this->uri->segment(3);
        $tag_id = $this->M_Article->detail_tag($tag);

        $config['base_url'] = base_url('article/tags/' . $tag_id['Id']);
        $config['total_rows'] = $this->M_Article->get_published_count_by_tag($tag_id['Id']);
        $config['per_page'] = 5;
        $config['num_link'] = 5;
        $config['full_tag_open'] = '<div class="wg-pagination"><ul class="justify-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = TRUE;
        $config['last_link'] = TRUE;
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="icon-chevrons-left"></i>';
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="icon-chevrons-right"></i>';
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" class="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;

        $this->pagination->initialize($config);

        // Use 'page' instead of 'per_page'
        $from = $this->uri->segment(3);
        $limit = $config['per_page'];

        $data = [
            'title' => "Artikel",
            'pages' => 'pages/article/v_article',
            'article' => $this->M_Article->article_limit_by_tag($limit, $from, $tag_id['Id']),
            'categories' => $this->M_Article->category(),
        ];

        // print_r($data['article']);
        // exit;
        $this->load->view('index', $data);
    }
}
