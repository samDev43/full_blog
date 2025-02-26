<?php

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'displayErr.php');  

session_start();
 
 class connection{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'full_blog';
    protected $con;
    
    public function __construct(){
        $this->con = new mysqli($this->host,$this->user, $this->password, $this->db);
        if($this->con->connect_error){
            echo json_encode($this->con->connect_error);
        }else{
            
        }
    }
    public function con(){
      $con = $this->con;
      return $con;
    }
    
 }
  //  $person = $_SESSION['user_id'];

  //  echo( $person)


?>