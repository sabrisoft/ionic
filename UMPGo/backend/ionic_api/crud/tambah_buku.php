<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset=utf-8");
    include_once("config.php");

    $input = file_get_contents('php://input');
    $data = json_decode($input,true);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        ///$judul = $_POST["judul"];
        //$penerbit = $_POST["penerbit"];
        //$pengarang = $_POST["pengarang"];

        $judul = $data['judul'];
        $penerbit = $data['penerbit'];
        $pengarang = $data['pengarang'];
      
        $result = mysqli_query($mysqli, "INSERT INTO buku (judul, penerbit, pengarang) VALUES ('$judul','$penerbit','$pengarang')") or die ("Error query insert. ".mysql_error());
        echo(json_encode(["message"=> "buku berhasil ditambahkan"]));
    } else {
        print_r(json_encode(["message"=> "requuest harus post"]));
    }
?>
