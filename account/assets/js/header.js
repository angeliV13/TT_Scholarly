$("#sign_out").click(function () {
  Swal.fire({
    title: "Sign Out",
    text: "Are you sure you want to sign out?",
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Sign out",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controller/accountHandler.php",
        data: {
          action: 5,
        },
        success: function (data) {
<<<<<<< Updated upstream
          if (data == "No Session Found") {
=======
          if (data == "Success") {
            window.location.href = "index.php";
          } else {
>>>>>>> Stashed changes
            Swal.fire({
              title: "Alert!",
              html: data,
              timer: 2500,
              timerProgressBar: true,
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "index.php";
              }else{
                window.location.href = "index.php";
              }
            });
<<<<<<< Updated upstream
          } else {
            window.location.href = data;
=======
>>>>>>> Stashed changes
          }
        },
      });
    }
  });

  return false;
});
