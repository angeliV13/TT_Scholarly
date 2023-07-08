$("#forgotPass").on("click", function(e){
  e.preventDefault();

  password_reset();
  
})

function password_reset(){
  Swal.fire({
    title: 'Reset Password',
    html: '<div class="form-group"><label for="email">Email</label><input type="email" class="form-control" id="email" required></div>',
    showCancelButton: true,
    confirmButtonText: 'Send',
    showLoaderOnConfirm: true,
    preConfirm: (email) => {
      let emailAdd = $("#email").val();
      return new Promise((resolve) => {
        if (emailAdd.trim() == ""){
          Swal.showValidationMessage(
            `Please enter your email`
          )
          resolve(false);
        } else {
          $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
              action: 7,
              email: emailAdd
            },
            beforeSend: function(){
              Swal.fire({
                title: 'Please wait...',
                html: 'Creating a password reset code...',
                allowOutsideClick: false,
                imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey: false,
              })
            },
            success: function(data){
              swal.close();
              console.log(data);
              if (data == "Success"){
                resolve("Success" + emailAdd);
              } else {
                password_reset();
                Swal.showValidationMessage(
                  `Error: ${data}`
                )
              }
            }
          })
        }
      })
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const resultValue = result.value;

      if (resultValue.includes("Success")){
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Please check your email for the password reset code.',
        }).then((result) => {
          if (result.isConfirmed){
            swal_reset(resultValue);
          }
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Error' + result.value,
        })
      }
    }
  })
}

function swal_reset(resultValue){
  let email = resultValue.replace("Success", "");
  Swal.fire({
    title: 'Reset Password',
    html: '<div class="form-group"><label for="code">Code</label><input type="text" class="form-control" id="code" required></div><div class="form-group"><label for="newPassword">New Password</label><input type="password" class="form-control" id="newPassword" required></div><div class="form-group"><label for="confirmPassword">Confirm Password</label><input type="password" class="form-control" id="confirmPassword" required></div>',
    showCancelButton: true,
    confirmButtonText: 'Reset',
    showLoaderOnConfirm: true,
    preConfirm: () => {
      let code = $("#code").val();
      let newPassword = $("#newPassword").val();
      let confirmPassword = $("#confirmPassword").val();
      return new Promise((resolve) => {
        if (code == ""){
          Swal.showValidationMessage(
            `Please enter the password reset code sent to your email.`
          )
          resolve(false);
        }
        else if (newPassword == ""){
          Swal.showValidationMessage(
            `Please enter your new password.`
          )

          resolve(false);
        }
        else if (confirmPassword == ""){
          Swal.showValidationMessage(
            `Please confirm your password.`
          )

          resolve(false);
        }
        else if (newPassword != confirmPassword){
          Swal.showValidationMessage(
            `Password does not match.`
          )

          resolve(false);
        } else {
          $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
              action: 8,
              code: code,
              email: email,
              newPassword: newPassword,
              confirmPassword: confirmPassword
            },
            beforeSend: function(){
              Swal.fire({
                title: 'Please wait...',
                html: 'Resetting your password...',
                allowOutsideClick: false,
                imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey: false,
              })
            },
            success: function(data){
              if (data == "Success"){
                resolve("Success");
              }
              else{
                swal_reset(resultValue);
                Swal.showValidationMessage(
                  `Error: ${data}`
                )
              }
            }
          })
        }
      })
    },
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
  }).then((result) => {
    if (result.value == "Success"){
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'You have successfully reset your password. You can now login using your new password.',
      })
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Error' + result.value,
      })
    }
  })
}