<?php
// Berkas
// $dtberkas = array(
//   "key" => $upkey,
//   "kode" => "selectBerkas"
// );

// $jsonBerkas = json_encode($dtberkas);
// $sendBerkas = curlpost($url, $jsonBerkas);
// $resultBerkas = json_decode($sendBerkas, TRUE);

// Formasi
// $dtFormasi = array(
//   "key" => $upkey,
//   "kode" => "selectFormasi"
// );

// $jsonFormasi = json_encode($dtFormasi);
// $sendFormasi = curlpost($url, $jsonFormasi);
// $resultFormasi = json_decode($sendFormasi, TRUE);

// SyaratLain
// $dtSyaratLain = array(
//   "key" => $upkey,
//   "kode" => "selectSyaratLain"
// );

// $jsonSyaratLain = json_encode($dtSyaratLain);
// $sendSyaratLain = curlpost($url, $jsonSyaratLain);
// $resultSyaratLain = json_decode($sendSyaratLain, TRUE);

// Pendidikan
// $dtPendidikan = array(
//   "key" => $upkey,
//   "kode" => "selectPendidikan"
// );

// $jsonPendidikan = json_encode($dtPendidikan);
// $sendPendidikan = curlpost($url, $jsonPendidikan);
// $resultPendidikan = json_decode($sendPendidikan, TRUE);

// Jenis Kelamin
// $dtJK = array(
//   "key" => $upkey,
//   "kode" => "selectJenisKelamin"
// );

// $jsonJK = json_encode($dtJK);
// $sendJK = curlpost($url, $jsonJK);
// $resultJK = json_decode($sendJK, TRUE);
?>
<!-- <div>
  <h1>Indah</h1>
</div> -->

