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
                                <?php if($readOnly == 0) : ?>
                                <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Academic Year
                                </button>
                                <?php endif; ?>
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
                <!-- Application -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Set Application</h5>
                                <?php if($readOnly == 0) : ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#application_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Application Date</a>
                                <?php endif; ?>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setApplicationTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Application Start Date</th>
                                        <th class="text-center">Application End Date</th>
                                        <th class="text-center">Target Audience</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center">Modified by</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <!-- Assessment -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Set Assessment</h5>
                                <?php if($readOnly == 0) : ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#assessment_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Assessment Date</a>
                                <?php endif; ?>
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
                                <?php if($readOnly == 0) : ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#renewal_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Renewal Date</a>
                                <?php endif; ?>
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
                                <?php if($readOnly == 0) : ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exam_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Examination Date</a>
                                <?php endif; ?>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setExamTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Exam Start Date</th>
                                        <th class="text-center">Exam End Date</th>
                                        <th class="text-center">Exam Start Time</th>
                                        <!-- <th class="text-center">Exam End Time</th> -->
                                        <th class="text-center">Target Audience</th>
                                        <th class="text-center">Created by</th>
                                        <th class="text-center">Modified by</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Application Modal -->
    <div class="modal fade" id="application_add_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Application Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="applicationStartDate" class="form-label col-3">Start Date</label>
                        <input type="date" class="form-control col" id="applicationStartDate" aria-describedby="applicationStartDate" name="applicationStartDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="applicationEndDate" class="form-label col-3">End Date</label>
                        <input type="date" class="form-control col" id="applicationEndDate" aria-describedby="applicationEndDate" name="applicationEndDate">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="applicationStartDate" class="form-label col-3">Audience</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="applicationShsCheckBox">
                                <label class="mx-2 form-check-label" for="applicationShsCheckBox">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="applicationColEAPubCheckBox">
                                <label class="mx-2 form-check-label" for="applicationColEACheckBox">
                                    College Educational Assistance
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="applicationColScCheckBox">
                                <label class="mx-2 form-check-label" for="applicationColScCheckBox">
                                    College Scholars
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="addSetApplication()">Add Application</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

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
                                    College Educational Assistance
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
                                    College Educational Assistance
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
                        <label for="examTime" class="form-label col-3">Exam Duration Time <small>(hh:mm:ss)</small></label>
                        <input type="text" class="form-control col examTime" id="examTime" aria-describedby="examTime" name="examTime">
                    </div>
                    <!-- <div class="row d-flex align-items-center mb-2">
                        <label for="examTime" class="form-label col-3">Exam End Time</label>
                        <input type="time" class="form-control col" id="examEndTime" aria-describedby="examTime" name="examTime">
                    </div> -->
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
                                    College Educational Assistance 
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