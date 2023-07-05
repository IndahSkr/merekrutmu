<?php
include "./koneksi.php";
$dtpos = json_decode(file_get_contents('php://input'), true);
$kode = $dtpos['kode'];

if ($kode == "login") {
    $uname = $dtpos['uname'];
    $pass = $dtpos['pass'];
    $sql = "SELECT iduser, username, idlevel from tbuser where username=? AND password=?";
    $query = $koneksi->prepare($sql);
    $query->bind_param("ss", $uname, $pass);
    $query->bind_result($iduser, $username, $idlevel);
    $query->execute();

    $query->store_result();
    $result = $query->num_rows;

    if ($result==1) {
        $data = array();
        while ($row = $query->fetch()) {
            $data = array(
                "status" => 1,
                "result" => $result,
                "uname" => $username,
                "iduser" => $iduser,
                "idlevel" => $idlevel
            );
        }
        
    }else {
        $data = array(
            "status" => 0,
            "pesan"=>"Login Gagal"
        );
    }
} elseif ($kode == "registrasi") {
    $nmlkp = $dtpos['nmlkp'];
    $nik = $dtpos['nik'];
    $nohp = $dtpos['nohp'];
    $uname = $dtpos['uname'];
    
    $pass = $dtpos['pass'];
    $foto = $dtpos['foto'];
    $level = $dtpos['level'];

    $sql = "INSERT INTO tbuser (iduser, nmlkp, username, nik, nohp, password, foto, idlevel) VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
    $query = $koneksi->prepare($sql);
    $query->bind_param("sssssss", $nmlkp, $uname, $nik, $nohp, $pass, $foto, $level);
    
    if ($query->execute()) {
        $data = array(
            "status" => 1,
            "pesan" => "Berhasil Menyimpan"
        );
    }else {
        $data = array(
            "status" => 0,
            "pesan" => "Gagal Menyimpan"
        );
    }
} elseif ($kode == "searchUsername") {
    $username = $dtpos['uname'];
    $sql = "SELECT count(username) as jumlah from tbuser where username = ?";
    $query = $koneksi->prepare($sql);
    $query->bind_param("s", $username);

    if ($query->execute()) {
        $result = $query->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data = array(
                "jumlah" => $row['jumlah']
            );
        }
    }else {
        $data = array(
            "jumlah" => 0
        );
    }
} elseif ($kode == "searchNik") {
    $nik = $dtpos['nonik'];
    $sql = "SELECT count(nik) as jumlah from tbuser where nik = ?";
    $query = $koneksi->prepare($sql);
    $query->bind_param("s", $nik);

    if ($query->execute()) {
        $result = $query->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data = array(
                "jumlah" => $row['jumlah']
            );
        }
    }else {
        $data = array(
            "jumlah" => 0
        );
    }
} elseif ($kode == "selectLokerAll") {
    $sql = "SELECT * From tbloker a
            join tbformasi c
            on a.idformasi = c.idformasi
            join tbpendidikan d
            on a.idpendidikan = d.idpendidikan
            join loker_slain e
            on a.idloker = e.idloker";
    $query = $koneksi->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push(
            $data, array(
                "idloker" => $row['idloker'],
                "deskripsi" => $row['deskripsi'],
                "kuota" => $row['kuota'],
                "idformasi" => $row['idformasi'],
                "formasi" => $row['formasi'],
                "logo" => $row['logo'],
                "tglbuka" => $row['tglbuka'],
                "tgltutup" => $row['tgltutup'],
                "usia" => $row['usia'],
                "idpendidikan" => $row['idpendidikan'],
                "pendidikan"=> $row['pendidikan'],
                "idlain" => $row['idlain']
            )
            );
    }
} elseif ($kode == "selectJkJoinLoker") {
    $idloker = $dtpos['idloker'];
    $sql = "SELECT a.idjk, jk, idlokerjk, idloker from tbjk a
            join loker_jk b 
            on a.idjk = b.idjk 
            where b.idloker =?";
            
    $query = $koneksi->prepare($sql);
    $query->bind_param("s", $idloker);
    // $query->bind_result($idjk, $jk, $idlokerjk, $idloker);
    $query->execute();
    // $query->store_result();
    $result = $query->get_result();
    $data = array();
    // $hasil = $query->num_rows;

    while ($row = $result->fetch_assoc()) {
        array_push(
            $data, array(
                "idjk" => $row['idjk'],
                "jk" => $row['jk'],
                "idlokerjk" => $row['idlokerjk'],
                "idloker" => $row['idloker']
            )
        );
    }
} elseif ($kode == "selectSyaratByLoker") {
    $idloker = $dtpos['idloker'];
    $sql = "SELECT * from tbsyaratlain t
            join loker_slain b
            on t.idlain = b.idlain
            where b.idloker = ?";
            
    $query = $koneksi->prepare($sql);
    $query->bind_param("s", $idloker);
    $query->execute();

    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        array_push(
            $data, array(
                "idlain" => $row['idlain'],
                "syaratLain" => $row['syarat_lain'],
                "idlokerslain" => $row['idloker_slain'],
                "idloker" => $row['idloker']
            )
        );
    }
} else {
    $key = explode("/", $dtpos['key']);
    $uname = $key[0];
    $password = $key[1];
    $pass = hash("sha512", $password);

    $sql = "SELECT iduser from tbuser where username=? and password=?";

    $query = $koneksi->prepare($sql);
    $query->bind_param("ss", $uname, $pass);
    $query->execute();
    $iduser = $query->get_result();

    if ($query) {
        if ($kode == "nullRow") {
            $iduser = $dtpos['iduser'];
            $sql = "SELECT 
                        ((case when iduser is null then 1 else 0 end)
                        + (case when nmlkp is null then 1 else 0 end)
                        + (case when username is null then 1 else 0 end)
                        + (case when tgllhr is null then 1 else 0 end)
                        + (case when nik is null then 1 else 0 end)
                        + (case when email is null then 1 else 0 end)
                        + (case when nohp is null then 1 else 0 end)
                        + (case when foto is null then 1 else 0 end)
                        + (case when password is null then 1 else 0 end)
                        + (case when idjk is null then 1 else 0 end)
                        + (case when idpendidikan is null then 1 else 0 end)
                        + (case when idlevel is null then 1 else 0 end)
                        + (case when alamat is null then 1 else 0 end)
                        + (case when iddesa is null then 1 else 0 end)
                        + (case when idkecamatan is null then 1 else 0 end)
                        + (case when idkabupaten is null then 1 else 0 end)
                        + (case when idprovinsi is null then 1 else 0 end)
                        + (case when idstatus is null then 1 else 0 end)
                        + (case when idagama is null then 1 else 0 end)) as jumlah_null
                        from tbuser
                        where iduser=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $iduser);

            if ($query->execute()) {
                $result = $query->get_result();
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data = array(
                        "jumlah" => $row['jumlah_null']
                    );
                }
            }else {
                $data = array(
                    "jumlah" => 0
                );
            }
        } elseif ($kode == "selectLoker") {
            $sql = "SELECT idloker, deskripsi, kuota, a.idformasi, formasi, tglbuka, tgltutup, usia, a.idpendidikan, pendidikan from tbloker a join tbformasi b on a.idformasi = b.idformasi join tbpendidikan c on a.idpendidikan = c.idpendidikan ";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "idloker" => $row['idloker'],
                        "deskripsi" => $row['deskripsi'],
                        "kuota" => $row['kuota'],
                        "idformasi" => $row['idformasi'],
                        "formasi" => $row['formasi'],
                        "tglbuka" => $row['tglbuka'],
                        "tgltutup" => $row['tgltutup'],
                        "usia" => $row['usia'],
                        "idpendidikan" => $row['idpendidikan'],
                        "pendidikan" => $row['pendidikan']
                    )
                    );
            }
        } elseif ($kode == "insertLoker") {
            $desc = $dtpos['desc'];
            $kuota = $dtpos['kuota'];
            $idformasi = $dtpos['idformasi'];
            $tglbuka = $dtpos['tglbuka'];
            $tgltutup = $dtpos['tgltutup'];
            $usia = $dtpos['usia'];
            $idpendidikan = $dtpos['pendidikan'];

            $sql = "INSERT INTO tbloker (idloker, deskripsi, kuota, idformasi, tglbuka, tgltutup, usia, idpendidikan) values (Null, ?, ?, ?, ?, ?, ?, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("sssssss", $desc, $kuota, $idformasi, $tglbuka, $tgltutup, $usia, $idpendidikan);
            
            if ($query->execute()) {
                $lastId = $koneksi->insert_id;
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil",
                    "idloker" => $lastId
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan",
                    "idloker" => 0
                );
            }
        } elseif ($kode == "selectLokerById") {
            $idloker = $dtpos['idloker'];
            $sql = "SELECT idloker, deskripsi, kuota, idformasi, tglbuka, tgltutup, usia, idpendidikan from tbloker where idloker=?";
            $query = $koneksi ->prepare($sql);
            $query->bind_param("s", $idloker);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()){
                array_push(
                    $data, array(
                        "idloker" => $row['idloker'],
                        "deskripsi" => $row['deskripsi'],
                        "kuota" => $row['kuota'],
                        "idformasi" => $row['idformasi'],
                        "tglbuka" => $row['tglbuka'],
                        "tgltutup" => $row['tgltutup'],
                        "usia" => $row['usia'],
                        "idpendidikan" => $row['idpendidikan']
                    )
                    );
            }
        } elseif ($kode == "updateLokerById") {
            $idloker = $dtpos['idloker'];
            $desc = $dtpos['desc'];
            $kuota = $dtpos['kuota'];
            $idformasi = $dtpos['idformasi'];
            $tglbuka = $dtpos['tglbuka'];
            $tgltutup = $dtpos['tgltutup'];
            $usia = $dtpos['usia'];
            $idpendidikan = $dtpos['pendidikan'];

            $sql = "UPDATE tbloker set deskripsi=?, kuota=?, idformasi=?, tglbuka=?, tgltutup=?, usia=?, idpendidikan=? where idloker=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ssssssss", $desc, $kuota, $idformasi, $tglbuka, $tgltutup, $usia, $idpendidikan, $idloker);

            if($query->execute()){
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal"
                );
            }
        } elseif ($kode == "selectPhoto") {
            $iduser = $dtpos['iduser'];

            $sql = "SELECT foto from tbuser where iduser = ?";

            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $iduser);
            $query->execute();
            $result = $query->get_result();
            $data = array();

            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "foto" => $row['foto']
                    )
                );
            }
        } elseif ($kode == "selectUserById") {
            $iduser = $dtpos['iduser'];

            $sql = "SELECT * from tbuser where iduser = ?";

            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $iduser);
            $query->execute();
            $result = $query->get_result();
            $data = array();

            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data,
                    array(
                        "nmlkp" => $row['nmlkp'],
                        "username" => $row['username'],
                        "tgllhr" => $row['tgllhr'],
                        "nik" => $row['nik'],
                        "email" => $row['email'],
                        "nohp" => $row['nohp'],
                        "foto" => $row['foto'],
                        "idjk" => $row['idjk'],
                        "idpendidikan" => $row['idpendidikan'],
                        "idstatus" => $row['idstatus'],
                        "idagama" => $row['idagama']
                    )
                );
            }
        } elseif ($kode == "insertUserSyarat") {
            $idsyarat = $dtpos['idsyarat'];
            $idloker = $dtpos['idloker'];

            $sql = "INSERT INTO loker_slain (idloker_slain, idloker, idlain) values (Null, ?, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idsyarat);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan"
                );
            }
        } elseif ($kode == "selectPendidikan") {
            $sql = "SELECT * from tbpendidikan";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data,
                    array(
                        "idpendidikan" => $row['idpendidikan'],
                        "pendidikan" => $row['pendidikan']
                    )
                );
            }
        } elseif ($kode == "selectAgama") {
            $sql = "SELECT * from tbagama";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data,
                    array(
                        "idagama" => $row['idagama'],
                        "agama" => $row['agama']
                    )
                );
            }
        } elseif ($kode == "selectStatus") {
            $sql = "SELECT * from tbstatus";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data,
                    array(
                        "idstatus" => $row['idstatus'],
                        "status" => $row['status']
                    )
                );
            }
        } elseif ($kode == "selectBerkas") {
            $sql = "SELECT * FROM tbberkas";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()){
                array_push(
                    $data, array(
                        "idberkas" => $row['idberkas'],
                        "berkas" => $row['nmberkas']
                    )
                    );
            }
        } elseif ($kode == "selectBerkasByLoker") {
            $idloker = $dtpos['idloker'];

            $sql = "SELECT idbklk, idloker, idberkas FROM berkas_loker where idloker=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $idloker);
            $query->execute();
            $result = $query->get_result();
            $data = array();

            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "idbklk" => $row['idbklk'],
                        "idloker" => $row['idloker'],
                        "idberkas" => $row['idberkas']
                    )
                    );
            }
        } elseif ($kode == "insertBerkasLoker") {
            $idberkas = $dtpos['idberkas'];
            $idloker = $dtpos['idloker'];

            $sql = "INSERT INTO berkas_loker (idbklk, idberkas, idloker) values (Null, ?, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idberkas, $idloker);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan"
                );
            }
        } elseif ($kode == "deleteBerkasLoker") {
            $idberkas = $dtpos['idberkas'];
            $idloker = $dtpos['idloker'];

            $sql = "DELETE FROM berkas_loker where idloker=? and idberkas=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idberkas);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan"
                );
            }
        } elseif ($kode == "selectFormasi") {
            $sql = "SELECT * FROM tbformasi";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "idformasi" => $row['idformasi'],
                        "formasi" => $row['formasi']
                    )
                    );
            }
        } elseif ($kode == "selectSyaratLain") {
            $sql = "SELECT * FROM tbsyaratlain";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "idlain" => $row['idlain'],
                        "syarat_lain" => $row['syarat_lain']
                    )
                    );
            }
        } elseif ($kode == "insertSyaratLain") {
            $syarat_lain = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $dtpos['syarat_lain']);

            $sql = "INSERT INTO tbsyaratlain (idlain, syarat_lain) values (Null, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $syarat_lain);

            if ($query->execute()) {
                $lastId = $koneksi->insert_id;
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan",
                    "id" => $lastId
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan",
                    "id" => 0
                );
            }
        } elseif ($kode == "selectSyaratlainById") {
            $idloker = $dtpos['idloker'];
            $sql = "SELECT a.idloker_slain, a.idloker, a.idlain, b.syarat_lain from loker_slain a
                    join tbsyaratlain b on a.idlain = b.idlain where idloker=?";
            $query = $koneksi ->prepare($sql);
            $query->bind_param("s", $idloker);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()){
                array_push(
                    $data, array(
                        "id" => $row['idloker_slain'],
                        "idloker" => $row['idloker'],
                        "idlain" => $row['idlain'],
                        "syarat_lain" => $row['syarat_lain']
                    )
                    );
            }
        } elseif ($kode == "insertSyaratById") {
            $idloker = $dtpos['idloker'];
            $idlain = $dtpos['idlain'];

            $sql = "INSERT INTO loker_slain (idloker_slain, idloker, idlain) values (Null, ?, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idlain);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan"
                );
            }
        } elseif ($kode == "deleteSyaratById") {
            $idloker = $dtpos['idloker'];
            $idlain = $dtpos['idlain'];

            $sql = "DELETE from loker_slain WHERE idloker=? AND idlain=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idlain);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Sukses"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal"
                );
            }
        } elseif ($kode == "selectJenisKelamin") {
            $sql = "SELECT * FROM tbjk";
            $query = $koneksi->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push(
                    $data, array(
                        "idjk" => $row['idjk'],
                        "jk" => $row['jk']
                    )
                    );
            }
        } elseif ($kode == "selectJenisKelaminByLoker") {
            $idloker = $dtpos['idloker'];
            $sql = "SELECT idlokerjk, idloker, idjk from loker_jk where idloker=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("s", $idloker);
            $query->execute();
            $result = $query->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()){
                array_push(
                    $data, array(
                        "idlokerjk" => $row['idlokerjk'],
                        "idloker" => $row['idloker'],
                        "idjk" => $row['idjk']
                    )
                    );
            }
        } elseif ($kode == "insertLokerJk") {
            $idjk = $dtpos['idjk'];
            $idloker = $dtpos['idloker'];

            $sql = "INSERT INTO loker_jk (idlokerjk, idloker, idjk) values (Null, ?, ?)";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idjk);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Berhasil Menyimpan"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal Menyimpan"
                );
            }
        } elseif ($kode == "deleteLokerJk") {
            $idloker = $dtpos['idloker'];
            $idjk = $dtpos['idjk'];

            $sql = "DELETE from loker_jk WHERE idloker=? AND idjk=?";
            $query = $koneksi->prepare($sql);
            $query->bind_param("ss", $idloker, $idjk);

            if ($query->execute()) {
                $data = array(
                    "status" => 1,
                    "pesan" => "Sukses"
                );
            } else {
                $data = array(
                    "status" => 0,
                    "pesan" => "Gagal"
                );
            }
        }
    }
}

$koneksi = null;
echo json_encode($data);
?>