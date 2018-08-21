<?php
    
      header("Access-Control-Allow-Origin: *");
      header("Content-Type: text/html; charset=utf-8");

      require "dbconnect.php";

      $input = file_get_contents("php://input");
      $data = json_decode($input,true);

      if (isset($input)) 
        {

            $username = $data['username'];
            $password = $data['password'];

        }

      $username= mysqli_real_escape_string($con,$username);
      $password = mysqli_real_escape_string($con,$password);
      $username = stripslashes($username);
      $password = stripslashes($password);

      $sql = "SELECT id FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($con,$sql);     
      $count = mysqli_num_rows($result);

      if($count >0) 
      {
             $response= "Your Login success";

      }else {

            $response= "Your Login Email or Password is invalid";


      }

      echo json_encode( $response);

?>