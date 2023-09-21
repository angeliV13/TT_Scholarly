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
                <?php include("views/admin/filter.php"); ?>
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
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
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