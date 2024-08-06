<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // Ini akan menggunakan grup 'default' secara default
    }

    // Function to retrieve all surat records from the database
    public function get_all_surat() {
        $query = $this->db->get('surat');
        return $query->result();
    }

    // Function to add a new surat
    public function insert($data) {
        return $this->db->insert('surat', $data);
    }

    public function get_surat_by_id($id_surat) {
        $query = $this->db->get_where('surat', array('id_surat' => $id_surat));
        return $query->row_array();
    }
    
    public function surat_edit($id_surat) {
        $data['surat'] = $this->Surat_model->get_surat_by_id($id_surat);
        if ($data['surat']) {
            $this->load->view('surat/edit', $data); // Menampilkan formulir edit
        } else {
            show_404(); // Jika tidak ditemukan, tampilkan halaman 404
        }
    }

    public function update_surat($id_surat, $data) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->update('surat', $data);
    }

    // Function to delete a specific surat by id
    public function hapus($id_surat) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->delete('surat');
    }
}
