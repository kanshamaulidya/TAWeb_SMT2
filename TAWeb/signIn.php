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
    
    <title>SIGN IN</title>
  </head>
  <body>
    <?php
      if(isset($_GET["error"])){
        $error = $_GET["error"];
      }else{
        $error= "";
      }

      if($error == "gagal"){
        echo "<script>
          var ok = confirm('Your input is wrong. Do you want to try again?');
          if(ok){
            window.location.replace('signIn.php');
          }else{
            window.location.replace('index.php');
          }
        </script>";
      }
    ?>

    <section class="vh-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 text-black">
            <div class="px-5 ms-xl-10">
              <i class="fas fa-palette fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
              <span class="h1 fw-bold mb-0">THREE GALLERY</span>
            </div>
            <div class="d-flex align-items-center h-custom px-5 ms-xl-4 mt-5 pt-5 pt-xl-4 mt-xl-n5">
              <form style="width: 23rem;" action="signInProcess.php" method="post">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign In</h3>
                <div class="form-outline mb-4">
                  <i class="fas fa-user"></i> <label class="form-label" for="form2Example18">Username</label>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="username"/>
                </div>
                <div class="form-outline mb-4">
                  <i class="fas fa-unlock-alt"></i> <label class="form-label" for="form2Example28">Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="password"/>
                </div>
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit">Submit</button>
                </div>
                <p>Don't have an account? <a href="signUp.php" class="link-info">Register here</a></p>
              </form>
            </div>
          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="img/galeri.png" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>