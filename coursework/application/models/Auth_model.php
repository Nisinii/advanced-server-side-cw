<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function register_user($data) {
        $this->db->insert('users', $data);
    }

    public function check_login($username, $password) {
        $user = $this->db->get_where('users', ['username' => $username])->row();
    
        if ($user && password_verify($password, $user->password)) {
            return $user->user_id; // Return the user_id if login is successful
        }
        
        return false;
    }
}