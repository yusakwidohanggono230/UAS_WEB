<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') != 'user') {
            redirect('auth/login');
        }

        $this->load->model('Dokter_model');
    }

    public function index() {
        $data['dokter'] = $this->Dokter_model->get_all();

        $this->load->view('templates_user/headers');
        $this->load->view('templates/blank', $data);
        $this->load->view('templates_user/footers');
    }
}
