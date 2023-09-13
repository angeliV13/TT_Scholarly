<main id="main" class="main">
    <input type="hidden" id="applicationId" value="<?= isset($_GET['applicationId']) ? $_GET['applicationId'] : '' ?>">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>List of Examinees</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Applicants</li>
            <li class="breadcrumb-item active">List of Examinees</li>
        </ol>
    </div>
    <section class="section">
        <div class="column">
            <div class="col-lg-12">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Query Filter</h5>
                            <div class="d-flex align-items-center">

                            </div>
                        </div>
                        <!-- Filter options -->
                        <div class="row mb-1 justify-content-between">
                            <form id="filterScholar" class="column position-relative">

                                <!-- Scholarship Type -->
                                <div class="row mb-3">
                                    <label for="filterScholarType" class="col-sm-2 col-form-label">Scholarship Type:</label>
                                    <div class="col-sm-10" id="">
                                        <select class="form-select" id="filterScholarType">
                                            <option selected value="">-- </option>
                                            <option value="1">Educational Assistance Program</option>
                                            <option value="2">Full Scholarship Program</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Education Level -->
                                <div class="row mb-3">
                                    <label for="filterEducationLevel" class="col-sm-2 col-form-label font-bold">Educational Level:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="filterEducationLevel">
                                            <option selected value="">-- </option>
                                            <option value="1">Senior High School</option>
                                            <option value="1">College - Public</option>
                                            <option value="1">College - Private</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- School Name -->
                                <div class="row mb-3">
                                    <label for="filterSchool" class="col-sm-2 col-form-label font-bold">School Name:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="filterSchool">
                                            <option selected value="">-- </option>
                                            <option value="1">BSU</option>
                                            <option value="2">FAITH</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Year Level -->
                                <div class="row mb-3">
                                    <label for="filterYearLevel" class="col-sm-2 col-form-label font-bold">Year Level:</label>
                                    <div id="yearLevelContainer" class="col-sm-10">
                                        <select class="form-select" id="filterYearLevel">
                                            <option selected value="">-- </option>
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
                                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                    <button id="setFilter" class="btn btn-sm btn-danger shadow-sm">Set Query Filter </button>
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
                    <h5 class="card-title">List of Examinees</h5>
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
                    <table id="applicantExamination" class="table table-striped header-fixed" width="100%" cellspacing="100%">
                        <thead>
                            <tr class="text-center small">
                                <th>No.</th>
                                <th>Name (LN, FN)</th>
                                <th>School</th>
                                <th>School Type</th>
                                <th>Scholarship Type</th>
                                <th>Educational Level</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Contact No.</th>
                                <th>Barangay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- DRAGGABLE -->
<script src="assets/js/mydiv.js"></script>