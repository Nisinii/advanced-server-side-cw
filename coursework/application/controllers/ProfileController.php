<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('User_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        // Load the Form Helper
        $this->load->helper('form');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');

        // Retrieve user details, questions, and answers
        $data['user'] = $this->ProfileModel->getUserById($user_id);
        $data['questions'] = $this->ProfileModel->getQuestionsByUser($user_id);
        $data['answers'] = $this->ProfileModel->getAnswersByUser($user_id);

        // Load the view with user data
        $this->load->view('profile_view', $data);
    }

    public function deleteQuestion($question_id) {
        // Add logic to check if the user can delete the question
        // (e.g., no answers for that question)
        $this->ProfileModel->deleteQuestion($question_id);
        redirect('profileController/index'); // Redirect to the profile page
    }

    public function deleteAnswer($answer_id) {
        // Add logic to check if the user can delete the answer
        // (e.g., no votes for that answer)
        $this->ProfileModel->deleteAnswer($answer_id);
        redirect('profileController/index'); // Redirect to the profile page
    }








    public function editQuestion($question_id) {
        // Retrieve the question details
        $data['question'] = $this->ProfileModel->getQuestionById($question_id);
    
        // Load the view as a modal
        $this->load->view('edit_question_view', $data);
    }
    
    public function updateQuestion($question_id) {
        // Validate the form data (you may need to add validation rules)
    
        // Update the question in the database
        $updated_data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        );
        $this->ProfileModel->updateQuestion($question_id, $updated_data);
    
        // Redirect back to the profile page or show a success message
        redirect('profileController/index');
    }
    
    public function editAnswer($answer_id) {
        // Retrieve the answer details
        $data['answer'] = $this->ProfileModel->getAnswerById($answer_id);
    
        // Load the view as a modal
        $this->load->view('edit_answer_view', $data);
    }
    
    public function updateAnswer($answer_id) {
        // Validate the form data (you may need to add validation rules)
    
        // Update the answer in the database
        $updated_data = array(
            'content' => $this->input->post('content'),
        );
        $this->ProfileModel->updateAnswer($answer_id, $updated_data);
    
        // Redirect back to the profile page or show a success message
        redirect('profileController/index');
    }
    

    public function editDetails() {
        // Assuming you have user authentication in place
        $userId = $this->session->userdata('user_id');

        // Load the user model
        $this->load->model('user_model');

        // Fetch existing user details
        $userDetails = $this->user_model->getUserDetails($userId);

        // Pass user details to the view
        $data['userDetails'] = $userDetails;

        // Load the view
        $this->load->view('edit_profile', $data);
    }

    public function updateDetails() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitEditDetails'])) {
            // Assuming you have user authentication in place
            $userId = $this->session->userdata('user_id');

            // Load the user model
            $this->load->model('user_model');

            // Handle form submission (update user details)
            $displayName = $this->input->post('display_name');
            $title = $this->input->post('title');
            $bio = $this->input->post('bio');

            // Update the user details in the database
            $result = $this->user_model->updateUserDetails($userId, $displayName, $title, $bio);

            // Redirect back to the profile page or show a success message
            redirect('profileController/index');
        }
        
    }
}

