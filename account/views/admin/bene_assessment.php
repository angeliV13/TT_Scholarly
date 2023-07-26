<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle">
      <h1>Assessment</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Beneficiaries</li>
          <li class="breadcrumb-item active">Assessment</li>
        </ol>
    </div>
    <!-- End Page Title -->
  <div class="container py-3">
    <div class="dropdown">
      <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Filter button <span class=" "></span></button>
      <ul class="dropdown-menu">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">JavaScript</a></li>
        <li><a href="#">jQuery</a></li>
        <li><a href="#">Bootstrap</a></li>
        <li><a href="#">Angular</a></li>
      </ul>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="header-group mb-3">
        <h5 class="card-header bg-primary" style="color:white">FOR INTERVIEW</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- Table with stripped rows -->
          <table class="table datatable table-bordered table-hover" id="viewAdmin" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Name (LN, FN, MN)</th>
                <th>Email Address</th>
                <th>School</th>
                <th>Year Level</th>
                <th>Course/Strand</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Brandon Jacob</td>
                <td>brandon@gmail.com</td>
                <td>BSU </td>
                <td>1st Year </td>
                <td>BSIT </td>
                <td>
                  <div class="btn-group-vertical d-flex">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogProfile">Check Profile</button>
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalDialogAssessment">Check Requirements</button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDialogInterview">For Interview</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- View Profile Modal -->
  <div class="modal fade" id="modalDialogProfile" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Beneficiary Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="small">
            I declare that all information we provided is true,
            correct and complete statement pursuant to the provisions of pertinent laws,
            rules and regulations of the Republic of the Philippines.
            I authorize the agency head/authorized representative to
            verify/validate the contents stated herein.
          </p>
          <h6 class="fs-3 fw-bolder text-center my-3 text-">
            Privacy Statement
          </h6>
          <p class="small">
            The City of Santo Tomas Batangas collects your personal information for the primary
            purpose of providing our services to you, providing information to our clients/or
            endorsing the same to other City of Santo Tomas Batangas department/government/private entities.
            And in accordance with the law, you are entitled to access and rectify your personal data.

            Where reasonable and practicable to do so,
            we will collect your personal information only from you.
            However, in some circumstances we may be provided with information by third parties.
            In such a case we will take reasonable steps to ensure that you are made aware
            of the information provided to us by the third party.

            In terms of security, the City of Santo Tomas Batangas takes technical
            and organizational measures to ensure that all information processed by
            personal information controller is protected from unauthorized access,
            changes or destruction.

            By registering, you are are giving your consent to process your personal information
            based on the Data Protection Policy.

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- View Assessment Requirements Modal -->
  <div class="modal fade" id="modalDialogAssessment" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Requirements</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="small">
            I declare that all information we provided is true,
            correct and complete statement pursuant to the provisions of pertinent laws,
            rules and regulations of the Republic of the Philippines.
            I authorize the agency head/authorized representative to
            verify/validate the contents stated herein.
          </p>
          <h6 class="fs-3 fw-bolder text-center my-3 text-">
            Privacy Statement
          </h6>
          <p class="small">
            The City of Santo Tomas Batangas collects your personal information for the primary
            purpose of providing our services to you, providing information to our clients/or
            endorsing the same to other City of Santo Tomas Batangas department/government/private entities.
            And in accordance with the law, you are entitled to access and rectify your personal data.

            Where reasonable and practicable to do so,
            we will collect your personal information only from you.
            However, in some circumstances we may be provided with information by third parties.
            In such a case we will take reasonable steps to ensure that you are made aware
            of the information provided to us by the third party.

            In terms of security, the City of Santo Tomas Batangas takes technical
            and organizational measures to ensure that all information processed by
            personal information controller is protected from unauthorized access,
            changes or destruction.

            By registering, you are are giving your consent to process your personal information
            based on the Data Protection Policy.

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- View Assessment Interview Modal -->
  <div class="modal fade" id="modalDialogInterview" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="small">
            I declare that all information we provided is true,
            correct and complete statement pursuant to the provisions of pertinent laws,
            rules and regulations of the Republic of the Philippines.
            I authorize the agency head/authorized representative to
            verify/validate the contents stated herein.
          </p>
          <h6 class="fs-3 fw-bolder text-center my-3 text-">
            Privacy Statement
          </h6>
          <p class="small">
            The City of Santo Tomas Batangas collects your personal information for the primary
            purpose of providing our services to you, providing information to our clients/or
            endorsing the same to other City of Santo Tomas Batangas department/government/private entities.
            And in accordance with the law, you are entitled to access and rectify your personal data.

            Where reasonable and practicable to do so,
            we will collect your personal information only from you.
            However, in some circumstances we may be provided with information by third parties.
            In such a case we will take reasonable steps to ensure that you are made aware
            of the information provided to us by the third party.

            In terms of security, the City of Santo Tomas Batangas takes technical
            and organizational measures to ensure that all information processed by
            personal information controller is protected from unauthorized access,
            changes or destruction.

            By registering, you are are giving your consent to process your personal information
            based on the Data Protection Policy.

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</main><!-- End #main -->
