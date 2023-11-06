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
      
        <!-- partial -->
                    <h3 align="center">LAPORAN TRANSAKSI PENGUNJUNG THREE GALLERY</h3> <br>
                    <table class="table table-hover" style="border = 2">
                      <thead>
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Nama Event</th>
                          <th>Tanggal Event</th>
                          <th>Nama User</th>                 
                          <th>Tanggal Transaksi</th>
                          <th>Total Pembayaran</th>
                          <th>Status</th>
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
                        </tr>
                      </tbody>
                      <?php
                          }
                        }else{
                          echo "0 results";
                        }
                      ?>
                    </table>
                    <br>
                    <p><i>*printed on <?php date_default_timezone_set('Asia/Jakarta'); echo date('l, d F Y, H:i:s A'); ?></i></p>
                    <script>
                        window.print();
                    </script>
  </body>
</html>