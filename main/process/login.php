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
  <link rel="manifest" href="../lib/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="../lib/vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="../lib/css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="../lib/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="../lib/vendors/sweetalert/sweetalert2.css">
  <script src="../lib/vendors/sweetalert/sweetalert2.js"></script>

</head>

<body>
  <?php
  session_start();
  include "../lib/assets/curl/curl.php";
  include "../src/alamat.php";

  $word = $_GET['kata'];

  if ($word == "login") {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $pass = hash("sha512", $password);

    $dtLogin = array(
      "kode" => "login",
      "uname" => $uname,
      "pass" => $pass
    );

    $dtjson = json_encode($dtLogin);
    $send = curlpost($url, $dtjson);
    $result = json_decode($send, TRUE);
    $hasil = $result['status'];
    if ($hasil > 0) {
      $_SESSION['upkey'] = $uname . "/" . $password;
      $_SESSION['uname'] = $result['uname'];
      $_SESSION['iduser'] = $result['iduser'];
      $_SESSION['idlevel'] = $result['idlevel'];

      ?>
        <script>
          Swal.fire({
            title: 'Sukses',
            text: 'Login Berhasil',
            icon: 'success',
            timer: 1500,
            timerProgressBar: true
          }).then(function() {
            window.location.href = '../'
          })
        </script>
      <?php
  
    } else {
    ?>
      <script>
        Swal.fire({
          title: 'Gagal',
          text: 'Username atau Password Salah',
          text: 'Silahkan coba lagi',
          icon: 'error',
          timer: 1500,
          timerProgressBar: true
        }).then(function() {
          window.location = '../pages/user/login.php'
        })
      </script>
    <?php
    }
  }

  ?>

  <!-- <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Login Berhasil',
      icon: 'success',
      timer: 1500,
      timerProgressBar: true
    }).then(function() {
      window.location.href = '../'
    })
  </script> -->

  <!-- CoreUI and necessary plugins-->
  <script src="../lib/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="../lib/vendors/simplebar/js/simplebar.min.js"></script>
  <script>
  </script>

</body>

</html>