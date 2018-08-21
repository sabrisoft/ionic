<?php

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=utf-8");



        include "dbconnect.php";

       
        $input = file_get_contents('php://input');
        $data = json_decode($input,true);
       
        $message = array();

        if (isset($input)) {           

            $emailadd = $data['email'];
            $password = $data['password'];
            $username = $data['username'];
            $mobile = $data['mobile'];

        }

        $username = stripslashes($username);
        $password = stripslashes($password);

       
        $sql = mysqli_query($con,"INSERT INTO `user` (`username`,`password`,`email`,`telephone`) VALUES ('$username','$password','$emailadd','$mobile')");
        /*
        if($sql)
        {                    
                        $message['status'] = "Registration successfull";


        } else {
                        $message['status'] = "error";

      
        }
        */

        if ($con->query($sql) === TRUE) {

            $response= "Registration successfull";

        } else {

           $response= "Error: " . $sql;

        }


        echo json_encode( $response);
        //echo mysqli_error($con);

?>