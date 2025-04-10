<?php

class Library extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->model('borrow_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper("url"); 

        if (!$this->session->userdata('user_id')) {
            redirect('Main');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);
        $data['books'] = $this->book_model->get_books(); 
        $this->load->view('libraryview', $data);
    }

    public function transactions() {
        $data['transactions'] = $this->borrow_model->transaction();
        $this->load->view('transaction_view', $data);
    }

    public function add(){
        $this->book_model->add_book(array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'published_year' => $this->input->post('published_year'),
        ));
        redirect('library');
    }

    public function delete($id){
        $this->book_model->delete_book($id);
        redirect('library');
    }

    public function borrow($book_id){
        if ($this->book_model->is_available($book_id)){
            $this->borrow_model->borrow_book($this->session->userdata('user_id'),$book_id);
            redirect('library');
        } else {
            echo "Book is not available";
        }
    }

    public function return_book($book_id){
        $this->borrow_model->return_book($book_id);
        redirect('library');
    }
}

?>
