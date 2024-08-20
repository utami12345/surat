<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Surat_model');  
        $this->load->library('form_validation'); 
        $this->load->helper(array('form', 'url')); 
        $this->load->model('User_model');  
        $this->load->library('session');  
        $this->load->library('pagination'); 
        $this->check_login();
    }

    private function check_login() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Menghitung jumlah total data surat
        $total_rows = $this->Surat_model->count_all();
    
        // Konfigurasi pagination
        $config['base_url'] = site_url('surat/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;  // Ini mengatur pagination untuk menggunakan nomor halaman
        
        // Konfigurasi pagination untuk tampilan yang lebih baik
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        
        $config['attributes'] = array('class' => 'page-link');
    
        // Inisialisasi pagination
        $this->pagination->initialize($config);
    
        // Mendapatkan nomor halaman dari URI segment
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        
        // Menghitung offset berdasarkan nomor halaman
        $offset = ($page - 1) * $config['per_page'];
    
        // Mendapatkan data surat dengan pagination
        $data['surat'] = $this->Surat_model->get_surat($config['per_page'], $offset);
    
        // Membuat link pagination
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('surat/index', $data);
        $this->load->view('template/header');
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }

    public function search() {
        $search = $this->input->post('search');
        $data['surat'] = $this->Surat_model->search_surat($search);
        
        $this->load->view('template/header');
        $this->load->view('surat/surat_search', $data);
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }

    public function create() {
        $this->load->view('template/header');
        $this->load->view('surat/surat_tambah');
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }

    public function store() {
        $nomor_surat = $this->input->post('nomor_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $jenis_surat = $this->input->post('jenis_surat');
        $perihal_surat = $this->input->post('perihal_surat');

        $config['upload_path'] = FCPATH . 'uploads/'; 
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048; 
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            $error = $this->upload->display_errors();
            $this->load->view('template/header');
            $this->load->view('surat/surat_tambah', ['error' => $error]);
            $this->load->view('template/footer');
            $this->load->view('template/sidebar');
        } else {
            $file_data = $this->upload->data();
            $file_surat = $file_data['file_name'];
            $data = [
                'nomor_surat' => $nomor_surat,
                'tanggal_surat' => $tanggal_surat,
                'jenis_surat' => $jenis_surat,
                'perihal_surat' => $perihal_surat,
                'file_surat' => $file_surat
            ];
            $this->Surat_model->insert($data);
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
            $this->load->view('template/header');
            $this->load->view('surat/surat_edit', $data);
            $this->load->view('template/footer');
            $this->load->view('template/sidebar');
        } else {
            $suratData = array(
                'nomor_surat' => $this->input->post('nomor_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'jenis_surat' => $this->input->post('jenis_surat'),
                'perihal_surat' => $this->input->post('perihal_surat'),
                'file_surat' => $this->do_upload() // Handle file upload
            );

            $this->Surat_model->update_surat($id_surat, $suratData);
            redirect('surat/index');
        }
    }

    public function hapus($id_surat) {
        $this->Surat_model->hapus($id_surat);
        redirect('surat/index');
    }

    public function dashboard() {
        $data['jumlah_surat_masuk'] = $this->Surat_model->get_count_surat_masuk();
        $data['jumlah_surat_keluar'] = $this->Surat_model->get_count_surat_keluar();

        $this->load->view('template/header');
        $this->load->view('surat/dashboard', $data);
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }
    
    private function do_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            return $this->input->post('old_file_surat');  
        } else {
            return $this->upload->data('file_name');
        }
    }
}
