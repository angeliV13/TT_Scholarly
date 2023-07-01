<?php

session_start();

// Show the Users Panel if ID is found
if (isset($_SESSION['id'])) {
  // Definintion for User Data
  // USER ID, USERNAME, EMAIL, ACC_TYPE, ACCESS_LVL, ACC_STAT
  $user_data = [];

  // Getting the User Info
  include('controller/njs_get_user_data.php');

  // Getting the Path
  include('path_identifier.php');

  //Is there a link?
  if (isset($_GET['nav'])) {
    // Checks if link is registered
    $nav      = get_path($_GET['nav'], $user_data[3]);
  } else {
    $nav      = get_path('dashboard', $user_data[3]);
  }
  //Getting the Appropriate Sidebar
  $sidebar  = get_sidebar($user_data[3], 0);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Thrive Thomasino Scholarly</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- JQuery and Sweet Alert -->
    <script src="assets/vendor/jquery/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script src="assets/vendor/sweet-alert/sweetalert2.js" crossorigin="anonymous"></script>


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <?php include('header.php'); ?>

    <?php include($sidebar); ?>

    <?php include($nav); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Thrive Thomasino Scholarly</span></strong>. All Rights Reserved
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

  </html>

<?php
  // Redirect to Login
} else {
  header("Location: login.html");
}

?>