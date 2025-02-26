<?php

error_reporting(E_ALL);  
ini_set('display_errors', 1);  
ini_set('log_errors', 1);  
ini_set('error_log', 'displayErr.php');  

include('controller/AultUserControler.php');
$pot = new action();
// print_r($_SESSION['user']['id']);
if(!isset($_SESSION['user']['id'])){
    echo 'sign up or login to use this website';
    exit;
}
if(isset($_POST["submit"])){
    if(!isset($_SESSION['user']['id'])){
        echo 'you should login';
        exit;
    };
    $personID = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "DBimages/$file_name";

    $pot->post($content,$title,$personID, $file_name,$folder ,$tempname);
};



?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php 
    $personID = $_SESSION['user']['id'];
    $con = $pot->con();
      $select = 'SELECT username FROM project WHERE id = ?';
    $stmt =  $con->prepare($select);
    $stmt->bind_param('s', $personID);
    $stmt->execute();

    $result = $stmt->get_result();
    $username = $result->fetch_assoc();
    // echo $_SESSION['user']['id']
    ?>
  <form  method='POST' enctype="multipart/form-data">
  <div class="h-[60%] flex justify-center items-center ">
      <div class="w-[40%] h-[60%] bg-white shadow-lg">
        <div class="flex items-center justify-between borer border-b border-black">
            <p></p>
            <p class="font-bold text-center p-2">Create post</p>
            <p class="text-end p-2"><i class="bi bi-x-circle text-2xl"></i></p>
        </div>
        <div class="flex items-center gap-5 mx-5">
            <div class="w-[50px] h-[50px] rounded-full overflow-hidden my-2"><img class="w-full h-full" src="" alt=""></div>
            <p><?php echo $username['username'] ?></p>
        </div>
        <div class="m-5">
         <textarea name="content" id="commentInput" class="comment-box bg-transparent w-full outline-none resize-none h-10 overflow-auto" placeholder="What's on your mind <?php echo $username['username'] ?>..."></textarea><br>
        </div>
        <div class="flex items-center justify-between w-[100%] px-5">
            <div class="flex justify-end my-2 overflow-hidden">
                <label for="fileInput" class="px-4 py-2 bg-blue-500 text-white rounded-lg cursor-pointer hover:bg-blue-600">
                    Upload Image
                </label>
                <input id="fileInput" type="file" name="image" class="hidden">
            </div>
            <div class="flex flex-col">
                <label for="image"></label>
                <input class="w-full outline-none" name="title" type="text" placeholder="About your post ">
            </div>
        </div>
        <div class="px-5">
            <button name="submit" class="w-full py-2 text-white bg-blue-400 transition duration-300 hover:bg-blue-800">Post</button>
        </div>
      </div>
   </div>
  </form>
</body>
</html>