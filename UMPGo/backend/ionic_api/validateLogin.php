<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST')�
{

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username=$request->username;
//implement your own authentication
//here i used some dummy data manually.
echo json_encode(array("userid"=>"35", "token"=>"tyresksdkjfnkjdskjsd"));

}
else
{
echo "Not allowed";
}

?>