<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	//Halaman Welcome
	public function index()
	{
		$data['tittle']	= "Welcome Page";
		$this->load->view('welcome_message', $data);
	}
}
