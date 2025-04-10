<?php
class book_model extends CI_Model{
    public function get_books(){
        return $this->db->get('books')->result_array();   
    }
    public function add_book($data){
return $this->db->insert('books', $data);
    }
    public function delete_book($id){
        return $this->db->delete('books', array('id' => $id));
    }
   

 
    
        // Function to check if a book is available
        public function is_available($book_id) {
            $this->db->where('id', $book_id);
            $this->db->where('status', 'available'); // Assuming you have a 'status' column
            $query = $this->db->get('books');
    
            return $query->num_rows() > 0; // Returns true if available, false otherwise
        
    }
    
}
?>