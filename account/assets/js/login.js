$("#login_form").submit(function (event) {
  event.preventDefault();
  if ($("#user_name").val() != "" && $("#password").val() != "") {
    $.ajax({
      type: "POST",
      url: "controller/login.php",
      data: {
        user_name: $("#user_name").val(),
        password: $("#password").val(),
        type: 2,
      },
      success: function (data) {
        if (data == "Success") {
          window.location.href = "index.php";
        } else {
          Swal.fire({
            title: "Error!",
            text: data,
            icon: "error",
            confirmButtonText: "Noted",
          });
        }
      },
    });
  } else {
    $("#login_form").validate();
  }

  return false;
});
