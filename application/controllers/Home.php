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
			'lounges' => $this->M_Lounge->list(),
			'pages' => 'pages/v_home',
		];
		$this->load->view('index', $data);
	}
}