<!-- Detail Loker -->
<div class="modal fade mdModal" id="modalDetailLoker" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="emodalDetailLoker" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="padding: 0.5rem 1rem">
        <h5 class="modal-title" id="exampleModalLabel">Modal Lihat Loker<p id="idlokerrr" style="display: none"></p>
        </h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding-top: 0; padding-bottom: 0.5rem">
        <div class="row">
          <div class="col-12 col-xl-6 mb-12 mb-xl-12">
            <blockquote class="blockquote" style="margin: 0.5rem">
              <div class="row">
                <div class="col-12 row">
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Tanggal Buka</h6>
                    <div class="form-group" style="margin-bottom: 0">
                      <div class="input-group  date">
                        <input type="text" class="form-control form-control-sm" id="dtglbuka" name="dtglbuka" required disabled />
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-inverse-info" type="button"><i class="icon-clipboard"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Tanggal Tutup</h6>
                    <div class="form-group" style="margin-bottom: 0">
                      <div class="input-group date">
                        <input type="text" class="form-control form-control-sm" id="dtgltutup" name="dtgltutup" required disabled />
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-inverse-info" type="button"><i class="icon-clipboard"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 row">
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Kuota</h6>
                    <input type="number" class="form-control form-control-sm" id="dKuota" name="dKuota" placeholder="Kuota" value="" onkeypress="return hanyaAngka(event)" disabled>
                  </div>
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Formasi</h6>
                    <select class="form-control form-control-sm" id="dFormasi" name="dFormasi" disabled>
                      <option value="0" selected disabled>--Pilih Salah Satu--</option>
                      <?php
                      foreach ($resultFormasi as $formasi) {
                      ?>
                        <option value="<?php echo $formasi['idformasi'] ?>"><?php echo $formasi['idformasi'] . ". " . $formasi['formasi'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 row">
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Pendidikan Terakhir</h6>
                    <select name="dDidik" id="dDidik" class="form-control form-control-sm" disabled>
                      <option value="0" selected disabled>--Pilih Salah Satu--</option>
                      <?php
                      foreach ($resultPendidikan as $didik) {
                      ?>
                        <option value="<?php echo $didik['idpendidikan'] ?>"><?php echo $didik['idpendidikan'] . ". " . $didik['pendidikan'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-6 col-sm-12" style="padding-top: 10px">
                    <h6 class="font-weight-bold">Usia</h6>
                    <input type="number" class="form-control form-control-sm" id="dUsia" name="dUsia" placeholder="Usia" value="" onkeypress="return hanyaAngka(event)" disabled>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12" style="padding-top: 10px">
                  <h6 class="font-weight-bold">Dekrispsi</h6>
                  <textarea type="text" class="form-control form-control-sm" id="dDesc" name="dDesc" rows="5" placeholder="Deskripsi Pekerjaan" disabled></textarea>
                </div>
              </div>
              <div class="d-flex flex-row-reverse" style="margin-top: 10px">
                <button class="btn btn-sm btn-outline-dark" style="margin: 0 5px" onclick="editUtama()" id="edUtama">Edit</button>
                <button class="btn btn-sm btn-outline-success" style="margin: 0 5px; display: none" onclick="saveUtama()" id="svUtama">Save</button>
                <button class="btn btn-sm btn-outline-dark" style="margin: 0 5px; display: none" onclick="cancelUtama()" id="ccUtama">Cancel</button>
              </div>
            </blockquote>
          </div>
          <div class="col-12 col-xl-6 mb-12 mb-xl-12 row">
            <div class="col-12" style="padding-top: 10px">
              <blockquote class="blockquote">
                <h6 class="font-weight-bold">Jenis Kelamin</h6>
                <div class="row">

                  <?php
                  foreach ($resultJK as $jkel) {
                  ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="form-check form-check-flat form-check-info">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="djk<?php echo $jkel['idjk'] ?>" name="jk[]" value="<?php echo $jkel['idjk'] ?>" onclick="updateJk('<?php echo $jkel['idjk'] ?>')" disabled>
                          <?php echo $jkel['jk'] ?>
                          <i class="input-helper"></i>
                        </label>
                      </div>
                      <p id="contohaja"></p>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="d-flex flex-row-reverse" style="margin-top: 10px">
                  <button class="btn btn-sm btn-outline-dark" style="margin: 0 5px" onclick="editJk()" id="edJk">Edit</button>
                  <button class="btn btn-sm btn-outline-success" style="margin: 0 5px; display: none" onclick="saveJk()" id="svJk">Save</button>
                </div>
              </blockquote>
              <blockquote class="blockquote">
                <h6 class="font-weight-bold">Berkas</h6>
                <div class="row">
                  <?php
                  foreach ($resultBerkas as $berkas) {
                  ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="form-check form-check-flat form-check-info">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id=<?php echo "brks" . $berkas['idberkas'] ?> name="berkas[]" value="<?php echo $berkas['idberkas'] ?>" onclick="updateBerkas('<?php echo $berkas['idberkas'] ?>')" disabled>
                          <?php echo $berkas['berkas'] ?>
                          <i class="input-helper"></i>
                        </label>
                      </div>
                    </div>
                  <?php
                  } ?>
                </div>
                <div class="d-flex flex-row-reverse" style="margin-top: 10px">
                  <button class="btn btn-sm btn-outline-dark" style="margin: 0 5px" onclick="editBerkas()" id="edBerkas">Edit</button>
                  <button class="btn btn-sm btn-outline-success" style="margin: 0 5px; display: none" onclick="saveBerkas()" id="svBerkas">Save</button>
                </div>
              </blockquote>
            </div>
            <div class="col-12" style="padding-top: 10px">
              <blockquote class="blockquote">
                <h6 class="font-weight-bold">Syarat</h6>
                <div id="edSyaratUl">
                </div>
                <div class="d-flex flex-row-reverse" style="margin-top: 10px">
                  <button class="btn btn-sm btn-outline-dark" style="margin: 0 5px" onclick="editSyarat()" class="close" data-dismiss="modal" aria-label="Close" data-toggle='modal' data-target='#modalEditSyarat' id="edSyarat">Edit</button>
                </div>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="padding: 0.5rem 1rem">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" onclick="theContent('loker')">Close</button>
        <button type="button" class="btn btn-sm btn-info">Tambah Test</button>
      </div>
    </div>
  </div>
</div>
<!-- <div class="modal fade" id="staticBackdrop" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->
