<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Suratm_model');  
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
        // Load library pagination
        $this->load->library('pagination');
        
        // Dapatkan total jumlah data surat masuk
        $total_rows = $this->Suratm_model->count_all();
        
        // Konfigurasi pagination
        $config['base_url'] = site_url('surat/suratm_index'); // Base URL untuk pagination
        $config['total_rows'] = $total_rows; // Total data
        $config['per_page'] = 5; // Jumlah data per halaman
        $config['uri_segment'] = 3; // Posisi segment di URL yang mengandung nomor halaman
        $config['use_page_numbers'] = TRUE; // Menggunakan nomor halaman, bukan offset
        
        // Styling pagination dengan Bootstrap
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
        
        // Dapatkan nomor halaman dari segment URL, gunakan 1 jika tidak ada
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        
        // Hitung offset berdasarkan halaman saat ini
        $offset = ($page - 1) * $config['per_page'];
        
        // Ambil data surat masuk sesuai pagination
        $data['suratm'] = $this->Suratm_model->get_surat($config['per_page'], $offset);
        
        // Buat link pagination
        $data['pagination'] = $this->pagination->create_links();
        
         // Load view dengan data surat masuk dan pagination
         $this->load->view('surat/suratm_index', $data);
         $this->load->view('template/header');
         $this->load->view('template/sidebar');
         $this->load->view('template/footer');
    }

    public function suratm_search() {
        $search = $this->input->post('search');
        $data['suratm'] = $this->Suratm_model->suratm_search($search);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');  
        $this->load->view('surat/suratm_search', $data);
        $this->load->view('template/footer');
    }    
    
    public function create() {
        $this->load->view('surat/suratm_tambah');
        $this->load->view('template/header');
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }

    public function store() {
        $nomor_surat = $this->input->post('nomor_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $asal_surat = $this->input->post('asal_surat');
        $jenis_surat = $this->input->post('jenis_surat');
        $perihal_surat = $this->input->post('perihal_surat');

        $config['upload_path'] = FCPATH . 'uploads/'; 
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            $error = $this->upload->display_errors();
            $this->load->view('surat/suratm_tambah', ['error' => $error]);
        } else {
            $file_data = $this->upload->data();
            $file_surat = $file_data['file_name'];

            $data = [
                'nomor_surat' => $nomor_surat,
                'tanggal_surat' => $tanggal_surat,
                'asal_surat' => $asal_surat,
                'jenis_surat' => $jenis_surat,
                'perihal_surat' => $perihal_surat,
                'file_surat' => $file_surat
            ];
            $this->Suratm_model->insert($data);

            redirect('surat/suratm_index');
        }
    }

    public function surat_edit($id_surat) {
        $data['suratm'] = $this->Suratm_model->get_surat_masuk_by_id($id_surat);
    
        if (empty($data['suratm'])) {
            show_404();
        }

        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
        $this->form_validation->set_rules('perihal_surat', 'Perihal Surat', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('surat/suratm_edit', $data);
        } else {
            $suratData = array(
                'nomor_surat' => $this->input->post('nomor_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'asal_surat' => $this->input->post('asal_surat'),
                'jenis_surat' => $this->input->post('jenis_surat'),
                'perihal_surat' => $this->input->post('perihal_surat'),
                'file_surat' => $this->do_upload()
            );
    
            $this->Suratm_model->update_surat_masuk($id_surat, $suratData);
            redirect('surat/suratm_index');
        }
        $this->load->view('template/header');
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }    

    private function do_upload() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            return $this->input->post('old_file_surat');  
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function get_surat_masuk_by_id($id_surat) {
        $query = $this->db->get_where('suratm', array('id_surat' => $id_surat));
        return $query->row_array();
    }

    public function delete_surat($id_surat) {
        $this->Suratm_model->delete_surat($id_surat);
        redirect('surat/suratm_index');
    }
    
    public function dashboard() {
        $this->load->model('Suratm_model');
        $data['jumlah_surat_masuk'] = $this->Suratm_model->get_count_surat_masuk();
        $data['jumlah_surat_keluar'] = $this->Suratm_model->get_count_surat_keluar();

        // Load the view and pass the data
        $this->load->view('template/header');
        $this->load->view('surat/dashboard', $data);
        $this->load->view('template/footer');
        $this->load->view('template/sidebar');
    }
}
