function dtLoker(idloker) {
  var ses = sess();
  document.getElementById("idlokerrr").innerHTML = idloker;
  let ulElement = document.createElement("ul");
  ulElement.setAttribute("id", "myUl");
  var lis = document.querySelectorAll("#myUl li");
  for (let i = 0; (li = lis[i]); i++) {
    li.parentNode.removeChild(li);
  }
  document.getElementById("edSyaratUl").appendChild(ulElement);

  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectLokerById",
      key: ses,
      idloker: idloker,
    }),
    success: function (hasil) {
      var hsl = hasil;
      // console.log(hasil[0]);
      hsl.forEach(function (d) {
        document.getElementById("dtglbuka").value = d.tglbuka;
        document.getElementById("dtgltutup").value = d.tgltutup;
        document.getElementById("dKuota").value = d.kuota;
        document.getElementById("dFormasi").selectedIndex = d.idformasi;
        document.getElementById("dDidik").selectedIndex = d.idpendidikan;
        document.getElementById("dUsia").value = d.usia;
        document.getElementById("dDesc").value = d.deskripsi;
      });

      // exampleMulti.val(["1", "2"]).trigger("change");

      $.ajax({
        url: "../side/recruit.php",
        method: "POST",
        dataType: "json",
        data: JSON.stringify({
          kode: "selectJenisKelamin",
          key: ses,
        }),
        success: function (hasil) {
          var hsl = hasil;
          // console.log(hasil[0]);
          hsl.forEach(function (d) {
            // console.log("jk" + d.idjk);
            document.getElementById("djk" + d.idjk).checked = false;
          });

          $.ajax({
            url: "../side/recruit.php",
            method: "POST",
            dataType: "json",
            data: JSON.stringify({
              kode: "selectJenisKelaminByLoker",
              key: ses,
              idloker: idloker,
            }),
            success: function (hasil) {
              var hsl = hasil;
              // console.log(hasil[0]);
              hsl.forEach(function (d) {
                // console.log("jk" + d.idjk);
                document.getElementById("djk" + d.idjk).checked = true;
              });
            },
            error: function (error) {
              alert(error);
            },
          });
        },
        error: function (error) {
          alert(error);
        },
      });

      $.ajax({
        url: "../side/recruit.php",
        method: "POST",
        dataType: "json",
        data: JSON.stringify({
          kode: "selectBerkas",
          key: ses,
        }),
        success: function (hasil) {
          var hsl = hasil;
          hsl.forEach(function (d) {
            document.getElementById("brks" + d.idberkas).checked = false;
          });

          $.ajax({
            url: "../side/recruit.php",
            method: "POST",
            dataType: "json",
            data: JSON.stringify({
              kode: "selectBerkasByLoker",
              key: ses,
              idloker: idloker,
            }),
            success: function (hasil) {
              var hsl = hasil;
              hsl.forEach(function (d) {
                document.getElementById("brks" + d.idberkas).checked = true;
              });
            },
            error: function (error) {
              alert(error);
            },
          });
        },
        error: function (error) {
          alert(error);
        },
      });

      $.ajax({
        url: "../side/recruit.php",
        method: "POST",
        dataType: "json",
        data: JSON.stringify({
          kode: "selectSyaratlainById",
          key: ses,
          idloker: idloker,
        }),
        success: function (hasil) {
          var hsl = hasil;
          hsl.forEach(function (d) {
            // document.getElementById("brks" + d.idberkas).checked = false;
            // console.log(d);
            var liElement = document.createElement("li");
            liElement.innerText = d.syarat_lain;
            ulElement.appendChild(liElement);
          });
          // console.log(hasil);
        },
        error: function (error) {
          alert(error);
        },
      });
    },
    error: function (error) {
      alert(error);
    },
  });
}

function editUtama() {
  document.getElementById("dtglbuka").disabled = false;
  document.getElementById("dtgltutup").disabled = false;
  document.getElementById("dKuota").disabled = false;
  document.getElementById("dFormasi").disabled = false;
  document.getElementById("dDidik").disabled = false;
  document.getElementById("dUsia").disabled = false;
  document.getElementById("dDesc").disabled = false;
  document.getElementById("edUtama").style.display = "none";
  document.getElementById("ccUtama").style.display = "block";
  document.getElementById("svUtama").style.display = "block";
}

