<?php

// Getting the Path
include('path_identifier.php');

$title = get_title(0);

session_start();

if(isset($_SESSION['id'])) header("Location: index.php");

include('includes/main.php') 

?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo text-center w-auto">
                  <img class="mx-auto" src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block py-3">Thrive Thomasino Scholarly</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-3 pb-3">
                    <h5 class="card-title text-center pb-0 fs-3">Login</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form id="login_form_b" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group ">
                        <input type="inputUserName" name="username" class="form-control" id="user_name" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button id="btn_login" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12 text-center">

                      <p class="small row-cols-1 mb-0">Don't have account? <a href="pages-register.php">Create an Account now!</a></p>
                      <p class=" small mb-0"> <a href="#" id="forgotPass">Forgot Password</a> </p>
                    </div>
                    <!-- <div class="col-12 text-center">
                      <p class = " small mb-0"> <a href="pages-register.html">Forgot Password</a> </p>
                    </div> -->
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('includes/libraries/javascript.php') ?>

  <script>
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
  </script>

  <!-- Login JS -->
  <script src="assets/js/login.js"></script>

</body>

</html>
