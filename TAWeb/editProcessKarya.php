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

        $query = "UPDATE karya SET nama_karya='$nama_karya', kategori='$kategori', thn_rilis='$thn_rilis', seniman='$seniman', deskripsi='$deskripsi', gambar='$gambar' WHERE id_karya='$id_karya'";

        if(mysqli_query($connect, $query)){
            header('Location:karyaAdmin.php?message=editsuccess');
        }
        else{
            header('Location:karyaAdmin.php?message=editfail');
        }
    
    mysqli_close($connect);
?>