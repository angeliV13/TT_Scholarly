$("#forgotPass").on("click", function(e){
  e.preventDefault();

  password_reset();
  
})

$("#verifyAccount").on("click", function(e){
  e.preventDefault();

  emailVerification();
});

function emailVerification(){
  password_reset(0);
}

function password_reset(type = 1){
  let titleText = (type == 1) ? "Reset Password" : "Verify Account";
  let titleHTML = (type == 1) ? "Creating a password reset code..." : "Creating a verification code...";
  Swal.fire({
    title: titleText,
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
              email: emailAdd,
              type: type
            },
            beforeSend: function(){
              Swal.fire({
                title: 'Please wait...',
                html: titleHTML,
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
                if (type == 1) password_reset();
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong! Error: ' + data,
                })
              }
            }
          })
        }
      })
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const resultValue = result.value;
      const emailAddress = resultValue.replace("Success", "");

      if (resultValue.includes("Success")){
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Please check your email for the ' + ((type == 1) ? "password reset" : "verification") + ' code.',
        }).then((result) => {
          if (result.isConfirmed){
            if (type == 1) swal_reset(resultValue);
            else emailConfirmation(emailAddress);
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

function emailConfirmation(email) {
  Swal.fire({
    html: '<p class="text-center">Please enter the code we sent to your email.</p><input type="text" id="code" class="form-control" placeholder="Enter Code" required><div class="invalid-feedback">Please enter the code we sent to your email.</div> <p class="text-center">Didn\'t receive the code? Resend in <b>5:00</b></p>',
    timer: 300000,
    timerProgressBar: true,
    willOpen: () => {
      Swal.getConfirmButton().removeAttribute('disabled')
      Swal.getCancelButton().setAttribute('disabled', 'disabled')
      timerInterval = setInterval(() => {
        const b = Swal.getHtmlContainer().querySelector('b')
        if (b) {
          const hours = Math.floor(Swal.getTimerLeft() / 3600000)
          const minutes = Math.floor((Swal.getTimerLeft() % 3600000) / 60000)
          const seconds = Math.floor((Swal.getTimerLeft() % 60000) / 1000)

          if (seconds < 10) {
            b.textContent = `${minutes}:0${seconds}`
          } else {
            b.textContent = `${minutes}:${seconds}`
          }

          if (Swal.getTimerLeft() == 0) {
            Swal.getConfirmButton().setAttribute('disabled', 'disabled')
            Swal.getCancelButton().removeAttribute('disabled')
          }
        }
      }, 100);
    },
    showCancelButton: true,
    confirmButtonText: 'Verify',
    cancelButtonText: 'Resend',
    showLoaderOnConfirm: true,
    preConfirm: (value) => {
      let code = document.getElementById("code").value;

      return new Promise((resolve) => {
        setTimeout(() => {
          if (code.trim() === '') {
            Swal.showValidationMessage(
              `Please enter the code we sent to your email.`
            )
            resolve(false);
            Swal.getCancelButton().addAttribute('disabled', 'disabled');
          } else {
            $.ajax({
              url: "controller/accountHandler.php",
              type: "POST",
              data: {
                code: code,
                email: email,
                action: 3
              },
              success: function(data) {
                console.log(data);
                if (data == "Success") {
                  resolve("Success");
                } else if (data == 'Error EC003: Token Expired') {
                  Swal.showValidationMessage(
                    `Token already expired. Please press the resend button to continue.`
                  );
                  Swal.getCancelButton().setAttribute('disabled', 'disabled');
                  resolve(false);
                } else if (data == 'Invalid Token') {
                  Swal.showValidationMessage(
                    `Error: ${data}`
                  );
                  Swal.getCancelButton().setAttribute('disabled', 'disabled');
                  resolve(false);
                }
              }
            })
          }
        }, 1000)
      });
    },
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
  }).then((result) => {
    // console.log(code);
    if (result.isConfirmed) {
      const data = result.value;

      console.log(data);

      if (data == "Success") {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Account Verified Successfully! You can now login to your account.',
          showConfirmButton: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          timer: 2000
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "login.php";
          }
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong. Please try again. Error: ' + data,
          showConfirmButton: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          timer: 2000
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            emailConfirmation(email);
          }
        })
      }

    } else if (result.dismiss === Swal.DismissReason.timer) {
      resend_email(email, 'Your token has expired. ');
    } else {
      resend_email(email);
    }
  })
}

function resend_email(email, text = '') {
  $.ajax({
    url: "controller/accountHandler.php",
    type: "POST",
    data: {
      email: email,
      action: 4
    },
    beforeSend: function() {
      Swal.fire({
        title: 'Please wait...',
        html: `${text}Resending Code`,
        allowOutsideClick: false,
        imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
        showConfirmButton: false,
        allowEscapeKey: false,
        allowEnterKey: false,
      })
    },
    success: function(data) {
      if (data == "Success") {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Code Resent Successfully! Please check your email.',
          showConfirmButton: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          timer: 2000
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            emailConfirmation(email);
          }
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong. Please register again later. Error: ' + data,
          showConfirmButton: false,
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          timer: 2000
        }).then((result) => {
          $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
              email: email,
              action: 6
            },
            success: function(data) {

            }
          })
        })
      }
    }
  })
}