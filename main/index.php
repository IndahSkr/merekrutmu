<?php
session_start();
if (!isset($_SESSION['upkey'])) {
  header("location:./pages/user/login.php");
} else {
  $upkey = $_SESSION['upkey'];
  $username = $_SESSION['uname'];
  $iduser = $_SESSION['iduser'];
  $idlevel = $_SESSION['idlevel'];
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- <base href="./"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Merekrutmu</title>
    

    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="./lib/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="./lib/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="./lib/css/style.css" rel="stylesheet">

    <!-- inject: themify -->
    <link rel="stylesheet" href="./lib/vendors/@coreui/icons/ti-icons/css/themify-icons.css" />

    <!-- inject: select2 -->
    <link rel="stylesheet" href="./lib/vendors/select2/select2.min.css">

    <!-- Datetimepicker -->
    <link rel="stylesheet" href="./lib/vendors/datetimepicker/css/bootstrap-datetimepicker.css">

    <!-- inject: sweetalert -->
    <link rel="stylesheet" href="./lib/vendors/sweetalert/sweetalert2.css">
    <script src="./lib/vendors/sweetalert/sweetalert2.js"></script>

    <link rel="stylesheet" href="./lib/vendors/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./lib/vendors/datatables/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./lib/vendors/datatables/datatables-buttons/css/buttons.bootstrap4.min.css">
      
  </head>

  <body onload="theContent('dashboard')">

    <?php
    include "./pages/components/sidebar.php"
    ?>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <?php include "./pages/components/header.php" ?>
      <div class="embed-responsive" id="content-index" style="padding: 1rem">
      </div>
   
      <footer class="footer">
        <!-- <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div> -->
      </footer>
      <?php
        include "./pages/components/modal.php"
      ?>
    </div>

    

    <script src="./lib/jquery/jquery-3.4.1.min.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="./lib/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="./lib/vendors/simplebar/js/simplebar.min.js"></script>

    <script type="text/javascript">
      function sess(){
        return "<?php echo $upkey ?>"
      }
    </script>

    <!-- inject select2 -->
    <script src="./lib/vendors/select2/select2.min.js"></script>
    <script src="./lib/js/select2.js"></script>

    <!-- datetimepicker -->
    <script src="./lib/vendors/moment/moment.min.js"></script>
    <script src="./lib/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Table -->
    <script src="./lib/vendors/datatables/datatables/jquery.dataTables.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./lib/vendors/jszip/jszip.min.js"></script>
    <script src="./lib/vendors/pdfmake/pdfmake.min.js"></script>
    <script src="./lib/vendors/pdfmake/vfs_fonts.js"></script>
    <script src="./lib/vendors/datatables/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./lib/vendors/lib/datatables/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./lib/vendors/datatables/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="./lib/js/iframe.js"></script>
    <script src="./lib/js/table.js"></script>
    <script src="./lib/js/details.js"></script>
    <script src="./lib/js/modal.js"></script>
    <script src="./lib/js/datepicker.js"></script>

  </body>

  </html>
<?php
}
?>