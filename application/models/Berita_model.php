<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Berita_model extends CI_Model{
    public function get_all_berita() {
        return $this->db->get('berita')->result_array();
    }
    public function insert_berita($data){
        return $this->db->insert('berita',$data);
    }
    public function insert_pasien($data) {
    return $this->db->insert('pasien', $data);
}

    public function get_pasien_terdaftar()
{
    $this->db->select('pasien.id AS id_pasien, pasien.nama, pasien.tanggal_lahir, pasien.alamat, pasien.no_telp, pendaftaran.status');
    $this->db->from('pendaftaran');
    $this->db->join('pasien', 'pendaftaran.pasien_id = pasien.id');
    $this->db->where('pendaftaran.status !=', 'dalam proses');
    return $this->db->get()->result_array();
}
    public function get_pasien_by_id($id)
{
    $this->db->select('pasien.*, pendaftaran.status');
    $this->db->from('pasien');
    $this->db->join('pendaftaran', 'pendaftaran.pasien_id = pasien.id', 'left');
    $this->db->where('pasien.id', $id);
    return $this->db->get()->row_array();
}


    public function delete_berita($idberita){
    return $this->db->delete('berita', ['idberita' => $idberita]);
}

    public function get_berita_by_id($idberita){
        return $this->db->get_where('berita',['idberita'=>$idberita])->row_array();
    }
    public function update_berita($id, $data) {
        $this->db->where('idberita', $id);
        return $this->db->update('berita', $data);
    }
    public function get_laporan_berita($dari, $sampai)
    {
    $this->db->where('tanggal_publish >=', $dari);
    $this->db->where('tanggal_publish <=', $sampai);
    return $this->db->get('berita')->result();
    }
    public function get_laporan_pasien($dari, $sampai) {
    $this->db->select("COUNT(*) as total,
                       SUM(CASE WHEN status = 'disetujui' THEN 1 ELSE 0 END) as disetujui,
                       SUM(CASE WHEN status = 'ditolak' THEN 1 ELSE 0 END) as ditolak");
    $this->db->from('pendaftaran');
    $this->db->where('tanggal_kunjungan >=', $dari);
    $this->db->where('tanggal_kunjungan <=', $sampai);
    return $this->db->get()->row_array();
}
public function get_jadwal_by_id_pasien($id_pasien) {
    $this->db->select('pendaftaran.*, dokter.nama_dokter as nama_dokter');
    $this->db->from('pendaftaran');
    $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id', 'left'); // sesuaikan dengan strukturmu
    $this->db->where('pendaftaran.pasien_id', $id_pasien);
    return $this->db->get()->result_array();
}



}