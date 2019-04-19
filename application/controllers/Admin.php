<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		//ambil data user yang login dari session
		$data['tittle'] = "Halaman Administrator";
		$data['user']   = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}
}
