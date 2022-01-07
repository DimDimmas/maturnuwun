<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo/logo.ico">
  <title>Admin - Matur Nuwun Nusantara</title>

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  
  <link rel="stylesheet" href="../css/new.css">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <?php 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../login.php?pesan=belum_login");
    }
  ?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../" class="logo">
        <img src="../img/logo/logo-light.png" alt="" width="200px" style="margin-top: -10px">
      </a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="../img/profile.png" class="img-circle" width="80"></p>
          <h5 class="centered">Matur Nuwun Nusantara <br> Admin</h5>
          <li class="mt">
            <a href="../">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="../gallery">
              <i class="fa fa-picture-o"></i>
              <span>Gallery</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="../reference">
              <i class="fa fa-desktop"></i>
              <span>Reference</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="../username">
              <i class="fa fa-user-plus"></i>
              <span>Username & password</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Gallery</h3>
        <hr>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Reference</h4>
                <?php
                    include '../config.php';
                    $id_reference = $_GET['id_reference'];
                    $data = mysqli_query($koneksi,"select * from reference where id_reference='$id_reference'");
                    while($d = mysqli_fetch_array($data)){
                ?>
              <form class="form-horizontal style-form" method="post" action="edit_query.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Project Name</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $d['id_reference']; ?>">
                    <input type="text" class="form-control" name="proname" value="<?php echo $d['name_reference']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Title (overlay)</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titleovr" value="<?php echo $d['title_reference']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Image 1 (building)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="building">
                    <span class="help-block">Previous image is "<?php echo $d['gedung_reference']; ?>".</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Image 2 (logo)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="logo">
                    <span class="help-block">Previous image is "<?php echo $d['logo_reference']; ?>".</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label">
                      <a href="../reference" class="btn btn-danger">Cancel</a>
                  </label>
                  <label class="col-sm-1 col-sm-1 control-label">
                      <input type="submit" value="Submit" class="btn btn-success">
                  </label>
                  <div class="col-sm-10">
                  </div>
                </div>
              </form>
                <?php 
                    }
                ?>
            </div>
        </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->          
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Matur Nuwun Nusantara</strong>.
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          <h6 style="color: rgb(156, 112, 112)">Created with Dashio template by <a style="color: rgb(156, 112, 112)" href="https://templatemag.com/">TemplateMag</a></h6>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
