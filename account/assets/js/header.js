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
          if (data == "No Session Found") {
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
          } else {
            window.location.href = data;
          }
        },
      });
    }
  });


  return false;
});





