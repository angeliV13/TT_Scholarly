<?php

// Getting the Path
include('path_identifier.php');

$title = get_title();

session_start();

// Show the Users Panel if ID is found
if (isset($_SESSION['id'])) 
{
  // Definintion for User Data
  // USER ID, USERNAME, EMAIL, ACC_TYPE, ACCESS_LVL, ACC_STAT
  $user_data = [];

  // Getting the User Info
  include('controller/njs_get_user_data.php');

  //Is there a link?

  $nav = isset($_GET['nav']) ? get_path($_GET['nav'], $user_data[3]) : get_path('dashboard', $user_data[3]); // 1st check if there is a link, if not, go to dashboard

  //Getting the Appropriate Sidebar
  $sidebar  = get_sidebar($user_data[3], 0);
  

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

  </html>

<?php
  // Redirect to Login
} 
else 
{
  header("Location: login.php");
}

?>