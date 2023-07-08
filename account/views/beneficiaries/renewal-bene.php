<main id="main" class="main">
    <!-- End Page Title -->
  <div class="column">
    <div class="card">
        <div class="header-group mb-3">
          <h5 class="card-header bg-primary d-flex justify-content-center" style="color:white">Renewal Requirements</h5>
        </div>
        <div class="card-body">
          <div class= "table-responsive">
              <!-- Table with stripped rows -->
              <table class="table table-bordered table-hover"  id="viewAdmin" width="100%" cellspacing="0" >
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Requirements</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>1</td>
                      <td>School ID</td>
                      <td>Approved/Rejected</td>
                      <td>BSU </td>
                      <td>
                        <div class="btn-group-vertical d-flex" >
                          <!-- <button class="btn btn-primary" data-bs-toggle="modal">View File</button> -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">School ID</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="Delete">Delete</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <button class="btn btn-dark" data-bs-toggle="modal">Not Applicable</button>
                          <!-- <button class="btn btn-warning" data-bs-toggle="modal">Save</button> -->
                          <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button> -->
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Certificate of Registration</td>
                      <td>Approved/Rejected</td>
                      <td>BSU </td>
                      <td>
                        <div class="btn-group-vertical d-flex" >
                          <!-- <button class="btn btn-primary" data-bs-toggle="modal">View File</button> -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">School ID</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <label class="control-label">Select File</label>
                                    <input id="input-b5" name="input-b5[]" type="file" multiple>
                                    <script>
                                    $(document).ready(function() {
                                        $("#input-b5").fileinput({showCaption: false, dropZoneEnabled: false});
                                    });
                                    </script>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="Delete">Delete</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <button class="btn btn-dark" data-bs-toggle="modal">Not Applicable</button>
                          <!-- <button class="btn btn-warning" data-bs-toggle="modal">Save</button> -->
                          <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button> -->
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>

</main><!-- End #main -->