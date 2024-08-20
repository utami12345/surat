<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratm_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // Menggunakan grup 'default' secara default
        $this->load->library('pagination');
    }

    // Function to retrieve all surat masuk records from the database
    public function get_all_surat_masuk() {
        $query = $this->db->get('suratm');
        return $query->result();
    }

    // Function to add a new surat masuk
    public function insert($data) {
        return $this->db->insert('suratm', $data);
    }

    // Function to retrieve a specific surat masuk by id
    public function get_surat_masuk_by_id($id_surat) {
        $query = $this->db->get_where('suratm', array('id_surat' => $id_surat));
        return $query->row_array();
    }
    
    // Function to update surat masuk
    public function update_surat_masuk($id_surat, $data) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->update('suratm', $data);
    }

    // Function to delete a specific surat masuk by id
    public function delete_surat($id_surat) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->delete('suratm');
    }

    // Function to search for surat masuk
    public function suratm_search($search) {
        $this->db->like('nomor_surat', $search);
        $this->db->or_like('tanggal_surat', $search);
        $this->db->or_like('asal_surat', $search);
        $this->db->or_like('jenis_surat', $search);
        $this->db->or_like('perihal_surat', $search);
        $query = $this->db->get('suratm');
        return $query->result();
    }

    public function get_surat($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('suratm');
        return $query->result();
    }

    public function count_all() {
        return $this->db->count_all('suratm');
    }

    public function get_count_surat_masuk() {
        return $this->db->count_all('suratm');
    }

    public function get_count_surat_keluar() {
        return $this->db->count_all('surat');
    }
}
?>
