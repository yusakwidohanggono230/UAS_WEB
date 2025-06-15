<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    public function tambah_pendaftaran($data) {
        return $this->db->insert('pendaftaran', $data);
    }

    public function get_all() {
    $this->db->select('pendaftaran.*, pasien.nama AS nama_pasien, dokter.nama_dokter');
    $this->db->from('pendaftaran');
    $this->db->join('pasien', 'pasien.id = pendaftaran.pasien_id');
    $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
    return $this->db->get()->result();
}

    public function get_status_by_pasien_id($pasien_id) {
    $this->db->select('status');
    $this->db->from('pendaftaran');
    $this->db->where('pasien_id', $pasien_id);
    $this->db->order_by('id', 'DESC'); // kalau ada lebih dari 1 pendaftaran
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row()->status;
    } else {
        return 'Status tidak ditemukan';
    }
}

    public function ubah_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('pendaftaran', ['status' => $status]);
    }
    public function count_all() {
    return $this->db->count_all('pendaftaran');
    }
    public function count_status($status) {
    return $this->db->where('status', $status)->count_all_results('pendaftaran');
    }
    public function get_by_pasien($pasien_id) {
    $this->db->select('pendaftaran.*, dokter.nama_dokter as dokter');
    $this->db->from('pendaftaran');
    $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
    $this->db->where('pendaftaran.pasien_id', $pasien_id);
    return $this->db->get()->result();
}
    public function get_latest_by_pasien($pasien_id) {
    $this->db->select('pendaftaran.*, dokter.nama_dokter as dokter');
    $this->db->from('pendaftaran');
    $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
    $this->db->where('pendaftaran.pasien_id', $pasien_id);
    $this->db->order_by('pendaftaran.id', 'DESC');
    return $this->db->get()->row(); 

    }
}
?>
