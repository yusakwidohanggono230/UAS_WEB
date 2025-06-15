<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Berita extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model');
       // $this->load->library('session');
    }
    public function index() {
    $data['berita'] = $this->Berita_model->get_pasien_terdaftar(); // Ganti jadi data pasien
    $this->load->view('templates/header');
    $this->load->view('berita/index', $data);
    $this->load->view('templates/footer');
    }
    public function pasien_terdaftar()
    {
    $data['berita'] = $this->Berita_model->get_pasien_terdaftar(); // Gunakan key 'berita' agar view tetap bisa pakai
    $this->load->view('templates/header');
    $this->load->view('berita/index', $data); // View tetap pakai 'berita/index'
    $this->load->view('templates/footer');
    }
    public function tambah_pasien() {
    $this->load->model('Dokter_model');
    $data['dokter'] = $this->Dokter_model->get_all();

    $this->load->view('templates/header');
    $this->load->view('berita/tambah_pasien', $data);
    $this->load->view('templates/footer');
}

    public function simpan_pasien() {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_telp', 'Telepon', 'required');
    $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
    $this->form_validation->set_rules('dokter_id', 'Dokter', 'required');
    $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
    $this->form_validation->set_rules('jam_kunjungan', 'Jam Kunjungan', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->tambah_pasien(); // Tampilkan ulang form jika validasi gagal
    } else {
        $pasien_data = [
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
        ];

        $this->Berita_model->insert_pasien($pasien_data);
        $pasien_id = $this->db->insert_id();

        $pendaftaran_data = [
            'pasien_id' => $pasien_id,
            'dokter_id' => $this->input->post('dokter_id'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'jam_kunjungan' => $this->input->post('jam_kunjungan'),
            'status' => 'dalam proses',
        ];

        $this->db->insert('pendaftaran', $pendaftaran_data);
        $this->session->set_flashdata('success', 'Pasien berhasil didaftarkan!');
        redirect('berita/pasien_terdaftar');
    }
}

    public function tambah(){
        $this->load->model('Kategori_model');
        $data['kategori_berita'] = $this->Kategori_model->get_all();
        $data['berita']=$this->Berita_model->get_all_berita();
        $this->load->view('templates/header');
        $this->load->view('berita/form_berita', $data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $judul = $this->input->post('judul');
        $kategori= $this->input->post('kategori');
        $headline=$this->input->post('headline');
        $isi=$this->input->post('isi_berita');
        $pengirim=$this->input->post('pengirim');
		$tgl_publish=$this->input->post('tgl_publish');

        $data=array(
            'judul'=> $judul,
            'kategori'=>$kategori,
            'headline'=>$headline,
            'isi_berita'=>$isi,
            'pengirim'=>$pengirim,
			'tanggal_publish'=>$tgl_publish
        );
        $result= $this->Berita_model->insert_berita($data);

        if($result){
            $this->session->set_flashdata('success', 'Berita berhasil disimpan');
            redirect('berita');
        }else{
            $this->session->set_flashdata('error', 'gagal menyimpan berita');
            redirect('berita');
        }
    }
    public function upload_summernote_image() {
        $config['upload_path'] = './uploads/summernote/'; // Folder untuk gambar Summernote
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = random_string('alnum', 16);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            $response = array(
                'error' => $this->upload->display_errors('', '')
            );
            echo json_encode($response);
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $file_url = base_url('uploads/summernote/' . $file_name);

            $response = array(
                'url' => $file_url
            );
            echo json_encode($response);
        }
    }
    public function hapus($idberita){
    $this->Berita_model->delete_berita($idberita);
    redirect('berita');
}
public function hapus_pasien($id_pasien) {
    // Hapus data dari tabel pendaftaran terlebih dahulu (karena relasi foreign key)
    $this->db->delete('pendaftaran', ['pasien_id' => $id_pasien]);

    // Lalu hapus dari tabel pasien
    $this->db->delete('pasien', ['id' => $id_pasien]);

    redirect('berita/pasien_terdaftar'); // atau ke halaman mana pun yang kamu inginkan
}

    public function edit($id)
{
    $data['pasien'] = $this->Berita_model->get_pasien_by_id($id);

    // Periksa status pendaftaran jika ada
    $pendaftaran = $this->db->get_where('pendaftaran', ['pasien_id' => $id])->row_array();
    $data['pasien']['status'] = isset($pendaftaran['status']) ? $pendaftaran['status'] : 'diproses';

    $this->load->view('templates/header');
    $this->load->view('berita/edit_berita', $data);
    $this->load->view('templates/footer');
}


    public function update($id) {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('telepon', 'Telepon', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->edit($id); // Tampilkan kembali form jika validasi gagal
    } else {
        $data_pasien = [
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('telepon'),
        ];

        $this->db->where('id', $id);
        $this->db->update('pasien', $data_pasien);

        // Update status di tabel pendaftaran
        $this->db->where('pasien_id', $id);
        $this->db->update('pendaftaran', ['status' => $this->input->post('status')]);

        $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui');
        redirect('berita/pasien_terdaftar');
    }
}

    public function laporan()
    {
     $this->load->view('templates/header');
    $this->load->view('berita/laporan_form');
    $this->load->view('templates/footer');
    }

    public function cetak_laporan()
    {
    $tanggal_dari = $this->input->post('tanggal_dari');
    $tanggal_sampai = $this->input->post('tanggal_sampai');

    $data['berita'] = $this->Berita_model->get_laporan_berita($tanggal_dari, $tanggal_sampai);
    $data['tanggal_dari'] = $tanggal_dari;
    $data['tanggal_sampai'] = $tanggal_sampai;
    // print_r($data);
    $this->load->view('templates/header');
    $this->load->view('berita/laporan_hasil', $data);
    $this->load->view('templates/footer');
    }
    public function laporan_pasien() {
    $tanggal_dari = $this->input->post('tanggal_dari');
    $tanggal_sampai = $this->input->post('tanggal_sampai');

    // Ambil data laporan dari model
    $data['laporan'] = $this->Berita_model->get_laporan_pasien($tanggal_dari, $tanggal_sampai);
    $data['tanggal_dari'] = $tanggal_dari;
    $data['tanggal_sampai'] = $tanggal_sampai;

    $this->load->view('templates/header');
    $this->load->view('berita/laporan_hasil', $data);
    $this->load->view('templates/footer');
}
    public function jadwal($id)
{
    $this->load->model('Berita_model');
    $data['pasien'] = $this->Berita_model->get_pasien_by_id($id);
    
    // Ambil data pendaftaran pasien (jika perlu)
    $data['pendaftaran'] = $this->Berita_model->get_jadwal_by_id_pasien($id);


    $this->load->view('templates/header');
    $this->load->view('berita/jadwal_pasien', $data);
    $this->load->view('templates/footer');
}


}