<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function index() 
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user_role'] = $this->db->get_where('user_role', ['role_id' => $this->session->userdata('role_id')])->row_array();
		$data['title'] = 'My Profile';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('layout/footer');
	}
}