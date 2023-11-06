<?php
    include "connection.php";

    $id_transaksi = $_GET["id_transaksi"];
    $status = "Hadir";
    $query = "UPDATE transaksi set status = '$status' WHERE id_transaksi = '$id_transaksi'";

    if(mysqli_query($connect, $query)){
        header("Location:transaksiAdmin.php?message=success");
    }else{
        header("Location:transaksiAdmin.php?message=failed");
    }
?>