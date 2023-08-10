  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php?nav=dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start Applicants Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#applicants-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-account-circle-fill"></i><span>Applicants</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="applicants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?nav=new-applicants">
              <i class="bi bi-circle"></i><span><Label>List of New Applicants</Label></span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=interview">
              <i class="bi bi-circle"></i><span>For Interview</span>
            </a>
          </li>
          <!-- <li>
            <a href="index.php?nav=assessment">
              <i class="bi bi-circle"></i><span>For Assessment</span>
            </a>
          </li> -->
          <li>
            <a href="index.php?nav=examination ">
              <i class="bi bi-circle"></i><span>For Qualification Examination</span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=removed-applicants ">
              <i class="bi bi-circle"></i><span>List of Removed Applicants</span>
            </a>
          </li>
        </ul>
      </li><!-- Applicants Nav -->

      <!-- Start Beneficiaries Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#beneficiaries-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-account-circle-fill"></i><span>Current Beneficiaries</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="beneficiaries-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?nav=beneficiaries">
              <i class="bi bi-circle"></i><span>List of Beneficiaries</span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=bene-assessment">
              <i class="bi bi-circle"></i><span>For Assessment</span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=bene-renewal">
              <i class="bi bi-circle"></i><span>For Renewal</span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=removed-bene">
              <i class="bi bi-circle"></i><span>Removed Beneficiaries</span>
            </a>
          </li>
        </ul>
      </li><!-- End Beneficiaries Nav -->

      <!-- Start Graduates Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#graduate-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-contacts-fill"></i><span>Graduates</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="graduate-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?nav=graduating">
              <i class="bi bi-circle"></i><span>List of Graduating</span>
            </a>
          </li>
          <li>
            <a href="index.php?nav=graduates">
              <i class="bi bi-circle"></i><span>List of Graduates</span>
            </a>
          </li>
        </ul>
      </li><!-- End Graduates Nav -->

      <!-- Start Examination Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#examination-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-file-edit-fill"></i><span>Manage Examination</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="examination-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- <li>
            <a href="index.php?nav=exam_settings">
              <i class="bi bi-circle"></i><span>Examination Settings</span>
            </a>
          </li> -->
          <li>
            <a href="index.php?nav=exam_questions">
              <i class="bi bi-circle"></i><span>Examination Questions</span>
            </a>
          </li>
        </ul>
      </li><!-- End Examination Nav -->

      <!-- Start Reports Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-bar-chart-2-fill"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href=" ">
              <i class="bi bi-circle"></i><span>Generate Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

      <!-- Start Account Management Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#accountManagement-nav" data-bs-toggle="collapse" href=" ">
          <i class="ri-door-lock-line"></i><span>Account Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="accountManagement-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?nav=Adaccount-management ">
              <i class="bi bi-circle"></i><span>List of Accounts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

      <!-- Basic Setup Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#basicSetup-nav" data-bs-toggle="collapse" href=" ">
          <i class="ri-door-lock-line"></i><span>Basic Setup</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="basicSetup-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link collapsed" href="index.php?nav=tts_settings">
              <i class="ri-settings-line"></i><span>Settings</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" href="index.php?nav=tts_indicators_ea">
              <i class="ri-settings-line"></i><span>Educ Assistance Indicators</span>
            </a>
          </li>
          <li>
            <a class="nav-link collapsed" href="index.php?nav=tts_indicators_sc">
              <i class="ri-settings-line"></i><span>Full Scholar Indicators</span>
            </a>
          </li>
        </ul>


      </li><!-- End Basic Setup Nav -->

      <li class="nav-heading">Account Information</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?nav=admin-profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- End Profile Page Nav  -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li> -->
      <!-- End F.A.Q Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> -->
      <!-- End Contact Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> -->
      <!-- End Register Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li> -->
      <!-- End Login Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li> -->
      <!-- End Error 404 Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li> -->
      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->