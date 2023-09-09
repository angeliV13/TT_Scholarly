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
        } else if (data == '5') {
          changePassword($("#user_name").val());
        } else {
          Swal.fire({
            title: "Error!",
            text: data,
            icon: "error",
            confirmButtonText: "Ok",
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
  if ($("#password").val() != "") {
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
        } else if(data.substring(0, 1) == 'l'){
          window.location.href = data;
        } else if (data == '5') {
          changePassword($("#user_name").val());
        } else{
          Swal.fire({
            title: "Error!",
            text: data,
            icon: "error",
            confirmButtonText: "Ok",
          });
        }
      },
    });
  } else {
    $("#login_form").validate();
  }


  return false;
});

function changePassword(userName){
  Swal.fire({
    title: 'Please Change Your Password',
    html: `<input type="password" id="new_password" class="swal2-input" placeholder="New Password">
    <input type="password" id="confirm_password" class="swal2-input" placeholder="Confirm Password">`,
    confirmButtonText: 'Change',
    focusConfirm: false,
    preConfirm: () => {
      if($("#new_password").val() == "" || $("#confirm_password").val() == ""){
        Swal.showValidationMessage(
          `Please fill all fields!`
        )
      } else if($("#new_password").val() != $("#confirm_password").val()){
        Swal.showValidationMessage(
          `Password does not match!`
        )
      } else{
        $.ajax({
          type: "POST",
          url: "controller/accountHandler.php",
          data: {
            user_name: userName,
            password: $("#new_password").val(),
            action: 22,
          },
          success: function (data) {
            if (data == "Success") {
              Swal.fire({
                title: "Success!",
                text: "Password successfully changed! Please login again.",
                icon: "success",
                confirmButtonText: "Ok",
              }).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              });
            } else {
              Swal.fire({
                title: "Error!",
                text: data,
                icon: "error",
                confirmButtonText: "Ok",
              });
            }
          },
        });
      }
    }
  })
}







