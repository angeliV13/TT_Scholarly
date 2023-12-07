<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>General Requirements</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Applicants</li>
            <li class="breadcrumb-item active">General Requirements
        </ol>
    </div>
    <!-- End Page Title -->
    <div class="column">
        <div class="card">
            <div class="card-body">
                <div class="column">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">List of Requirements</h5>
                        <div class="d-flex align-items-center d-grid gap-2">

                        </div>
                    </div>
                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                    <div class="table-responsive">
                        <form id="submitApplicationFile">
                            <table id="applicationTable" class="table table-striped header-fixed" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Requirements</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Remarks</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="wrapped-cell text-center">
                                    
                                </tbody>
                            </table>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <?php if (!$finishFlag): ?>
                                    <button id="" type="submit" class="btn btn-primary">Save</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->