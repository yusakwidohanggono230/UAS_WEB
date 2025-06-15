<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dokter_model');
        $this->load->library('session');
    }

    public function index() {
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('dokter/form_tambah');
        $this->load->view('templates/footer');
    }

    public function insert(){
        $nama = $this->input->post('nama_dokter');
        $spesialis = $this->input->post('spesialis');

        $data = [
            'nama_dokter' => $nama,
            'spesialis' => $spesialis
        ];

        if ($this->Dokter_model->insert($data)) {
            $this->session->set_flashdata('success', 'Dokter berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan dokter');
        }
        redirect('dokter');
    }

    public function edit($id){
        $data['dokter'] = $this->Dokter_model->get_by_id($id);
        if (!$data['dokter']) show_404();
        $this->load->view('templates/header');
        $this->load->view('dokter/form_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id){
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter'),
            'spesialis' => $this->input->post('spesialis')
        ];
        if ($this->Dokter_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui dokter');
        }
        redirect('dokter');
    }

    public function hapus($id){
        $this->Dokter_model->delete($id);
        $this->session->set_flashdata('success', 'Dokter berhasil dihapus');
        redirect('dokter');
    }
}
