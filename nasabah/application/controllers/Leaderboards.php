<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LeaderboardsModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Leaderboards';

		$data['leaderboardsName'] = $this->LeaderboardsModel->getLeaderboards();

		$this->form_validation->set_rules('leaderboardsName', 'LeaderboardsName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('leaderboards/index', $data);
			$this->load->view('layout/footer');			
		} else {
			redirect('leaderboards');
		}

	}



}
