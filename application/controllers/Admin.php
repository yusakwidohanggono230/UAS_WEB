<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->library('session');
    }

    public function index() {
        // redirect langsung ke dashboard
        redirect('admin/dashboard');
    }

    public function dashboard() {
        // Ambil data statistik
        $data['total'] = $this->Pendaftaran_model->count_all();
        $data['disetujui'] = $this->Pendaftaran_model->count_status('disetujui');
        $data['ditolak'] = $this->Pendaftaran_model->count_status('ditolak');
        $data['diproses'] = $this->Pendaftaran_model->count_status('dalam proses');

        // Load halaman dashboard
        $this->load->view('templates/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function setujui($id) {
        $this->Pendaftaran_model->ubah_status($id, 'disetujui');
        redirect('admin/pendaftaran');
    }

    public function tolak($id) {
        $this->Pendaftaran_model->ubah_status($id, 'ditolak');
        redirect('admin/pendaftaran');
    }
    public function pendaftaran() {
    $data['pendaftaran'] = $this->Pendaftaran_model->get_all(); // pastikan ini sesuai model
    $this->load->view('templates/header');
    $this->load->view('admin/pendaftaran', $data);
    $this->load->view('templates/footer');
    }

}
