<?php 
// koneksi database
include '../config.php';
 
// menangkap data id yang di kirim dari url
$id_reference = $_GET['id_reference'];
 
 
$pilih = mysqli_query($koneksi, "select*from reference where id_reference='$id_reference'");

$data = mysqli_fetch_array($pilih);

$foto = $data['gedung_reference'];
$foto2 = $data['logo_reference'];

unlink("../img/reference/".$foto);
unlink("../img/reference/".$foto2);

// menghapus data dari database
mysqli_query($koneksi,"delete from reference where id_reference='$id_reference'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>