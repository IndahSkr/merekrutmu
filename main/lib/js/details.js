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
    url: "../../../side/recruit.php",
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
        url: "../../../side/recruit.php",
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
            url: "../../../side/recruit.php",
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
        url: "../../../side/recruit.php",
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
            url: "../../../side/recruit.php",
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
        url: "../../../side/recruit.php",
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
