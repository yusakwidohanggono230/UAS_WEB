<?php
class Pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['dokter'] = $this->Pendaftaran_model->get_dokter();
        $this->load->view('pendaftaran_form', $data);
    }

    public function simpan() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('jam_kunjungan', 'Jam Kunjungan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'pasien' => [
                    'nama' => $this->input->post('nama'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp')
                ],
                'pendaftaran' => [
                    'dokter_id' => $this->input->post('dokter_id'),
                    'keluhan' => $this->input->post('keluhan'),
                    'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                    'jam_kunjungan' => $this->input->post('jam_kunjungan'),
                ]
            ];

            $this->Pendaftaran_model->simpan_pendaftaran($data);
            $this->load->view('pendaftaran_sukses');
        }
    }
}
