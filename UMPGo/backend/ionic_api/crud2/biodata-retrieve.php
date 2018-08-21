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
    $data = array();

    // Melakukan query tabel di database dan mengambil data
    try {
        $stmt = $pdo->query('SELECT * FROM biodata ORDER BY nama ASC');
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            // Menetapkan setiap baris data kedalam array asosiatif
            $data[] = $row;
        }

        // Kembalikan data dalam format JSON
        echo json_encode($data);
    } catch (PDOException $e) { // Menampilkan eksepsi jika terjadi error
        echo $e->getMessage();
    }
