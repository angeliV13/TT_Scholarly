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
                                    <h5 class="card-title">Generate Filter</h5>
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
                                            <div class="row mb-3">
                                                <label for="app_generate" class="col-sm-12 col-form-label">Generate:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="app_generate"> 
                                                        <option selected value="">--</option>
                                                        <option selected value="1">Applicant Report</option>
                                                        <option selected value="2">Beneficiaries Report</option>
                                                        <option selected value="3">Graduates Report</option>
                                                    </select>
                                                </div>
                                            </div>

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

                                            <!-- School Name -->
                                            <div class="row mb-3">
                                                <label for="app_schoolName" class="col-sm-12 col-form-label font-bold">School Name:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="app_SchoolName">
                                                        <option selected value="">--</option>
                                                        <option value="1">BSU</option>
                                                        <option value="2">FAITH</option>
                                                        <option value="3">UP</option>
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

                                            <!-- Set Query Filter button -->
                                            <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                <button id="genrep_applicant_btn" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>

            <!-- GRAPH -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Top Scorers</span></h5>
                        <table id="dynamic_table" class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#2457</a></th>
                                    <td>Brandon Jacob</td>
                                    <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                    <td>$64</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2147</a></th>
                                    <td>Bridie Kessler</td>
                                    <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                    <td>$47</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2049</a></th>
                                    <td>Ashleigh Langosh</td>
                                    <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                    <td>$147</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Angus Grady</td>
                                    <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                    <td>$67</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">#2644</a></th>
                                    <td>Raheem Lehner</td>
                                    <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                    <td>$165</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Recent Sales -->
        </div>
        </section?>
</main><!-- End #main -->