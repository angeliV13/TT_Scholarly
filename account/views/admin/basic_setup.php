<main id="main" class="main">
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
                            <table id="acadYearTable" class="table datatable table-striped" width="100%">
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
                            <table id="setAssessmentTable" class="table table-striped" width="100%" cellspacing="100%">
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Renewal Date</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped" width="200%" cellspacing="200%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th>No</th>
                                        <th>Renewal Start Date</th>
                                        <th>Renewal End Date</th>
                                        <th>Target Audience</th>
                                        <th>Created by</th>
                                        <th>Modified by</th>
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Examination Date</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped" width="200%" cellspacing="200%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th>No</th>
                                        <th>Exam Start Date</th>
                                        <th>Exam End Date</th>
                                        <th>Exam Time</th>
                                        <th>Target Audience</th>
                                        <th>Created by</th>
                                        <th>Modified by</th>
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

    <!-- Acad Year Add Assessment Modal -->
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
                                <input class="form-check-input" type="checkbox" value="" id="shsCheckBox">
                                <label class="mx-2 form-check-label" for="shsCheckBox">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="colEAPubCheckBox">
                                <label class="mx-2 form-check-label" for="colEACheckBox">
                                    College Educational Assistance - Public
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="colEAPrivCheckBox">
                                <label class="mx-2 form-check-label" for="colEACheckBox">
                                    College Educational Assistance - Private
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="colScCheckBox">
                                <label class="mx-2 form-check-label" for="colScCheckBox">
                                    College Scholars
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="addSetAssessment()">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Acad Year Make Default Modal -->
    <!-- <div class="modal fade" id="ay_default_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make default?</h5>
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
    </div> -->

    <!-- Acad Year Delete Modal -->
    <!-- <div class="modal fade" id="ay_delete_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete?</h5>
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
    </div> -->



</main><!-- End #main -->