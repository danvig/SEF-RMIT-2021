<?php
class Auth_model extends CI_Model
{
    public function __construct() { parent::__construct(); }
    // pco make movie

    public function makemovie($data) { $this->db->insert('movie',$data); }

    // admin  Agreed or not
    public function addmovie($data,$where) { $this->db->update('movie',$data,$where); }

    //user login
    public function username($username,$password) { 

        $this->db->select('*')
        ->from('user')
        ->where( array( 'username'  => $username, 'password'  => $password) );

        $query = $this->db->get();      
        $user = $query->row(); 

        return $user;
    
    }

    public function admin_id($admin_id,$password) { 

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array( 
            'admin_id'  => $admin_id,
            'password'  => $password)
                            );
        $query = $this->db->get();      
        
        $admin = $query->row();

        return $admin;
    
    }

    public function pco_name($pco_name,$pco_password) { 

        $this->db->select('*')->from('pco');
        $this->db->where(array( 
            'pco_name'  => $pco_name,
            'password'  => $pco_password)
                            );
        $query = $this->db->get();      
        
        $pco = $query->row();

        return $pco;    
    }

    public function user_register($user) {  $this->db->insert('user',$user); }

    public function SESSION_admin_id(){

        $this->db->select("*")->from("movie");
        $SESSION_admin =  $this->db->get();

        return $SESSION_admin;
    }

    public function SESSION_pco_name(){

        $this->db   ->select("*")
                    ->from("movie")
                    ->where("pco_name",$_SESSION['pco_name']);

        $SESSION_pco =  $this->db->get();

        return $SESSION_pco;
    }

    public function SESSION_username(){

        $this->db->select("*")->from("movie")->where("can_id",!null); 

        $SESSION_user = $this->db->get();
    
        return $SESSION_user;
    }
    
    public function body($data){ $this->db->insert('post',$data);}
    
    public function disfeedback($show){   
        
        $this->db   ->select("*")
                    ->from("post")
                    ->where("movie_id",$show);
                    
                    $feedback  = $this->db->get(); 
        

        return $feedback;   
                    
    }
    
    

}

?>
