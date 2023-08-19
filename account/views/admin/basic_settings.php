<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
      <h1>Settings</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Basic Setup</li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Set Academic Year</h5>
                            <div class="d-flex align-items-center">
                                <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Academic Year
                                </button>
                                <a class="collapsed mx-3" data-bs-target="#acad_table_view" data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                            </div>
                        </div>
                        <div id="acad_table_view" class="table-responsive nav-content ">

                            <!-- Table with stripped rows -->
                            <table id="acadYearTable" class="table table-bordered table-condensed table-striped datatable" width="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Academic Year</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center" style="width: 30%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <!-- Semester -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Set Semester</h5>
                            <div class="d-flex align-items-center">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <input type="radio" class="btn-check" name="semOptions" id="sem1" value="1" autocomplete="off">
                                    <label class="btn btn-outline-danger" for="sem1">1st Semester</label>

                                    <input type="radio" class="btn-check" name="semOptions" id="sem2" value="2" autocomplete="off">
                                    <label class="btn btn-outline-danger" for="sem2">2nd Semester</label>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Assessment -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Set Assessment</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#assessment_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Assessment Date</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setAssessmentTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Assessment Start Date</th>
                                        <th class="text-center">Assessment End Date</th>
                                        <th class="text-center">Target Audience</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center">Modified by</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>College EA - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="#assessment_delete_modal">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>College SC - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                            </div>
                                            <!-- Assessement Edit Modal -->
                                            <div class="modal fade" id="assessment_edit_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Assessment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Are you sure you want to make this academic year as default?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning">Make it default</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Assessment Delete Modal -->
                                            <div class="modal fade" id="assessment_delete_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Assessment?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Are you sure you want to delete this academic year?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <!-- Renewal -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Set Renewal</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#renewal_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Renewal Date</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setRenewalTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Renewal Start Date</th>
                                        <th class="text-center">Renewal End Date</th>
                                        <th class="text-center">Target Audience</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center">Modified by</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>College EA - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>College SC - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <!-- Examination -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Set Examination</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exam_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Examination Date</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setExamTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Exam Start Date</th>
                                        <th class="text-center">Exam End Date</th>
                                        <th class="text-center">Exam Time</th>
                                        <th class="text-center">Target Audience</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center">Modified by</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>30 Mins</td>
                                        <td>College EA - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>June 30, 2023</td>
                                        <td>July 31, 2023</td>
                                        <td>30 Mins</td>
                                        <td>College SC - Private</td>
                                        <td>Super Admin 1
                                            <br>
                                            <span class="small">May 6, 2023</span>
                                        </td>
                                        <td>Admin
                                            <br>
                                            <span class="small">May 7, 2023</span>
                                        </td>
                                        <td>
                                            <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                                <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="">Edit</button>
                                                <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Assessment Modal -->
    <div class="modal fade" id="assessment_add_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Assessment Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="assessmentStartDate" class="form-label col-3">Start Date</label>
                        <input type="date" class="form-control col" id="assessmentStartDate" aria-describedby="assessmentStartDate" name="assessmentStartDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="assessmentEndDate" class="form-label col-3">End Date</label>
                        <input type="date" class="form-control col" id="assessmentEndDate" aria-describedby="assessmentEndDate" name="assessmentEndDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="assessmentStartDate" class="form-label col-3">Audience</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="assessmentShsCheckBox">
                                <label class="mx-2 form-check-label" for="assessmentShsCheckBox">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPubCheckBox">
                                <label class="mx-2 form-check-label" for="assessmentColEACheckBox">
                                    College Educational Assistance - Public
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPrivCheckBox">
                                <label class="mx-2 form-check-label" for="assessmentColEACheckBox">
                                    College Educational Assistance - Private
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="assessmentColScCheckBox">
                                <label class="mx-2 form-check-label" for="assessmentColScCheckBox">
                                    College Scholars
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="addSetAssessment()">Add Assessment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Renewal Modal -->
    <div class="modal fade" id="renewal_add_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Renewal Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="renewalStartDate" class="form-label col-3">Start Date</label>
                        <input type="date" class="form-control col" id="renewalStartDate" aria-describedby="renewalStartDate" name="renewalStartDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="renewalEndDate" class="form-label col-3">End Date</label>
                        <input type="date" class="form-control col" id="renewalEndDate" aria-describedby="renewalEndDate" name="renewalEndDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="renewalStartDate" class="form-label col-3">Audience</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="renewalShsCheckBox">
                                <label class="mx-2 form-check-label" for="renewalShsCheckBox">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="renewalColEAPubCheckBox">
                                <label class="mx-2 form-check-label" for="renewalColEACheckBox">
                                    College Educational Assistance - Public
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="renewalColEAPrivCheckBox">
                                <label class="mx-2 form-check-label" for="renewalColEACheckBox">
                                    College Educational Assistance - Private
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="renewalColScCheckBox">
                                <label class="mx-2 form-check-label" for="renewalColScCheckBox">
                                    College Scholars
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="addSetRenewal()">Add Renewal</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Exam Modal -->
    <div class="modal fade" id="exam_add_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Exam Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examStartDate" class="form-label col-3">Start Date</label>
                        <input type="date" class="form-control col" id="examStartDate" aria-describedby="examStartDate" name="examStartDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examEndDate" class="form-label col-3">End Date</label>
                        <input type="date" class="form-control col" id="examEndDate" aria-describedby="examEndDate" name="examEndDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examTime" class="form-label col-3">Exam Time</label>
                        <input type="time" class="form-control col" id="examTime" aria-describedby="examTime" name="examTime">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examStartDate" class="form-label col-3">Audience</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="examShsCheckBox">
                                <label class="mx-2 form-check-label" for="examShsCheckBox">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="examColEAPubCheckBox">
                                <label class="mx-2 form-check-label" for="examColEACheckBox">
                                    College Educational Assistance - Public
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="examColEAPrivCheckBox">
                                <label class="mx-2 form-check-label" for="examColEACheckBox">
                                    College Educational Assistance - Private
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="examColScCheckBox">
                                <label class="mx-2 form-check-label" for="examColScCheckBox">
                                    College Scholars
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="addSetExam()">Add Exam</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



</main><!-- End #main -->