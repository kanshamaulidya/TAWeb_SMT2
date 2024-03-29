<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>THREE GALLERY - USER</title>
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
        echo "<script>alert('Successful event ticket booking!')
                      window.location.replace('transaksiUser.php');
              </script>";  
      }else if($message == "failed"){
        echo "<script>alert('Failed to book event ticket. Do you want to try again?')
                      window.location.replace('booking.php');
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
              <a class="nav-link" href="homeUser.php">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookingUser.php">
                <span class="menu-title">Booking</span>
                <i class="mdi mdi-calendar-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksiUser.php">
                <span class="menu-title">Transaksi</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
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
                    <div class="card-body">
                    <h3><i class="mdi mdi-calendar-plus menu-icon"></i> BOOKING</h3><br>
                    <p class="card-description"> Isi form berikut untuk melakukan pemesanan tiket event. Setelah menekan button 
                        next Anda tidak dapat membatalkan transaksi.  </p>
                    <form class="forms-sample" style="width: 70rem" action="bookingProses.php" method="post">
                      <div class="form-group">
                          <?php
                            include "connectionBooking.php";
                          ?>
                        <label>ID Transaksi</label>
                        <input type="text" class="form-control" name="id_transaksi" value="<?php echo $idTransaksi; ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Event</label>
                        <select class="form-control form-control-lg" name="event">
                            <?php
                                include "connection.php";

                                $query = "SELECT id_event, nama FROM event";
                                $result = mysqli_query($connect, $query);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                            ?>
                            <option value = "<?php echo $row["id_event"]; ?>"><?php echo $row["nama"] ?></option>
                            <?php
                                    }
                                }else{
                                    echo "0 results";
                                }
                            ?>
                            </select>
                      </div>
                      <div class="form-group">
                            <?php
                                include "connection.php";

                                $query = "SELECT id_user FROM user WHERE username = '$nama'";
                                $result = mysqli_query($connect, $query);
                            ?>
                        <label>ID Pengguna</label>
                        <input type="text" class="form-control" name="id_user" value="<?php while ($row = $result->fetch_assoc()) echo $row['id_user']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga">
                    </div>
                           <a href="bookingProses.php">
                               <button type="submit" class="btn btn-outline-info btn-icon-text" name="next" value="Next" style="float: right">
                               <i class="mdi mdi-arrow-right-bold btn-icon-prepend"></i>Next</button>
                           </a>
                            <button type="reset" class="btn btn-outline-danger btn-icon-text" name="cancel" value="Cancel" style="float: left">
                            <i class="mdi mdi-close-box btn-icon-prepend"></i>Cancel</button>
                    </form>
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