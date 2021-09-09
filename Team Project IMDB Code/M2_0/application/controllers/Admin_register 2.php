<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Admin_register extends CI_Controller{

    public function __construct() { 
        parent::__construct(); 
        //$this->load->model('Auth_model');
    }

    public function admin_register()
    {
        
        if(isset($_POST["admin_id"]))
        {
            $this->form_validation->set_rules('username', 'Name','required|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password','required|trim|min_length[5]');
            $this->form_validation->set_rules('country', 'Country','required|trim');
            $this->form_validation->set_rules('gender', 'Gender','required|trim');
            $this->form_validation->set_rules('fullname', 'Fullname','required|trim');
            $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('admin_id', 'admin_id','required');

            if($this->form_validation->run() == TRUE){

                $data = array(
                'username'  => $_POST['username'],
                'password'  =>md5( $_POST['password']),
                'country'   => $_POST['country'],
                'gender'    => $_POST['gender'],    
                'fullname'  => $_POST['fullname'],
                'email'     => $_POST['email'],
                'admin_id'  => $_POST['admin_id']
                );

                 $this->db->insert('user',$data);
                 $this->session->set_flashdata("success"," adaim login now");

                 redirect("Admin_login/admin_login","refresh");

            }
        }

        $this->load->view('admin_register'); 
    }
}
?>