function cancelUtama() {
  document.getElementById("dtglbuka").disabled = true;
  document.getElementById("dtgltutup").disabled = true;
  document.getElementById("dKuota").disabled = true;
  document.getElementById("dFormasi").disabled = true;
  document.getElementById("dDidik").disabled = true;
  document.getElementById("dUsia").disabled = true;
  document.getElementById("dDesc").disabled = true;
  document.getElementById("edUtama").style.display = "block";
  document.getElementById("ccUtama").style.display = "none";
  document.getElementById("svUtama").style.display = "none";
}

function saveUtama() {
  var ses = sess();

  var idloker = document.getElementById("idlokerrr").innerHTML;
  var tglbuka = document.getElementById("dtglbuka").value;
  var tgltutup = document.getElementById("dtgltutup").value;
  var kuota = document.getElementById("dKuota").value;
  var formasi = document.getElementById("dFormasi").selectedIndex;
  var didik = document.getElementById("dDidik").selectedIndex;
  var usia = document.getElementById("dUsia").value;
  var desc = document.getElementById("dDesc").value;

  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "updateLokerById",
      key: ses,
      idloker: idloker,
      desc: desc,
      kuota: kuota,
      idformasi: formasi,
      tglbuka: tglbuka,
      tgltutup: tgltutup,
      usia: usia,
      pendidikan: didik,
    }),
    success: function (hasil) {
      document.getElementById("dtglbuka").disabled = true;
      document.getElementById("dtgltutup").disabled = true;
      document.getElementById("dKuota").disabled = true;
      document.getElementById("dFormasi").disabled = true;
      document.getElementById("dDidik").disabled = true;
      document.getElementById("dUsia").disabled = true;
      document.getElementById("dDesc").disabled = true;
      document.getElementById("edUtama").style.display = "block";
      document.getElementById("ccUtama").style.display = "none";
      document.getElementById("svUtama").style.display = "none";
      Swal.fire({
        title: "Sukses",
        text: hasil.pesan,
        icon: "success",
        timer: 1500,
        timerProgressBar: true,
      });
    },
    error: function (error) {
      alert(error);
    },
  });
}

function editJk() {
  var ses = sess();
  // document.getElementById("djk1").checked = true;
  // document.getElementById("djk1").disabled = false;
  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectJenisKelamin",
      key: ses,
    }),
    success: function (hasil) {
      var hsl = hasil;
      // console.log(hasil[0]);
      hsl.forEach(function (d) {
        console.log("jk" + d.idjk);
        // document.getElementById("contohaja").innerHTML = document.get;
        document.getElementById("djk" + d.idjk).disabled = false;
      });
    },
    error: function (error) {
      alert(error);
    },
  });
  document.getElementById("edJk").style.display = "none";
  document.getElementById("svJk").style.display = "block";
}

function updateJk(idjk) {
  var ses = sess();
  var idloker = document.getElementById("idlokerrr").innerHTML;
  if (document.getElementById("djk" + idjk).checked == true) {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "insertLokerJk",
        key: ses,
        idloker: idloker,
        idjk: idjk,
      }),
      success: function (hasil) {
        return hasil;
      },
      error: function (error) {
        alert(error);
      },
    });
  } else {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "deleteLokerJk",
        key: ses,
        idloker: idloker,
        idjk: idjk,
      }),
      success: function (hasil) {
        return hasil;
      },
      error: function (error) {
        alert(error);
      },
    });
  }
  // console.log(idjk);
}

function saveJk() {
  var ses = sess();
  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectJenisKelamin",
      key: ses,
    }),
    success: function (hasil) {
      var hsl = hasil;
      hsl.forEach(function (d) {
        console.log("jk" + d.idjk);
        document.getElementById("djk" + d.idjk).disabled = true;
      });
    },
    error: function (error) {
      alert(error);
    },
  });

  Swal.fire({
    title: "Sukses",
    text: "Data Tersimpan",
    icon: "success",
    timer: 1500,
    timerProgressBar: true,
  });
  document.getElementById("edJk").style.display = "block";
  document.getElementById("svJk").style.display = "none";
}

