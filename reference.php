<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo/logo.ico">
    <title>Matur Nuwun Nusantara</title>
    <meta content='PT. Matur Nuwun Nusantara merupakan perusahaan yang bergerak di bidang alat pemadam kebakaran dengan kualitas yang terjamin dan harga yang murah.' name='description'/>
    <meta content='PT. Matur Nuwun Nusantara, Alat Pemadam Kebakaran, Jual Firepro, Jual Montair, Jual Baron, Jual Telefire, Jual Eagle Eye, Jual Midac
                    Matur Nuwun Nusantara, Jual Alat Pemadam Kebakaran, Firero, Montair, Baron, Telefire, Eagle Eye, Midac' name='keywords'/>
                    
    <link rel="stylesheet" href="assets/css/nivo-slider/default/default.css" media="screen">
    <link rel="stylesheet" href="assets/css/nivo-slider/nivo-slider.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animate/animate.css">
    <link rel="stylesheet" href="assets/css/fa/all.css">
    <link rel="stylesheet" href="assets/css/bs/bootstrap.css">
    <link rel="stylesheet" href="assets/css/hover/hover.css">

    <script src="assets/js/pooper/popper.min.js"></script>
    <script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bs/bootstrap.js"></script>
    <script src="assets/js/fa/all.js"></script>
    <script src="assets/js/wow/wow.js"></script>
    <script>
      new WOW().init();
    </script>
