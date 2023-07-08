<main id="main" class="main">
    <!-- End Page Title -->
  <div class="column">
    <div class="card">
        <div class="header-group mb-3">
          <h5 class="card-header bg-danger d-flex justify-content-center" style="color:white">Assessment Requirements</h5>
        </div>
        <div class="card-body">
          <div class="dropdown py-2">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Academic Year
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item" href=" ">Regular link</a>
              <a class="dropdown-item active" href=" ">Active link</a>
              <a class="dropdown-item" href=" ">Another link</a>
            </div>
          </div>
          <div class= "table-responsive">
              <!-- Table with stripped rows -->
              <table class="table  table-bordered table-hover"  id="viewAdmin" width="100%" cellspacing="0" >
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
                      <td>brandon@gmail.com</td>
                      <td>BSU </td>
                      <td>
                        <div class="btn-group-vertical d-flex" >
                          <!-- <button class="btn btn-primary" data-bs-toggle="modal">View File</button> -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Modal Dialog Scrollable</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    This content should appear at the bottom after you scroll.
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <button class="btn btn-dark" data-bs-toggle="modal">Not Applicable</button>
                          <button class="btn btn-warning" data-bs-toggle="modal">Save</button>
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