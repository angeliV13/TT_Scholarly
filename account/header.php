<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="<?= $website_other['icon'] ?>" alt="">
    <span class="d-none d-lg-block"><?= $website_info['header'] ?></span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <?php echo ($notifCount > 0 AND $notifCount != null) ? '<span class="badge bg-primary badge-number">' . $notifCount . '</span>' : ''; ?> 
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="max-height: 30rem; overflow-y: auto; scrollbar-width: thin;">
        <?php echo $notifBody; ?>
      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->


    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?php echo $user_info['fbImage'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['fbImage'] ?>" 
            alt="Profile" class="rounded-pill">
        <span class="d-none d-md-block dropdown-toggle ps-2">
          <?php echo isset($_SESSION) ? $_SESSION['name'] : $user_data[1]; ?>
        </span>
      </a><!-- End Profile Image Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
          <?php 
          $profileLink = "";
          if ($_SESSION['account_type'] < 2)
          {
            $profileLink = "?nav=admin-profile";
          }
          else if ($_SESSION['account_type'] == 2)
          {
            $profileLink = "?nav=profile_bene";
          }
          else if ($_SESSION['account_type'] == 3)
          {
            $profileLink = "?nav=profile_applicant";
          }
          
          ?>
          <a class="dropdown-item d-flex align-items-center" href="<?= $profileLink ?>">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" id="change_pass">
            <i class="bi bi-key"></i>
            <span>Change Password</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" id="sign_out">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
