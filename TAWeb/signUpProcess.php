<?php
    include "connectionSignUp.php";

    if($_POST["password"] == $_POST["validpwd"]){ //validasi password = ulangi password?
        $id_user = $_POST["id_user"];
        $nama = $_POST["nama"];
        $no_telp = $_POST["no_telp"];
        $jk = $_POST["jk"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
    
        $target_path = "img/"; // Memindahkan file foto
        $foto = $_FILES['photo']['name'];

        move_uploaded_file($_FILES['photo']['tmp_name'], $target_path.$foto);

        $level = "2";

        $query = "INSERT INTO user(id_user, nama_user, no_telp, jenisKel, username, password, gambar, level) 
        VALUE('$id_user', '$nama', '$no_telp', '$jk', '$username', '$password', '$foto', '$level')";

        if(mysqli_query($connect, $query)){
            header("Location:signUp.php?message=success");
        }else{
            header("Location:signUp.php?message=failed");
        }
    }else{
        header("Location:signUp.php?message=notvalid");
    }
?>