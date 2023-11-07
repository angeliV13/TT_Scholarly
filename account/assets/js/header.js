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

$("#change_pass").on("click", function () {
  Swal.fire({
    title: "Change Password",
    html: `<input type="password" id="old_pass" class="swal2-input" placeholder="Old Password">
    <input type="password" id="new_pass" class="swal2-input" placeholder="New Password">
    <input type="password" id="new_pass2" class="swal2-input" placeholder="Confirm New Password">`,
    showCancelButton: true,
    confirmButtonText: "Change",
    preConfirm: () => {
      var old_pass = $("#old_pass").val();
      var new_pass = $("#new_pass").val();
      var new_pass2 = $("#new_pass2").val();
      if (old_pass == "" || new_pass == "" || new_pass2 == "") {
        Swal.showValidationMessage("Please fill all fields");
      } else {
        if (new_pass != new_pass2) {
          Swal.showValidationMessage("Password did not match");
        } else {
          $.ajax({
            type: "POST",
            url: "controller/accountHandler.php",
            data: {
              action: 28,
              old_pass: old_pass,
              new_pass: new_pass,
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
              }
            },
          });
        }
      }
    },
  });
});





