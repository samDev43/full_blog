<?php

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'signup.php');  

// $responce= [];
include('controller/AultController.php');


$input = file_get_contents('php://input');
$data = json_decode($input, true);

$login = new logSign;

$userNPhone = $data['userNPhone'] ?? null;
$password = $data['password'] ?? null;

$login->login($userNPhone, $password);

// echo json_encode($responce);

?>