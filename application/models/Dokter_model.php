<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {
    public function get_all(){
        return $this->db->get('dokter')->result_array();
    }

    public function get_by_id($id){
        return $this->db->get_where('dokter', ['id' => $id])->row_array();
    }

    public function insert($data){
        return $this->db->insert('dokter', $data);
    }

    public function update($id, $data){
        return $this->db->where('id', $id)->update('dokter', $data);
    }

    public function delete($id){
        return $this->db->delete('dokter', ['id' => $id]);
    }
}