function editBerkas() {
  var ses = sess();

  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectBerkas",
      key: ses,
    }),
    success: function (hasil) {
      var hsl = hasil;
      // console.log(hasil[0]);
      hsl.forEach(function (d) {
        // console.log("jk" + d.idjk);
        document.getElementById("brks" + d.idberkas).disabled = false;
      });
    },
    error: function (error) {
      alert(error);
    },
  });
  document.getElementById("edBerkas").style.display = "none";
  document.getElementById("svBerkas").style.display = "block";
}

function updateBerkas(idberkas) {
  var ses = sess();
  var idloker = document.getElementById("idlokerrr").innerHTML;
  if (document.getElementById("brks" + idberkas).checked == true) {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "insertBerkasLoker",
        key: ses,
        idloker: idloker,
        idberkas: idberkas,
      }),
      success: function (hasil) {
        return hasil;
      },
      error: function (error) {
        alert(error);
      },
    });
  } else {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "deleteBerkasLoker",
        key: ses,
        idloker: idloker,
        idberkas: idberkas,
      }),
      success: function (hasil) {
        return hasil;
      },
      error: function (error) {
        alert(error);
      },
    });
  }
}

function saveBerkas() {
  var ses = sess();

  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectBerkas",
      key: ses,
    }),
    success: function (hasil) {
      var hsl = hasil;
      // console.log(hasil[0]);
      hsl.forEach(function (d) {
        // console.log("jk" + d.idjk);
        document.getElementById("brks" + d.idberkas).disabled = true;
      });
    },
    error: function (error) {
      alert(error);
    },
  });

  Swal.fire({
    title: "Sukses",
    text: "Data Tersimpan",
    icon: "success",
    timer: 1500,
    timerProgressBar: true,
  });

  document.getElementById("edBerkas").style.display = "block";
  document.getElementById("svBerkas").style.display = "none";
}

function editSyarat() {
  var ses = sess();

  var idloker = document.getElementById("idlokerrr").innerHTML;
  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectSyaratLain",
      key: ses,
    }),
    success: function (hasil) {
      var hsl = hasil;
      hsl.forEach(function (d) {
        document.getElementById("syr" + d.idlain).checked = false;
      });
      // console.log(hasil);
    },
    error: function (error) {
      alert(error);
    },
  });

  $.ajax({
    url: "../side/recruit.php",
    method: "POST",
    dataType: "json",
    data: JSON.stringify({
      kode: "selectSyaratlainById",
      key: ses,
      idloker: idloker,
    }),
    success: function (hasil) {
      var hsl = hasil;
      hsl.forEach(function (d) {
        document.getElementById("syr" + d.idlain).checked = true;
        // console.log(d);
        // var liElement = document.createElement("li");
        // liElement.innerText = d.syarat_lain;
        // ulElement.appendChild(liElement);
      });
      // console.log(hasil);
    },
    error: function (error) {
      alert(error);
    },
  });
}

function changeSyarat(idsyarat) {
  var ses = sess();

  var idloker = document.getElementById("idlokerrr").innerHTML;
  if (document.getElementById("syr" + idsyarat).checked == true) {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "insertSyaratById",
        key: ses,
        idloker: idloker,
        idlain: idsyarat,
      }),
      success: function (hasil) {
        Swal.fire({
          title: hasil.pesan,
          text: "Data Tersimpan",
          icon: "success",
          timer: 1500,
          timerProgressBar: true,
        });
      },
      error: function (error) {
        alert(error);
      },
    });
  } else {
    $.ajax({
      url: "../side/recruit.php",
      method: "POST",
      dataType: "json",
      data: JSON.stringify({
        kode: "deleteSyaratById",
        key: ses,
        idloker: idloker,
        idlain: idsyarat,
      }),
      success: function (hasil) {
        Swal.fire({
          title: hasil.pesan,
          text: "Data Tersimpan",
          icon: "success",
          timer: 1500,
          timerProgressBar: true,
        });
      },
      error: function (error) {
        alert(error);
      },
    });
  }
}

function dtRefresh() {
  var idloker = document.getElementById("idlokerrr").innerHTML;
  dtLoker(idloker);
}
