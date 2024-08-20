<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function validate() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        return $this->form_validation->run();
    }
    
    public function authenticate($username, $password) {
        $hashed_password = md5($password);
        $this->db->where('username', $username);
        $this->db->where('password', $hashed_password);
        $user = $this->db->get('users')->row();
        if ($user) {
            return $user;
        }
        return FALSE; 
    }

    public function update_user($username, $current_password, $new_password, $update_data) {
        // Check if current password is correct
        $this->db->where('username', $username);
        $this->db->where('password', md5($current_password)); // Assume passwords are hashed with MD5
        $query = $this->db->get('users');
        
        if ($query->num_rows() === 1) {
            // Prepare update data
            if (!empty($new_password)) {
                $update_data['password'] = md5($new_password); // Hash the new password
            }

            // Update user data
            $this->db->where('username', $username);
            return $this->db->update('users', $update_data);
        } else {
            return FALSE;
        }
    }

    public function get_user_by_id($id_user) {
        $query = $this->db->get_where('users', array('id_user' => $id_user));
        return $query->row();
    }
}
