<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

        // Load the models
        $this->load->model('question_model');
        $this->load->model('answer_model');
    }
    
    public function view($question_id) {
        // Load the necessary models
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->load->model('SavedQuestions_model');

        $user_id = $this->session->userdata('user_id');
        
        // Get the question details
        $data['question'] = $this->question_model->get_question($question_id);
        
        // Get answers for the question
        $data['answers'] = $this->answer_model->get_answers($question_id);

         // Get top 15 questions from the database
        $data['questions'] = $this->Question_model->get_top_questions(5);

        // Check if the question is saved for the user
        $data['is_saved'] = $this->SavedQuestions_model->is_question_saved($user_id, $question_id);
        
        // Load the view
        $this->load->view('question_view', $data);

    }

    public function submit_answer($question_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = $this->session->userdata('user_id');

            // Create the data array
            $data = array(
                'user_id' => $user_id,
                'content' => htmlentities($this->input->post('answer_content')),
                'question_id' => $question_id,
                // Add other fields as needed
            );


            // Call the model to add the answer
            $this->answer_model->add_answer($data);

            // Redirect back to the question view
            redirect('question/view/' . $question_id);
        }

        // Handle the case when the form is not submitted (optional)
    }

    public function upvote_answer($answer_id, $question_id) {
        $this->load->model('question_model');

        // Perform upvote logic
        $this->question_model->upvote_answer($answer_id, $question_id);

        // Redirect back to the question view or other appropriate page
        redirect('question/view/' . $question_id);
    }

    public function downvote_answer($answer_id, $question_id) {
        $this->load->model('question_model');

        // Perform downvote logic
        $this->question_model->downvote_answer($answer_id, $question_id);

        // Redirect back to the question view or other appropriate page
        redirect('question/view/' . $question_id);
    }

    // Other methods for editing questions, deleting answers, etc., can be added here
}
