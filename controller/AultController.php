<?php
// session_start();
include('con.php');
class logSign extends connection {

    public function signup($username, $email, $password, $phoneNumber) {

        try {
            // Check for empty fields
            if (empty($username) || empty($email) || empty($password) || empty($phoneNumber)) {
                echo json_encode(['status' => 'error', 'message' => "All fields are required"]);
                exit;
            }
            
            $hashpassword =  password_hash($password, PASSWORD_DEFAULT);
            $con = $this->con();
            $select = 'SELECT email FROM project WHERE email = ?';
            $stmt = $con->prepare($select);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            
            // Get user 
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if ($user) {
                echo json_encode(['status' => 'Error', 'message' => 'User already exists']);
                exit;
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            }else{
                echo json_encode(['status' => 'Error', 'message'=>'Email is not valide']);
                exit;
            };

            $select2 = 'SELECT Phone_number FROM project WHERE Phone_number = ?';
            $stmt2 = $con->prepare($select2);
            $stmt2->bind_param('s', $phoneNumber);
            $stmt2->execute();

            $result2 = $stmt2->get_result();
            $user2 = $result2->fetch_assoc();
            if ($user2) {
                echo json_encode(['status' => 'Error', 'message' => 'numder already exist']);
                exit;
            }

            // $phoneNumber = "+234-803-123-4567";
            $regex = '/^\+?[0-9]{1,3}?[-.\s]?[0-9]{3,5}[-.\s]?[0-9]{3,5}[-.\s]?[0-9]{3,5}$/';

            if (preg_match($regex, $phoneNumber)) {
            } else {
                echo json_encode(['status' => 'Error', 'message' => 'Phone number is not valid']);
                exit;
            }


            // If user doesn't exist, insert new user
            $insert = 'INSERT INTO project (username, email, password, Phone_number) VALUES (?, ?, ?, ?)';
            $stmt = $con->prepare($insert);
            $stmt->bind_param('ssss', $username, $email, $hashpassword, $phoneNumber);
            if ($stmt->execute()) {
                $response = ['status' => 'ok', 'message' => 'User registered successfully'];
            } else {
                $response = ['status' => 'Error', 'message' => 'Failed to register user'];
            }

        } catch (\Throwable $th) {
            $response = ['status' => 'eror', 'message' => $th->getMessage()];
        }

        echo json_encode($response);
    }

    public function login($userEmail, $password){

        $check;

        if(empty($userEmail) || empty($password)){
           echo json_encode(['status'=>'error', 'message'=>'All fields are require']);
            exit;
        }

        $regex = '/^\+?[0-9]{1,3}?[-.\s]?[0-9]{3,5}[-.\s]?[0-9]{3,5}[-.\s]?[0-9]{3,5}$/';

            // if (preg_match($regex, $phoneNumber)) {
            // } else {
            //     echo json_encode(['status' => 'Error', 'message' => 'Phone number is not valid']);
            //     exit;
            // }

        if(preg_match($regex, $userEmail)){
            // $responce = ['message'=>'its not email',];
            $check = 'email';
        }else{
            $check = 'username';
            // $responce = ['message'=>'its  email',];
        }
        


        $con = $this->con();
    if (!$con) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
        exit;
    }else{
       

    }
        $select = "SELECT * FROM project WHERE $check = ?";
        $stmt = $con->prepare($select);
        
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if(!$user){
            echo json_encode(['status' => 'error', 'message' => 'user does not exit', ]);
            exit;
        }
        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user; 
            $responce = ['status'=>'ok', 'message'=>"success", 'wow'=> $user];
            // $responce = ['wow'=> $user];
        }else{
            echo json_encode(['status' => 'error', 'message' => 'user does not exit', ]);
            exit;
        }           

        echo json_encode($responce);

    }
}
?>
