<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset=utf-8");
    include_once("config.php");
    $id = $_POST["id"];
    $result = mysqli_query($mysqli, "DELETE from buku WHERE id='$id'") or die ("gagal query delete");
    echo(json_encode(["message"=> "buku berhasil di delete"]));
?>
