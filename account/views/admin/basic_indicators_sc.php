<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Scholar Indicators</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Basic Setup</li>
            <li class="breadcrumb-item">Indicators</li>
            <li class="breadcrumb-item active">Full Scholar</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-12">

                <!-- Total In Indicators -->
                <div id="totalSCIndicator" class="row mb-4 py-2">
                    <div class="col-sm-6 row position-relative">
                        <!-- Examination -->

                        <label for="inputExamIndicator_Sc" class="col-sm-4 col-form-label">
                            <h6 class="font-bold">Examination</h6>
                        </label>
                        <div class="col-sm-3">
                            <input type="number" id="inputExamIndicator_Sc" value="0" class="form-control" disabled>
                        </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                        <!-- Grade -->

                        <label for="inputGradeIndicator_Sc" class="col-sm-4 col-form-label">
                            <h6 class="font-bold">Grade</h6>
                        </label>
                        <div class="col-sm-3">
                            <input type="number" id="inputGradeIndicator_Sc" value="0" class="form-control" disabled>
                        </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                        <!-- Income -->

                        <label for="inputIncomeIndicator_Sc" class="col-sm-4 col-form-label">
                            <h6 class="font-bold">Income</h6>
                        </label>
                        <div class="col-sm-3">
                            <input type="number" id="inputIncomeIndicator_Sc" value="0" class="form-control" disabled>
                        </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                        <!-- Residency -->

                        <label for="inputResidencyIndicator_Sc" class="col-sm-4 col-form-label">
                            <h6 class="font-bold">Residency</h6>
                        </label>
                        <div class="col-sm-3">
                            <input type="number" id="inputResidencyIndicator_Sc" value="0" class="form-control" disabled>
                        </div>

                    </div>
                </div>

                <!-- Examination -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Examination</h5>
                                <button id="indicatorExaminationAdd" onclick="indicatorSCExaminationAdd()" class=" btn btn-sm btn-danger shadow-sm">
                                    Add Examination Score
                                </button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="indicatorSCExaminationTable" class="table table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Range from</th>
                                        <th class="text-center">Range to</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <!-- <td scope="row">1</td>
                                        <td>0</td>
                                        <td>100</td>
                                        <td>69</td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Income -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Income</h5>
                                <button id="indicatorIncomeAdd" onclick="indicatorSCIncomeAdd()" class=" btn btn-sm btn-danger shadow-sm">
                                    Add Income
                                </button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="indicatorSCIncomeTable" class="table table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Range from</th>
                                        <th class="text-center">Range to</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <!-- <td scope="row">1</td>
                                        <td>0</td>
                                        <td>100</td>
                                        <td>69</td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Grade -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Grade</h5>
                                <button id="indicatorGradeAdd" onclick="indicatorSCGradeAdd()" class=" btn btn-sm btn-danger shadow-sm">
                                    Add Grade
                                </button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="indicatorSCGradeTable" class="table table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Range from</th>
                                        <th class="text-center">Range to</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <tr>
                                        <!-- <td scope="row">1</td>
                                        <td>89</td>
                                        <td>100</td>
                                        <td>69</td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Residency -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Residency</h5>
                                <button id="indicatorResidencyAdd" onclick="indicatorSCResidencyAdd()" class=" btn btn-sm btn-danger shadow-sm">
                                    Add Residency
                                </button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="indicatorSCResidencyTable" class="table table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Range from</th>
                                        <th class="text-center">Range to</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" small text-center">
                                    <!-- <tr>
                                        <td scope="row">1</td>
                                        <td>Less than 1 year of stay</td>
                                        <td>69</td>
                                    </tr> -->
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