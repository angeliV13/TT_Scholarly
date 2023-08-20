<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Notification Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Basic Setup</li>
            <li class="breadcrumb-item active">Notification Management</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">

                <!-- Notification Management -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Notification Management</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_notif" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Notification</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setNotifTable" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Notification Function</th>
                                        <th class="text-center">Notification Name</th>
                                        <th class="text-center">Notification Icon</th>
                                        <th class="text-center">Darkened Flag</th>
                                        <th class="text-center">Notified User Type</th>
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
    <div class="modal fade" id="add_notif" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="notifFunc" class="form-label col-3">Notification Function</label>
                        <select id="notifFunc" class="form-select col" name="Notification Function">
                            <?php foreach ($notificationFunc as $key => $func) : ?>
                                <option value="<?= $key ?>"><?= $func ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="notifName" class="form-label col-3">Notification Name</label>
                        <input type="text" class="form-control col" id="notifName" aria-describedby="notifName" name="Notification Name">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="notifIcon" class="form-label col-3">Notification Icon</label>
                        <select id="notifIcon" class="form-select col" name="Notification Icon">
                            <?php foreach ($bootstrapIcons as $key => $bs) : ?>
                                <option value="<?= $bs ?>"><?= $key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label class="form-label col-3">Filled Icon?</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="1" name="filledCheck">
                                <label class="mx-2 form-check-label">
                                    Filled
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2" id="showIcon"></div>
                    <div class="row d-flex align-items-center mb-2">
                        <label class="form-label col-3">Notified Users</label>
                        <div class="col">
                            <?php foreach ($accountTypeArr as $key => $ac) : ?>
                                <div class="d-flex">
                                    <input class="form-check-input" type="checkbox" value="<?= $key ?>" name="accTypeCheck[]">
                                    <label class="mx-2 form-check-label">
                                        <?= $ac ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addNotification">Add Notification</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Notif Modal -->
    <div class="modal fade" id="editNotifModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="notifId">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="editnotifFunc" class="form-label col-3">Notification Function</label>
                        <input type="text" name="Notification Function" id="editnotifFunc" class="form-control col" readonly>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="editnotifName" class="form-label col-3">Notification Name</label>
                        <input type="text" class="form-control col" id="editnotifName" aria-describedby="editnotifName" name="Notification Name">
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="editnotifIcon" class="form-label col-3">Notification Icon</label>
                        <select id="editnotifIcon" class="form-select col" name="Notification Icon">
                            <?php foreach ($bootstrapIcons as $key => $bs) : ?>
                                <option value="<?= $bs ?>"><?= $key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label class="form-label col-3">Filled Icon?</label>
                        <div class="col">
                            <div class="d-flex">
                                <input class="form-check-input" type="checkbox" value="1" name="editfilledCheck">
                                <label class="mx-2 form-check-label">
                                    Filled
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2" id="editshowIcon"></div>
                    <div class="row d-flex align-items-center mb-2">
                        <label class="form-label col-3">Notified Users</label>
                        <div class="col">
                            <?php foreach ($accountTypeArr as $key => $ac) : ?>
                                <div class="d-flex">
                                    <input class="form-check-input" type="checkbox" value="<?= $key ?>" name="editaccTypeCheck[]">
                                    <label class="mx-2 form-check-label">
                                        <?= $ac ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="updateNotif">Update Notification</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

</main><!-- End #main -->