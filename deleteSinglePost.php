<?php 

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'signup.php');  

// $responce= [];
include('controller/AultUserControler.php');
$delete = new action();

$input = file_get_contents('php://input');
$data = json_decode($input, true);
  $id = $data['postId'] ?? null;
$delete->deletePost($id)
?>