<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
        $this->load->library('pagination');
    }

    public function get_all_surat() {
        $query = $this->db->get('surat');
        return $query->result();
    }

    public function insert($data) {
        return $this->db->insert('surat', $data);
    }

    public function get_surat_by_id($id_surat) {
        $query = $this->db->get_where('surat', array('id_surat' => $id_surat));
        return $query->row_array();
    }

    public function update_surat($id_surat, $data) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->update('surat', $data);
    }

    public function hapus($id_surat) {
        $this->db->where('id_surat', $id_surat);
        return $this->db->delete('surat');
    }

    public function search_surat($search) {
        $this->db->like('nomor_surat', $search);
        $this->db->or_like('tanggal_surat', $search);
        $this->db->or_like('jenis_surat', $search);
        $this->db->or_like('perihal_surat', $search);
        $query = $this->db->get('surat');
        return $query->result();
    }

    public function get_surat($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('surat');
        return $query->result();
    }

    public function count_all(){
        return $this->db->count_all('surat');
    }

    public function get_count_surat_masuk() {
        return $this->db->count_all('suratm');
    }

    public function get_count_surat_keluar() {
        return $this->db->count_all('surat');
    }
}
