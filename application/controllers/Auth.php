<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load form validasi
		$this->load->library('form_validation');
	}
	public function index()

	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['tittle']	= "Halaman Login";
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			//private method
			$this->_login();
		}
	}

	private function _login()
	{
		$email		= $this->input->post('email');
		$pass		= $this->input->post('password');
		$user		= $this->db->get_where('user', ['email' => $email])->row_array();
		//already user
		if ($user) {
			//If User Aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($pass, $user['password'])) {
					//set session
					$data	= [
						'email'		=> $user['email'],
						'role_id'	=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					//wrong password
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					password Salah
					</div>');
					redirect('auth');
				}
			} else {
				//Not Aktif
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email Anda Belum aktif | Silahkan Hubungi Admin
				</div>');
				redirect('auth');
			}
		} else {
			//Not User
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Login Gagal !!
		 	 </div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		//set rule form validasi
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique'	=> 'this email already registered'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
			'matches' =>	'password dont matches'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['tittle']	= "halaman Registrasi";
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('template/auth_footer');
		} else {
			// load model
			$data	=	[
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'image'		=> 'default.jpg',
				'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'	=> 2,
				'is_active'	=> 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			//set Alert Flash Data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil Registrasi | Silahkan Hubungi adminstrator Untuk Aktifasi
		  </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Logout
		  	</div>');
		redirect('auth');
	}
}
