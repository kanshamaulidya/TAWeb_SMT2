<?php
    include "connection.php";

        $id_event = $_POST["myid_event"];
        $nama = $_POST["mynama"];
        $tanggal = $_POST["mytanggal"];
        $harga = $_POST["myharga"];

        $target_path = "img/";
        $gambar = $_FILES['mygambar']['name'];
    
        move_uploaded_file($_FILES["mygambar"]["tmp_name"], $target_path.$gambar);

        $query = "UPDATE event SET nama='$nama', tanggal='$tanggal', harga = $harga, gambar='$gambar' WHERE id_event='$id_event'";

        if(mysqli_query($connect, $query)){
            header('Location:eventAdmin.php?message=editsuccess');
        }
        else{
            header('Location:eventAdmin.php?message=editfail');
        }

    mysqli_close($connect);
?>