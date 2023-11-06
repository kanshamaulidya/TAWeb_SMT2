<!DOCTYPE HTML>
<html>
    <head>
        <title>HOME - GALLERY</title>
  <!-- Favicons -->
  <link href="assets/img/G.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
     <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php"><i class="bx bxs-palette"></i> Three Gallery</a></h1>
     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

      <br><br><br>
        <h1 align = "center">GALLERY</h1>
          <div class="row" style="overflow: auto">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow: auto">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID Karya</th>
                          <th>Nama Karya</th>
                          <th>Kategori</th>
                          <th>Tahun Rilis</th>
                          <th>Seniman</th>
                          <th>Deskripsi</th>
                          <th>Karya</th>                 
                        </tr>
                      </thead>
                      <?php
                        include "connection.php";

                        $query = "SELECT * FROM karya";
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $row["id_karya"]; ?></td>
                          <td><?php echo $row["nama_karya"]; ?></td>
                          <td><?php echo $row["kategori"]; ?></td>
                          <td><?php echo $row["thn_rilis"]; ?></td>
                          <td><?php echo $row["seniman"]; ?></td>
                          <td><?php echo $row["deskripsi"]; ?></td>
                          <td><img src="img/<?php echo $row["gambar"]; ?>" width="150" height="250"></td>
                        </tr>
                      </tbody>
                          <?php
                          }
                        }else{
                          echo "0 results";
                        }
                      ?>
                    </table>
        <!-- ======= Footer ======= -->
  <footer id="footer">

<div class="footer-top">
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Three Gallery</span></strong>. All Rights Reserved
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->
    </body>
</html>