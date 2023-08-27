<div class="col-md-3 position-relative">
                              <label for="inputMiddleName" class="form-label">Middle name</label>
                              <input type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="" required>
                            </div>
                            <div class="col-md-3 position-relative">
                              <label for="inputLastName" class="form-label">Last name</label>
                              <input type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="" required>
                            </div>
                            <div class="col-md-3 position-relative">
                              <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                              <input type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="" required>
                            </div>
 <!-- EDUCATIONAL BACKGROUND-->
          <div class="tab-content pt-2">
            <!-- EDUCATIONAL INFORMATION -->
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">General Educational Information</h5>
                    <form class="row g-4 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-6 position-relative">
                          <label for="inputGraduatingHonors" class="form-label">Are you Graduating with Honors?</label>
                          <select class="form-select" id="inputGraduatingHonors" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Yes or No.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputGraduatingSem" class="form-label">Are you Graduating this Semester/Term?</label>
                          <select class="form-select" id="inputGraduatingSem" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                          Please select Yes or No.
                          </div>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="inputSpecifyAward" class="form-label">Specify your Award/Honor</label>
                          <select class="form-select" id="inputSpecifyAward" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Awards/Honor.
                          </div>
                        </div>
                        <div class="col-md-8 position-relative">
                        <label for="inputOthers" class="form-label">If not specified in the list, kindly input your Honor/ Award here.</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputYearGraduation" class="form-label">If not Graduating, what year are you Graduating?</label>
                          <select class="form-select" id="inputYearGraduation" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select expected Year of Graduation.
                          </div>
                        </div>
                      <!-- END FULL NAME -->

                      <!-- SUBMIT BUTTON-->
                        <!-- <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit form</button>
                        </div> -->
                      <!--END SUBMIT BUTTON-->
                  </form><!-- End Custom Styled Validation with Tooltips -->
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">College Level</h5> 
                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-4 needs-validation" novalidate>
                      <!-- COLLEGE -->
                      <div class="col-md-4 position-relative">
                        <label for="inputSchoolName" class="form-label">Name of School Attended</label>
                        <select class="form-select" id="inputSchool" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select School.
                        </div>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="inputOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                        <input type="Others" class="form-control" id="inputOtherSchool" aria-describedby="inputOtherSchool" value="" required>
                      </div>
                      <div class="col-md-2 position-relative">
                        <label for="inputYearLevel" class="form-label">Year Level</label>
                        <select class="form-select" id="inputYearLevel" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select Year Level.
                        </div>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="inputCourse" class="form-label">Course taking</label>
                        <select class="form-select" id="inputCourse" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select Course.
                        </div>
                      </div>
                      <div class="col-md-5 position-relative">
                        <label for="inputOtherCourse" class="form-label">If not specified in the list, kindly input the Course.</label>
                        <input type="Others" class="form-control" id="inputOtherCourse" aria-describedby="inputOtherCourse" value="" required>
                      </div>
                      <div class="col-md-4 position-relative">
                        <label for="inputMajor" class="form-label">Major in</label>
                        <input type="Major" class="form-control" id="inputMajor" aria-describedby="inputMajor" value="" required>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="inputSchoolAddress" class="form-label">School Address</label>
                        <input type="Others" class="form-control" id="inputSchoolAddress" aria-describedby="inputSchoolAddress" value="" required>
                      </div>
                      <div class="column">
                        <div class="container py-3">
                            <div class="add">
                              <button class="btn btn-warning " type="button" data-toggle="modal" data-target="#addHonorAwardModal">Add Awards/Honor</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header-group mb-3">
                              <h5 class="card-header bg-primary" style="color:white">List of Honors/Award Received </h5>
                            </div>
                            <div class="card-body">
                              <div class= "table-responsive">
                                  <!-- Table with stripped rows -->
                                  <table class="table datatable table-bordered table-hover"  id="viewAdmin" width="100%" cellspacing="0" >
                                    <thead>
                                      <tr class="text-center">
                                        <th>No</th>
                                        <th>Honor/Award</th>
                                        <th>Academic Year</th>
                                        <th>Semester</th>
                                        <th>Year Level</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Best in Math</td>
                                          <td>2020-2020</td>
                                          <td>1st Semester</td>
                                          <td>1st Year </td>
                                          <td>
                                            <div class="btn-group-vertical d-flex" >
                                              <button class="btn btn-primary" data-bs-toggle="modal">Edit</button>
                                              <button class="btn btn-dark" data-bs-toggle="modal">Delete</button>
                                              <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                                              <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button> -->
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>2</td>
                                          <td>Best in Math</td>
                                          <td>2020-2020</td>
                                          <td>1st Semester</td>
                                          <td>1st Year </td>
                                          <td>
                                            <div class="btn-group-vertical d-flex" >
                                              <button class="btn btn-primary" data-bs-toggle="modal">Edit</button>
                                              <button class="btn btn-dark" data-bs-toggle="modal">Delete</button>
                                            </div>
                                          </td>
                                        </tr>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
