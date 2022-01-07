<?php 
    $koneksi = mysqli_connect("localhost","web_maturnuwun","Nusantar4_2020","maturnuwun");
    
    // Check connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    $host = 'localhost'; // Nama hostnya
    $username = 'web_maturnuwun'; // Username
    $password = 'Nusantar4_2020'; // Password (Isi jika menggunakan password)
    $database = 'maturnuwun'; // Nama databasenya

    // Koneksi ke MySQL dengan PDO
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>