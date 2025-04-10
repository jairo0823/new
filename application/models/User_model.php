<?php

class User_model extends CI_Model {

    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row_array();
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get('users')->row_array();
    }
}
?>

