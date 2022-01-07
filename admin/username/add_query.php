<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menginput data ke database

mysqli_query($koneksi, "insert into admin (username, password) values ('$username','$password')");

// mysqli_affected_rows($koneksi);
// die(mysqli_error($koneksi));

session_start();
// mengalihkan halaman kembali ke index.php
header("location:index.php");
ob_end_flush();
?>