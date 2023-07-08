$("#login_form_a").submit(function (event) {
  event.preventDefault();
  if ($("#user_name").val() != "" && $("#password").val() != "") {
    $.ajax({
      type: "POST",
      url: "controller/accountHandler.php",
      data: {
        user_name: $("#user_name").val(),
        password: $("#password").val(),
        type: 1,
        action: 1,
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

$("#login_form_b").submit(function (event) {
  event.preventDefault();
  if ($("#user_name").val() != "" && $("#password").val() != "") {
    $.ajax({
      type: "POST",
      url: "controller/accountHandler.php",
      data: {
        user_name: $("#user_name").val(),
        password: $("#password").val(),
        type: 2,
        action: 1,
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

