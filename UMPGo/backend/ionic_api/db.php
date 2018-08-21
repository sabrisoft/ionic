<?php

 header("Access-Control-Allow-Origin: *");
 header("Content-Type: text/html; charset=utf-8");

 $con = mysqli_connect("localhost","root","","ionicdb") or die("could not connect DB");
?>