<main id="main" class="main">
    <input type="hidden" id="applicationId" value="<?= isset($_GET['applicationId']) ? $_GET['applicationId'] : '' ?>">
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
                    <h5 class="card-title">List of Applicant for Assessment</h5>
                    <button class="btn btn-sm btn-danger" onclick="printData('applicantExamineeTable')"> <i class="bi bi-printer"></i> Print List </button>
                    <!-- <button class="dt-button buttons-print btn btn-sm btn-danger" tabindex="0" aria-controls="collegeNewApplicantTable" type="button"><span>Print</span></button> -->
                </div>
                <div class="table-responsive">
                    <table id="applicantExamineeTable" class="table table-striped header-fixed" width="100%" cellspacing="100%">
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
                                <th>Examination Start Date</th>
                                <th>Examination Start Date</th>
                                <th>Interview Start Date</th>
                                <th>Interview End Date</th>
                                <th>Remarks</th>
                                <th>Status</th>
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