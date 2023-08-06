  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index.php?nav=profile_applicant.php">
          <i class="bi bi-grid"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php $scholar_type = 2; $scholarType = 1 + $scholar_type; ?>

      <?php if ($examAccess != null): ?>
        <?php if ($examAccess[$scholarType] == 1 && $examAccess[0] <= $dateNow && $examAccess[1] >= $dateNow): ?>
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