

<?php

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'signup.php');  
include('controller/AultUserControler.php');


if(!isset($_SESSION['user']['id'])){
     echo json_encode('sign up or login to use this website');
    exit;
  }
  $changeProfile = new action();
  $input = file_get_contents('php://input');
  $data = json_decode($input, true);
  $imageTmpPath = $_FILES['image']['tmp_name'];
  $imageName = $_FILES['image']['name'];
  
  if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
      echo json_encode(["error" => "No file uploaded or upload error"]);
      exit;
    }
    $changeProfile->changeProfilePicture($imageTmpPath,$imageName);
//   if(isset($image)){
//     $_SESSION['lol'] = $image;
//   echo json_encode("$image fvgbdg") ;
// }



?>