<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        //ambil data user yang login dari session
        $data['tittle'] = "Halaman Home";
        $data['user']   = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }
}
