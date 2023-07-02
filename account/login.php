<?php

// Getting the Path
include('path_identifier.php');

$title = get_title(0);

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

                  <form id="login_form" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="user_name" required>
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
                      <p class=" small mb-0"> <a href="pages-register.html">Forgot Password</a> </p>
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

  <!-- Login JS -->
  <script src="assets/js/login.js"></script>

</body>

</html>