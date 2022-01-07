<?php
  ob_start();
  session_start();
    if($_SESSION['status']!="login"){
      header("location:login.php?pesan=belum_login");
    }
    ob_end_flush();
?>

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
  <section id="container">
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
            <a class="active" href="index.php">
              <i class="fa fa-picture-o"></i>
              <span>Gallery</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="../reference">
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
        <h3><i class="fa fa-angle-right"></i> Gallery</h3>
        <hr>
        <?php
          include '../config.php';
        ?>
        <div class="row">
          <div class="col-lg-11 main-chart">            
            <div class="row mt">
                <a class="btn btn-primary add" href="add.php">Add Gallery &nbsp; <i class="fa fa-plus" aria-hidden="true"></i></a>
                <div class="search-box">
                  <form action="index.php" method="get">
                    <input type="text" name="search" class="form-control">
                    <input type="submit" value="Search" class="btn btn-success">
                  </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th width="200px">title</th>
                            <th width="200px">description</th>
                            <th>date</th>
                            <th>file name</th>
                            <th>image</th>
                            <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $limit   = 20;
                      $page = (isset($_GET['page']))? $_GET['page'] : 1;
                      
                      $limit_start = ($page - 1) * $limit;
                      $no = $limit_start + 1;
                        if(isset($_GET['search'])){
                          $search = $_GET['search'];
                          $data = mysqli_query($koneksi,"select * from gallery where title_gallery like '%".$search."%' order by id_gallery desc limit ".$limit_start.",".$limit);				
                        }else{
                          $data = mysqli_query($koneksi,"select * from gallery order by id_gallery desc limit ".$limit_start.",".$limit);
                        }
                          while($d = mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $d['title_gallery']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $d['description_gallery']; ?></td>
                            <td style="text-transform: capitalize;"><?php echo $d['tanggal_gallery']; ?></td>
                            <td><?php echo $d['file_gallery']; ?></td>
                            
                            <td class="center">
                              <?php
                                if($d['format'] == 'Video'){
                              ?>
                            
                                  <video width="200px" height="200px" controls>
                                     <source src='../img/gallery/<?php echo $d['file_gallery']; ?>' type='video/MP4'>
                                  </video>;
                              <?php
                                }else{
                              ?>   
                                <img src="../img/gallery/<?php echo $d['file_gallery']; ?>" alt="Image">
                              <?php
                                }      
                              ?>
                            </td>
                            <td class="center"><a href="edit.php?id_gallery=<?php echo $d['id_gallery']; ?>" class="btn btn-warning">Edit &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td class="center"><a href="delete.php?id_gallery=<?php echo $d['id_gallery']; ?>" class="btn btn-danger">Delete &nbsp; <i class="fa fa-times" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php
                        $no++; 
                        }
                    ?>
                    <tr>
                      <td colspan="7" style="text-align: center">
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
                                <li class="page-item"><a class='page-link' href="index.php?page=1">First</a></li>
                                <li class="page-item"><a class='page-link' href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                              <?php
                              }
                              ?>
                              
                              <!-- LINK NUMBER -->
                              <?php
                              // Buat query untuk menghitung semua jumlah data
                              $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM gallery");
                              $sql2->execute(); // Eksekusi querynya
                              $get_jumlah = $sql2->fetch();
                              
                              $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                              $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                              
                              for($i = $start_number; $i <= $end_number; $i++){
                                $link_active = ($page == $i)? 'active' : '';
                              ?>
                                <li class="page-item <?php echo $link_active; ?>"><a class='page-link' href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                <li class="page-item"><a class='page-link' href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                <li class="page-item"><a class='page-link' href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                              <?php
                              }
                              ?>
                            </ul>
                          </nav>
                      </td>
                    </tr>
                    </tbody>
                </table>
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
