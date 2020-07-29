<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function prosesLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->db->get_where('user', ['username' => $username])->row();

		if($result){
			if (password_verify($password, $result->password)) {
				if($result->is_active == 1){
					$data = [
						'username' => $result->username,
						'role_id' => $result->role_id
					];
					$this->session->set_userdata($data);
					$this->session->set_flashdata('message', 'login_success');
					redirect('admin');
				}else{
					$this->session->set_flashdata('message', 'user_inactive');
					redirect('auth/login');
				}
			}else{
				$this->session->set_flashdata('message', 'password_wrong');
				redirect('auth/login');
			}
		}else{
			$this->session->set_flashdata('message', 'user_not_found');
			redirect('auth/login');
		}

	}

}
