<?php
    include "connection.php";

    $id_event = $_POST["myid_event"];
    $nama = $_POST["mynama"];
    $tanggal = $_POST["mytanggal"];
    $harga = $_POST["myharga"];

    $target_path = "img/";
    $gambar = $_FILES['mygambar']['name'];

    move_uploaded_file($_FILES["mygambar"]["tmp_name"], $target_path.$gambar);

        $query = "INSERT INTO event(id_event, nama, tanggal, harga, gambar)
                    VALUE ('$id_event', '$nama', '$tanggal', $harga, '$gambar')";

        if(mysqli_query($connect, $query)){
            header('Location:eventAdmin.php?message=insertsuccess');
        } else {
            header('Location:eventAdmin.php?message=insertfail');
        }

    mysqli_close($connect);
?>