<?php
    include "connection.php";

    $id_user = $_POST["id_user"];
    $id_transaksi = $_POST["id_transaksi"];
    $id_event = $_POST["event"];
    $tanggal = date('Y-m-d');

    $kueri = "SELECT harga FROM event where id_event = '$id_event'";
    $hasil = mysqli_query($connect, $kueri);
    
    while($baris = $hasil->fetch_assoc()){
        $harga = $baris["harga"];
    }

    $query = "INSERT INTO transaksi(id_transaksi, id_event, id_user, tanggal, harga) 
              VALUE('$id_transaksi', '$id_event', '$id_user', '$tanggal', $harga)";

    if(mysqli_query($connect, $query)){
        header("Location:bookingContinue.php?id_transaksi=$id_transaksi");
    }else{
        header("Location:bookingUser.php?message=failed");
    }
?>