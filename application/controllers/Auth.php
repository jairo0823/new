<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function login() {
        $this->load->view('login_view');
    }

    public function process_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user_by_email($email);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata(
               [ 'user_id'=> $user['id'],
                'user_name' => $user['name']]
            );
            redirect('library');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }

    public function register() {
        
        $this->load->view('register_view');
    }

    public function process_register() {
        
       
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('register_view');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->User_model->register_user($data);
            $this->session->set_flashdata('success', 'Registration successful! You can now login.');
            redirect('auth/login');
    }
}
}
?>