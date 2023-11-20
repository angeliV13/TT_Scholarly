  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
          <?php if ($_SESSION['account_type'] == 0 or $_SESSION['account_type'] == 1) : ?>
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
                      <li>
                          <a href="index.php?nav=examinee_list">
                              <i class="bi bi-circle"></i><span>List of Examinees</span>
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
                          <a href="index.php?nav=generate_report">
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
                          <?php if ($_SESSION['account_type'] == 0) : ?>
                              <a href="index.php?nav=manage_account_admin">
                                  <i class="bi bi-circle"></i><span>Admin Accounts</span>
                              </a>
                          <?php endif; ?>
                          <a href="index.php?nav=manage_account_student">
                              <i class="bi bi-circle"></i><span>Student Accounts</span>
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
                          <a class="nav-link collapsed" href="index.php?nav=sch_settings">
                              <i class="ri-settings-line"></i><span>School Settings</span>
                          </a>
                      </li>
                      <li>
                          <a class="nav-link collapsed" href="index.php?nav=web_settings">
                              <i class="ri-settings-line"></i><span>Website Settings</span>
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
                      <li>
                          <a class="nav-link collapsed" href="index.php?nav=ntf_settings">
                              <i class="ri-settings-line"></i><span>Notification Management</span>
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
          <?php elseif ($_SESSION['account_type'] >= 2) : ?>
              <li class="nav-item">
                  <a class="nav-link" href="index.php?nav=dashboard">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link collapsed" href="index.php?<?php echo ($_SESSION['account_type'] == 2) ? 'nav=profile_bene' : 'nav=profile_applicant'; ?>">
                      <i class="bi bi-person"></i>
                      <span>Profile</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <?php if ($_SESSION['account_type'] == 2) : ?>

                  <?php 
                    $access = 1 + $scholarType; ?>

                  <?php if ($assessmentAccess != null) : ?>

                      <?php if (($assessmentAccess[$access] == 1 && $assessmentAccess[0] <= $dateNow && $assessmentAccess[1] >= $dateNow)  && $status['status'] == 1) : ?>
                          <!-- Start Assessment Requirements Nav -->
                          <li class="nav-item">
                              <a class="nav-link collapsed" href="index.php?nav=assessment-bene">
                                  <i class="bi bi-person"></i>
                                  <span>Assessment</span>
                              </a>
                          </li><!-- Applicants Nav -->
                      <?php endif; ?>

                  <?php endif; ?>

                  <?php if ($renewalAccess != null) : ?>

                      <?php if (($renewalAccess[$access] == 1 && $renewalAccess[0] <= $dateNow && $renewalAccess[1] >= $dateNow) && $status['status'] == 2) : ?>

                          <li class="nav-item">
                              <a class="nav-link collapsed" href="index.php?nav=renewal-bene">
                                  <i class="bi bi-person"></i>
                                  <span>Renewal</span>
                              </a>
                          </li><!-- Applicants Nav -->
                      <?php endif; ?>

                  <?php endif; ?>
              <?php endif; ?>

              <?php if ($_SESSION['account_type'] == 3) : ?>
                  <?php 
                    $access = 1 + $scholarType; 
                  ?>
                  <?php if (isset($applicationAccess)) : ?>
                      <?php if (($applicationAccess[$access] == 1 && $applicationAccess[0] <= $dateNow && $applicationAccess[1] >= $dateNow) && $status['add_flag'] == 1) : ?>
                          <!--  -->
                          <li class="nav-item" id="reqLi" data-status="<?= (($status['add_flag'] == 0) ? "disabled" : "") ?>">
                              <a class="nav-link collapsed" id="reqBtn" href="<?= (($status['add_flag'] == 0) ? "index.php" : "index.php?nav=apply-applicant") ?>">
                                  <i class="bi bi-files"></i>
                                  <span>General Requirements</span>
                              </a>
                          </li><!-- End Dashboard Nav -->
                      <?php endif; ?>
                  <?php endif; ?>
                  <!-- Submit Application -->
                  <?php if ($status['req_flag'] == 1 and !$finishFlag) : ?>
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="#" id="submitApplication">
                              <i class="bi bi-file-check"></i>
                              <span>Submit Application</span>
                          </a>
                      </li><!-- End Dashboard Nav -->
                  <?php endif; ?>

                  <?php if (isset($applicationAccess)) : ?>
                    <?php $access = 2;
                        $access = $access + $scholarType;?>
                      <?php if (($examAccess[$access] == 1 && $examAccess[0] <= $dateNow && $examAccess[1] >= $dateNow ) && $status['status'] == 2) : ?>
                          <!-- Start Exam Nav -->
                          <li class="nav-item">
                              <a class="nav-link collapsed" href="index.php?nav=examination">
                                  <i class="bi bi-person"></i>
                                  <span>Examination</span>
                              </a>
                          </li><!-- Applicants Nav -->
                      <?php endif; ?>
                  <?php endif; ?>
              <?php endif; ?>
          <?php endif; ?>
      </ul>
  </aside><!-- End Sidebar-->