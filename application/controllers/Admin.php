<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$data['user'] = $this->user->getDataUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/plugin/sweetalert', $data);
		$this->load->view('templates/footer', $data);
	}

}
