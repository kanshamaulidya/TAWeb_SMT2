<?php
    include "connection.php";

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['level'] == "1"){
        session_start();
        $_SESSION["username"] = $username;
        header("Location:homeAdmin.php");
    }else if($row['level'] == "2"){
        session_start();
        $_SESSION["username"] = $username;
        header("Location:homeUser.php");
    }else{
        header("Location:signIn.php?error=gagal");
    }
?>