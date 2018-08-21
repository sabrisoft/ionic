<?php
    // Menetapkan parameter koneksi database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ionic_crud';
    $charset = 'utf8';

    // Menetapkan parameter PDO
    $dsn = 'mysql:host='.$host.';port=3306;dbname='.$database.';charset='.$charset;
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    // Membuat objek/instan PDO (menghubungkan ke database)
    $pdo = new PDO($dsn, $username, $password, $options);

    // Mengambil data yang diposkan
    $json = file_get_contents('php://input');
    $obj = json_decode($json);
    $key = strip_tags($obj->key);

    // Menentukan mode mana yang diminta
    switch ($key) {
        // Menambahkan data baru kedalam tabel biodata
        case 'tambah':
            // Sanitasi nilai yang diberikan URL
            $nim = filter_var($obj->nim, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $nama = filter_var($obj->nama, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $jk = filter_var($obj->jk, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi1 = filter_var($obj->hobi1, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi2 = filter_var($obj->hobi2, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi3 = filter_var($obj->hobi3, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            // Menjalankan PDO dengan prepared statement
            try {
                $sql = 'INSERT INTO biodata(nim, nama, jk, hobi1, hobi2, hobi3) VALUES(:nim, :nama, :jk, :hobi1, :hobi2, :hobi3)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
                $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
                $stmt->bindParam(':jk', $jk, PDO::PARAM_STR);
                $stmt->bindParam(':hobi1', $hobi1, PDO::PARAM_STR);
                $stmt->bindParam(':hobi2', $hobi2, PDO::PARAM_STR);
                $stmt->bindParam(':hobi3', $hobi3, PDO::PARAM_STR);
                $stmt->execute();

                echo json_encode(array('message' => 'Data '.$nama.' telah disimpan'));
            }
            // Menangkap kesalahan saat menjalankan prepared statement
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        break;

        // Mengupdate/edit data yang ada pada tabel biodata
        case 'edit':

            // Sanitasi nilai yang diberikan URL
            $idData = filter_var($obj->idData, FILTER_SANITIZE_NUMBER_INT);
            $nim = filter_var($obj->nim, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $nama = filter_var($obj->nama, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $jk = filter_var($obj->jk, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi1 = filter_var($obj->hobi1, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi2 = filter_var($obj->hobi2, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $hobi3 = filter_var($obj->hobi3, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            // Menjalankan PDO dengan prepared statement
            try {
                $sql = 'UPDATE biodata SET nim = :nim, nama = :nama, jk = :jk, hobi1 = :hobi1, hobi2 = :hobi2, hobi3 = :hobi3 WHERE id = :idData';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
                $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
                $stmt->bindParam(':jk', $jk, PDO::PARAM_STR);
                $stmt->bindParam(':hobi1', $hobi1, PDO::PARAM_STR);
                $stmt->bindParam(':hobi2', $hobi2, PDO::PARAM_STR);
                $stmt->bindParam(':hobi3', $hobi3, PDO::PARAM_STR);
                $stmt->bindParam(':idData', $idData, PDO::PARAM_INT);
                $stmt->execute();

                echo json_encode('Data '.$nama.' telah di update');
            }
            // Menangkap kesalahan dalam menjalankan prepared statement
            catch (PDOException $e) {
                echo $e->getMessage();
            }

        break;

        case 'hapus':
            // Sanitasi  id record yang dikirimkan dengan mencocokkan record di tabel
            $idData = filter_var($obj->idData, FILTER_SANITIZE_NUMBER_INT);

            // Menjalankan PDO dengan prepared statement
            try {
                $pdo = new PDO($dsn, $username, $password);
                $sql = 'DELETE FROM biodata WHERE id = :idData';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':idData', $idData, PDO::PARAM_INT);
                $stmt->execute();

                echo json_encode('Data telah dihapus');
            }

            // Menangkap kesalahan dalam menjalankan prepared statement
            catch (PDOException $e) {
                echo $e->getMessage();
            }

        break;
    }
