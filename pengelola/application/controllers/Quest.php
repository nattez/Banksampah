<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuestModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Quest';

		$data['questName'] = $this->QuestModel->getQuest();

		$this->form_validation->set_rules('questName', 'QuestName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('quest/index', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'quest_code' => $this->input->post('questCode'),
				'quest_name' => $this->input->post('questName'),
				'points' => $this->input->post('questPoint'),
				'min_level' => $this->input->post('questLevel'),
				'info' => $this->input->post('questInfo'),
				'trash_name' => $this->input->post('sampahName'),
				'quest_trash_size' => $this->input->post('questTrashSize'),
			];
			$this->db->insert('quest', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Quest Successfully Added!</div>');
			redirect('quest');
		}

	}

	public function editQuest()
	{
		$quest_id = $this->input->post('questId');
		$quest_code = $this->input->post('questCode');
		$quest_name = $this->input->post('questName');
		$this->QuestModel->editQuest($quest_id, $quest_code, $quest_name);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Quest Successfully Updated</div>');
		redirect('quest');
	
	}

	public function deleteQuest()
	{
		$quest_id = $this->input->post('questId');
		$this->QuestModel->deleteQuest($quest_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Quest Successfully Deleted</div>');
		redirect('quest');
	}
}
