<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
      <h1>List of Examiners</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Applicants</li>
          <li class="breadcrumb-item active">List of Examiners</li>
        </ol>
    </div>
    <section class="section">
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">List of Applicants for Qualification Exam</h5>
                            <div class="d-flex align-items-center">
                                <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Set Filter
                                </button>
                            </div>
                        </div>
                        <div class="row mb-4 py-2 justify-content-between">
                            <form class="row position-relative">
                                <!-- Filter options -->
                                <!-- Scholarship Type -->
                                <label for="inputScholarType" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Scholarship Type:</h6>
                                </label>
                                <div class="col-sm-4" id="">
                                    <select class="form-select" id="inputScholarType">
                                        <option selected disabled value="">Choose</option>
                                        <option>Educational Assistance Program</option>
                                        <option>Full Scholarship Program</option>
                                    </select>
                                </div>

                                <!-- Education Level -->
                                <label for="inputEducationLevel" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Education Level:</h6>
                                </label>
                                <div class="col-sm-4 ">
                                    <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College - Private</option>
                                        <option>College - Public</option>
                                    </select>
                                </div>

                                <label for="inputSchool" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Name of School</h6>
                                </label>
                                <div class="col-sm-4 mt-4">
                                    <select class="form-select" id="inputSchool" onchange="updateYearLevelOptions()">
                                        <option selected disabled value="">Choose</option>
                                        <option>BSU</option>
                                        <option>FAITH</option>
                                    </select>
                                </div>

                                <!-- Year Level -->
                                <label for="inputYearLevel" class="mt-4 col-sm-2 col-form-label">
                                    <h6 class="font-bold">Year Level:</h6>
                                </label>
                                <div  id="yearLevelContainer" class="col-sm-4 mt-4" >
                                    <select class="form-select" id="inputYearLevel" >
                                        <option selected disabled value="">Choose</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLE-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Senior High School</h5>
                    <div class="d-flex align-items-center">
                        <!-- <div class="input-group mr-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search">
                            <button class="btn btn-danger" type="button" id="searchButton">
                                <i class="bi bi-search"></i>
                            </button>
                        </div> -->
                        <a class="collapsed mx-3" data-bs-target="#shs_table_view" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="shs_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name(LN, FN, MN)</th>
                                <th>Educational Level</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>School</th>
                                <th>School Type</th>
                                <th>Scholarship Type</th>
                                <th>Contact No.</th>
                                <th>Barangay</th>
                                <th>Home Address</th>
                                <th>Action</th>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Biscocho, Val Juniel Mendoza</td>
                                <td>College</td>
                                <td>1st Year</td>
                                <td>BS Information Technology</td>
                                <td>Batangas State University JPLPC-Malvar</td>
                                <td>Public</td>
                                <td>Educational Assistance</td>
                                <td>+639280653170</td>
                                <td>San Bartolome</td>
                                <td> Santo Tomas Batangas</td>
                                <td>
                                    <div class="btn-group-vertical d-flex">
                                        <!--BUTTON FOR "NOT APPLICABLE"-->
                                        <div class="btn-group" role="group">
                                            <button id="viewProfile" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                                            <div class="modal fade" id="viewProfileModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button id="viewRequirements" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewRequirementsModal">View Requirements</button>
                                            <div class="modal fade" id="viewRequirementsModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Biscocho, Val Juniel Mendoza</td>
                                <td>College</td>
                                <td>1st Year</td>
                                <td>BS Information Technology</td>
                                <td>Batangas State University JPLPC-Malvar</td>
                                <td>Public</td>
                                <td>Educational Assistance</td>
                                <td>+639280653170</td>
                                <td>San Bartolome</td>
                                <td>San Bartolome Santo Tomas Batangas</td>
                                <td>
                                    <div class="btn-group-vertical d-flex">
                                        <!--BUTTON FOR "NOT APPLICABLE"-->
                                        <div class="btn-group" role="group">
                                            <button id="viewProfile" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                                            <div class="modal fade" id="viewProfileModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button id="viewRequirements" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewRequirementsModal">View Requirements</button>
                                            <div class="modal fade" id="viewRequirementsModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <!-- TABLE-->
         <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">College</h5>
                    <div class="d-flex align-items-center">
                        <!-- <div class="input-group mr-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search">
                            <button class="btn btn-danger" type="button" id="searchButton">
                                <i class="bi bi-search"></i>
                            </button>
                        </div> -->
                        <a class="collapsed mx-3" data-bs-target="#college_table_view" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name(LN, FN, MN)</th>
                                <th>Educational Level</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>School</th>
                                <th>School Type</th>
                                <th>Scholarship Type</th>
                                <th>Contact No.</th>
                                <th>Barangay</th>
                                <th>Home Address</th>
                                <th>Action</th>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Biscocho, Val Juniel Mendoza</td>
                                <td>College</td>
                                <td>1st Year</td>
                                <td>BS Information Technology</td>
                                <td>Batangas State University JPLPC-Malvar</td>
                                <td>Public</td>
                                <td>Educational Assistance</td>
                                <td>+639280653170</td>
                                <td>San Bartolome</td>
                                <td>San Bartolome Santo Tomas Batangas</td>
                                <td>
                                    <div class="btn-group-vertical d-flex">
                                        <!--BUTTON FOR "NOT APPLICABLE"-->
                                        <div class="btn-group" role="group">
                                            <button id="viewProfile" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                                            <div class="modal fade" id="viewProfileModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button id="viewRequirements" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewRequirementsModal">View Requirements</button>
                                            <div class="modal fade" id="viewRequirementsModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Biscocho, Val Juniel Mendoza</td>
                                <td>College</td>
                                <td>1st Year</td>
                                <td>BS Information Technology</td>
                                <td>Batangas State University JPLPC-Malvar</td>
                                <td>Public</td>
                                <td>Educational Assistance</td>
                                <td>+639280653170</td>
                                <td>San Bartolome</td>
                                <td>San Bartolome Santo Tomas Batangas</td>
                                <td>
                                    <div class="btn-group-vertical d-flex">
                                        <!--BUTTON FOR "NOT APPLICABLE"-->
                                        <div class="btn-group" role="group">
                                            <button id="viewProfile" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                                            <div class="modal fade" id="viewProfileModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button id="viewRequirements" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewRequirementsModal">View Requirements</button>
                                            <div class="modal fade" id="viewRequirementsModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Certificate of Registration</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>