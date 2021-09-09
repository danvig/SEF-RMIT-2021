<?php
class Auth_model extends CI_Model
{
    public function __construct() { parent::__construct(); }
    // pco make movie

    public function makemovie($data) { $this->db->insert('movie',$data); }
    
    public function listCharacter($data) { $this->db->insert('charaxter_list',$data); }
    
    public function makecharacter($data) { $this->db->insert('charaxter',$data); }
    
    public function discharacter() {
        $this->db   ->select("*")
                    ->from("charaxter");
    
        $discharacter =  $this->db->get();

        return $discharacter;
    }

    // admin  Agreed or not
    public function addmovie($data,$where) { $this->db->update('movie',$data,$where); }
    
    public function require_ok($data,$where) { $this->db->update('pco',$data,$where); }
    
    public function editmovie($data,$where) { $this->db->update('movie',$data,$where); }
    

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
        $value = "0";
        $this->db->select('*')->from('pco');
        $this->db->where(array( 
            'pco_name'  => $pco_name,
            'password'  => $pco_password,
            'require_id'=> !null)
                            );
        $this->db->where('require_id',!$value);
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
    
    public function require_id(){
        
        $value = "0";
        $this->db->select("*");
            $this->db->from("pco");
            $this->db->where("require_id",null);
            $this->db->or_where('require_id',$value);
        $require_id =  $this->db->get();

        return $require_id;
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
    public function replay($data){ $this->db->insert('post',$data);}
    
    public function disfeedback($show){   
        
        $this->db   ->select("*")
                    ->from("post")
                    ->where("movie_id",$show)
                    ->where("reply_id",null);
                    
                    $feedback  = $this->db->get(); 
        

        return $feedback;   
                    
    }
    
     public function disreplay($show){   
        
        $this->db   ->select("*")
                    ->from("post")
                    ->where("reply_id",$show);
                    
                    $feedback  = $this->db->get(); 
        

        return $feedback;   
                    
    }
     public function dislist($show){

     $this->db ->select("*")
        ->from("charaxter_list")
        ->join("charaxter","charaxter_list.charaxter_id = charaxter.charaxter_id")
        ->where("movie_id",$show);


     $dislist = $this->db->get();


     return $dislist;

     }
    

}

?>
