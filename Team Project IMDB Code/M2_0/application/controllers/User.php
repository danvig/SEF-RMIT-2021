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
        // admin edit  movie 
        if(isset($_POST["edit"]))
        {


            $this->form_validation->set_rules('moviename', 'Name','required|trim');
            $this->form_validation->set_rules('movieid', 'id','required|trim');
            $this->form_validation->set_rules('season', 'season','required|trim');
            $this->form_validation->set_rules('genre', 'genre','required|trim');
            $this->form_validation->set_rules('pconame', 'pconame','required|trim');
                
                if($this->form_validation->run() == TRUE){

                    $data = array(
                        'moviename' => $_POST['moviename'],
                        'season'    => $_POST['season'],
                        'genre'     => $_POST['genre'],   
                        'pco_name'  => $_POST['pconame'],
                        
                        );
                    
                    $where = array( 'movie_id'  => $_POST['movieid']);
                    // Up the new movie:  data transmission
                    $this->Auth_model->editmovie($data,$where);
                    redirect("user/profile","refresh");
                } 
            
                redirect("user/profile","refresh");

        }
        if(isset($_POST["list"]))
        {

            $this->form_validation->set_rules('characterid', 'Name','required|trim');
            $this->form_validation->set_rules('movieid', 'id','required|trim');

                
                if($this->form_validation->run() == TRUE){

                    $data = array(
                        'movie_id'        => $_POST['movieid'],
                        'charaxter_id'    => $_POST['characterid'],
                        );
//                    echo "good";
//                    exit();
                    // Up the new movie:  data transmission
                    $this->Auth_model->listCharacter($data);
                    redirect("user/profile","refresh");
                } 
            
                redirect("user/profile","refresh");

        }
        
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
                        'genre'     => $_POST['genre'],   
                        'pco_name'  => $_POST['pconame'],
                        
                        );
                    // Up the new movie:  data transmission
                    $this->Auth_model->makemovie($data);
                    redirect("user/profile","refresh");
                } 
            
                redirect("user/profile","refresh");

        }
        
        if(isset($_POST["character"]))
        {
            
            $this->form_validation->set_rules('fullname', 'Name','required|trim');
            $this->form_validation->set_rules('birthdate', 'birthdate','required|trim');
            $this->form_validation->set_rules('bio', 'bio','required|trim');

                
                if($this->form_validation->run() == TRUE){

                    $data = array(
                        'fullname' => $_POST['fullname'],
                        'birthdate'    => $_POST['birthdate'],
                        'bio'   => $_POST['bio'],
                        );
                    
                    // Up the new movie:  data transmission
                    $this->Auth_model->makecharacter($data);
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
        
        if(isset($_POST["Require"]))
        {

            $this->form_validation->set_rules('pco_name','pco_name','required|trim');
            $this->form_validation->set_rules('require_id', 'require_id','required|trim');

                if($this->form_validation->run() == TRUE){
                    
                    $data  = array( 'require_id'    => $_POST['require_id']);
                    $where = array( 'pco_name'  => $_POST['pco_name']);
                    // data transmission
                    $data["pco_data"] = $this->Auth_model->require_ok($data,$where);
                 
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
        if(isset($_POST['reply'])){

            $this->form_validation->set_rules('body1', 'body1','required|trim');
            
            $time = date("Y-m-d h:i:s", time());

            if($this->form_validation->run() == TRUE){
                $data  = array( 
                    'time'    => $time,
                    'body'    => $_POST['body1'],
                    'username'=> $_SESSION['username'],
                    'movie_id'=> $_POST['movie_id'],
                    'reply_id'=> $_POST['post_id'],
                );
                $this->Auth_model->replay($data);
                 
                redirect("user/profile","refresh");
                   
            }
        }
        
        if(isset($_SESSION['pco_name'])){

            $data["fetch_data"] = $this->Auth_model->SESSION_pco_name();
            
            $data["character_data"] = $this->Auth_model->discharacter();
            
        }

        if(isset($_SESSION['admin_id'])){

            $data["fetch_data"] =  $this->Auth_model->SESSION_admin_id(); 
            
            $data["pco_data"] = $this->Auth_model->require_id();

              
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

    public function index()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['username'] = 'ok';
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['username']);
    }

    public function movieadmintest()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['admin_id'] = 2;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['admin_id']);
    }
    public function adminrequire()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['admin_id'] = 2;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['admin_id']);
    }
    public function editmovie()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['admin_id'] = 2;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['admin_id']);
    }
    public function moviepcotest()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['pco_name'] = 3;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['pco_name']);
    }
    public function insertcharacter()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['pco_name'] = 3;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['pco_name']);
    }
    public function insertcharactertomovie()
    {
        $_SESSION['success'] = 'got';
        $_SESSION['pco_name'] = 3;
        $this->load->view('profile', $_SESSION['success'] ,$_SESSION['pco_name']);
    }

}


?>
