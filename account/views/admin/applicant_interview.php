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
            <div class="col-lg-12">
                <?php include("views/admin/filter.php"); ?>
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
                                    <th>Application Number<th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Extension Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>School</th>
                                    <th>School Type</th>
                                    <th>Scholarship Type</th>
                                    <th>Educational Level</th>
                                    <th>Course</th>
                                    <th>Year Level</th>
                                    <th>Contact No.</th>
                                    <th>Barangay</th>
                                    <th>Examination Start Date</th>
                                    <th>Examination Start Date</th>
                                    <th>Interview Start Date</th>
                                    <th>Interview End Date</th>
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