<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quests extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('QuestsModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Quests';

		$data['questsName'] = $this->QuestsModel->getQuests($this->session->userdata('user_level'));


		$this->form_validation->set_rules('questsName', 'QuestsName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('quests/index', $data);
			$this->load->view('layout/footer');			
		} else {
			redirect('quests');
		}

	}

	public function activequests()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'My Quests';
		
		$data['questsName'] = $this->QuestsModel->getActiveQuests($this->session->userdata('username'));


		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('quests/activequests', $data);
		$this->load->view('layout/footer');
	}

	public function takeQuests()
	{

		$data = [
				'quest_id' => $this->input->post('questsId'),
				'quest_name' => $this->input->post('questsName'),
				'quest_points' => $this->input->post('questsPoints'),
				'trash_size' => $this->input->post('questsTrashSize'),
				'user_id' => $this->input->post('userId'),
				'date_started' => time()
			];
		$this->db->insert('active_quest', $data);
		redirect('quests/activequests');
	}

}