</head>
<body id="home">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <a href="index.php">
          <img src="assets/img/logo/logo-light.png" alt="" width="200px">
        </a>
        <button class="navbar-toggler" style="background-color: #fff;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php#profile">Profile</a>
                <a class="dropdown-item" href="index.php#visionmision">Vision & Mision</a>
                <a class="dropdown-item" href="index.php#history">History</a>
                <a class="dropdown-item" href="index.php#team">Our Team</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Our Product
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="montair.php">Montair</a>
                  <a class="dropdown-item" href="baron.php">Baron</a>
                  <a class="dropdown-item" href="firepro.php">FirePro</a>
                  <a class="dropdown-item" href="telefire.php">Telefire</a>
                  <a class="dropdown-item" href="eagleeye.php">Eagle Eye</a>
                  <a class="dropdown-item" href="midac.php">Midac</a>
                  <a class="dropdown-item" href="corobor.php">Corobor</a>
                </div>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reference</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gallery
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="image.php">Images</a>
                <a class="dropdown-item" href="video.php">Videos</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="banner-reference">
      <div class="reference-title wow animate__slideInUp animate__animated">
        <span><h1>OUR REFERENCE</h1></span>
        <hr width="10%" style="top: 45%; border-color: #fff !important;">
      </div>
    </div>

      <div class="reference-boximage wow animate__slideInUp animate__animated"> 
        <?php 
          include 'admin/config.php';
          $limit   = 20;
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit_start = ($page - 1) * $limit;

          $sql = $pdo->prepare("SELECT * FROM reference order by id_reference desc LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          while($d = $sql->fetch()){
        ?>        
        <div class="boximage-image">
          <a>
            <img src="admin/img/reference/<?php echo $d['gedung_reference']; ?>" alt="">
            <div class="reference-overlay">
              <div class="boximage-text">
                <img src="admin/img/reference/<?php echo $d['logo_reference']; ?>" alt="">
                <div class="text-text">
                  <?php echo $d['title_reference']; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php
          }
        ?>
    </div>
    
    <nav style="margin-bottom: 5%">
      <ul class="pagination justify-content-center">
          <!-- LINK FIRST AND PREV -->
          <?php
          if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
          ?>
            <li class="page-item disabled"><a class='page-link' href="#">First</a></li>
            <li class="page-item disabled"><a class='page-link' href="#">&laquo;</a></li>
          <?php
          }else{ // Jika page bukan page ke 1
            $link_prev = ($page > 1)? $page - 1 : 1;
          ?>
            <li class="page-item"><a class='page-link' href="reference.php?page=1">First</a></li>
            <li class="page-item"><a class='page-link' href="reference.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
          <?php
          }
          ?>
          
          <!-- LINK NUMBER -->
          <?php
          // Buat query untuk menghitung semua jumlah data
          $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM reference");
          $sql2->execute(); // Eksekusi querynya
          $get_jumlah = $sql2->fetch();
          
          $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
          $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
          $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
          $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
          
          for($i = $start_number; $i <= $end_number; $i++){
            $link_active = ($page == $i)? 'active' : '';
          ?>
            <li class="page-item <?php echo $link_active; ?>"><a class='page-link' href="reference.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
          }
          ?>
          
          <!-- LINK NEXT AND LAST -->
          <?php
          // Jika page sama dengan jumlah page, maka disable link NEXT nya
          // Artinya page tersebut adalah page terakhir 
          if($page == $jumlah_page){ // Jika page terakhir
          ?>
            <li class="page-item disabled"><a class='page-link' href="#">&raquo;</a></li>
            <li class="page-item disabled"><a class='page-link' href="#">Last</a></li>
          <?php
          }else{ // Jika Bukan page terakhir
            $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
          ?>
            <li class="page-item"><a class='page-link' href="reference.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
            <li class="page-item"><a class='page-link' href="reference.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
          <?php
          }
          ?>
        </ul>
      </nav>

    <div class="banner-footer">
      <div class="ribbon-contact">
        <div style="position: absolute; bottom: 0; 
        font-family: Arial, Helvetica, sans-serif;"><h3>CONTACT US</h3></div>
      </div>
    </div>
    <div class="footer" id="contact">
      <div class="footer-box" id="box-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.278379090593!2d106.84850931448419!3d-6.2269806627172475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f391c98ca89f%3A0x7277e7e26b45fa66!2sMaturnuwun%20Nusantara%2C%20PT.!5e0!3m2!1sid!2sid!4v1593892281125!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>

      <div class="footer-box" id="box-contact">
        <table>
          <tr>
            <td style="width: 25%;"><i class="fas fa-map-marked-alt"></i>&nbsp; Address</td>
            <td style="width: 5%;">:</td>
            <td>Jl. Tebet Dalam IV No. 24
              Jakarta Selatan 12810
              Indonesia</td>
          </tr>
          <tr>
            <td><i class="fas fa-phone"></i>&nbsp; Phone</td>
            <td style="width: 5%;">:</td>
            <td>(021) 83702969, 83706316,
              8300811, 8300812</td>
          </tr>
          <tr>
            <td><i class="fas fa-fax"></i>&nbsp; Fax</td>
            <td style="width: 5%;">:</td>
            <td>(021) 8313360</td>
          </tr>
          <tr>
            <td><i class="fas fa-envelope"></i>&nbsp; E-Mail</td>
            <td style="width: 5%;">:</td>
            <td>marketing@maturnuwun.co.id</td>
          </tr>
          <tr>
            <td><i class="fas fa-globe-asia"></i>&nbsp; Website</td>
            <td>:</td>
            <td>www.maturnuwun.co.id</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="copyright">
    Copyright 2020. PT. Matur Nuwun Nusantara
    </div>
 
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "10px";
    document.getElementById("navbar").style.backgroundColor = "rgba(33, 33, 33, 0.8)";
} else {
    document.getElementById("navbar").style.padding = "20px 20px";
    document.getElementById("navbar").style.backgroundColor = "rgba(33, 33, 33, 0)";
}
}
</script>
<script>
/**
    * Used to demonstrate Hover.css only. Not required when adding
    * Hover.css to your own pages. Prevents a link from being
    * navigated and gaining focus.
    */
var effects = document.querySelectorAll('.effects')[0];

effects.addEventListener('click', function(e) {

    if (e.target.className.indexOf('hvr') > -1) {
    e.preventDefault();
    e.target.blur();

    }
});
</script>
</body>
</html>