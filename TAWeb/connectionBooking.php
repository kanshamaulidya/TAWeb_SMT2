<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "db_galeri";

    $connect = mysqli_connect($hostname, $username, $password, $database);

    $row = ("SELECT id_transaksi FROM transaksi"); // Membuat id_transaksi
    $result = mysqli_query($connect, $row);

        $num = mysqli_num_rows($result);
        $jumlah = $num + 1;
        $time = date('dmy');
        $idTransaksi = "TRS". $time . $jumlah; 
?>