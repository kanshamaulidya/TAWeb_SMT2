<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>THREE GALLERY - ADMIN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
      <?php
        if(isset($_SESSION["username"])){
          $nama = $_SESSION["username"];
        }else{
          header("Location:signIn.php");
        }
      ?>

    <?php
      if(isset($_GET["message"])){
        $message = $_GET["message"];
      }else{
        $message= "";
      }

      if($message == "success"){
        echo "<script>alert('Successfully changed status!')
                      window.location.replace('transaksiAdmin.php');
              </script>";  
      }else if($message == "failed"){
        echo "<script>alert('Failed to change status. Do you want to try again?')
                      window.location.replace('transaksiAdmin.php');
              </script>";
      }
    ?> 
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          </i><h3 style="color: #A760FF"><i class="mdi mdi-palette"></i>THREE GALLERY</h3>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <?php include "connection.php";
                      $query = "SELECT gambar FROM user where username = '$nama'";
                      $result = mysqli_query($connect, $query);
                  ?>
                  <?php while ($row = $result->fetch_assoc()) echo "<img src='img/$row[gambar]'/>" ?>
                </div>
                <div class="nav-profile-text">
                  <?php include "connection.php";
                      $query = "SELECT nama_user FROM user where username = '$nama'";
                      $result = mysqli_query($connect, $query);
                  ?>
                  <p class="mb-1 text-black"><?php while ($row = $result->fetch_assoc()) echo $row['nama_user'] ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="logout.php" onclick="return confirm('Are you sure to log out?')">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="homeAdmin.php">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksiAdmin.php">
                <span class="menu-title">Transaksi</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="eventAdmin.php">
                <span class="menu-title">Event</span>
                <i class="mdi mdi-presentation menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="karyaAdmin.php">
                <span class="menu-title">Karya</span>
                <i class="mdi mdi-palette-advanced menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure to log out?')">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-logout menu-icon"></i>
              </a>
            </li>
            </ul>
        </nav>
        <!-- partial -->
            <div class="row" style="overflow: auto">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow: auto">
                    <h3><i class="mdi mdi-clipboard-text menu-icon"></i> TRANSAKSI</h3><br>
                    <form action="searchTransaksiA.php" method="get" style="width: 76rem;">
                    <div class="input-group">
                      <a href="printTransaksiA.php" target="_blank"><button type="button" class="btn btn-outline-primary btn-icon-text" style="margin-right: 50px">
                      <i class="mdi mdi-printer btn-icon-prepend"></i>Print</button></a>
                      <input type="text" class="form-control rounded" placeholder="Cari ID Transaksi, Nama User, Nama Event, atau Status" aria-label="Search" aria-describedby="search-addon" name="cari" required/>
                      <button type="submit" class="btn btn-outline-info btn-icon-text"><i class="mdi mdi-magnify btn-icon-prepend"></i>Search</button>
                    </div>
                    </form>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Nama Event</th>
                          <th>Tanggal Event</th>
                          <th>Nama User</th>                 
                          <th>Tanggal Transaksi</th>
                          <th>Total Pembayaran</th>
                          <th>Status</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <?php
                        include "connection.php";

                        $query = "SELECT t.id_transaksi, e.nama, e.tanggal as tglE, u.nama_user, t.tanggal as tglT, t.harga, t.status 
                        FROM transaksi t 
                        INNER JOIN event e on e.id_event = t.id_event
                        INNER JOIN user u on u.id_user = t.id_user";
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $row["id_transaksi"]; ?></td>
                          <td><?php echo $row["nama"]; ?></td>
                          <td><?php echo $row["tglE"]; ?></td>
                          <td><?php echo $row["nama_user"]; ?></td>
                          <td><?php echo $row["tglT"]; ?></td>
                          <td>Rp. <?php echo $row["harga"]; ?></td>
                          <td><?php echo $row["status"]; ?></td>
                          <td>
                            <a href="transaksiHProcess.php?id_transaksi=<?php echo $row["id_transaksi"]; ?>">
                                <button type="submit" class="btn btn-outline-success btn-icon-text" name="hadir" value="Hadir">
                                <i class="mdi mdi-checkbox-marked-outline btn-icon-prepend"></i>Hadir</button>
                              </a>  
                          </td>
                          <td>
                          <a href="transaksiAProcess.php?id_transaksi=<?php echo $row["id_transaksi"]; ?>">
                                <button type="submit" class="btn btn-outline-danger btn-icon-text" name="tidakhadir" value="TidakHadir">
                                <i class="mdi mdi-close-box-outline btn-icon-prepend"></i>Alfa</button>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                          }
                        }else{
                          echo "0 results";
                        }
                      ?>
                    </table>
              </div>
            </div>
            </div>
            </div>
          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright &copy; <strong>Three Gallery </strong> 2022</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js1/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js1/off-canvas.js"></script>
    <script src="assets/js1/hoverable-collapse.js"></script>
    <script src="assets/js1/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js1/dashboard.js"></script>
    <script src="assets/js1/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>