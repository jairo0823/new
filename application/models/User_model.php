<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Function to register a user
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    // Function to get user by email
    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', ['email' => $email]);
        return $query->row_array(); // Return user as an associative array
    }
}
?>