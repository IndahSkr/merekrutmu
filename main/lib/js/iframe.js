function theContent(page) {
  // Swal.fire({
  //   title: page,
  //   text: "Data Tersimpan",
  //   icon: "success",
  //   // timer: 1500,
  //   // timerProgressBar: true,
  // });
  $("#content-index").load("./contents/" + page + ".php");
}
