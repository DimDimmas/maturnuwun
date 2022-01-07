<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id_gallery = $_GET['id_gallery'];
 
$pilih = mysqli_query($koneksi, "select*from gallery where id_gallery='$id_gallery'");

$data = mysqli_fetch_array($pilih);

$foto = $data['file_gallery'];

unlink("../img/gallery/".$foto);

// menghapus data dari database
mysqli_query($koneksi,"delete from gallery where id_gallery='$id_gallery'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>