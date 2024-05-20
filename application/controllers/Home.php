<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_Lounge']);
		$this->load->helper(['string', 'url', 'date', 'number']);
	}

	public function index()
	{
		$data = [
			'title' => 'Beranda',
			'lounges' => $this->M_Lounge->list(),
			'pages' => 'pages/v_home',
		];
		$this->load->view('index', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'Tentang',
			'lounges' => $this->M_Lounge->list(),
			'pages' => 'pages/v_about',
		];
		$this->load->view('index', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Kontak',
			'lounges' => $this->M_Lounge->list(),
			'pages' => 'pages/v_contact',
		];
		$this->load->view('index', $data);
	}

	public function book()
	{
		$data = [
			'title' => 'Book',
			'lounges' => $this->M_Lounge->list(),
			'pages' => 'pages/v_book',
		];
		$this->load->view('index', $data);
	}
}
