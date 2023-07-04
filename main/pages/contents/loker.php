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
        <div class="col-12 col-xl-6 mb-12 mb-xl-12 text-right" style="padding-right: 2rem">
          <button type="button" class="btn btn-inverse-success btn-icon" data-toggle="modal" data-target="#modalILoker">
            <i class="ti-plus"></i>
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
                    echo "<td>".$rslloker['idformasi']."</td>";
                    echo "<td>".$rslloker['tglbuka']."/".$rslloker['tgltutup']."</td>";
                    echo "<td>".$rslloker['usia']."</td>";
                    echo "<td>".$rslloker['idpendidikan']."</td>";
                    echo "<td>
                            <button type='button' onclick='dtLoker(".$rslloker['idloker'].")' class='btn btn-outline-secondary btn-icon d-flex justify-content-center align-items-center' data-toggle='modal' data-target='#modalDetailLoker'>
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
}
?>