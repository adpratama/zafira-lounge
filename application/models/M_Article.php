<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Article extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_dashboard()
    {
        return $this->db->where('id_category !=', '2')->order_by('judul', 'ASC')->get('article_view')->result();
    }

    public function category()
    {
        return $this->db->where('slug !=', 'layanan')->order_by('category_name', 'ASC')->get('article_category')->result();
    }

    public function detail_category($slug)
    {
        return $this->db->where('slug', $slug)->get('article_category')->row_array();
    }

    public function add_category($data)
    {
        return $this->db->insert('article_category', $data);
    }

    public function add_article($data)
    {
        $this->db->insert('article', $data);
        return $this->db->insert_id();
    }

    public function detail($slug)
    {
        return $this->db->where('slug', $slug)->get('article_view')->row_array();
    }

    public function list_limit($limit, $from)
    {
        return $this->db->where('id_category', '1')->order_by('created_at', 'DESC')->get('article_view', $limit, $from)->result();
    }

    public function search_limit($limit, $from, $keyword)
    {
        return $this->db->like('judul', $keyword)->order_by('created_at', 'DESC')->get('article_view', $limit, $from)->result();
    }

    public function get_published_count()
    {
        return $this->db->where('id_category', '1')->get('article_view')->num_rows();
    }



    public function detail_tag($slug)
    {
        return $this->db->where('slug', $slug)->get('tags')->row_array();
    }

    private function build_query_by_tag($tag)
    {
        $this->db->from('article_tags at')
            ->join('article_view av', 'at.article_id = av.Id', 'left');

        if (is_array($tag)) {
            $this->db->where_in('at.tag_id', $tag);
        } else {
            $this->db->where('at.tag_id', $tag);
        }
    }


    public function get_published_count_by_tag($tag)
    {
        $this->build_query_by_tag($tag);
        return $this->db->count_all_results();
    }


    public function article_limit_by_tag($limit, $from, $tag)
    {
        $this->build_query_by_tag($tag);
        $this->db->limit($limit, $from);
        $query = $this->db->get();
        return $query->result();
    }



    public function get_published_count_search($keyword)
    {
        return $this->db->like('judul', $keyword)->get('article_view')->num_rows();
    }

    public function is_available($id)
    {
        return $this->db->select('photo')->where('slug', $id)->get('article')->row_array();
    }

    public function update_photo($data, $slug)
    {
        return $this->db->where('slug', $slug)->update('article', $data);
    }

    public function update_article($data, $old_slug)
    {
        return $this->db->where('slug', $old_slug)->update('article', $data);
    }

    public function delete($slug)
    {
        return $this->db->where('slug', $slug)->delete('article');
    }

    public function get_all_articles()
    {
        $this->db->select('articles.*, authors.name as author, GROUP_CONCAT(tags.name) as tags');
        $this->db->from('articles');
        $this->db->join('authors', 'authors.id = articles.author_id');
        $this->db->join('article_tags', 'article_tags.article_id = articles.id', 'left');
        $this->db->join('tags', 'tags.id = article_tags.tag_id', 'left');
        $this->db->group_by('articles.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_article_by_slug($slug)
    {
        $this->db->select('a.*, authors.name as author, authors.email as email_author, GROUP_CONCAT(tags.name) as tags');
        $this->db->from('article a');
        $this->db->join('authors', 'authors.id = a.author');
        $this->db->join('article_tags', 'article_tags.article_id = a.id', 'left');
        $this->db->join('tags', 'tags.id = article_tags.tag_id', 'left');
        $this->db->where('a.slug', $slug);
        $this->db->group_by('a.id');
        $query = $this->db->get();
        return $query->row_array();
    }

    // Start function tags
    public function tags()
    {
        return $this->db->order_by('name', 'ASC')->get('tags')->result();
    }

    public function add_tag($data)
    {
        return $this->db->insert('tags', $data);
    }

    public function get_article_tags($article_id)
    {
        $this->db->select('tag_id');
        $this->db->where('article_id', $article_id);
        $query = $this->db->get('article_tags');
        $result = $query->result_array();

        // Mengembalikan array berisi ID tag yang terkait dengan artikel
        return array_column($result, 'tag_id');
    }

    public function add_article_tag($data)
    {
        return $this->db->insert('article_tags', $data);
    }

    public function remove_article_tag($article_id, $tag_id)
    {
        // Query untuk menghapus entri artikel dengan tag tertentu dari tabel article_tags
        $this->db->where('article_id', $article_id);
        $this->db->where('tag_id', $tag_id);
        $this->db->delete('article_tags');
    }
    // End function tags

    // Start function authors
    public function authors()
    {
        return $this->db->order_by('name', 'ASC')->get('authors')->result();
    }

    public function detail_author($slug)
    {
        return $this->db->where('slug', $slug)->get('authors')->row_array();
    }

    public function add_author($data)
    {
        return $this->db->insert('authors', $data);
    }
    // End function authors
}
