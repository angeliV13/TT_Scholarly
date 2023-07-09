<main id="main" class="main">
    <!-- End Page Title -->
  <div class="column">
    <div class="card">
        <div class="header-group mb-3">
          <h5 class="card-header bg-primary d-flex justify-content-center" style="color:white">Assessment Requirements</h5>
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
                          <!--BUTTON FOR "NOT APPLICABLE"-->
                          <input type="checkbox" class="btn-check" id="btn-check-dark" autocomplete="off">
                          <label class="btn btn-dark" for="btn-check-dark">Not Applicable</label>
                          <div class = "upload_file file btn btn-lg btn-primary">Upload
                            <input id ="fileUploadSchoolId" type="file" name="schoolIdFile" onchange="getFileData(this);"/>
                          </div>
                          
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>School Clearance</td>
                      <td>Approved/Rejected</td>
                      <td>BSU </td>
                      <td>
                      <div class="btn-group-vertical d-flex" >
                          <!--BUTTON FOR "NOT APPLICABLE"-->
                          <input type="checkbox" class="btn-check" id="btn-check-dark" autocomplete="off">
                          <label class="btn btn-dark" for="btn-check-dark">Not Applicable</label>

                          <div class="btn-group" role="group" aria-label="Basic example">
                            <!--BUTTON FOR "UPLOAD"-->
                              <button type="button" class="btn btn-warning">Upload</button>
                              <input class =fileUploadClearance type="file" name="file" onchange="getFileData(this);"/>

                            <!--BUTTON FOR "VIEW FILE"-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                              <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">School ID</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Certificate of Registration</td>
                      <td>Approved/Rejected</td>
                      <td>BSU </td>
                      <td>
                      <div class="btn-group-vertical d-flex" >
                          <!--BUTTON FOR "NOT APPLICABLE"-->
                          <input type="checkbox" class="btn-check" id="btn-check-dark" autocomplete="off">
                          <label class="btn btn-dark" for="btn-check-dark">Not Applicable</label>

                          <div class="btn-group" role="group" aria-label="Basic example">
                            <!--BUTTON FOR "UPLOAD"-->
                              <button type="button" class="btn btn-warning">Upload</button>
                              <input class =fileUploadCor type="file" name="file" onchange="getFileData(this);"/>

                            <!--BUTTON FOR "VIEW FILE"-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                              <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">School ID</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Grade Report</td>
                      <td>Approved/Rejected</td>
                      <td>BSU </td>
                      <td>
                      <div class="btn-group-vertical d-flex" >
                          <!--BUTTON FOR "NOT APPLICABLE"-->
                          <input type="checkbox" class="btn-check " id="btn-check-dark" autocomplete="off">
                          <label class="btn btn-dark" for="btn-check-dark">Not Applicable</label>

                          <div class="btn-group" role="group" aria-label="Basic example">
                            <!--BUTTON FOR "UPLOAD"-->
                              <button type="button" class="btn btn-warning">Upload</button>
                              <input class =fileUploadGrade type="file" name="file" onchange="getFileData(this);"/>

                            <!--BUTTON FOR "VIEW FILE"-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"> View File</button>
                              <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">School ID</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
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