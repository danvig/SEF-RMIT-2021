<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  
 
class User extends CI_Controller{

    public function __construct() { 
        parent::__construct(); 
        $this->load->model('Auth_model');
    }

    public function profile()
    {
    
        // Unnormal means of logging in.
        if($_SESSION['user_logged']==FALSE){
            $this->session->set_flashdata('error','please login first');
            redirect("Login/login","refresh");
        }
        // pco up new movie 
        if(isset($_POST["makemovie"]))
        {

            $this->form_validation->set_rules('moviename', 'Name','required|trim');
            $this->form_validation->set_rules('season', 'season','required|trim');
            $this->form_validation->set_rules('genre', 'genre','required|trim');
            $this->form_validation->set_rules('pconame', 'pconame','required|trim');
                
                if($this->form_validation->run() == TRUE){

                    $data = array(
                        'moviename' => $_POST['moviename'],
                        'season'    => $_POST['season'],
                        'genre'   => $_POST['genre'],   
                        'pco_name'  => $_POST['pconame'],
                        
                        );
                    // Up the new movie:  data transmission
                    $this->Auth_model->makemovie($data);
                    redirect("user/profile","refresh");
                } 
            
                redirect("user/profile","refresh");

        }
        //Admin Agreed or not to show
        if(isset($_POST["addmovie"]))
        {

            $this->form_validation->set_rules('movie_id', 'ID','required|trim');
            $this->form_validation->set_rules('can_id', 'Can ID','required|trim');

                if($this->form_validation->run() == TRUE){
                    
                    $data  = array( 'can_id'    => $_POST['can_id']);
                    $where = array( 'movie_id'  => $_POST['movie_id']);
                    // data transmission
                    $this->Auth_model->addmovie($data,$where);
                 
                    redirect("user/profile","refresh");
                }
            
            redirect("user/profile","refresh");

        }
        
        if(isset($_POST['body'])){
            
            $this->form_validation->set_rules('body', 'body','required|trim');
            $time = date("Y-m-d h:i:s", time());
            
            if($this->form_validation->run() == TRUE){
                
                $data  = array( 
                    'time'    => $time,
                    'body'    => $_POST['body'],
                    'username'=> $_SESSION['username'],
                    'movie_id'=> $_POST['movie_id']
                );
                    
                $this->Auth_model->body($data);
                 
                redirect("user/profile","refresh");
                   
            }
        }
        
        if(isset($_SESSION['pco_name'])){

            $data["fetch_data"] = $this->Auth_model->SESSION_pco_name(); 
        }

        if(isset($_SESSION['admin_id'])){

            $data["fetch_data"] =  $this->Auth_model->SESSION_admin_id(); 

              
        }
        if(isset($_SESSION['username'])){
            
            $data["fetch_data"] =  $this->Auth_model->SESSION_username(); 
             
        }

        
        if(isset($_POST["Logout"])){

            unset($_SESSION);
            session_destroy();

            redirect("Login/login","refresh");
        }


        $this->load->view('profile',$data);          
    }

}


?>
