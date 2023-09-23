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
                <?php include("views/admin/filter.php"); ?>
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