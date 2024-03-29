<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models
        $this->load->model('Question_model');
        $this->load->database();
        $this->load->helper('url'); // Load URL helper
        $this->load->library('session');
    }

    public function index() {
        // Get top 15 questions from the database
        $data['questions'] = $this->Question_model->get_top_questions(15);
        // Load the dashboard view
        $this->load->view('dashboard', $data);
    }

    public function questions(){
        // Get all questions from the database
        $data['questions'] = $this->Question_model->get_all_questions();
        // Load the dashboard view
        $this->load->view('all_questions', $data);
    }

    public function search() {
        $keyword = $this->input->post('keyword'); // Assuming the keyword is sent via POST
        if (!empty($keyword)) {
            $data['questions'] = $this->Question_model->search_questions($keyword);
        } else {
            // If keyword is empty, show all questions (or handle it as you prefer)
            $data['questions'] = $this->Question_model->get_top_questions(15);
        }
        $this->load->view('dashboard', $data);
    }

    public function add_question() {
        $this->load->view('add_question');
    }

    public function save_question() {
        // Assuming you are retrieving the form data
        $data = array(
            'user_id' => $this->session->userdata('user_id'), // Adjust this based on your authentication/session setup
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created_at' => date('Y-m-d H:i:s') // Assuming you want to set the current timestamp
        );
    
        // Get tags from the form and split them into an array
        $tags = explode(', ', $this->input->post('tags'));
    
        // Call the modified add_question function
        $question_id = $this->Question_model->add_question($data, $tags);
    
        // Handle the rest of your logic, e.g., redirecting to the question view page
        redirect('dashboard');
    }
    
    
}