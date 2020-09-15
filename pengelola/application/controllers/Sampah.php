<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SampahModel');

	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Sampah';

		$data['sampahName'] = $this->SampahModel->getSampah();

		$this->form_validation->set_rules('sampahName', 'SampahName', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('sampah/index', $data);
			$this->load->view('layout/footer');			
		} else {
			$data = [
				'trash_code' => $this->input->post('trashCode'),
				'trash_name' => $this->input->post('sampahName'),
				'trash_type' => $this->input->post('sampahJenis'),
				'price' => $this->input->post('sampahHarga'),
			];

			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/sampah/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
					$this->db->update('trash');
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->insert('trash', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					New Sampah Successfully Added!</div>');
			redirect('sampah');
		}

	}

	public function editSampah()
	{
		$trash_id = $this->input->post('trashId');
		$trash_code = $this->input->post('trashCode');
		$trash_name = $this->input->post('trashName');
		$this->SampahModel->editSampah($trash_id, $trash_code, $trash_name);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Sampah Successfully Updated</div>');
		redirect('sampah');
	
	}

	public function deleteSampah()
	{
		$trash_id = $this->input->post('trashId');
		$this->SampahModel->deleteSampah($trash_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Sampah Successfully Deleted</div>');
		redirect('sampah');
	}
}
