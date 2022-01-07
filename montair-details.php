<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo/logo.ico">
    <title>Matur Nuwun Nusantara</title>
    <link rel="stylesheet" href="assets/css/nivo-slider/default/default.css" media="screen">
    <link rel="stylesheet" href="assets/css/nivo-slider/nivo-slider.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animate/animate.css">
    <link rel="stylesheet" href="assets/css/fa/all.css">
    <link rel="stylesheet" href="assets/css/bs/bootstrap.css">
    <link rel="stylesheet" href="assets/css/hover/hover.css">
    <link rel="stylesheet" href="assets/css/fa/pro/all.css">

    <script src="assets/js/fa/pro/all.js"></script>
    <script src="assets/js/pooper/popper.min.js"></script>
    <script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bs/bootstrap.js"></script>
    <script src="assets/js/fa/all.js"></script>
    <script src="assets/js/wow/wow.js"></script>
    <script>
      new WOW().init();
    </script>
    <style>
        #navbar{
            background-color: rgba(33, 33, 33, 0.8) !important;
            position: fixed;
            /* bottom: 0; */
            z-index: 99;
        }
    </style>
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
              <a class="nav-link" href="reference.php">Reference</a>
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
      
    <div style="width: 100%; padding-top: 100px;" >
        <div style="width: 100%;"><div class="montair-details-title">
            <h1>
            <strong>Montair</strong> <br> 
            Product Range Details
            </h1>
        </div>
        <div class="montair-detail-wrapper" >
        <?php
          include 'admin/config.php';
        ?>
            <div class="montair-detail-content">
            <?php 
            $id_montair = $_GET['id_montair'];
             $data = mysqli_query($koneksi,"select * from montair where id_montair = '$id_montair'");
             $d = mysqli_fetch_array($data)
            ?>
              <div class="montair-detail-image-box">
                <img class="montair-detail-image" src="assets/img/montair/<?php echo $d['montair-image']; ?>">
                <img class="montair-detail-image-desc" src="assets/img/montair/<?php echo $d['image-plus']; ?>">
              </div>
              <div class="montair-detail-text">
                <div class="title-montair-detail">
                  <?php echo $d['type']; ?>
                </div>
                <div class="montair-type-detail"><?php echo $d['title']; ?></div>
                <br>
                <span style="color: #b33939; font-weight: bold;"><?php echo $d['advantage']; ?></span>
                <br>
                <img class="montair-detail-advantage" src="assets/img/montair/<?php echo $d['advantage-image']; ?>">
                <div class="montair-detail-description-text">
                  <ul>
                  <?php echo $d['description']; ?>
                  </ul>
                </div>
              </div>
              <img class="detail-montair center" src="assets/img/montair/<?php echo $d['product-desc']; ?>">                
              <div class="montair-desc-detail">
                  <img class="img-version" src="assets/img/montair/<?php echo $d['img-version']; ?>">
                  
                  <div class="button-montair">
                    <a href="montair.php" class="firepro-back-details">Back to Montair</a>
                  </div>
                </div>
            </div>
        </div> 
    </div>

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
      Copyright
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