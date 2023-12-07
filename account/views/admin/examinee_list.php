<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Examination</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Examiantion</li>
            <li class="breadcrumb-item active">List of Examinees</li>
        </ol>
    </div>
    <section class="section">
        <input type="hidden" id="applicationId" value="<?= isset($_GET['applicationId']) ? $_GET['applicationId'] : '' ?>">
        <!-- QUERY OPTION -->
        <div class="column">
            <div class="col-lg-12">
                <?php $withStatus = 1; ?>
                <?php include("views/admin/filter.php"); ?>
            </div>
        </div> <!-- TAB FOR COLLEGE LEVEL-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Examinee List</h5>
                    <button class="btn btn-sm btn-danger" onclick="printData('examineeListTable')"> <i class="bi bi-printer"></i> Print List </button>
                    <!-- <button class="dt-button buttons-print btn btn-sm btn-danger" tabindex="0" aria-controls="collegeNewApplicantTable" type="button"><span>Print</span></button> -->
                </div>
                <div class="table-responsive ">
                    <table id="examineeListTable" class="table table-striped header-fixed" width="100%" cellspacing="100%">
                        <thead>
                            <tr class="text-center small">
                                <th>No.</th>
                                <th>EAC Code<th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Extension Name</th>
                                <th>School</th>
                                <th>School Type</th>
                                <th>Educational Level</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Points</th>
                                <th>Remarks</th>
                                
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