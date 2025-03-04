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
        if(!isset($_SESSION['user']['id'])){
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


      public function changeUserInfoName($changeName,$changeEmail){
        $responce = [];
        $fields = [];
        $values = [];
       $con = $this->con();
        if (!empty($changeName)) {
            $fields[] = "	username = ?";
            $values[] = $changeName;
        }
        
        if (!empty($changeEmail)) {
            $fields[] = "email = ?";
            $values[] = $changeEmail;
        }
    
        if (count($fields) > 0) {
            $sql = "UPDATE project SET " . implode(", ", $fields) . " WHERE id = ?";
            $values[] = $_SESSION['user']['id']; // Adding user ID for the WHERE clause
    
            $stmt = $con->prepare($sql);
            $stmt->execute($values);
            if($stmt->execute($values)){
              $responce = ['success'];
            }else{
              $responce = ['failed'];
            }
        }
        echo json_encode($responce);


      }

      public function changeProfilePicture($imageTmpPath, $destination) {
        $response = [];
        $con = $this->con();
     
    
        if (empty($imageTmpPath)) {
            echo json_encode(["error" => "No image provided"]);
            exit;
        }

        $folder = "profilePicture/$destination";
        move_uploaded_file($imageTmpPath, $folder);
        // if (!move_uploaded_file($imageTmpPath, $folder)) {
        //     exit;
        //   }
        // Ensure the image is properly sanitizedproject
        $sql = "UPDATE project SET 	profile_picture = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
    
        if ($stmt) {
            $stmt->execute([$folder, $_SESSION['user']['id']]);
            if($stmt->execute([$folder, $_SESSION['user']['id']])){
              $response = ["status" => "success"];
            }else{
              $response = ["status" => "failed", "message" => "No rows affected"];
            }
    
        } else {
            $response = ["status" => "error", "message" => "Query preparation failed"];
        }
    
        echo json_encode($response);
    }

    public function deletePost($id){
      // echo $id;
      $con = $this->con();
      $sql = 'DELETE FROM personPost WHERE id = ?';
      $stmt = $con->prepare($sql);
      $stmt->bind_param('s', $id);
      $stmt->execute();
      if($stmt->execute()){
        echo json_encode('ok');
        // header('Location: http://localhost/blog_project/homePage.php');
      }else{
        echo json_encode('notOk');
        exit;
        
      }
    }
    
      }
?>