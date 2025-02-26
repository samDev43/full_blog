<?php
error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'signup.php');  

// include('con.php');
include('controller/AultController.php');
// $responce = [];

$redister = new logSign();


$input = file_get_contents('php://input');
$data = json_decode($input, true);


// echo json_encode($data);
$username = $data['username'] ?? null;
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;
$phoneNumber = $data['phoneNumber'] ?? null;



try{
$redister->signup($username, $email, $password, $phoneNumber);

}catch(Throwable $th){
    error_log($th->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'An unexpected error occurred']);
    exit;
}


// echo json_encode($responce);
?>