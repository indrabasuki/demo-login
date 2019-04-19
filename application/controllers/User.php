<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load form validasi
		$this->load->library('form_validation');
	}
	public function index()
	{
		//ambil data user yang login dari session
		$data['tittle'] = "Halaman Utama";
		$data['user']   = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function edit()
	{ //ambil data user yang login dari session
		$data['tittle'] = "Halaman Edit Profile";
		$data['user']   = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row_array();
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('template/footer');
		} else {
			$name	= $this->input->post('name');
			$email	= $this->input->post('email');

			//upload image
			$image	= $_FILES['image']['name'];
			if ($image) {
				$config['allowed_types']	= 'gif|jpg|png';
				$config['max_size']			= '2048';
				$config['upload_path']		= './assets/img/profile';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Success Update Profile
					</div>');
			redirect('user');
		}
	}
}
