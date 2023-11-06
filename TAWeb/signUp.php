<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styleSignIn.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <title>SIGN UP</title>
  </head>
  <body>
    <?php
      if(isset($_GET["message"])){
        $message = $_GET["message"];
      }else{
        $message= "";
      }

      if($message == "success"){
        echo "<script>alert('Successful Registration!')
                      window.location.replace('index.php');
              </script>";  
      }else if($message == "failed"){
        echo "<script>
          var ok = confirm('Failed to enter data. Do you want to try again?');
          if(ok){
            window.location.replace('signUp.php');
          }else{
            window.location.replace('index.php');
          }
        </script>";
      }else if($message == "notvalid"){
          echo "<script>
          var ok = confirm('Failed to enter data, the password you entered is not the same. Do you want to try again?');
          if(ok){
            window.location.replace('signUp.php');
          }else{
            window.location.replace('index.php');
          }
        </script>";
      }
    ?>

    <?php
        include "connectionSignUp.php";
    ?>

    <section class="vh-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 text-black">
            <div class="px-5 ms-xl-4">
              <i class="fas fa-palette fa-2x me-3 pt-5 mt-xl-0" style="color: #709085;"></i>
              <span class="h1 fw-bold mb-0">THREE GALLERY</span>
            </div>
            <div class="d-flex align-items-center h-custom px-5 ms-xl-4 mt-3 pt-5 pt-xl-1 mt-xl-n5">
              <form style="width: 45rem;" action="signUpProcess.php" method="post" enctype="multipart/form-data">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign Up</h3>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example18">ID Pengguna</label>
                  <input type="text" class="form-control form-control-lg" name="id_user" value="<?php echo $idUser?>" readonly/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example28">Nama Pengguna</label>
                  <input type="type" class="form-control form-control-lg" name="nama" placeholder="nama pengguna" required/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example38">Nomor Telepon</label>
                  <input type="tel" class="form-control form-control-lg" name="no_telp" placeholder="nomor telepon" required/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example48">Jenis Kelamin</label>
                  <div>
                      <input type="radio" name="jk" id="L" value="L" required>
                      <label for="L">Laki-Laki</label>
                  </div>
                  <div>
                      <input type="radio" name="jk" id="P" value="P" required>
                      <label for="P">Perempuan</label>
                  </div>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example58">Username</label>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="username" required/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example68">Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="password" required/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example68">Ulang Password</label>
                  <input type="password" class="form-control form-control-lg" name="validpwd" placeholder="ulangi password" required/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example38">Foto Profil</label>
                  <input type="file" class="form-control form-control-lg" name="photo" required/>
                </div>
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="img/gallery.jpg" alt="Login image" class="w-100" style="object-fit: cover; object-position: left; height: 90%; weight: 50%; margin-top: 30px">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>