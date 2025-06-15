<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'user') {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->model('Pasien_model');
        $data['pasien'] = $this->Pasien_model->get_by_user_id($this->session->userdata('user_id'));
        $this->load->view('pasien/form_pendaftaran', $data);
    }
}
