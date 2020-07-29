<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
    }

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('templates/auth_header');
			$this->load->view('auth/index');
			$this->load->view('templates/plugin/sweetalert');
			$this->load->view('templates/auth_footer');
		}else{
			$this->login->prosesLogin();
		}
	}

	public function logout()
	{
		$data = [
			'username',
			'role_id'
		];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('message', 'logout');
		redirect('auth/login');
	}

}
