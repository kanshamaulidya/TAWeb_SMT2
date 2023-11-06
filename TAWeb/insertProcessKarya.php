<?php
    include "connection.php";

        $id_karya = $_POST["myid_karya"];
        $nama_karya = $_POST["mynama"];
        $kategori = $_POST["mykategori"];
        $thn_rilis = $_POST["mytahun"];
        $seniman = $_POST["myseniman"];
        $deskripsi = $_POST["mydeskripsi"];

        $target_path = "img/";
        $gambar = $_FILES['gambar']['name'];
    
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_path.$gambar);

        $query = "INSERT INTO karya(id_karya, nama_karya, kategori, thn_rilis, seniman, deskripsi, gambar)
                    VALUE ('$id_karya', '$nama_karya', '$kategori', '$thn_rilis', '$seniman', '$deskripsi', '$gambar')";

        if(mysqli_query($connect, $query)){
            header('Location:karyaAdmin.php?message=insertsuccess');
        } else {
            header('Location:karyaAdmin.php?message=insertfail');
        }        

    mysqli_close($connect);
?>