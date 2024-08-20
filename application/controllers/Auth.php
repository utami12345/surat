<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login() {
        $this->load->view('auth/login'); 
    }

    public function login_process() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    if (empty($username) || empty($password)) {
        $this->session->set_flashdata('error', 'Username dan password harus diisi.');
        redirect('auth/login');
        return; 
    }

    $this->load->model('User_model');
    $user = $this->User_model->authenticate($username, $password);
    
    if ($user) {
        $this->session->set_userdata([
            'id_user' => $user->id_user,
            'username' => $user->username, 
            'logged_in' => TRUE
        ]);
        redirect('surat/dashboard');
    } else {
        $this->session->set_flashdata('error', 'Username atau password salah.');
        redirect('auth/login');
    }
    }

    public function logout() {
        // Destroy session data
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function user() {
        $this->load->model('User_model');
        $id_user = $this->session->userdata('id_user');
        
        if ($id_user) {
            $data['users'] = $this->User_model->get_user_by_id($id_user);
            $this->load->view('template/sidebar', $data); 
        } else {
            redirect('auth/login');
        }
    }    
    
}
