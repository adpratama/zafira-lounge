<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'pagination']);
		$this->load->helper(['string', 'url', 'date']);
		$this->load->model(['M_Customer', 'M_Auth']);

		if (!$this->session->userdata('is_logged_in')) {

			$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			You have to login first.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data = [
			"title" => "Customer",
			"pages" => "pages/dashboard/invoice/v_customer",
			"customers" => $this->M_Customer->list_customer(),
		];
		$this->load->view('pages/index', $data);
	}

	public function store()
	{
		$nama_customer = $this->input->post('nama_customer');
		$slug = url_title($nama_customer, 'dash', true);

		$data = [
			'nama_customer' => $nama_customer,
			'telepon_customer' => $this->input->post('telepon_customer'),
			'status_customer' => $this->input->post('status_customer'),
			'slug' => $slug,
		];

		$old_slug = $this->uri->segment(4);
		if ($old_slug) {
			$data['alamat_customer'] = $this->input->post('edit_alamat_customer');
			$this->M_Customer->update($data, $old_slug);

			$this->session->set_flashdata('message_name', 'The customer has been successfully updated.');
		} else {
			if ($this->M_Customer->is_available($slug)) {
				$this->session->set_flashdata('message_error', 'Customer ' . $nama_customer . ' sudah ada.');
			} else {
				$data['alamat_customer'] = $this->input->post('alamat_customer');

				$this->M_Customer->insert($data);

				$this->session->set_flashdata('message_name', 'The customer has been successfully added.');
			}
		}

		redirect("dash/customer");
	}

	public function edit($id)
	{
		$id = $this->uri->segment(4);

		$data = [
			'title' => 'Edit Category',
			'style' => 'dashboard/layouts/_style',
			'pages' => 'pages/dashboard/category/v_add_category',
			'category' => $this->M_Category->detail_category($id),
			'script' => 'dashboard/layouts/_script',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('pages/index', $data);
	}
}
