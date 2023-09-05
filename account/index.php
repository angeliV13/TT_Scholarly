<?php

session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d');

if (!isset($_SESSION['id'])) header("Location: login.php");

include('path_identifier.php');
include('model/validationModel.php');
include('model/functionModel.php');
include('global_variables.php');
include('controller/njs_get_user_data.php');

$title = get_title();

$nav = isset($_GET['nav']) ? get_path($_GET['nav'], $user_data[3]) : get_path('dashboard', $user_data[3]); // 1st check if there is a link, if not, go to dashboard
$checkNav = isset($_GET['nav']) ? $_GET['nav'] : (in_array($_SESSION['account_type'], ['0', '1', '2', '3']) ? 'dashboard' : '');
    
$sidebar  = get_sidebar($user_data[3], 0);

$notification = show_notification();

$notifCount = $notification['count'];
$notifBody = $notification['body'];

$school = get_school();

if (isset($_GET['notif'])) 
{
    echo update_notification($_GET['notif'], $_SESSION['id']);
}


?>

  <?php include('includes/main.php') ?>

  <body onload="<?php echo $user_data[3]?>">

    <?php include('header.php'); ?>

    <?php include('views/sidebar/sidebar.php'); ?>

    <?php include($nav); //BODY ?> 

    <?php include('includes/footer.php'); ?>

  </body>

  <?php include('includes/libraries/javascript.php') ?>
  <?php include('includes/libraries/inside_javascript.php') ?>
  <?php include('modal.php') ?>
  <script src="assets/js/table.js"></script>
  <?php if ($checkNav == "dashboard" && in_array($_SESSION['account_type'], ['0', '1'])): ?>
    <script src="assets/js/dashboard.js"></script>
  <?php endif;?>
  <?php if ($checkNav == "dashboard" && in_array($_SESSION['account_type'], ['2', '3'])): ?>
    <script src="assets/js/dashboard_student.js"></script>
  <?php endif;?>

  <?php if ($checkNav == "profile-bene" OR in_array($_SESSION['account_type'], ['2', '3'])): ?>

    <script src="assets/js/editProfile.js"></script>
    <script>
    
      let my_handlers = {

        fill_provinces: function() {

          let region_code = $(this).val();
          $('#province').ph_locations('fetch_list', [{
            "region_code": region_code
          }]);

        },

        fill_cities: function() {

          let province_code = $(this).val();
          $('#city').ph_locations('fetch_list', [{
            "province_code": province_code
          }]);
        },


        fill_barangays: function() {

          let city_code = $(this).val();
          $('#barangay').ph_locations('fetch_list', [{
            "city_code": city_code
          }]);
        }
      };

      $(function() {
        $('#region').on('change click', my_handlers.fill_provinces);
        $('#province').on('change click', my_handlers.fill_cities);
        $('#city').on('change click', my_handlers.fill_barangays);

        $('#region').ph_locations({
          'location_type': 'regions'
        });
        $('#province').ph_locations({
          'location_type': 'provinces'
        });
        $('#city').ph_locations({
          'location_type': 'cities'
        });
        $('#barangay').ph_locations({
          'location_type': 'barangays'
        });

        $('#region').ph_locations('fetch_list');
      });

    </script>

  <?php endif; ?>

  </html>