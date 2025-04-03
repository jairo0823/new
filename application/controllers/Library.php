<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->helper('url');
    }

    public function index(){
        $data['books'] = $this->Book_model->get_books();
        $this->load->view('library_view', $data);
    }
    public function add(){
        $this->Book_model->add_book(array(
            'title'=>$this->input->post('title'),
            'author'=>$this->input->post('author'),
            'published_year'=>$this->input->post('published_year')
        ));
        redirect('Library');
    }
    public function delete($id){
        $this->Book_model->delete_book($id);
        redirect('Library');
        }
        

}
?>