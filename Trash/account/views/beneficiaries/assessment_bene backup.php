<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle">
      <h1>Assessment</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Beneficiaries</li>
          <li class="breadcrumb-item active">Assessment</li>
        </ol>
    </div>
    <!-- End Page Title -->
  <div class="column">
    <div class="card">
      <div class="header-group mb-3">
        <h5 class="card-header bg-primary" style="color:white">Assessment Requirements</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <form id="submitAssessment">
            <!-- Table with stripped rows -->
            <table class="table table-bordered table-hover" id="assessmentBeneTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Requirements</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Remarks</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>1</td>
                  <td>School ID</td>
                  <td>Approved/Rejected</td>
                  <td>BSU </td>
                  <td>
                    <div class="btn-group-vertical d-flex">
                      <!--BUTTON FOR "NOT APPLICABLE"-->
                      <input type="checkbox" class="btn-check" id="btn_na_SchoolId" autocomplete="off">
                      <label class="btn btn-outline-dark" for="btn_na_SchoolId">Not Applicable</label>
                      <div class="btn-group" role="group">
                        <div id="divUploadSchoolId" class="upload_file file btn btn-primary">Upload
                          <input id="fileUploadSchoolId" type="file" name="schoolIdFile" accept="application/pdf" onchange="getFileData(this, 'textUploadSchoolId');" />
                        </div>
                        <button id="viewUploadSchoolId" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadSchoolIdModal"> View File</button>
                        <div class="modal fade" id="viewUploadSchoolIdModal" tabindex="-1">
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
                      <p id="textUploadSchoolId" class="small mx-auto"></p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>School Clearance</td>
                  <td>Approved/Rejected</td>
                  <td>BSU </td>
                  <td>
                    <div class="btn-group-vertical d-flex">
                      <!--BUTTON FOR "NOT APPLICABLE"-->
                      <input type="checkbox" class="btn-check" id="btn_na_Clearance" autocomplete="off">
                      <label class="btn btn-outline-dark" for="btn_na_Clearance">Not Applicable</label>
                      <div class="btn-group" role="group">
                        <div id="divUploadClearance" class="upload_file file btn btn-primary">Upload
                          <input id="fileUploadClearance" type="file" name="clearance" accept="application/pdf" onchange="getFileData(this, 'textUploadClearance');" />
                        </div>
                        <button id="viewUploadClearance" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fileUploadClearanceModal"> View File</button>
                        <div class="modal fade" id="fileUploadClearanceModal" tabindex="-1">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">School Clearance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p id="textUploadClearance" class="small mx-auto"></p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Certificate of Registration</td>
                  <td>Approved/Rejected</td>
                  <td>BSU </td>
                  <td>
                    <div class="btn-group-vertical d-flex">
                      <!--BUTTON FOR "NOT APPLICABLE"-->
                      <input type="checkbox" class="btn-check" id="btn_na_Cor" autocomplete="off">
                      <label class="btn btn-outline-dark" for="btn_na_Cor">Not Applicable</label>
                      <div class="btn-group" role="group">
                        <div id="divUploadCor" class="upload_file file btn btn-primary">Upload
                          <input id="fileUploadCor" type="file" name="corFile" accept="application/pdf" onchange="getFileData(this, 'textUploadCor');" />
                        </div>
                        <button id="viewUploadCor" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadCorModal"> View File</button>
                        <div class="modal fade" id="viewUploadCorModal" tabindex="-1">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Certificate of Registration</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p id="textUploadCor" class="small mx-auto"></p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Grade Report</td>
                  <td>Approved/Rejected</td>
                  <td>BSU </td>
                  <td>
                    <div class="btn-group-vertical d-flex">
                      <!--BUTTON FOR "NOT APPLICABLE"-->
                      <input type="checkbox" class="btn-check" id="btn_na_Grade" autocomplete="off">
                      <label class="btn btn-outline-dark" for="btn_na_Grade">Not Applicable</label>
                      <div class="btn-group" role="group">
                        <div id="divUploadGrade" class="upload_file file btn btn-primary">Upload
                          <input id="fileUploadGrade" type="file" name="gradeFile" accept="application/pdf" onchange="getFileData(this, 'textUploadGrade');" />
                        </div>
                        <button id="viewUploadGrade" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadGradeModal"> View File</button>
                        <div class="modal fade" id="viewUploadGradeModal" tabindex="-1">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Grade</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p id="textUploadGrade" class="small mx-auto"></p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="d-grid gap-2 col-6 mx-auto">
              <button id="" type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</main><!-- End #main -->