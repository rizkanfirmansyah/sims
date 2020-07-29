<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getDataUser()
	{
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->get('user')->row_array();
	}

}