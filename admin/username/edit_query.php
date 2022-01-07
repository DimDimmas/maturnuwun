<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_admin = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

// update data ke database
mysqli_query($koneksi,"update admin set username='$username', password='$password' where id_admin='$id_admin'");
 
session_start();
// mengalihkan halaman kembali ke index.php
header("location:index.php");
ob_end_flush();
?>