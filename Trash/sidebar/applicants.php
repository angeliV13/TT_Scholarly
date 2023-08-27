  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link" href="index.php?nav=appDashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="index.php?nav=profile_applicant">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!--  -->
      <li class="nav-item" id="reqLi" data-status = "<?= ($status['add_flag'] == 0) ? "disabled" : "" ?>">
        <a class="nav-link collapsed" id="reqBtn" href="index.php?nav=apply_applicant">
          <i class="bi bi-files"></i>
          <span>General Requirements</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Submit Application -->
      <?php if ($status['req_flag'] == 1 AND !$finishFlag): ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" id="submitApplication">
            <i class="bi bi-file-check"></i>
            <span>Submit Application</span>
          </a>
        </li><!-- End Dashboard Nav -->
      <?php endif; ?>

      <?php $scholar_type = 2;
      $scholarType = 1 + $scholar_type; ?>

      <?php if ($examAccess != null) : ?>
        <?php if ($examAccess[$scholarType] == 1 && $examAccess[0] <= $dateNow && $examAccess[1] >= $dateNow) : ?>
          <!-- Start Exam Nav -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?nav=examination">
              <i class="bi bi-person"></i>
              <span>Examination</span>
            </a>
          </li><!-- Applicants Nav -->
        <?php endif; ?>
      <?php endif; ?>

    </ul>

  </aside><!-- End Sidebar-->