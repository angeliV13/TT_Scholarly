<?php

// Getting the Path
include('path_identifier.php');
include('global_variables.php');

$title = get_title();

session_start();

if (!isset($_SESSION['id'])) header("Location: login.php");

// Show the Users Panel if ID is found

// Definintion for User Data
// USER ID, USERNAME, EMAIL, ACC_TYPE, ACCESS_LVL, ACC_STAT
$user_data = [];

// Getting the User Info
include('controller/njs_get_user_data.php');

//Is there a link?

$nav = isset($_GET['nav']) ? get_path($_GET['nav'], $user_data[3]) : get_path('dashboard', $user_data[3]); // 1st check if there is a link, if not, go to dashboard

//Getting the Appropriate Sidebar
$sidebar  = get_sidebar($user_data[3], 0);

$notification = show_notification();

$notifCount = $notification['count'];
$notifBody = $notification['body']; 

?>

  <?php include('includes/main.php') ?>

  <body>

    <?php include('header.php'); ?>

    <?php include($sidebar); ?>

    <?php include($nav); ?>

    <?php include('includes/footer.php'); ?>

  </body>

  <?php include('includes/libraries/javascript.php') ?>
  <?php include('includes/libraries/inside_javascript.php') ?>
  <script src="assets/js/table.js"></script>

  </html>
