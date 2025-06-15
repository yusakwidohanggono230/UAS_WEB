<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
    }

    public function index() {
        // Dashboard atau berita
        $this->load->view('admin/dashboard');
    }

    public function berita() {
        $this->load->model('Berita_model');
        $data['berita'] = $this->Berita_model->get_all();
        $this->load->view('admin/berita_list', $data);
    }
}
