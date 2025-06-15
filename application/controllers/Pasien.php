<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
        $this->load->model('Pendaftaran_model');

        if ($this->session->userdata('role') != 'user') {
        redirect('auth/login');
    }
}


    public function index() {
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('templates_user/headers');
        $this->load->view('pasien/form_pendaftaran', $data);
        $this->load->view('templates_user/footers');
    }
    public function dashboard() {
    $pasien_id = $this->session->userdata('id'); 
    $data['pendaftaran'] = $this->Pendaftaran_model->get_by_pasien($pasien_id);

    $this->load->view('templates_user/headers');
    $this->load->view('pasien/dashboard', $data);
    $this->load->view('templates_user/footers');
    }


    public function daftar() {
        $pasien_data = [
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
        ];

        $pasien_id = $this->Pasien_model->tambah_pasien($pasien_data);

        $this->session->set_userdata('pasien_id', $pasien_id);

        $pendaftaran_data = [
            'pasien_id' => $pasien_id,
            'dokter_id' => $this->input->post('dokter_id'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'jam_kunjungan' => $this->input->post('jam_kunjungan'),
            'status' => 'dalam proses'
        ];

        $this->Pendaftaran_model->tambah_pendaftaran($pendaftaran_data);
        $this->session->set_userdata('pasien_id', $pasien_id);

        // Redirect ke halaman status
        redirect('pasien/status');
    }
    public function status() {
    $pasien_id = $this->session->userdata('pasien_id');
    if (!$pasien_id) {
        redirect('pasien'); // Kalau tidak ada data, balik ke form
    }

    $data['pendaftaran'] = $this->Pendaftaran_model->get_latest_by_pasien($pasien_id);

    $this->load->view('templates_user/headers');
    $this->load->view('pasien/status_pendaftaran', $data);
    $this->load->view('templates_user/footers');
}

}
?>
