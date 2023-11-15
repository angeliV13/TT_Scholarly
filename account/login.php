<?php

// Getting the Path
include('path_identifier.php');
include('model/functionModel.php');
include('global_variables.php');

$title = $website_info['header'];

session_start();

if (isset($_SESSION['id'])) header("Location: index.php");

include('includes/main.php')

?>

<body class="hero justify-content-start align-items-start section-bg body-bg" id="hero">
  <main>
    <!-- Start of Page Title -->
    <div class="pagetitle d-none">
      <h1>Login</h1>
    </div>
    <!-- End Page Title -->
    <div class="container">
      <section id="about" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 login-bg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center">
                <a href="index.php" class="logo text-center w-auto">
                  <!-- <img class="mx-auto" src="<?= $website_other['icon'] ?>" alt=""> -->
                  <span id="logo" class="d-none d-lg-block py-3"><?= $website_info['header'] ?></span>
                </a>
              </div>
              <!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-3 pb-3">
                    <h5 class="card-title text-center pb-0 fs-3">LOGIN</h5>
                    <p class="text-center small" style="margin-bottom: 20px;">Enter your username & password to login</p>
                  </div>

                  <form id="login_form_b" method="post" class="row g-3">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group ">
                        <input type="inputUserName" name="username" class="form-control" id="user_name">
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control mb-2" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                      <input style="margin-bottom: 20px; margin-top: 20px;" type="checkbox" onclick="showPassword()"> Show Password
                    </div>

                    <div class="col-12">
                      <button id="btn_login" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12 text-center" style="margin-bottom: 0px;">
                      <p class="small row-cols-1 mb-0">Don't have an account?</p>
                      <p class="small pt-2"><a href="pages-register.php">Create an Account now!</a></p>

                      <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 20px;">
                        <p class="small row-cols-1 mb-0"><a href="#" id="verifyAccount">Verify Account</a></p>
                        <span style="margin: 5px;"></span><!-- Adjust the margin value as needed -->
                        <p class="small mb-0"><a href="#" id="forgotPass">Forgot Password</a></p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Image Column (Hidden on Mobile) -->
            <div class="col-xl-6 col-lg-6 d-flex d-sm-none d-md-block justify-content-end align-items-center pt-5 px-lg-5">  
              <!-- Add your image code here -->
              <img src="assets/img/tts logo with txt.png" alt="" height="500px" width="500px" style="position: relative;">
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('includes/libraries/javascript.php') ?>

  <!-- Login JS -->
  <script src="assets/js/login.js"></script>
  <script src="assets/js/forgot.js"></script>
  <script>
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "input";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>

</html>