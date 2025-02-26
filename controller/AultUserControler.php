<?php
  include('con.php');
  class action extends connection{
      public function post ($content,$title,$personID,$file_name, $folder, $tempname){
        if (!isset($_SESSION['user']['id'])) {
          echo "User is not logged in!";
          exit;
        }
      if(empty($content)){
        echo('empty post ');
        return;
      };
      if(empty($title)) $title = '...';
      move_uploaded_file($tempname, $folder);
        $con = $this->con;
        $put= 'INSERT INTO personPost (title,content,user_id,images) VALUE(?,?,?,?)';
        $stmt = $con->prepare($put);
        $stmt->bind_param('ssss', $title, $content, $personID, $file_name);
        if($stmt->execute()){
            echo( 'User registered successfully');
        }else{
            echo('faild');
        }
    } 

   

    public function displayAllPost(){
        $con = $this->con();
            
    if (!isset($_SESSION['user']['id'])) {
      echo "User is not logged in!";
      exit;
    }
      $user = $_SESSION['user'];
      $sql = "SELECT * FROM personPost";
      $stmt = $con->prepare($sql);
      $stmt->execute(); // You need to execute the statement

      $result = $stmt->get_result(); // Fetch the result set

      $users = []; // Initialize an empty array

      while ($row = $result->fetch_assoc()) {
          $users[] = $row; // Store each row in the array
      }
      return $users;
        }


        public function displayMyPost() {
          $con = $this->con();
      
          if (!isset($_SESSION['user']['id'])) {
              echo "User is not logged in!";
              exit;
          }
      
          $userId = $_SESSION['user']['id'];
      
          $sql = "SELECT * FROM personPost WHERE user_id = ?";
          $stmt = $con->prepare($sql);
      
          if (!$stmt) {
              die("Error in preparing statement: " . $con->error);
          }
      
          $stmt->bind_param("i", $userId); // "i" for integer
          $stmt->execute();
      
          $result = $stmt->get_result();
      
          $users = [];
      
          while ($row = $result->fetch_assoc()) {
              $users[] = $row;
          }
      
          $stmt->close();
          
          return $users;
      }
      
      public function disSinglePost(){
        $con = $this->con();
        // $con = $singlePost->con();
        if(!isset( $_SESSION['eachId'])){
          echo $_SESSION['eachId'];
          echo $_SESSION['user']['id'];
          echo 'you have to log in';
        }
        $personPost = 'SELECT * FROM personPost WHERE id = ?';
        $stmt = $con->prepare($personPost);
        $stmt->bind_param('s', $_SESSION['eachId']);
        $stmt->execute();

        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        if(!$post){
          echo 'you have no post';
          exit;
        }
        return $post;
      }
        
      }
?>