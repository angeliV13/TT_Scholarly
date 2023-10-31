<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Generate Report</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <!-- Applicants -->
            <div class="col-lg-12">
                <!--  Applicant Reports -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="mx-3" data-bs-target="#genrep_applicant" data-bs-toggle="collapse" href="#" aria-expanded="false">
                                    <h5 class="card-title">Generate List</h5>
                                    <div class="d-flex justify-content-ce align-items-center">
                                        <a class="collapsed mx-3" data-bs-target="#genrep_applicant" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <!--  Report Content -->
                            <div id="genrep_applicant" class="card-body collapse">
                                <div class="col-lg-12">
                                    <!-- Filter options -->
                                    <div class="row mb-1 mt-2 justify-content-between">
                                        <div class="column position-relative">

                                            <!-- REPORT  -->
                                            <div class="row col-sm-12 mb-3">
                                                <label for="app_generate" class="col-sm-12 col-form-label">Generate:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="app_generate" required> 
                                                        <option selected value="">--</option>
                                                        <option value="1">Applicant Report</option>
                                                        <option value="2">Beneficiaries Report</option>
                                                        <option value="3">Graduates Report</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Filter for Applicant / Beneficiaries / Graduates -->
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- Academic Year -->
                                                <div class="row mb-3">
                                                    <label for="app_ay" class="col-sm-12 col-form-label">Academic Year:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_ay">
                                                            <option selected value="">--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Semester -->
                                                <div class="row mb-3">
                                                    <label for="app_sem" class="col-sm-12 col-form-label">Semester:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_sem">
                                                            <option selected value="">--</option>
                                                            <option value="1">1st</option>
                                                            <option value="2">2nd</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="app_scholarType" class="col-sm-12 col-form-label">Scholarship Type:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_scholarType">
                                                            <option selected value="">--</option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="app_educLevel" class="col-sm-12 col-form-label font-bold">Educational Level:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_educLevel">
                                                            <option selected value="">--</option>
                                                            <option value="1">College - Private</option>
                                                            <option value="2">College - Public</option>
                                                            <option value="2">Senior Highschool</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                                <!-- School Name -->
                                                <div class="row mb-3">
                                                    <label for="app_schoolName" class="col-sm-12 col-form-label font-bold">School Name:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_SchoolName">
                                                            <option selected value="">--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Year Level -->
                                                <div class="row mb-3">
                                                    <label for="app_yearLevel" class="col-sm-12 col-form-label font-bold">Year Level :</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
                                                        <select class="form-select" id="app_yearLevel">
                                                            <option selected value="">--</option>
                                                            <option value="1">1st Year</option>
                                                            <option value="2">2nd Year</option>
                                                            <option value="3">3rd Year</option>
                                                            <option value="4">4th Year</option>
                                                            <option value="5">5th Year</option>
                                                            <option value="11">Grade 11</option>
                                                            <option value="12">Grade 12</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- COURSE/STRAND -->
                                                <div class="row mb-3">
                                                    <label for="app_courseStrand" class="col-sm-12 col-form-label font-bold">Course/ Strand:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="app_courseStrand">
                                                            <option selected value="">--</option>
                                                            <option value="1">BS Information Technology</option>
                                                            <option value="2">Computer Science</option>
                                                            <option value="3">Science, Technology, Engineering, and Mathematics Strand (STEM)</option>
                                                            <option value="4">Accountancy, Business and Management Strand (ABM)</option>
                                                            <option value="5">Humanities and Social Sciences Strand (HUMSS)</option>
                                                            <option value="6">General Academic Strand (GAS)</option>
                                                            <option value="7">Information and Communications Technology (ICT) Strand</option>
                                                            <option value="8">Sports Track</option>
                                                            <option value="9">Technical-Vocational-Livelihood (TVL) Track</option>
                                                            <option value="10">Arts and Design Track (ADT)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Application Status -->
                                                <div class="row mb-3">
                                                    <label for="app_status" class="col-sm-12 col-form-label">Status:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="app_status">
                                                            <option selected value="">--</option>
                                                            <option value="1">Complete Requirements</option>
                                                            <option value="2">Incomplete Requirements</option>
                                                            <option value="3">Approved Applicant</option>
                                                            <option value="4">Disqualified Applicant</option>
                                                            <option value="5">For Review</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Set Query Filter button -->
                                            <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                <button id="genrep_list_btn" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>

            <!-- Table -->
            <div class="col-12 d-none" id="table_div">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title" id="table_name"></h5>
                        <table id="dynamic_table" class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Recent Sales -->
        </div>
        </section?>
</main><!-- End #main -->