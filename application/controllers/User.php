<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['users'] = $this->User_model->get_users();
        $data['username'] = $this->session->userdata('username'); // Fetch the username
        $this->load->view('auth/user', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('user/create', $data);
        } else {
            $data = array(
                'email' => $this->input->post('email')
            );
            $this->User_model->add_user($data);
            redirect('user');
        }
    }

    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        $data['user'] = $this->User_model->get_user($id);

        if (empty($data['user'])) {
            show_404();
        }

        if ($this->form_validation->run() === FALSE) {
            $data['username'] = $this->session->userdata('username');
            $this->load->view('user/edit', $data);
        } else {
            $update_data = array(
                'email' => $this->input->post('email')
            );
            $this->User_model->update_user($id, $update_data);
            redirect('user');
        }
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
