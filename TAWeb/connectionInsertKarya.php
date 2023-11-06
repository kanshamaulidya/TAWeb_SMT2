<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "db_galeri";

    $connect = mysqli_connect($hostname, $username, $password, $database);

    $row = ("SELECT id_karya FROM karya"); // Membuat id_karya
    $result = mysqli_query($connect, $row);

        $num = mysqli_num_rows($result);
        $jumlah = $num + 1;
        $time = date('dmy');
        $id_karya = "KRY". $time . $jumlah; 
?>