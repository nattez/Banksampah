<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NasabahModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Nasabah';

		$data['nasabahName'] = $this->NasabahModel->getNasabah();

		$this->form_validation->set_rules('nasabahName', 'NasabahName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('nasabah/index', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'role_id' => $this->input->post('roleId'),
				'image' => $this->input->post('image'),
				'user_level' => $this->input->post('nasabahLevel'),
				'rekening_id' => $this->input->post('rekeningId'),
				'fullname' => $this->input->post('nasabahName'),
				'username' => $this->input->post('nasabahUsername'),
				'password' => password_hash($this->input->post('nasabahPassword'),PASSWORD_DEFAULT),
				'address' => $this->input->post('nasabahAlamat'),
				'phone_number' => $this->input->post('nasabahHp'),
				'user_dummy_points' => $this->input->post('nasabahDummyPoints'),
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Nasabah Successfully Added!</div>');
			redirect('nasabah');
		}

	}

	public function editNasabah()
	{
		$user_id = $this->input->post('userId');
		$rekening_id = $this->input->post('rekeningId');
		$fullname = $this->input->post('nasabahName');
		$this->NasabahModel->editNasabah($user_id, $rekening_id, $fullname);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Nasabah Successfully Updated</div>');
		redirect('nasabah');
	
	}

	public function deleteNasabah()
	{
		$user_id = $this->input->post('userId');
		$this->NasabahModel->deleteNasabah($user_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Nasabah Successfully Deleted</div>');
		redirect('nasabah');
	}
}
