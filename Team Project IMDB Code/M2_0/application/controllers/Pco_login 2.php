<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Pco_login extends CI_Controller{
    
    public function __construct() { 
        parent::__construct(); 
        $this->load->model('Auth_model');
    }
    

    public function pco_login()
    {

        if(isset($_POST["pco_name"])){


            $this->form_validation->set_rules('pco_name', 'pco_name','required');
            $this->form_validation->set_rules('password', 'Password','required|trim|min_length[5]');

            if($this->form_validation->run() == TRUE){

                $pco_name  = $_POST['pco_name'];
                $pco_password  = md5($_POST['password']);

                $pco = $this->Auth_model->pco_name($pco_name,$pco_password);

                if($pco != null){

                    $this->session->set_flashdata('success', 'pco logged in');

                    $_SESSION['user_logged'] = TRUE;
                    $_SESSION['pco_name'] = $pco_name;
                    redirect("user/profile");
                }
                
                if($pco == null){

                    $this->session->set_flashdata('error','No such pco');

                    redirect("Pco_login/pco_login");
                }    
            }
        }

        $this->load->view('pco_login',"refresh"); 
    }
}
    
?>
