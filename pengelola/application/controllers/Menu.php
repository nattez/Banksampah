<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Manage Menu';

		$data['menuName'] = $this->MenuModel->getMenu();

		$this->form_validation->set_rules('menuName', 'MenuName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'menu_code' => $this->input->post('menuCode'),
				'menu_name' => $this->input->post('menuName')
			];
			$this->db->insert('menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Menu Successfully Added!</div>');
			redirect('menu');
		}

	}


	public function submenu()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Manage Submenu';

		$data['subMenu'] = $this->MenuModel->getSubMenu();
		$data['menu_name'] = $this->db->get('menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');


		if($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->insert('submenu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Submenu Successfully Added!</div>');
			redirect('menu/submenu');
		}
	}

	public function editMenu()
	{
		$menu_id = $this->input->post('menuId');
		$menu_code = $this->input->post('menuCode');
		$menu_name = $this->input->post('menuName');
		$this->MenuModel->editMenu($menu_id, $menu_code, $menu_name);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Menu Successfully Updated</div>');
		redirect('menu');
	
	}

	public function deleteMenu()
	{
		$menu_id = $this->input->post('menuId');
		$this->MenuModel->deleteMenu($menu_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Menu Successfully Deleted</div>');
		redirect('menu');
	}

	public function deleteSubMenu()
	{
		$submenu_id = $this->input->post('submenu_id');
		$this->MenuModel->deleteSubMenu($submenu_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Submenu Successfully Deleted</div>');
		redirect('menu/submenu');
	}

}