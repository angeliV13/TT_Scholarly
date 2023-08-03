//  Saving
$("#startExam").click(function (e) {
  Swal.fire({
    title: "Start Examination?",
    text: "Are you sure you want to start examination? Leaving the examination may affect your application. This cannot be undone",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Start",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/examSettings.php",
        data: {
          action: 3,
        },
        success: function (data) {
          if (data == "Success") {
            location.href = "index.php?nav=examination_proper";
            // Swal.fire({
            //   title: "Success!",
            //   icon: "success",
            //   html: "Upload Success",
            // });
          } else {
            console.log(data);
            Swal.fire({
              title: "Error!",
              icon: "error",
              html: data,
            });
          }
        },
      });
    }
  });

  return false;
});
