<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$format = $_POST['format'];
// $img = $_POST['imgallery'];

//query upload file
$temp = $_FILES['imgallery']['tmp_name'];
$name = rand(0,9999).$_FILES['imgallery']['name'];
$size = $_FILES['imgallery']['size'];
$type = $_FILES['imgallery']['type'];
$folder = "../img/gallery/";
 
// menginput data ke database
if ($size < 8000000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png' or $type == 'video/mp4' or $type == 'video/mkv' or $type == 'video/3gpp')) {
    move_uploaded_file($temp, $folder . $name);
    mysqli_query($koneksi,"insert into gallery (title_gallery, description_gallery, tanggal_gallery, file_gallery, format) values('$title','$description','$date','$name','$format')");
 
    // session_start();
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
    // ob_end_flush();
    }
?>