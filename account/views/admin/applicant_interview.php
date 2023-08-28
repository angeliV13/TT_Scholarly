<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>List of Interviewees</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Applicants</li>
            <li class="breadcrumb-item active">List of Interviewees</li>
        </ol>
    </div>
    <section class="section">
        <input type="hidden" id="applicationId" value="<?= isset($_GET['applicationId']) ? $_GET['applicationId'] : '' ?>">
        <!-- QUERY OPTION -->
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Query Filter</h5>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="row mb-1 justify-content-between">
                            <form class="row position-relative">
                                <!-- Filter options -->
                                <!-- Scholarship Type --> <label for="inputScholarType" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Scholarship Type:</h6>
                                </label>
                                <div class="col-sm-4" id=""> <select class="form-select" id="inputScholarType">
                                        <option selected disabled value="">Choose</option>
                                        <option>Educational Assistance Program</option>
                                        <option>Full Scholarship Program</option>
                                    </select> </div> <!-- Education Level --> <label for="inputEducationLevel" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Education Level:</h6>
                                </label>
                                <div class="col-sm-4 "> <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College - Private</option>
                                        <option>College - Public</option>
                                    </select> </div> <label for="inputSchool" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Name of School</h6>
                                </label>
                                <div class="col-sm-4 mt-4"> <select class="form-select" id="inputSchool" onchange="updateYearLevelOptions()">
                                        <option selected disabled value="">Choose</option>
                                        <option>BSU</option>
                                        <option>FAITH</option>
                                    </select> </div> <!-- Year Level --> <label for="inputYearLevel" class="mt-4 col-sm-2 col-form-label">
                                    <h6 class="font-bold">Year Level:</h6>
                                </label>
                                <div id="yearLevelContainer" class="col-sm-4 mt-4">
                                    <select class="form-select" id="inputYearLevel">
                                        <option selected disabled value="">Choose</option>
                                    </select>
                                </div>
                                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                                    <button id="setFilter" class="btn btn-sm btn-danger shadow-sm">Set Filter </button>
                                    <button class="btn btn-sm btn-danger" onclick="window.print()"> <i class="bi bi-printer"></i> Print List </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Applicants</h5>
                </div>
                <div class="table-responsive ">
                    <table id="applicantInterviewTable" class="table table-striped header-fixed" width="100%" cellspacing="100%">
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