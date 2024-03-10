<?php

class User_model extends CI_Model {
    public function getUserDetails($userId) {
        // Fetch user details from the database based on the user ID
        // Modify the query based on your database structure
        $query = $this->db->get_where('users', array('user_id' => $userId));
        return $query->row_array();
    }

    public function updateUserDetails($userId, $displayName, $title, $bio) {
        // Update user details in the database based on the user ID
        // Modify the query based on your database structure
        $data = array(
            'display_name' => $displayName,
            'title' => $title,
            'bio' => $bio
        );

        $this->db->where('user_id', $userId);
        return $this->db->update('users', $data);
    }
}
