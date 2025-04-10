<?php
class Borrow_model extends CI_Model{
    public function borrow_book ($user_id, $book_id){
        $this->db->insert('borrowed', [
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrow_date' => date('Y-m-d'),
        ]);
        $this->db->where('id', $book_id);
        $this->db->update('books', ['status' => 'borrowed']);
    }   

    public function return_book($book_id) {
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'You must log in to return a book.');
            redirect('auth/login');
            return;
        }

        $user_id = $this->session->userdata('user_id');
        
        // Get the borrow record
        $this->db->where('user_id', $user_id);
        $this->db->where('book_id', $book_id);
        $this->db->where('return_date IS NULL', null, false);
        $borrow_record = $this->db->get('borrowed')->row_array();

        if (!$borrow_record) {
            $this->session->set_flashdata('error', 'You can only return books you have borrowed.');
            redirect('library');
            return;
        }

        // Update the borrow record with return date
        $this->db->where('id', $borrow_record['id']);
        $this->db->update('borrowed', ['return_date' => date('Y-m-d')]);
        
        // Update the book status to available
        $this->db->where('id', $book_id);
        $this->db->update('books', ['status' => 'available']);
        
        $this->session->set_flashdata('success', 'Book returned successfully.');
        redirect('library');
    }

    public function transaction() {
        $this->db->select('users.name as borrower, books.title as book_title, borrowed.borrow_date, borrowed.return_date');
        $this->db->from('borrowed');
        $this->db->join('users', 'borrowed.user_id = users.id');
        $this->db->join('books', 'borrowed.book_id = books.id');
        return $this->db->get()->result_array();
    }
}
?>