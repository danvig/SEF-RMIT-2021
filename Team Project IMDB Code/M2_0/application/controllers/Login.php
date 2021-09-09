<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  

class Login extends CI_Controller{

    private $username;
    private $password;


        public function __construct() {

            
            parent::__construct(); 
            $this->load->model('Auth_model');
        
        }

        public function setLogin($username,$password)
        {
            $this->username = $username;
            $this->username = $password;
        }

    
        public function login()
        {
            
            if(isset($_POST["username"])){

                $this->form_validation->set_rules('username', 'Name','required');
                $this->form_validation->set_rules('password', 'Password','required|trim|min_length[5]');

                $username  = $_POST['username'];
                $password  = md5($_POST['password']);

                if($this->form_validation->run() == TRUE){

    



                    $user = $this->Auth_model->username($username,$password);

                    if($user != null){

                        $this->session->set_flashdata('success', 'you are logged in');

                        $_SESSION['user_logged'] = TRUE;
                        $_SESSION['username'] = $user -> username;

                        redirect("user/profile","refresh");
                    }
                    
                    if($user == null){

                        $this->session->set_flashdata('error','No such account');

                        redirect("Login/login","refresh");
                    }
                    
                    
                }else{
                   
                }
            }

            $this->load->view('login',"refresh"); 
        }
        public function index()
        {
            
            
        }
        public function index_model()
        {
            $this->load->view('login');
            $this->load->model('Auth_model');
        }


}

?>