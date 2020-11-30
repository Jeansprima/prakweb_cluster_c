<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "Login";
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/mastertop', $data);
            $this->load->view('auth/login');
            $this->load->view('master/masterfooter');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($password != $user['password']) {
                $this->session->set_flashdata('massage', '<div> Password salah! </div>');
                redirect('home');
            } else {
                $data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('massage', '<div> Username tidak ditemukan </div>');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('massage', '<div> Anda sudah keluar.</div>');
        redirect('home');
    }
}
