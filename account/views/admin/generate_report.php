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
            <div class="col-lg-6">
                <div class="row">
                    <!--  Applicant Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">
                                        <i class="ri-account-circle-fill text-blue-50" style="font-size: 18px; margin-right: 8px;"></i>Applicant Report
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <!-- <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button> -->
                                        <a class="collapsed mx-3" data-bs-target="#genrep_applicant" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Applicants Report Content -->
                                <div id="genrep_applicant" class="card-body">
                                    <div class="col-lg-12">
                                        <!-- Academic Year -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </div>
                                        <!-- Filter options -->
                                        <div class="row mb-1 mt-2 justify-content-between">
                                            <form id="genrep_applicant" class="column position-relative">
                                                <!-- Academic Year -->
                                                <div class="row mb-3">
                                                    <label for="ScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="ScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">2020-2021</option>
                                                            <option value="2">2021-2022</option>
                                                            <option value="2">2022-2023</option>
                                                            <option value="2">2023-2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="ScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="ScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="educationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="educationLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">College - Private</option>
                                                            <option value="2">College - Public</option>
                                                            <option value="2">Senior Highschool</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- School Name -->
                                                <div class="row mb-3">
                                                    <label for="schoolName" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="SchoolName">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSU</option>
                                                            <option value="2">FAITH</option>
                                                            <option value="3">UP</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Year Level -->
                                                <div class="row mb-3">
                                                    <label for="yearLevel" class="col-sm-5 col-form-label font-bold">Year Level :</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
                                                        <select class="form-select" id="yearLevel">
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

                                                <!-- COURSE/STRAND -->
                                                <div class="row mb-3">
                                                    <label for="courseStrand" class="col-sm-5 col-form-label font-bold">Course/ Strand:</label>
                                                    <div id="courseStrandContainer" class="col-sm-12">
                                                        <select class="form-select" id="courseStrand">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BS Information Technology</option>
                                                            <option value="2">Computer Science</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Application Status -->
                                                <div class="row mb-3">
                                                    <label for="app_status" class="col-sm-5 col-form-label">Applicants Status:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="app_status">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Complete Requirements</option>
                                                            <option value="2">Incomplete Requirements</option>
                                                            <option value="3">Approved Applicant</option>
                                                            <option value="4">Disqualified Applicantx</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Application Demographic -->
                                                <div class="row mb-3">
                                                    <label for="app_demo" class="col-sm-9 col-form-label">Applicants Demographic:</label>
                                                    <div class="col-sm-12" id="app_demo">
                                                        <select class="form-select" id="app_status">
                                                            <option selected value="">--</option>
                                                            <option value="1">Gender</option>
                                                            <option value="2">Disability Status</option>
                                                            <option value="3">Race and Ethnicity</option>
                                                            <option value="4">Socioeconomic Background</option>
                                                            <option value="5">Religious Affiliation</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Set Query Filter button -->
                                                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                    <button id="genrep_bene" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reports -->

                    <!--  Graduating Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">
                                        <i class="ri-account-circle-fill text-blue-50" style="font-size: 18px; margin-right: 8px;"></i>Graduating Report
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <!-- <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button> -->
                                        <a class="collapsed mx-3" data-bs-target="#genrep_graduating" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Applicants Report Content -->
                                <div id="genrep_graduating" class="card-body">
                                    <div class="col-lg-12">
                                        <!-- Academic Year -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </div>
                                        <!-- Filter options -->
                                        <div class="row mb-1 mt-2 justify-content-between">
                                            <form id="genrep_graduating" class="column position-relative">
                                                <!-- Academic Year -->
                                                <div class="row mb-3">
                                                    <label for="ScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="ScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">2020-2021</option>
                                                            <option value="2">2021-2022</option>
                                                            <option value="2">2022-2023</option>
                                                            <option value="2">2023-2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="ScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="ScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="educationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="educationLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">College - Private</option>
                                                            <option value="2">College - Public</option>
                                                            <option value="2">Senior Highschool</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- School Name -->
                                                <div class="row mb-3">
                                                    <label for="schoolName" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="SchoolName">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSU</option>
                                                            <option value="2">FAITH</option>
                                                            <option value="3">UP</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Year Level -->
                                                <div class="row mb-3">
                                                    <label for="yearLevel" class="col-sm-5 col-form-label font-bold">Year Level :</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
                                                        <select class="form-select" id="yearLevel">
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

                                                <!-- COURSE/STRAND -->
                                                <div class="row mb-3">
                                                    <label for="courseStrand" class="col-sm-5 col-form-label font-bold">Course/ Strand:</label>
                                                    <div id="courseStrandContainer" class="col-sm-12">
                                                        <select class="form-select" id="courseStrand">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BS Information Technology</option>
                                                            <option value="2">Computer Science</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Application Status -->
                                                <div class="row mb-3">
                                                    <label for="bene_status" class="col-sm-5 col-form-label">Beneficiaries Status:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="bene_status">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Complete Requirements</option>
                                                            <option value="2">Incomplete Requirements</option>
                                                            <option value="3">Approved Applicant</option>
                                                            <option value="4">Disqualified Applicantx</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Application Demographic -->
                                                <div class="row mb-3">
                                                    <label for="bene_demo" class="col-sm-9 col-form-label">Beneficiaries Demographic:</label>
                                                    <div class="col-sm-12" id="app_demo">
                                                        <select class="form-select" id="bene_status">
                                                            <option selected value="">--</option>
                                                            <option value="1">Gender</option>
                                                            <option value="2">Disability Status</option>
                                                            <option value="3">Race and Ethnicity</option>
                                                            <option value="4">Socioeconomic Background</option>
                                                            <option value="5">Religious Affiliation</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Set Query Filter button -->
                                                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                    <button id="genrep_bene" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reports -->
                </div>
            </div>

            <!-- Right side -->
            <div class="col-lg-6">
                <!--  Beneficiaries Reports -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    <i class="ri-account-circle-fill text-blue-50" style="font-size: 18px; margin-right: 8px;"></i>Beneficiaries Report
                                </h5>
                                <div class="d-flex align-items-center">
                                    <!-- <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button> -->
                                    <a class="collapsed mx-3" data-bs-target="#genrep_beneficiaries" data-bs-toggle="collapse" href="#">
                                        <i class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Applicants Report Content -->
                            <div id="genrep_beneficiaries" class="card-body">
                                <div class="col-lg-12">
                                    <!-- Academic Year -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                    <!-- Filter options -->
                                    <div class="row mb-1 mt-2 justify-content-between">
                                        <form id="genrep_beneficiaries" class="column position-relative">
                                            <!-- Academic Year -->
                                            <div class="row mb-3">
                                                <label for="ScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="ScholarType">
                                                        <option selected value="">-- </option>
                                                        <option value="1">2020-2021</option>
                                                        <option value="2">2021-2022</option>
                                                        <option value="2">2022-2023</option>
                                                        <option value="2">2023-2024</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Scholarship Type -->
                                            <div class="row mb-3">
                                                <label for="ScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="ScholarType">
                                                        <option selected value="">-- </option>
                                                        <option value="1">Educational Assistance Program</option>
                                                        <option value="2">Full Scholarship Program</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Education Level -->
                                            <div class="row mb-3">
                                                <label for="educationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="educationLevel">
                                                        <option selected value="">-- </option>
                                                        <option value="1">College - Private</option>
                                                        <option value="2">College - Public</option>
                                                        <option value="2">Senior Highschool</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- School Name -->
                                            <div class="row mb-3">
                                                <label for="schoolName" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="SchoolName">
                                                        <option selected value="">-- </option>
                                                        <option value="1">BSU</option>
                                                        <option value="2">FAITH</option>
                                                        <option value="3">UP</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Year Level -->
                                            <div class="row mb-3">
                                                <label for="yearLevel" class="col-sm-5 col-form-label font-bold">Year Level :</label>
                                                <div id="yearLevelContainer" class="col-sm-12">
                                                    <select class="form-select" id="yearLevel">
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

                                            <!-- COURSE/STRAND -->
                                            <div class="row mb-3">
                                                <label for="courseStrand" class="col-sm-5 col-form-label font-bold">Course/ Strand:</label>
                                                <div id="courseStrandContainer" class="col-sm-12">
                                                    <select class="form-select" id="courseStrand">
                                                        <option selected value="">-- </option>
                                                        <option value="1">BS Information Technology</option>
                                                        <option value="2">Computer Science</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Application Status -->
                                            <div class="row mb-3">
                                                <label for="bene_status" class="col-sm-5 col-form-label">Beneficiaries Status:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="bene_status">
                                                        <option selected value="">-- </option>
                                                        <option value="1">Complete Requirements</option>
                                                        <option value="2">Incomplete Requirements</option>
                                                        <option value="3">Approved Applicant</option>
                                                        <option value="4">Disqualified Applicantx</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Application Demographic -->
                                            <div class="row mb-3">
                                                <label for="bene_demo" class="col-sm-9 col-form-label">Beneficiaries Demographic:</label>
                                                <div class="col-sm-12" id="app_demo">
                                                    <select class="form-select" id="bene_status">
                                                        <option selected value="">--</option>
                                                        <option value="1">Gender</option>
                                                        <option value="2">Disability Status</option>
                                                        <option value="3">Race and Ethnicity</option>
                                                        <option value="4">Socioeconomic Background</option>
                                                        <option value="5">Religious Affiliation</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Set Query Filter button -->
                                            <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                <button id="genrep_bene" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->

                <!--  Graduates Reports -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    <i class="ri-account-circle-fill text-blue-50" style="font-size: 18px; margin-right: 8px;"></i>Graduates Report
                                </h5>
                                <div class="d-flex align-items-center">
                                    <!-- <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button> -->
                                    <a class="collapsed mx-3" data-bs-target="#genrep_graduates" data-bs-toggle="collapse" href="#">
                                        <i class="bi bi-chevron-down ms-auto"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Applicants Report Content -->
                            <div id="genrep_graduates" class="card-body">
                                <div class="col-lg-12">
                                    <!-- Academic Year -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                        </div>
                                    </div>
                                    <!-- Filter options -->
                                    <div class="row mb-1 mt-2 justify-content-between">
                                        <form id="genrep_graduates" class="column position-relative">
                                            <!-- Academic Year -->
                                            <div class="row mb-3">
                                                <label for="ScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="ScholarType">
                                                        <option selected value="">-- </option>
                                                        <option value="1">2020-2021</option>
                                                        <option value="2">2021-2022</option>
                                                        <option value="2">2022-2023</option>
                                                        <option value="2">2023-2024</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Scholarship Type -->
                                            <div class="row mb-3">
                                                <label for="ScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="ScholarType">
                                                        <option selected value="">-- </option>
                                                        <option value="1">Educational Assistance Program</option>
                                                        <option value="2">Full Scholarship Program</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Education Level -->
                                            <div class="row mb-3">
                                                <label for="educationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="educationLevel">
                                                        <option selected value="">-- </option>
                                                        <option value="1">College - Private</option>
                                                        <option value="2">College - Public</option>
                                                        <option value="2">Senior Highschool</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- School Name -->
                                            <div class="row mb-3">
                                                <label for="schoolName" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="SchoolName">
                                                        <option selected value="">-- </option>
                                                        <option value="1">BSU</option>
                                                        <option value="2">FAITH</option>
                                                        <option value="3">UP</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Year Level -->
                                            <div class="row mb-3">
                                                <label for="yearLevel" class="col-sm-5 col-form-label font-bold">Year Level :</label>
                                                <div id="yearLevelContainer" class="col-sm-12">
                                                    <select class="form-select" id="yearLevel">
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

                                            <!-- COURSE/STRAND -->
                                            <div class="row mb-3">
                                                <label for="courseStrand" class="col-sm-5 col-form-label font-bold">Course/ Strand:</label>
                                                <div id="courseStrandContainer" class="col-sm-12">
                                                    <select class="form-select" id="courseStrand">
                                                        <option selected value="">-- </option>
                                                        <option value="1">BS Information Technology</option>
                                                        <option value="2">Computer Science</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Application Status -->
                                            <div class="row mb-3">
                                                <label for="bene_status" class="col-sm-5 col-form-label">Beneficiaries Status:</label>
                                                <div class="col-sm-12" id="">
                                                    <select class="form-select" id="bene_status">
                                                        <option selected value="">-- </option>
                                                        <option value="1">Complete Requirements</option>
                                                        <option value="2">Incomplete Requirements</option>
                                                        <option value="3">Approved Applicant</option>
                                                        <option value="4">Disqualified Applicantx</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Application Demographic -->
                                            <div class="row mb-3">
                                                <label for="bene_demo" class="col-sm-9 col-form-label">Beneficiaries Demographic:</label>
                                                <div class="col-sm-12" id="app_demo">
                                                    <select class="form-select" id="bene_status">
                                                        <option selected value="">--</option>
                                                        <option value="1">Gender</option>
                                                        <option value="2">Disability Status</option>
                                                        <option value="3">Race and Ethnicity</option>
                                                        <option value="4">Socioeconomic Background</option>
                                                        <option value="5">Religious Affiliation</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Set Query Filter button -->
                                            <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                                <button id="genrep_bene" class="btn btn-sm btn-danger shadow-sm">Generate Report</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Top Scorers</span></h5>
                        <table class="table table-borderless datatable">
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