<h5 class="card-title pt-2">Senior Highschool Level</h5> 
                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-4 needs-validation" novalidate>
                     <!-- Senior Highschool -->
                      <div class="col-md-4 position-relative">
                        <label for="inputSchoolName" class="form-label">Name of School Attended</label>
                        <select class="form-select" id="inputSchool" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select School.
                        </div>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="inputOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                        <input type="Others" class="form-control" id="inputOtherSchool" aria-describedby="inputOtherSchool" value="" required>
                      </div>
                      <div class="col-md-2 position-relative">
                        <label for="inputYearLevel" class="form-label">Year Level</label>
                        <select class="form-select" id="inputYearLevel" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select Year Level.
                        </div>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="inputCourse" class="form-label">Course taking</label>
                        <select class="form-select" id="inputCourse" required>
                          <option selected disabled value="">Choose...</option>
                          <option>...</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select Course.
                        </div>
                      </div>
                      <div class="col-md-5 position-relative">
                        <label for="inputOtherCourse" class="form-label">If not specified in the list, kindly input the Course.</label>
                        <input type="Others" class="form-control" id="inputOtherCourse" aria-describedby="inputOtherCourse" value="" required>
                      </div>
                      <div class="col-md-4 position-relative">
                        <label for="inputMajor" class="form-label">Major in</label>
                        <input type="Major" class="form-control" id="inputMajor" aria-describedby="inputMajor" value="" required>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="inputSchoolAddress" class="form-label">School Address</label>
                        <input type="Others" class="form-control" id="inputSchoolAddress" aria-describedby="inputSchoolAddress" value="" required>
                      </div>
                      <div class="column">
                        <div class="container py-3">
                            <div class="add">
                              <button class="btn btn-warning " type="button" data-toggle="modal" data-target="#addHonorAwardModal">Add Awards/Honor</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header-group mb-3">
                              <h5 class="card-header bg-primary" style="color:white">List of Honors/Award Received </h5>
                            </div>
                            <div class="card-body">
                              <div class= "table-responsive">
                                  <!-- Table with stripped rows -->
                                  <table class="table datatable table-bordered table-hover"  id="viewAdmin" width="100%" cellspacing="0" >
                                    <thead>
                                      <tr class="text-center">
                                        <th>No</th>
                                        <th>Honor/Award</th>
                                        <th>Academic Year</th>
                                        <th>Semester</th>
                                        <th>Year Level</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Best in Math</td>
                                          <td>2020-2020</td>
                                          <td>1st Semester</td>
                                          <td>1st Year </td>
                                          <td>
                                            <div class="btn-group-vertical d-flex" >
                                              <button class="btn btn-primary" data-bs-toggle="modal">Edit</button>
                                              <button class="btn btn-dark" data-bs-toggle="modal">Delete</button>
                                              <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                                              <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRoomModal">Delete</button> -->
                                            </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>2</td>
                                          <td>Best in Math</td>
                                          <td>2020-2020</td>
                                          <td>1st Semester</td>
                                          <td>1st Year </td>
                                          <td>
                                            <div class="btn-group-vertical d-flex" >
                                              <button class="btn btn-primary" data-bs-toggle="modal">Edit</button>
                                              <button class="btn btn-dark" data-bs-toggle="modal">Delete</button>
                                            </div>
                                          </td>
                                        </tr>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                        </div>
                      </div>
                    </form>