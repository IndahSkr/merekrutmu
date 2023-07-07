<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./lib/vendors/icons/ti-icons/css/themify-icons.css" />
  <style>

    td {
      white-space: normal !important;
    }
  </style>
</head>
<body>
  <?php
session_start();
if (!isset($_SESSION['upkey'])) {
  header("location:../user/login.php");
}else{
  include "../../lib/assets/curl/curl.php";
  include "../../src/alamat.php";
  $upkey = $_SESSION['upkey'];
  $username = $_SESSION['uname'];
  $iduser = $_SESSION['iduser'];
  $idlevel = $_SESSION['idlevel'];

  // All Loker
  $dtloker = array(
    "key" => $upkey,
    "kode" => "selectLoker"
  );

  $jsonloker = json_encode($dtloker);
  $sendloker = curlpost($url, $jsonloker);
  $resultlokter = json_decode($sendloker, TRUE);

  // print_r($resultlokter);
?>
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-6 mb-12 mb-xl-12">
          <h3 class="font-weight-bold">List Loker</h3>
        </div>
        <div class="col-12 col-xl-6 mb-12 mb-xl-12 text-end" style="padding-right: 2rem">
          <button type="button" class="btn btn-outline-success btn-icon" data-coreui-toggle="modal" data-coreui-target="#modalILoker">
            <i class="ti-plus"></i>
          </button>
          <button type="button" class="btn btn-primary"  data-coreui-toggle='modal' data-coreui-target='#modalDetailLoker'>
            Launch static backdrop modal
          </button>
          <button type='button' onclick='dtLoker("1")' class='btn btn-outline-secondary btn-icon d-flex justify-content-center align-items-center' data-coreui-toggle='modal' data-coreui-target='#modalDetailLoker' >
            <i class='ti-eye'></i>
          </button>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-sm table-bordered table-striped wrap" width="100%" style="white-space:normal;" >
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Kuota</th>
                    <th>Formasi</th>
                    <th>Tanggal Buka/Tanggal Tutup</th>
                    <th>Max Usia</th>
                    <th>Pendidikan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($resultlokter as $rslloker) {
                    echo "<tr style='line-height: 1.5rem;'>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$rslloker['kuota']."</td>";
                    echo "<td>".$rslloker['formasi']."</td>";
                    echo "<td>".$rslloker['tglbuka']."/".$rslloker['tgltutup']."</td>";
                    echo "<td>".$rslloker['usia']."</td>";
                    echo "<td>".$rslloker['pendidikan']."</td>";
                    echo "<td>
                            <button type='button' onclick='dtLoker(".$rslloker['idloker'].")' class='btn btn-outline-secondary btn-icon d-flex justify-content-center align-items-center' data-coreui-toggle='modal' data-coreui-target='#modalDetailLoker' >
                              <i class='ti-eye'></i>
                            </button>
                          </td>";
                    echo "</tr>";
                    $no++;
                  }
                  ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php
 include "../components/modal.php";
}

?>
<script src="./lib/js/table.js"></script>
</body>
</html>
