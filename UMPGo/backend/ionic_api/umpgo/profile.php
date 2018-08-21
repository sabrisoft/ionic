<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8");

include "dbconnect.php";
$id = $_GET['id'];
$data=array();
$q=mysqli_query($con,"SELECT * FROM `user` WHERE ID='$id'");

while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
echo mysqli_error($con);
?>