<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>List of Accounts</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">List of Accounts</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Account Listings</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#account_add_modal" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Account</a>
                            </div>


                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-striped table-condensed" id="accountAdminManagementTable" width="200%" cellspacing="200%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Account Type</th>
                                        <th>Access Level</th>
                                        <th>Account Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Account Modal -->
        <div class="modal fade" id="account_add_modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="addAccount">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex align-items-center mb-2">
                                <label for="accountFirstName" class="form-label col-4">First Name</label>
                                <input type="text" class="form-control col" id="accountFirstName" aria-describedby="accountFirstName" name="accountFirstName" required>
                            </div>
                            <div class="row d-flex align-items-center mb-2">
                                <label for="accountMiddleName" class="form-label col-4">Middle Name</label>
                                <input type="text" class="form-control col" id="accountMiddleName" aria-describedby="accountMiddleName" name="accountMiddleName" required>
                            </div>
                            <div class="row d-flex align-items-center mb-2">
                                <label for="accountLastName" class="form-label col-4">Last Name</label>
                                <input type="text" class="form-control col" id="accountLastName" aria-describedby="accountLastName" name="accountLastName" required>
                            </div>
                            <div class="row d-flex align-items-center mb-2">
                                <label for="accountUserName" class="form-label col-4">Username</label>
                                <input type="text" class="form-control col" id="accountUserName" aria-describedby="accountUserName" name="accountUserName" required>
                            </div>
                            <div class="row d-flex align-items-center mb-2">
                                <label for="accountEmail" class="form-label col-4">Email</label>
                                <input type="email" class="form-control col" id="accountEmail" aria-describedby="accountEmail" name="accountEmail" required>
                            </div>
                            <div class="row d-flex align-items-center mb-3">
                                <label for="accountAccessLevel" class="form-label col-4">Access Level</label>
                                <div class="col">
                                    <div class="d-flex">
                                        <input class="form-check-input" type="radio" name="accountType" value="0" id="accountSuperAdmin">
                                        <label class="mx-2 form-check-label" for="accountSuperAdmin">
                                            Super Admin
                                        </label>
                                    </div>
                                    <div class="d-flex">
                                        <input class="form-check-input" type="radio" name="accountType" value="1" id="accountAdmin" checked>
                                        <label class="mx-2 form-check-label" for="accountAdmin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="d-flex ms-4 mt-1 small">
                                        <input class="form-check-input" type="checkbox" value="" id="accountAdminAccess">
                                        <label class="mx-2 form-check-label" for="accountAdminAccess">
                                            Super Admin Access
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mb-2">
                                <label for="renewalStartDate" class="form-label col-4">Account Status</label>
                                <div class="col">
                                    <div class="d-flex">
                                        <input class="form-check-input" type="radio" name="accountStatus" value="1" id="accountActive" checked>
                                        <label class="mx-2 form-check-label" for="accountActive">
                                            Active
                                        </label>
                                    </div>
                                    <div class="d-flex">
                                        <input class="form-check-input" type="radio" name="accountStatus" value="0" id="accountInactive">
                                        <label class="mx-2 form-check-label" for="accountInactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Add Account</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->