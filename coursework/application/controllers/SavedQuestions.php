<?php
class SavedQuestions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models
        $this->load->model('SavedQuestions_model');
        $this->load->database();
        $this->load->helper('url'); // Load URL helper
        $this->load->library('session');
        // Load the User Agent library
        $this->load->library('user_agent');
    }

    public function is_question_saved($user_id, $question_id) {
        $this->load->model('SavedQuestions_model');
        return $this->SavedQuestions_model->is_question_saved($user_id, $question_id);
    }

    public function save($question_id) {
        // Retrieve user ID from the session
        $user_id = $this->session->userdata('user_id');

        $this->load->model('SavedQuestions_model');
        $this->SavedQuestions_model->save_question($user_id, $question_id);

        // Redirect to the previous page
        redirect($this->agent->referrer());
    }

    public function unsave($question_id) {
        // Retrieve user ID from the session
        $user_id = $this->session->userdata('user_id');
    
        $this->load->model('SavedQuestions_model');
        $this->SavedQuestions_model->unsave_question($user_id, $question_id);
    
        // Redirect to the previous page
        redirect($this->agent->referrer());
    }

    public function index() {
        // Retrieve user ID from the session
        $user_id = $this->session->userdata('user_id');

        $this->load->model('SavedQuestions_model');
        $data['saved_questions'] = $this->SavedQuestions_model->get_saved_questions($user_id);

        $this->load->view('saved_questions', $data);
    }
}
