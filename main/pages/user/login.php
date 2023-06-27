<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <!-- <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png"> -->
    <link rel="manifest" href="../../lib/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <!-- <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png"> -->
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="../../lib/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="../../lib/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="../../lib/css/style.css" rel="stylesheet">
    <style>
      body{
        background-image: url('../../lib/assets/img/bg3.jpg');
        opacity: 0.9;
        background-repeat:no-repeat;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;
        background-position:center;
      }
    </style>
  </head>
  <body style="">
    <div class="min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Silahkan Masuk ke dalam akun</p>
                  <form action="" method="post">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="../../lib/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                      </span>
                      <input class="form-control" name="uname" id="uname" type="text" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="../../lib/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                        </svg>
                      </span>
                      <input class="form-control" name="password" id="password" type="password" placeholder="Password" required>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <input class="btn btn-primary px-4" type="submit" value="Login" />
                      </div>
                      <div class="col-6 text-end">
                        <!-- <a class="btn btn-link px-0" href="./registrasi.php"  type="button">Forgot password?</a> -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                  <div>
                    <h2>Sign up</h2>
                    <p>Belum Punya Akun?</p>
                    <button class="btn btn-lg btn-outline-light mt-3" type="button">Registrasi Sekarang</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="../../lib/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../lib/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

  </body>
</html>