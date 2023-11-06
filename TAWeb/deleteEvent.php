<?php 
    include "connection.php";

    $id_event = $_GET["id_event"];

    $query = "DELETE FROM event WHERE id_event='$id_event'";

    if(mysqli_query($connect, $query)){
        header('Location:eventAdmin.php');
    }
    else{
        echo "Data gagal dihapus <br>";
        mysqli_error($connect);
    }
    mysqli_close();
?>