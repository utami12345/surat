<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload {
    
    protected $CI;
    protected $upload_path = './uploads/';
    protected $allowed_types = 'gif|jpg|png|pdf|doc|docx';
    protected $max_size = 2048; // Maksimal ukuran file dalam kilobyte

    public function __construct() {
        // Mendapatkan instance CodeIgniter
        $this->CI =& get_instance();
        $this->CI->load->library('upload');
    }

    public function do_upload($field_name) {
        // Konfigurasi upload
        $config['upload_path'] = $this->upload_path;
        $config['allowed_types'] = $this->allowed_types;
        $config['max_size'] = $this->max_size;
        
        // Memuat library upload dengan konfigurasi
        $this->CI->upload->initialize($config);
        
        // Melakukan upload
        if ($this->CI->upload->do_upload($field_name)) {
            return $this->CI->upload->data();
        } else {
            return array('error' => $this->CI->upload->display_errors());
        }
    }
}
