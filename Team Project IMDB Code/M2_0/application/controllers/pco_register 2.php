<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Pco_register extends CI_Controller{

    public function __construct() { 
        parent::__construct(); 
        //$this->load->model('Auth_model');
    }

    public function pco_register()
    {
        
        if(isset($_POST["pco_name"]))
        {
            $this->form_validation->set_rules('pco_name', 'pco_name','required|is_unique[pco.pco_name]');
            $this->form_validation->set_rules('organisation', 'organisation',);
            $this->form_validation->set_rules('phone_number', 'phone_number','required|trim|min_length[5]|is_unique[pco.phone_number]');
            $this->form_validation->set_rules('password', 'password','required|trim|min_length[5]');

            if($this->form_validation->run() == TRUE){
                
                $data = array(
                'pco_name'      => $_POST['pco_name'],
                'organisation'  =>$_POST['organisation'],
                'phone_number'  => $_POST['phone_number'],
                'password'      => md5($_POST['password']),    
                );

                $this->db->insert('pco',$data);
                $this->session->set_flashdata("success","login now");

                redirect("Pco_login/pco_login","refresh");
            }
        }

        $this->load->view('pco_register'); 
    }
}
?>