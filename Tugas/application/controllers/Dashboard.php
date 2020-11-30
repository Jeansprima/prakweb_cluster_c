<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('artikel');
    }
    public function index()
    {
        $data['title'] = "Dashboard";

        if ($this->session->userdata['role'] == '1') {
            $query = $this->db->get('article');
            $data['artikel'] = $query->result_array();
        } else {
            $query = $this->db->get_where('article', array('id_user' => $this->session->userdata('user_id')));
            $data['artikel'] = $query->result_array();
        }
        var_dump($data);
        die;
        $this->load->view('master/mastertop', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('master/masterfooter');
    }
    public function view($id)
    {
        $data['artikel'] = $this->news_model->get_news($id);

        if (empty($data['artikel'])) {
            show_404();
        }

        $data['title'] = $data['artikel']['title'];

        $this->load->view('master/mastertop', $data);
        echo '<h2>' . $data['artikel']['title'] . '</h2>';
        echo $data['artikel']['text_article'];
        $this->load->view('master/masterfooter');
    }
    public function create()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('user/login'));
        } else {
            $data['id_user'] = $this->session->userdata('user_id');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Buat artikel';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('artikel', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('master/mastertop', $data);
            $this->load->view('news/create');
            $this->load->view('master/masterfooter');
        } else {
            $this->news_model->set_news();
            $this->load->view('master/mastertop', $data);
            echo "sukses menambah artikel!";
            $this->load->view('master/masterfooter');
        }
    }
    public function edit()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('home'));
        } else {
            $data['id_user'] = $this->session->userdata('user_id');
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $data['title'] = 'Edit artikel';
        $data['artikel'] = $this->news_model->get_news_by_id($id);

        if ($data['artikel']['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class();
            redirect(site_url($currentClass));
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text_article', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('master/mastertop', $data);
            $this->load->view('dashboard/edit', $data);
            $this->load->view('master/masterfooter');
        } else {
            redirect(site_url('news'));
        }
    }

    public function delete()
    {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('home'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $data = $this->news_model->get_news_by_id($id);

        if ($data['id_user'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->news_model->delete_news($id);
        redirect(base_url() . 'home');
    }
}
