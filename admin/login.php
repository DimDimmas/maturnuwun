<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="icon" href="../assets/img/logo/logo.ico">
  <title>Admin - Matur Nuwun Nusantara</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="cek_login.php" method="post">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Username" autofocus name="username">
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">
          <hr>
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
                echo "Login gagal! username dan password salah!";
              }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
              }else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman admin";
              }
            }
          ?>
          <br>
          <button style="transition: 0.3s" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <a style="transition: 0.3s" class="btn btn-theme btn-block" href="../"><i class="fa fa-angle-double-left" aria-hidden="true"></i> TO WEBPAGES</a>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/bg-login.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
