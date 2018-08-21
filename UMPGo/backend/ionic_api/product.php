<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8");

include "db.php";
$input = file_get_contents('php://input');
$data = json_decode($input,true);
$message = array();
if($data['action'] == "insert"){
 $title = $data['title'];
 $desc = $data['desc'];
 $price = $data['price'];
 $pic = $data['pic'];
 $q = mysqli_query($con,"INSERT INTO `products` (`title`,`desc`,`price`,`pic`) VALUES ('$title','$desc','$price','$pic')");
 if($q){
 $message['status'] = "success";
 }
 else{
 $message['status'] = "error";
 }
 echo json_encode($message);
}
echo mysqli_error($con);
?>