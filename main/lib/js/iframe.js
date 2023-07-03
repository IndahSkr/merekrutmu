
function theContent(page) {
  // Swal.fire({
  //   title: page,
  //   text: "Data Tersimpan",
  //   icon: "success",
  //   // timer: 1500,
  //   // timerProgressBar: true,
  // });
  $("#content-index").load("./pages/contents/" + page + ".php");
  // window.onload("./pages/content/" + page + ".php")
}
