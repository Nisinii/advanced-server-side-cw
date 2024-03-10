<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }
    

    public function add_answer($data) {
        // Assuming you have an 'answers' table in your database
        $this->db->insert('answers', $data);
    }

    public function get_answers($question_id) {
        $user_id = $this->session->userdata('user_id');
        
        // Retrieve answers for a specific question along with the vote_type for the specified user
        $answers = $this->db->get_where('answers', ['question_id' => $question_id])->result_array();
    
        // Decode HTML entities for the 'content' field
        foreach ($answers as &$answer) {
            $answer['content'] = html_entity_decode($answer['content']);
            
            // Fetch the vote_type for each answer
            $vote = $this->db->get_where('votes', ['answer_id' => $answer['answer_id'], 'user_id' => $user_id])->row_array();
            $answer['vote_type'] = ($vote) ? $vote['vote_type'] : null;
    
            // Fetch the username for each answer directly from the 'users' table
            $user = $this->db->get_where('users', ['user_id' => $answer['user_id']])->row_array();
            $answer['username'] = ($user) ? $user['username'] : null;
        }
    
        return $answers;
    }
    
    
    

    // Other methods for updating/deleting answers can be added here
}
