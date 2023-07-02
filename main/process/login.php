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

  <!-- CoreUI and necessary plugins-->
  <script src="../lib/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="../lib/vendors/simplebar/js/simplebar.min.js"></script>
  <script>
  </script>

</body>

</html>