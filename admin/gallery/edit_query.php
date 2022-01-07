<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$id_gallery = $_POST['id'];
$title_gallery = $_POST['title'];
$description_gallery = $_POST['description'];
$tanggal_gallery = $_POST['date'];

//query upload file
$temp = $_FILES['img']['tmp_name'];
$name = rand(0,9999).$_FILES['img']['name'];
$size = $_FILES['img']['size'];
$type = $_FILES['img']['type'];
$folder = "../img/gallery/";
 
// update data ke database
if ($size < 2048000 and ($type =='image/jpeg' or $type =='image/jpg' or $type == 'image/png')) {
    move_uploaded_file($temp, $folder . $name);
    mysqli_query($koneksi,"update gallery set 
                    title_gallery='$title_gallery', 
                    description_gallery='$description_gallery', 
                    tanggal_gallery='$tanggal_gallery', 
                    file_gallery='$name' 
                    where id_gallery='$id_gallery'");
 
    // mengalihkan halaman kembali ke index.php
    ob_start();
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
    ob_end_flush();
    }else{
        mysqli_query($koneksi,"update gallery set 
                    title_gallery='$title_gallery', 
                    description_gallery='$description_gallery', 
                    tanggal_gallery='$tanggal_gallery'
                    where id_gallery='$id_gallery'");
 
    ob_start();
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
    ob_end_flush();
}  
?>