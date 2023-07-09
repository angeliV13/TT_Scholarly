$("#generate_ay").on("click", function (e) {
  Swal.fire({
    title: "Generate Academic Year?",
    text: "Are you sure you want to generate new academic year?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Generate",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/basicSetup.php",
        data: {
          action: 1,
        },
        success: function (data) {
          if (data == "Insert Success") {
            Swal.fire({
              title: "Success!",
              icon: "success",
              html: "Generated new academic year",
            });
          } else {
            Swal.fire({
                title: "Error!",
                icon: 'error',
                html: data,
              });
          }
        },
      });
    }
  });

  return false;
});
