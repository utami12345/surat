<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Surat_model');  // Ensure the model is loaded
        $this->load->library('form_validation'); // Memuat pustaka form_validation
        $this->load->helper(array('form', 'url')); // Load form and URL helpers
    }

    // Function to display all surat
        public function index() {
            $this->load->model('surat_model');
            $data['surat'] = $this->surat_model->get_all_surat(); // Pastikan ini memuat ID
            $this->load->view('surat/index', $data);
        }
    
    // Function to load the form for adding a new surat
    public function create() {
        $this->load->view('surat/surat_tambah');
    }

    // Function to handle form submission for adding a new surat
    public function store() {
        // Mengambil data dari form
        $nomor_surat = $this->input->post('nomor_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $jenis_surat = $this->input->post('jenis_surat');
        $perihal_surat = $this->input->post('perihal_surat');

        // Menghandle file upload
        $config['upload_path'] = FCPATH . 'uploads/'; // Gunakan path absolut
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size'] = 2048; // Maksimal ukuran file dalam kilobyte
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('file_surat')) {
            $error = $this->upload->display_errors();
            $this->load->view('surat/surat_tambah', ['error' => $error]);
        } else {
            $file_data = $this->upload->data();
            $file_surat = $file_data['file_name'];

            // Memasukkan data ke database
            $data = [
                'nomor_surat' => $nomor_surat,
                'tanggal_surat' => $tanggal_surat,
                'jenis_surat' => $jenis_surat,
                'perihal_surat' => $perihal_surat,
                'file_surat' => $file_surat
            ];
            $this->Surat_model->insert($data);

            // Redirect ke halaman index atau halaman lain
            redirect('surat/index');
        }
    }


    public function surat_edit($id_surat) {
        $data['surat'] = $this->Surat_model->get_surat_by_id($id_surat);
    
        if (empty($data['surat'])) {
            show_404();
        }
    
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('perihal_surat', 'Perihal Surat', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('surat/surat_edit', $data);
        } else {
            $suratData = array(
                'nomor_surat' => $this->input->post('nomor_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'jenis_surat' => $this->input->post('jenis_surat'),
                'perihal_surat' => $this->input->post('perihal_surat'),
                'file_surat' => $this->do_upload()
            );
    
            $this->Surat_model->update_surat($id_surat, $suratData);
            redirect('surat/index');
        }
    }    
    private function do_upload() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            return $this->input->post('old_file_surat');  // Return old file if no new file is uploaded
        } else {
            return $this->upload->data('file_name');
        }
    }
    public function hapus($id_surat) {
        // Specify the condition for deletion
        $where = array('id_surat' => $id_surat);
        
        // Call model function to delete record
        $this->Surat_model->hapus($where, 'surat');
        
        // Redirect back to the main page
        redirect('surat');
    }

}
