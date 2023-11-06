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

        <div></div>
        <div></div>
        <div></div>

    <table border="0" align="center" cellpadding="3" cellspacing="5" style="overflow: auto;">
        <?php
            include "connection.php";
            $idTransaksi = $_GET["id_transaksi"];

            $query = "SELECT e.gambar, t.id_transaksi, e.nama, e.tanggal as tglE, u.nama_user, t.tanggal as tglT, t.harga 
                      FROM transaksi t 
                      INNER JOIN event e on e.id_event = t.id_event
                      INNER JOIN user u on u.id_user = t.id_user
                      WHERE t.id_transaksi = '$idTransaksi'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
        ?>
		<tr>
			<td align="center" colspan="3"></i><i class="mdi mdi-palette"></i> THREE GALLERY'S TICKET</td>
		</tr>
    <tr>
      <td colspan="3"></td>
    </tr>
		<tr>
			<td>ID TRANSAKSI</td>
			<td>: <?php echo $row["id_transaksi"]; ?></td>
			<td rowspan="6"><?php echo "<img src='img/$row[gambar]' width='100' height='130'/>"; ?></td>
		</tr>
		<tr>
			<td>Event</td>
			<td>: <?php echo $row["nama"]; ?></td>
		</tr>
		<tr>
			<td>Tanggal Event</td>
			<td>: <?php echo $row["tglE"]; ?></td>
		</tr>
		<tr>
			<td>Nama Pengunjung</td>
			<td>: <?php echo $row["nama_user"]; ?></td>
		</tr>
		<tr>
			<td>Tanggal Transaksi</td>
			<td>: <?php echo $row["tglT"]; ?></td>
		</tr>
		<tr>
			<td>Harga Tiket</td>
			<td>: Rp. <?php echo $row["harga"]; ?></td>
		</tr>
    <tr>
    <td colspan="3"></td>
    </tr>
		<tr>
			<td colspan="3">*Tunjukkan tiket ini ke petugas untuk Check In</td>
		</tr>
    <tr>
      <td colspan="3"><p><i>*printed on <?php date_default_timezone_set('Asia/Jakarta'); echo date('l, d F Y, H:i:s A'); ?></i></p></td>
    </tr>
        <?php
                }
            }else{
                echo "0 results";
            }
        ?>
	</table>
    <script>
        window.print();
    </script>
</body>
</html>