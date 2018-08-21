<?php

  define('HOST',"localhost");
  define('USER','root');
  define('PASS','');
  define('DB','ionicdb');
  //$con = mysqli_connect(HOST,USER,PASS,DB);

  //$con = mysqli_connect(HOST,USER,PASS,DB) or die("could not connect DB");

  $con = mysqli_connect(HOST,USER,PASS,DB);




   if (!$con){

                die("Error in connection" . mysqli_connect_error()) ;


  }
  

?>