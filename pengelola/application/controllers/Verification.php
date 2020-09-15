<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('VerificationModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Quest Verification';

		$data['verificationName'] = $this->VerificationModel->getVerification();

		$this->form_validation->set_rules('verificationName', 'VerificationName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('verification/index', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'quest_name' => $this->input->post('questName'),
			];
			$this->db->insert('quest', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Quest Successfully Added!</div>');
			redirect('quest');
		}

	}

	public function processQuest()
	{
		$active_quest_id = $this->input->post('activequestId');
		$user_id = $this->input->post('userId');
		$user_points = $this->input->post('userPoints');
		$quest_name = $this->input->post('questName');
		$quest_points = $this->input->post('questPoints');
		$input_size_trash = $this->input->post('inputSizeTrash');
		$date_ended = time();
		$this->VerificationModel->processQuest($active_quest_id, $user_id, $user_points, $input_size_trash, $quest_points, $date_ended);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Quest Successfully Processed</div>');
		redirect('verification');
	
	}

	public function deleteActiveQuest()
	{
		$active_quest_id = $this->input->post('activequestId');
		$this->VerificationModel->deleteActiveQuest($active_quest_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Quest Successfully Deleted</div>');
		redirect('verification');
	}
}
