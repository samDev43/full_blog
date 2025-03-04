<?php 

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'signup.php');  
include('controller/AultUserControler.php');

if(!isset($_SESSION['user']['id'])){
  echo 'sign up or login to use this website';
  exit;
}


  $changeInfo = new action();

  $input = file_get_contents('php://input');
  $data = json_decode($input, true);
  
  
  $changeName = $data['changeName'] ?? null;
  $dateOfBirth = $data['dateOfBirth']?? null;
  // $setProfile = $data['setProfile'] ?? null;
  $changeEmail = $data['changeEmail']  ?? null;

  if(!empty($changeName) || !empty($changeEmail)){
    $changeInfo->changeUserInfoName($changeName,$changeEmail);
  }

  if(!empty($$dateOfBirth)){
    $changeInfo->insertUserProfile($dateOfBirth,);
  }

     

?>