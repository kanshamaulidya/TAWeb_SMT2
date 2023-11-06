<?php 
    include  "connection.php";

    $id_karya = $_GET["id_karya"];

    $query = "DELETE FROM karya WHERE id_karya='$id_karya'";

    if(mysqli_query($connect, $query)){
        header('Location:karyaAdmin.php');
    } else {
        echo "Data gagal dihapus <br>" . mysqli_error($connect);
    }

    mysqli_close();
?>