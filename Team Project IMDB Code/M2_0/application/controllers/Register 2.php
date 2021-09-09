<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Register extends CI_Controller{

    public function __construct() { 
        parent::__construct(); 
        $this->load->model('Auth_model');
    }
    
    public function register()
    {
        
        if(isset($_POST["username"]))
        {
            $this->form_validation->set_rules('username', 'Name','required|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password','required|trim|min_length[5]');
            $this->form_validation->set_rules('country', 'Country','required|trim');
            $this->form_validation->set_rules('gender', 'Gender','required|trim');
            $this->form_validation->set_rules('fullname', 'Fullname','required|trim');
            $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]');

            if($this->form_validation->run() == TRUE){

                $user = array(
                'username'  => $_POST['username'],
                'password'  =>md5( $_POST['password']),
                'country'   => $_POST['country'],
                'gender'    => $_POST['gender'],    
                'fullname'  => $_POST['fullname'],
                'email'     => $_POST['email']
                );

                $this->Auth_model->user_register($user);
                $this->session->set_flashdata("success","login now");

                redirect("Login/login","refresh");
            }
        }
        
        $this->load->view('register'); 
    }
}
?>