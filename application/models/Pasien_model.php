<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function get_by_user_id($user_id) {
        $this->db->where('user_id', $user_id); // Pastikan kolom ini ada di tabel pasien
        return $this->db->get('pasien')->result();
    }

    public function tambah_pasien($data) {
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
    }
}
?>
