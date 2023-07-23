  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php?nav=profile-bene">
          <i class="bi bi-grid"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <?php 
      $scholar_type = 2;
      $scholarType = 1 + $scholar_type;

      // if($assessmentAccess[$scholarType] == 1 &&
      //     $assessmentAccess[0] <= $dateNow &&
      //     $assessmentAccess[1] >= $dateNow){
      ?>
      <!-- Start Assessment Requirements Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?nav=assessment-bene">
          <i class="bi bi-person"></i>
          <span>Assessment</span>
        </a>
      </li><!-- Applicants Nav -->
      <?php
      // }

      // if($renewalAccess[$scholarType] == 1 &&
      //     $renewalAccess[0] <= $dateNow &&
      //     $renewalAccess[1] >= $dateNow){
      ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?nav=renewal-bene">
          <i class="bi bi-person"></i>
          <span>Renewal</span>
        </a>
      </li><!-- Applicants Nav -->
      <?php
      // }
      ?>

    </ul>

  </aside><!-- End Sidebar-->
