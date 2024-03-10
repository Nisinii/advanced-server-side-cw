<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_all_tags() {
        $this->db->select('*');
        $this->db->from('tags');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_questions_by_tag($tag_id) {
        $this->db->select('questions.*, users.username as user_name, 
                          (SELECT COUNT(*) FROM votes WHERE votes.question_id = questions.question_id AND votes.vote_type = "upvote") AS upvotes, 
                          (SELECT COUNT(*) FROM votes WHERE votes.question_id = questions.question_id AND votes.vote_type = "downvote") AS downvotes, 
                          (SELECT COUNT(*) FROM answers WHERE answers.question_id = questions.question_id) AS answer_count');
        $this->db->select('GROUP_CONCAT(tags.tag_name) as tags', false); // false for avoiding backticks around GROUP_CONCAT
        $this->db->from('questions');
        $this->db->join('users', 'users.user_id = questions.user_id', 'left');
        $this->db->join('question_tags', 'question_tags.question_id = questions.question_id', 'left');
        $this->db->join('tags', 'tags.tag_id = question_tags.tag_id', 'left');
        $this->db->where('question_tags.tag_id', $tag_id);  // Filter by the specific tag
        $this->db->group_by('questions.question_id');  // Group by question_id to avoid duplicate rows
        $this->db->order_by('questions.created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
    
        $formatted_result = array();
    
        // Group tags by question_id
        foreach ($result as $row) {
            $formatted_result[$row['question_id']]['question_id'] = $row['question_id'];
            $formatted_result[$row['question_id']]['user_name'] = $row['user_name'];
            $formatted_result[$row['question_id']]['upvotes'] = $row['upvotes'];
            $formatted_result[$row['question_id']]['downvotes'] = $row['downvotes'];
            $formatted_result[$row['question_id']]['answer_count'] = $row['answer_count'];
            $formatted_result[$row['question_id']]['title'] = $row['title'];
            $formatted_result[$row['question_id']]['content'] = $row['content'];
            $formatted_result[$row['question_id']]['created_at'] = $row['created_at'];
            $formatted_result[$row['question_id']]['tags'] = explode(',', $row['tags']);
        }
    
        return array_values($formatted_result);
    }   
    
    public function get_tag_name($tag_id) {
        $this->db->select('tag_name');
        $this->db->from('tags');
        $this->db->where('tag_id', $tag_id);
        $query = $this->db->get();

        // Check if the query has a result
        if ($query->num_rows() > 0) {
            // Return the tag name
            $result = $query->row_array();
            return $result['tag_name'];
        } else {
            // Return false if no tag found
            return false;
        }
    }

    
}
?>