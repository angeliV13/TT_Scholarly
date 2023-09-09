<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Website Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Basic Setup</li>
            <li class="breadcrumb-item active">Website Settings</li>
        </ol>
    </div>
    <input type="hidden" id="userId" value="<?= $_SESSION['id'] ?>">
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">

                <!-- Website Info -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Website Information</h5>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteInfo" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Telephone</th>
                                        <th class="text-center">Opening Hours</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    <tr>
                                        <td contenteditable="true"><?= $website_info['address'] ?></td>
                                        <td contenteditable="true"><?= $website_info['email'] ?></td>
                                        <td contenteditable="true"><?= $website_info['telephone'] ?></td>
                                        <td contenteditable="true"><?= $website_info['opening_hours'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Calendar of Activities -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Calendar of Activities</h5>
                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- Website Socials -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Website Social Information</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_socials" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Social Information</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteSocials" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Social Type</th>
                                        <th class="text-center">Link</th>
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

    <!-- Add Notif Modal -->
    <div class="modal fade" id="add_socials" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Website Socials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="socType" class="form-label col-3">Social Type</label>
                        <select id="socType" class="form-select col" name="Social Type">
                            <option value="0" selected>Facebook</option>
                            <option value="1">Twitter</option>
                            <option value="2">Instagram</option>
                            <option value="3">Linkedin</option>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="socLink" class="form-label col-3">Link</label>
                        <input type="text" class="form-control col" id="socLink" aria-describedby="socLink" name="Social Media Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addSocial">Add Social Media</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Notif Modal -->
    <div class="modal fade" id="editSocialModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Website Social</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="socialId">
                    <input type="hidden" id="updateSocType">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="updateSocType" class="form-label col-3">Social Type</label>
                        <input id="socName" class="form-control col" name="Social Type" readonly></input>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="updateSocLink" class="form-label col-3">Link</label>
                        <input type="text" class="form-control col" id="updateSocLink" aria-describedby="updateSocLink" name="Social Media Link">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="updateSoc">Update Social Link</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

</main><!-- End #main -->