<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>New Applicants</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Applicants</li>
            <li class="breadcrumb-item active">New Applicants</li>
        </ol>
    </div>
    <section class="section">
        <input type="hidden" id="applicationId" value="<?= isset($_GET['applicationId']) ? $_GET['applicationId'] : '' ?>">
        <!-- QUERY OPTION -->
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
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- Education Level -->
                                <div class="row mb-3">
                                    <label for="filterEducationLevel" class="col-sm-2 col-form-label font-bold">Educational Level:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="filterEducationLevel">

                                        </select>
                                    </div>
                                </div>

                                <!-- School Name -->
                                <div class="row mb-3">
                                    <label for="filterSchool" class="col-sm-2 col-form-label font-bold">School Name:</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="filterSchool">
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- Year Level -->
                                <div class="row mb-3">
                                    <label for="filterYearLevel" class="col-sm-2 col-form-label font-bold">Year Level:</label>
                                    <div id="yearLevelContainer" class="col-sm-10">
                                        <select class="form-select" id="filterYearLevel">
                                            
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
        </div> <!-- TAB FOR COLLEGE LEVEL-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Applicants</h5>
                    <button class="btn btn-sm btn-danger" onclick="window.print()"> <i class="bi bi-printer"></i> Print List </button>
                </div>
                <div class="table-responsive ">
                    <table id="collegeNewApplicantTable" class="table table-striped header-fixed" width="100%" cellspacing="100%">
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
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td></td>
                            <td>
                                <div class="button">
                                    <button id="setFilter" class="btn btn-sm btn-danger shadow-sm">Set Filter </button>
                                    <button class="btn btn-sm btn-danger" onclick="window.print()"> <i class="bi bi-printer"></i> Print List </button>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- DRAGGABLE -->
<script src="assets/js/mydiv.js"></script>