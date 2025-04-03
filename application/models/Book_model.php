<?php
class Book_model extends CI_Model{
    public function get_books(){
        return $this->db->get('books')->result_array();
    }

    public function add_book($data){
        return $this->db->insert('books', $data);
    }

    public function delete_book($id){
        return $this->db->delete('books', array('id' => $id));
    }
}
?>