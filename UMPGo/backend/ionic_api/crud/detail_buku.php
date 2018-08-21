<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset=utf-8");
    include_once("config.php");
    $id = $_REQUEST["id"];
    $result = mysqli_query($mysqli, "select * from buku WHERE id='$id'") or die ("gagal query delete");
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
?>
