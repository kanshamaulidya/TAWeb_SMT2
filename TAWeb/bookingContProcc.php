<?php
    include "connection.php";

    $id_transaksi = $_GET["idTransaksi"];
    $harga = $_POST["myharga"];
    
    $query = "UPDATE transaksi SET harga = $harga WHERE id_transaksi = '$id_transaksi'";

    if(mysqli_query($connect, $query)){
        header("Location:bookingUser.php?message=success");
    }else{
        header("Location:bookingUser.php?message=failed");
    }
?>