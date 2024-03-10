<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Load the URL helper
        $this->load->model('auth_model');
        $this->load->database(); // Load the database library
        $this->load->library('form_validation');
        $this->load->library('session'); // Load the session library

    }

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, show the registration form with errors
            $this->load->view('register_form');
        } else {
            // Validation succeeded, proceed with registration logic
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email')
            );

            // Insert data into the 'users' table
            $this->auth_model->register_user($data);

            // Redirect to a success page or login page
            redirect('auth/login');
        }
    }

    public function login() {
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_form');
        } else {
            // Login logic
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user_id = $this->auth_model->check_login($username, $password);
    
            if ($user_id) {
                // Set session with user_id
                $this->session->set_userdata('user_id', $user_id);
    
                // Redirect to dashboard or other page
                redirect('dashboard/index');
            } else {
                // Invalid credentials
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth/register');
            }
        }
    }
    
    
    

    public function logout() {
        // Logout logic
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
