<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
      <h1>School Settings</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Basic Setup</li>
          <li class="breadcrumb-item active">School Settings</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">

                <!-- Examination -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">List of Schools</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_school" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add School</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="schoolTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">School Name</th>
                                        <th class="text-center">School Address</th>
                                        <th class="text-center">School Type</th>
                                        <th class="text-center">School Class Type</th>
                                        <th class="text-center">Added By</th>
                                        <th class="text-center">Date Added</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add School Modal -->
    <div class="modal fade" id="add_school" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add School</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" id="userId" value="<?= $_SESSION['id'] ?>">
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolName" class="form-label col-3">School Name</label>
                        <input type="text" class="form-control col" id="schoolName" aria-describedby="schoolName" name="School Name">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolAddress" class="form-label col-3">School Address</label>
                        <textarea class="form-control col" name="School Address" id="schoolAddress" cols="30" rows="5"></textarea>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolType" class="form-label col-3">School Type</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="0" name="schoolType">
                                <label class="mx-2 form-check-label">
                                    College
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="1"  name="schoolType">
                                <label class="mx-2 form-check-label">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="2" name="schoolType">
                                <label class="mx-2 form-check-label">
                                    Junior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="3" name="schoolType">
                                <label class="mx-2 form-check-label">
                                    Elementary
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolClass" class="form-label col-3">School Class Type</label>
                        <select name="School Class Type" id="schoolClass" class="form-select col">
                            <option value="" selected disabled>Choose</option>
                            <option value="0">Public (Within Sto. Tomas, Batangas)</option>
                            <option value="1">Private (Within Sto. Tomas, Batangas)</option>
                            <option value="2">Public (Outside Sto. Tomas, Batangas)</option>
                            <option value="3">Private (Outside Sto. Tomas, Batangas)</option>
                        </select>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="1" id="partner" name="partner">
                                <label class="mx-2 form-check-label">
                                    Partner School
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addSchool">Add School</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit School Modal -->
    <div class="modal fade" id="update_school" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update School</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" id="schoolId">
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolName" class="form-label col-3">School Name</label>
                        <input type="text" class="form-control col" id="editschoolName" aria-describedby="schoolName" name="School Name">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolAddress" class="form-label col-3">School Address</label>
                        <textarea class="form-control col" name="School Address" id="editschoolAddress" cols="30" rows="5"></textarea>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolType" class="form-label col-3">School Type</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="0" name="editschoolType">
                                <label class="mx-2 form-check-label">
                                    College
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="1"  name="editschoolType">
                                <label class="mx-2 form-check-label">
                                    Senior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="2" name="editschoolType">
                                <label class="mx-2 form-check-label">
                                    Junior High School
                                </label>
                            </div>
                            <div class="d-flex">
                                <input class="form-check-input" type="radio" value="3" name="editschoolType">
                                <label class="mx-2 form-check-label">
                                    Elementary
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="schoolClass" class="form-label col-3">School Class Type</label>
                        <select name="School Class Type" id="editschoolClass" class="form-select col">
                            <option value="" selected disabled>Choose</option>
                            <option value="0">Public (Within Sto. Tomas, Batangas)</option>
                            <option value="1">Private (Within Sto. Tomas, Batangas)</option>
                            <option value="2">Public (Outside Sto. Tomas, Batangas)</option>
                            <option value="3">Private (Outside Sto. Tomas, Batangas)</option>
                        </select>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="1" id="editpartner" name="editpartner">
                                <label class="mx-2 form-check-label">
                                    Partner School
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="updateSchool">Update School</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->