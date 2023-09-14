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
            <div class="col-lg-12">
                <div class="row">
                    <!--  Applicant Reports -->
                    <div class="col-6">
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
                                        <a class="collapsed mx-3" data-bs-target="#generate_report" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Applicants Report Content -->
                                <div id="generate_report" class="card-body">
                                    <div class="col-lg-12">
                                        <!-- Academic Year -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </div>
                                        <!-- Filter options -->
                                        <div class="row mb-1 mt-2 justify-content-between">
                                            <form id="filterScholarType" class="column position-relative">

                                                <!-- Academic Year -->
                                                <div class="row mb-3">
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
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
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="filterEducationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="filterEducationLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Senior High School</option>
                                                            <option value="1">College - Public</option>
                                                            <option value="1">College - Private</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- SCHOOL/UNIVERSITIES -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
                                                        <select class="form-select" id="filterYearLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSUr</option>
                                                            <option value="2">FAITH</option>
                                                            <option value="3">UP</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- COURSE/STRAND -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">Course/Strand :</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
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

                                                <!-- Year Level -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">Year Level:</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
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
                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Application Status:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1"></option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="filterEducationLevel" class="col-sm-5 col-form-label font-bold">Applicants Demographic:</label>
                                                    <div class="col-sm-12">
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
                                                    <label for="filterSchool" class="col-sm-5 col-form-label font-bold">Applicants Trends:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="filterSchool">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSU</option>
                                                            <option value="2">FAITH</option>
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
                    </div><!-- End Reports -->

                    <!--  Beneficiaries Reports -->
                    <div class="col-6">
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
                                        <a class="collapsed mx-3" data-bs-target="#generate_report" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Beneficiaries Report Content -->
                                <div id="generate_report" class="card-body">
                                    <div class="col-lg-12">
                                        <!-- Academic Year -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </div>
                                        <!-- Filter options -->
                                        <div class="row mb-1 mt-2 justify-content-between">
                                            <form id="filterScholarType" class="column position-relative">

                                                <!-- Academic Year -->
                                                <div class="row mb-3">
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Academic Year:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Scholarship Type:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="filterEducationLevel" class="col-sm-5 col-form-label font-bold">Educational Level:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="filterEducationLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Senior High School</option>
                                                            <option value="1">College - Public</option>
                                                            <option value="1">College - Private</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- SCHOOL/UNIVERSITIES -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">School Name:</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
                                                        <select class="form-select" id="filterYearLevel">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSUr</option>
                                                            <option value="2">FAITH</option>
                                                            <option value="3">UP</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- COURSE/STRAND -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">Course/Strand :</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
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

                                                <!-- Year Level -->
                                                <div class="row mb-3">
                                                    <label for="filterYearLevel" class="col-sm-5 col-form-label font-bold">Year Level:</label>
                                                    <div id="yearLevelContainer" class="col-sm-12">
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
                                                <!-- Scholarship Type -->
                                                <div class="row mb-3">
                                                    <label for="filterScholarType" class="col-sm-5 col-form-label">Application Status:</label>
                                                    <div class="col-sm-12" id="">
                                                        <select class="form-select" id="filterScholarType">
                                                            <option selected value="">-- </option>
                                                            <option value="1">Educational Assistance Program</option>
                                                            <option value="2">Full Scholarship Program</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education Level -->
                                                <div class="row mb-3">
                                                    <label for="filterEducationLevel" class="col-sm-5 col-form-label font-bold">Applicants Demographic:</label>
                                                    <div class="col-sm-12">
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
                                                    <label for="filterSchool" class="col-sm-5 col-form-label font-bold">Applicants Trends:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-select" id="filterSchool">
                                                            <option selected value="">-- </option>
                                                            <option value="1">BSU</option>
                                                            <option value="2">FAITH</option>
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
                    </div><!-- End Reports -->

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
                    </div><!-- End Recent Sales -->
                </div>
            </div>
        </div>
        </section?>
</main><!-- End #main -->