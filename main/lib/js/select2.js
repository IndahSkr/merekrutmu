(function ($) {
  "use strict";

  if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();
  }
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }
})(jQuery);

$(".selectDua")
  .select2({
    tags: true,
  })
  .on("change", function (e) {
    var ses = sess();
    var isNew = $(this).find('[data-select2-tag="true"');
    // console.log(isNew);
    if (isNew.length && $.inArray(isNew.val(), $(this).val()) !== -1) {
      $.ajax({
        url: "../../../side/recruit.php",
        method: "POST",
        data: JSON.stringify({
          syarat_lain: isNew.val(),
          kode: "insertSyaratLain",
          key: ses,
        }),
        success: function (hasil) {
          // console.log(hasil);
          const myData = JSON.parse(hasil);
          if (myData.status == 1) {
            // element.append(
            //   '<option value="' + myData.id + '">' + new_category + "</option>"
            // );
            // console.log(myData.status);
            isNew.replaceWith(
              '<option selected value="' +
                myData.id +
                '">' +
                isNew.val() +
                "</option>"
            );
          }
        },
        error: function (error) {
          alert(error);
        },
      });
    }
  });
