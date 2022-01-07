<?php 
// koneksi database
include '../config.php';
 
// menangkap data yang di kirim dari form
$name = $_POST['proname'];
$title = $_POST['titleovr'];
// $building = $_POST['building'];
// $logo = $_POST['logo'];

//query upload building file
$temp1 = $_FILES['building']['tmp_name'];
$name1 = rand(0,9999).$_FILES['building']['name'];
$size1 = $_FILES['building']['size'];
$type1 = $_FILES['building']['type'];
$folder1 = "../img/reference/";

//query upload logo file
$temp2 = $_FILES['logo']['tmp_name'];
$name2 = rand(0,9999).$_FILES['logo']['name'];
$size2 = $_FILES['logo']['size'];
$type2 = $_FILES['logo']['type'];
$folder2 = "../img/reference/";
 
// menginput data ke database
if ($size1 and $size2 < 2048000 and ($type1 =='image/jpeg' or $type1 =='image/jpg' or $type1 == 'image/png' or $type2 =='image/jpeg' or $type2 =='image/jpg' or $type2 == 'image/png')) {
    move_uploaded_file($temp1, $folder1 . $name1);
    move_uploaded_file($temp2, $folder2 . $name2);
    mysqli_query($koneksi,"insert into reference (name_reference, title_reference, gedung_reference, logo_reference) values('$name','$title','$name1','$name2')");
 
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
    } 
?>