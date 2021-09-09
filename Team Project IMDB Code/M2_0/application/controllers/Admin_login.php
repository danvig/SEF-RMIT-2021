<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Admin_login extends CI_Controller{
    
    public function __construct() { 
        parent::__construct(); 
        $this->load->model('Auth_model');
    }

    public function admin_login()
    {
        
        if(isset($_POST["admin_id"])){
            
            $this->form_validation->set_rules('username', 'Name','required');
            $this->form_validation->set_rules('admin_id', 'Name','required');
            $this->form_validation->set_rules('password', 'Password','required|trim|min_length[5]');

            if($this->form_validation->run() == TRUE){

                $admin_id  = $_POST['admin_id'];
                $password  = md5($_POST['password']);

                $admin = $this->Auth_model->admin_id($admin_id,$password);

                if($admin != null){

                    $this->session->set_flashdata('success', 'you are logged in');

                    $_SESSION['user_logged'] = TRUE;
                    $_SESSION['admin_id'] = $admin -> admin_id;

                    redirect("user/profile","refresh");
                }
                
                if($admin == null){

                    $this->session->set_flashdata('error','No such admin account');

                    redirect("Admin_login/admin_login");
                }     
            }
        }

        $this->load->view('admin_login',"refresh"); 
    }

}
?>