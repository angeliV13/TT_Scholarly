<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle d-none">
    <h1>Profile</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </div>
  <!-- End Page Title -->
  <section class="section profile">
    <div class="col-lg-12">
      <div class="container h-500">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-500 col-xl-500">
            <div class="card">
              <div class="rounded-top text-white d-flex flex-row mb-3" style="background-color: #000; height:200px;">
                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height:300px">
                  <img src="assets/img/profile-img.jpg" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                </div>

                <div class="ms-4 adjustable-line-spacing" style="margin-top: 115px;">
                  <h5 class="fw-bold">JUAN
                    DELA CRUZ</h5>
                  <p>Educational
                    Assistance
                    Scholarship -
                    College level
                    <br>EAC-213991</br>
                  </p>
                </div>

              </div>
              <div class="gap-2 d-flex justify-content-end">
                  <button type="button" class="btn bstn-warning btn-sm">Submit</button>
                  <button type="button" class="btn btn-danger btn-sm">Cancel Submission</button>
              </div>
              <div class="p-4 text-black" style="background-color: #ffff; height:10px;">
                
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="personal-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="educational-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational-background" type="button" role="tab" aria-controls="educational-background" aria-selected="false">Educational Background</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="family-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-family-background" type="button" role="tab" aria-controls="family-background" aria-selected="false">Family Background</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="additional-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-additional-information" type="button" role="tab" aria-controls="additional-information" aria-selected="false">Additional Information</button>
                  </li>
                </ul>
              </div>
              <div class="card-body p-4">
                <div id="others_form_view" class="max-height-200">
                  <div class="tab-content">
                    <!--PERSONAL INFORMATION-->
                    <div class="tab-pane fade show active" id="bordered-justified-personal-information" role="tabpanel" aria-labelledby="personal-information">
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          Primary
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-3">
                          <label class="form-check-label fw-bold">Remarks:</label>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="personalInfoApproveRadioDefault" id="personalInfoApproveRadioDefault1">
                            <label class="mx-2 form-check-label" for="personalInfoApproveCheckBox"> Approve </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="personalInfoReviewDefault" id="personalInfoReviewDefault2">
                            <label class="mx-2 form-check-label" for="personalInfoReviewCheckBox"> For Review </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="personalInfoModiDefault" id="personalInfoModiDefault3">
                            <label class="mx-2 form-check-label" for="personalInModiCheckBox"> For Modification </label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                          <label for="inputFirstName" class="form-label">First name</label>
                          <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                        </div>
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
                        <!-- CONTACT NUMBER AND EMAIL ADDRESS -->
                        <div class="col-md-5 position-relative">
                          <label for="telephone" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <div class="col-md-7 position-relative">
                          <label for="EmailAddress" class="form-label">Email Address</label>
                          <input type="EmailAddress" class="form-control" id="inputEmailAddress" aria-describedby="inputEmailAddress" value="" required>
                        </div>
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="inputDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                        </div>
                        <div class="col-md-8 position-relative">
                          <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                          <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                        </div>
                        <!-- ADDRESS -->
                        <div class="col-md-4 position-relative">
                          <label for="inputAddress" class="form-label">Address</label>
                          <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" value="" required>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputBarangay" class="form-label">Barangay</label>
                          <select class="form-select" id="inputBarangay" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            valid
                            Barangay.
                          </div>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputMunicipality" class="form-label">Municipality</label>
                          <select class="form-select" id="inputMunicipality" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            valid
                            Municipality.
                          </div>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputProvince" class="form-label">Province</label>
                          <select class="form-select" id="inputProvince" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            valid
                            Province.
                          </div>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputZipCode" class="form-label">ZIP Code</label>
                          <input type="zipCode" class="form-control" id="inputZipCode" aria-describedby="inputZipCode" value="" required>
                        </div>
                        <!-- CITIZENSHIP -->
                        <div class="col-md-3 position-relative">
                          <label for="inputCitizenship" class="form-label">Citizenship</label>
                          <input type="citizenship" class="form-control" id="inputCitizenship" aria-describedby="inputCitizenship" value="" required>
                        </div>
                        <!-- RESIDENCY -->
                        <div class="col-md-4 position-relative">
                          <label for="inputResidency" class="form-label">Years of Residency in Santo Tomas</label>
                          <input type="residency" class="form-control" id="inputResidency" aria-describedby="inputResidency" value="" required>
                        </div>
                        <!-- LANGUAGE -->
                        <div class="col-md-3 position-relative">
                          <label for="inputMotherTongue" class="form-label">Mother Tongue</label>
                          <input type="Language" class="form-control" id="inputMotherTongue" aria-describedby="inputMotherTongue" value="" required>
                        </div>
                        <!-- START RELIGION -->
                        <div class="col-md-4 position-relative">
                          <label for="inputReligion" class="form-label">Religion</label>
                          <select class="form-select" id="inputReligion" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            Religion.
                          </div>
                        </div>
                        <!-- SEX -->
                        <div class="col-md-4 position-relative">
                          <label for="inputGender" class="form-label">Gender</label>
                          <select class="form-select" id="inputGender" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            valid
                            Gender.
                          </div>
                        </div>
                        <!--CIVIL STATUS -->
                        <div class="col-md-4 position-relative">
                          <label for="inputCivilStatus" class="form-label">Civil Status</label>
                          <select class="form-select" id="inputCivilStatus" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            a
                            valid
                            Civil
                            Status.
                          </div>
                        </div>
                      </form>
                    </div>

                    <!--EDUCATIONAL BACKGROUND-->
                    <div class="tab-pane fade" id="bordered-justified-educational-background" role="tabpanel" aria-labelledby="educational-background">
                      <!--GENERAL EDUC-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          General
                          Educational
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-3">
                          <label class="form-check-label fw-bold">Remarks:</label>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="educApproveRadioDefault" id="educApproveRadioDefault1">
                            <label class="mx-2 form-check-label" for="educApproveCheckBox"> Approve </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="educReviewDefault" id="educReviewDefault2">
                            <label class="mx-2 form-check-label" for="educReviewCheckBox"> For Review </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="educModiDefault" id="educModiDefault3">
                            <label class="mx-2 form-check-label" for="educModiCheckBox"> For Modification </label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-6 position-relative">
                          <label for="inputGraduatingSem" class="form-label">Are you Graduating this Semester/Term?</label>
                          <select class="form-select" id="inputGraduatingSem" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Yes
                            or
                            No.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputGraduatingHonors" class="form-label">Are you Graduating with Honors?</label>
                          <select class="form-select" id="inputGraduatingHonors" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Yes
                            or
                            No.
                          </div>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="inputSpecifyAward" class="form-label">Specify your Award/Honor</label>
                          <select class="form-select" id="inputSpecifyAward" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Awards/Honor.
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
                            Please
                            select
                            expected
                            Year
                            of
                            Graduation.
                          </div>
                        </div>
                        <!-- END FULL NAME -->
                      </form>
                      <!--COLLEGE LEVEL-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          College
                          Level
                        </h5>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                          <label for="inputCollegeSchoolName" class="form-label">Name of School Attended</label>
                          <select class="form-select" id="inputCollegeSchoolName" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCollegeOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="Others" class="form-control" id="inputCollegeOtherSchool" aria-describedby="inputCollegeOtherSchool" value="" required>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputCollegeYearLevel" class="form-label">Year Level</label>
                          <select class="form-select" id="inputCollegeYearLevel" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Year
                            Level.
                          </div>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputCourse" class="form-label">Course taking</label>
                          <select class="form-select" id="inputCourse" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Course.
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
                          <label for="inputCollegeSchoolAddress" class="form-label">School Address</label>
                          <input type="Others" class="form-control" id="inputCollegeSchoolAddress" aria-describedby="inputCollegeSchoolAddress" value="" required>
                        </div>
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                              List
                              of
                              Awards
                            </h5>
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <button class="btn btn-sm btn-primary me-2" type="button">Add an Award</button>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No
                                  </th>
                                  <th>Honor/Award
                                  </th>
                                  <th>Academic
                                    Year
                                  </th>
                                  <th>Semester
                                  </th>
                                  <th>Year
                                    Level
                                  </th>
                                  <th>Actions
                                  </th>
                                </tr>
                                <!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1
                                  </td>
                                  <td>Biscocho,
                                    Val
                                    Juniel
                                    Mendoza
                                  </td>
                                  <td>College
                                  </td>
                                  <td>1st
                                    Year
                                  </td>
                                  <td>San
                                    Bartolome
                                    Santo
                                    Tomas
                                    Batangas
                                  </td>
                                  <td>
                                    <div class="btn-group d-flex">
                                      <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                      <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </form>
                      <!--SHS LEVEL-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          Senior
                          Highschool
                          Level
                        </h5>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                          <label for="inputSeniorSchoolName" class="form-label">Name of School Attended</label>
                          <select class="form-select" id="inputSchool" required>
                            <option selected disabled value="">Choose...</option> <?php foreach ($seniorHigh as $key => $shs) : ?> <option value="<?php echo $key ?>"><?php echo $shs ?></option> <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputSeniorOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="Others" class="form-control" id="inputSeniorOtherSchool" aria-describedby="inputSeniorOtherSchool" value="" required>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputSeniorYearLevel" class="form-label">Year Level</label>
                          <select class="form-select" id="inputSeniorYearLevel" required>
                            <option selected disabled value="">Choose...</option> <?php for ($i = 12; $i >= 11; $i--) : ?> <option value="<?php echo $i ?>">Grade <?php echo $i ?></option> <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Year
                            Level.
                          </div>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputTrack" class="form-label">Strand Taken</label>
                          <select class="form-select" id="inputTrack" required>
                            <option selected disabled value="">Choose...</option> <?php foreach ($strand as $key => $str) : ?> <option value="<?php echo $key ?>"><?php echo $str ?></option> <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Course.
                          </div>
                        </div>
                        <div class="col-md-9 position-relative">
                          <label for="inputOtherTrack" class="form-label">If not specified in the list, kindly input the Course.</label>
                          <input type="Others" class="form-control" id="inputOtherTrack" aria-describedby="inputOtherTrack" value="" required>
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="inputSeniorSchoolAddress" class="form-label">School Address</label>
                          <input type="Others" class="form-control" id="inputSeniorSchoolAddress" aria-describedby="inputSeniorSchoolAddress" value="" required>
                        </div>
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                              List
                              of
                              Awards
                            </h5>
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <button class="btn btn-sm btn-primary me-2" type="button">Add an Award</button>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No
                                  </th>
                                  <th>Honor/Award
                                  </th>
                                  <th>Academic
                                    Year
                                  </th>
                                  <th>Semester
                                  </th>
                                  <th>Year
                                    Level
                                  </th>
                                  <th>Actions
                                  </th>
                                </tr>
                                <!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1
                                  </td>
                                  <td>Biscocho,
                                    Val
                                    Juniel
                                    Mendoza
                                  </td>
                                  <td>College
                                  </td>
                                  <td>1st
                                    Year
                                  </td>
                                  <td>San
                                    Bartolome
                                    Santo
                                    Tomas
                                    Batangas
                                  </td>
                                  <td>
                                    <div class="btn-group d-flex">
                                      <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                      <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </form>
                      <!--HS LEVEL-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          High
                          School
                          Level
                        </h5>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                          <label for="inputHighSchoolName" class="form-label">Name of School Attended</label>
                          <select class="form-select" id="inputHighSchoolName" required>
                            <option selected disabled value="">Choose...</option> <?php foreach ($juniorHigh as $key => $jhs) : ?> <option value="<?php echo $key ?>"><?php echo $jhs ?></option> <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputHighOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="Others" class="form-control" id="inputHighOtherSchool" aria-describedby="inputHighOtherSchool" value="" required>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputHighYearLevel" class="form-label">Year Level</label>
                          <select class="form-select" id="inputHighYearLevel" required>
                            <option selected disabled value="">Choose...</option> <?php for ($i = 4; $i >= 1; $i--) : ?> <?php if ($i == 1) : ?> <option value="<?php echo $i ?>"><?php echo $i ?>st Year</option> <?php elseif ($i == 2) : ?> <option value="<?php echo $i ?>"><?php echo $i ?>nd Year</option> <?php elseif ($i == 3) : ?> <option value="<?php echo $i ?>"><?php echo $i ?>rd Year</option> <?php else : ?> <option value="<?php echo $i ?>"><?php echo $i ?>th Year</option> <?php endif; ?> <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Year
                            Level.
                          </div>
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="inputHighSchoolAddress" class="form-label">School Address</label>
                          <input type="Others" class="form-control" id="inputHighSchoolAddress" aria-describedby="inputHighSchoolAddress" value="" required>
                        </div>
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                              List
                              of
                              Awards
                            </h5>
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <button class="btn btn-sm btn-primary me-2" type="button">Add an Award</button>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No
                                  </th>
                                  <th>Honor/Award
                                  </th>
                                  <th>Academic
                                    Year
                                  </th>
                                  <th>Semester
                                  </th>
                                  <th>Year
                                    Level
                                  </th>
                                  <th>Actions
                                  </th>
                                </tr>
                                <!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1
                                  </td>
                                  <td>Biscocho,
                                    Val
                                    Juniel
                                    Mendoza
                                  </td>
                                  <td>College
                                  </td>
                                  <td>1st
                                    Year
                                  </td>
                                  <td>San
                                    Bartolome
                                    Santo
                                    Tomas
                                    Batangas
                                  </td>
                                  <td>
                                    <div class="btn-group d-flex">
                                      <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                      <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </form>
                      <!--ELEM LEVEL-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          Elementary
                          Level
                        </h5>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                          <label for="inputElementarySchoolName" class="form-label">Name of School Attended</label>
                          <select class="form-select" id="inputElementarySchoolName" required>
                            <option selected disabled value="">Choose...</option> <?php foreach ($elementary as $key => $elem) : ?> <option value="<?php echo $key ?>"><?php echo $elem ?></option> <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputElementaryOtherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="Others" class="form-control" id="inputElementaryOtherSchool" aria-describedby="inputElementaryOtherSchool" value="" required>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputHighYearLevel" class="form-label">Year Level</label>
                          <select class="form-select" id="inputHighYearLevel" required>
                            <option selected disabled value="">Choose...</option> <?php for ($i = 6; $i >= 1; $i--) : ?> <option value="<?php echo $i ?>">Grade <?php echo $i ?></option> <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please
                            select
                            Year
                            Level.
                          </div>
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="inputElementarySchoolAddress" class="form-label">School Address</label>
                          <input type="Others" class="form-control" id="inputElementarySchoolAddress" aria-describedby="inputElementarySchoolAddress" value="" required>
                        </div>
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                              List
                              of
                              Awards
                            </h5>
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <button class="btn btn-sm btn-primary me-2" type="button">Add an Award</button>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No
                                  </th>
                                  <th>Honor/Award
                                  </th>
                                  <th>Academic
                                    Year
                                  </th>
                                  <th>Semester
                                  </th>
                                  <th>Year
                                    Level
                                  </th>
                                  <th>Actions
                                  </th>
                                </tr>
                                <!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1
                                  </td>
                                  <td>Biscocho,
                                    Val
                                    Juniel
                                    Mendoza
                                  </td>
                                  <td>College
                                  </td>
                                  <td>1st
                                    Year
                                  </td>
                                  <td>San
                                    Bartolome
                                    Santo
                                    Tomas
                                    Batangas
                                  </td>
                                  <td>
                                    <div class="btn-group d-flex">
                                      <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                      <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </form>
                    </div>

                    <!--FAMILY BACKGROUND-->
                    <div class="tab-pane fade" id="bordered-justified-family-background" role="tabpanel" aria-labelledby="family-background">
                      <!--FAMILY INFORMATION-->
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          Family
                          Background
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-3">
                          <label class="form-check-label fw-bold">Remarks:</label>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="famApproveRadioDefault" id="famApproveRadioDefault1">
                            <label class="mx-2 form-check-label" for="famApproveCheckBox"> Approve </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="famReviewDefault" id="famReviewDefault2">
                            <label class="mx-2 form-check-label" for="famReviewCheckBox"> For Review </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="famModiDefault" id="famModiDefault3">
                            <label class="mx-2 form-check-label" for="famModiCheckBox"> For Modification </label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 pt-3 needs-validation" novalidate>
                        <!-- GENERAL FAMILY INFORMATION -->
                        <div class="col-md-4 position-relative">
                          <label for="inputLivingFamily" class="form-label">Are you Living with Family?</label>
                          <select class="form-select" id="inputLivingFamily" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputFamilyTotal" class="form-label">Total number of Family</label>
                          <input type="FamilyTotal" class="form-control" id="inputFamilyTotal" aria-describedby="inputFamilyTotal" value="" required>
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="inputBirthOrder" class="form-label">Birth Order</label>
                          <input type="inputBirthOrder" class="form-control" id="inputBirthOrder" aria-describedby="inputBirthOrder" value="" required>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="inputSourceLiving" class="form-label"> Source ofLiving?</label>
                          <select class="form-select" id="inputSourceLiving" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-5 position-relative">
                          <label for="inputHomeType" class="form-label"> Is your Home Rent or Owned?</label>
                          <select class="form-select" id="inputHomeType" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-7 position-relative">
                          <label for="inputOthers" class="form-label">If not specified in the list, kindly input here.</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputRenting" class="form-label"> How much paying monthly (If renting or paying-to-own)</label>
                          <select class="form-select" id="inputRenting" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- TABLE OF SIBLINGS -->
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                              Sibling's
                              Information
                            </h5>
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Sibling</label>
                              </div>
                              <button class="btn btn-sm btn-primary me-2" type="button">Add Sibling</button>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No
                                  </th>
                                  <th>Name
                                    of
                                    Sibling
                                    (LN/FN/MN)
                                  </th>
                                  <th>Birth
                                    Order
                                  </th>
                                  <th>Age
                                  </th>
                                  <th>Occupation
                                  </th>
                                  <th>Actions
                                  </th>
                                </tr>
                                <!-- <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> <tr> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr> -->
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1
                                  </td>
                                  <td>Biscocho,
                                    Val
                                    Juniel
                                    Mendoza
                                  </td>
                                  <td>College
                                  </td>
                                  <td>1st
                                    Year
                                  </td>
                                  <td>San
                                    Bartolome
                                    Santo
                                    Tomas
                                    Batangas
                                  </td>
                                  <td>
                                    <div class="btn-group d-flex">
                                      <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                      <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                              <tr>
                                <td>1
                                </td>
                                <td>Biscocho,
                                  Val
                                  Juniel
                                  Mendoza
                                </td>
                                <td>College
                                </td>
                                <td>1st
                                  Year
                                </td>
                                <td>San
                                  Bartolome
                                  Santo
                                  Tomas
                                  Batangas
                                </td>
                                <td>
                                  <div class="btn-group d-flex">
                                    <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                    <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>1
                                </td>
                                <td>Biscocho,
                                  Val
                                  Juniel
                                  Mendoza
                                </td>
                                <td>College
                                </td>
                                <td>1st
                                  Year
                                </td>
                                <td>San
                                  Bartolome
                                  Santo
                                  Tomas
                                  Batangas
                                </td>
                                <td>
                                  <div class="btn-group d-flex">
                                    <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                    <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>1
                                </td>
                                <td>Biscocho,
                                  Val
                                  Juniel
                                  Mendoza
                                </td>
                                <td>College
                                </td>
                                <td>1st
                                  Year
                                </td>
                                <td>San
                                  Bartolome
                                  Santo
                                  Tomas
                                  Batangas
                                </td>
                                <td>
                                  <div class="btn-group d-flex">
                                    <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                    <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>1
                                </td>
                                <td>Biscocho,
                                  Val
                                  Juniel
                                  Mendoza
                                </td>
                                <td>College
                                </td>
                                <td>1st
                                  Year
                                </td>
                                <td>San
                                  Bartolome
                                  Santo
                                  Tomas
                                  Batangas
                                </td>
                                <td>
                                  <div class="btn-group d-flex">
                                    <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                    <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>1
                                </td>
                                <td>Biscocho,
                                  Val
                                  Juniel
                                  Mendoza
                                </td>
                                <td>College
                                </td>
                                <td>1st
                                  Year
                                </td>
                                <td>San
                                  Bartolome
                                  Santo
                                  Tomas
                                  Batangas
                                </td>
                                <td>
                                  <div class="btn-group d-flex">
                                    <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                    <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                      <!-- FATHER'S INFORMATION -->
                      <div class="d-flex justify-content-between align-items-center py-3">
                        <h5 class="card-title">
                          Father's
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Father</label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                          <label for="inputFirstName" class="form-label">First name</label>
                          <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                        </div>
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
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="inputDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                        </div>
                        <div class="col-md-5  position-relative">
                          <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                          <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                          <label for="inputAge" class="form-label">Father's Age</label>
                          <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                        </div>
                        <!-- START AGE -->
                        <!-- CONTACT INFORMATION -->
                        <div class="col-md-3 position-relative">
                          <label for="telephone" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                          <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                          <select class="form-select" id="inputLivingDeceased" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- FATHER'S OCCUPATION  -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOccupation" class="form-label"> Occupation</label>
                          <select class="form-select" id="inputOccupation" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputOthers" class="form-label">If Occupation is not in the list,please specify here</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyName" class="form-label">Company's Name</label>
                          <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyAddress" class="form-label">Company's Address</label>
                          <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                          <select class="form-select" id="inputIncome" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                          <select class="form-select" id="inputEducationalAttainment" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- END FULL NAME -->
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                      <!-- MOTHER'S INFORMATION -->
                      <div class="d-flex justify-content-between align-items-center pt-3">
                        <h5 class="card-title">
                          Mother's
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Mother</label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                          <label for="inputFirstName" class="form-label">First name</label>
                          <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                        </div>
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
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="inputDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                        </div>
                        <div class="col-md-5  position-relative">
                          <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                          <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                          <label for="inputAge" class="form-label">Mother's Age</label>
                          <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                        </div>
                        <!-- START AGE -->
                        <!-- CONTACT INFORMATION -->
                        <div class="col-md-3 position-relative">
                          <label for="telephone" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                          <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                          <select class="form-select" id="inputLivingDeceased" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- MOTHER'S OCCUPATION  -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOccupation" class="form-label"> Occupation</label>
                          <select class="form-select" id="inputOccupation" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputOthers" class="form-label">If Occupation is not in the list,please specify here</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyName" class="form-label">Company's Name</label>
                          <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyAddress" class="form-label">Company's Address</label>
                          <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                          <select class="form-select" id="inputIncome" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                          <select class="form-select" id="inputEducationalAttainment" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- END MOTHER'S INFORMATION -->
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                      <!-- GUARDIAN'S INFORMATION -->
                      <div class="d-flex justify-content-between align-items- py-3">
                        <h5 class="card-title">
                          Guardian's
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Guardian</label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                          <label for="inputFirstName" class="form-label">First name</label>
                          <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                        </div>
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
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="inputDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                        </div>
                        <div class="col-md-5  position-relative">
                          <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                          <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                          <label for="inputAge" class="form-label">Guardian's Age</label>
                          <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                        </div>
                        <!-- START AGE -->
                        <!-- START AGE -->
                        <div class="col-md-6 position-relative">
                          <label for="inputRelationship" class="form-label">Relationship</label>
                          <input type="Age" class="form-control" id="inputRelationship" aria-describedby="inputRelationship" value="" required>
                        </div>
                        <!-- START AGE -->
                        <!-- CONTACT INFORMATION -->
                        <div class="col-md-3 position-relative">
                          <label for="telephone" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                          <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                          <select class="form-select" id="inputLivingDeceased" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- GUARDIAN'S INFORMATION  -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOccupation" class="form-label"> Occupation</label>
                          <select class="form-select" id="inputOccupation" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputOthers" class="form-label">If Occupation is not in the list,please specify here</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyName" class="form-label">Company's Name</label>
                          <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyAddress" class="form-label">Company's Address</label>
                          <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                          <select class="form-select" id="inputIncome" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                          <select class="form-select" id="inputEducationalAttainment" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- END GUARDIAN'S INFORMATION -->
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                      <!-- GUARDIAN'S INFORMATION -->
                      <div class="d-flex justify-content-between align-items- py-3">
                        <h5 class="card-title">
                          Spouse
                          Information
                          (If
                          Married)
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Spouse</label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                          <label for="inputFirstName" class="form-label">First name</label>
                          <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                        </div>
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
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="inputDate" class="form-label">Birth Date</label>
                          <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                        </div>
                        <div class="col-md-5  position-relative">
                          <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                          <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                          <label for="inputAge" class="form-label">Guardian's Age</label>
                          <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                        </div>
                        <!-- START AGE -->
                        <!-- START AGE -->
                        <div class="col-md-6 position-relative">
                          <label for="inputLivingDeceased" class="form-label"> Relationship </label>
                          <select class="form-select" id="inputLivingDeceased" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Husband</option>
                            <option>Wife</option>
                          </select>
                        </div>
                        <!-- START AGE -->
                        <!-- CONTACT INFORMATION -->
                        <div class="col-md-3 position-relative">
                          <label for="telephone" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                          <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                          <select class="form-select" id="inputLivingDeceased" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- SPOUSE INFORMATION  -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOccupation" class="form-label"> Occupation</label>
                          <select class="form-select" id="inputOccupation" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputOthers" class="form-label">If Occupation is not in the list,please specify here</label>
                          <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyName" class="form-label">Company's Name</label>
                          <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputCompanyAddress" class="form-label">Company's Address</label>
                          <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                          <select class="form-select" id="inputIncome" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                          <select class="form-select" id="inputEducationalAttainment" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!-- END SPOUSE INFORMATION -->
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                    </div>

                    <!--ADDITIONAL BACKGROUND-->
                    <div class="tab-pane fade" id="bordered-justified-additional-information" role="tabpanel" aria-labelledby="additional-information">
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                          Additional
                          Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-3">
                          <label class="form-check-label fw-bold">Remarks:</label>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="addInfoApproveRadioDefault" id="addInfoApproveRadioDefault1">
                            <label class="mx-2 form-check-label" for="addInfoApproveCheckBox"> Approve </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="addInfoReviewDefault" id="addInfoReviewDefault2">
                            <label class="mx-2 form-check-label" for="addInfoReviewCheckBox"> For Review </label>
                          </div>
                          <div class="form-check form-radio">
                            <input class="form-check-input" type="radio" name="addInfoModiDefault" id="addInfoModiDefault3">
                            <label class="mx-2 form-check-label" for="addInfoModiCheckBox"> For Modification </label>
                          </div>
                        </div>
                      </div>
                      <!-- Custom Styled Validation with Tooltips -->
                      <form class="row g-4 needs-validation" novalidate>
                        <!-- WORKING STUDENT -->
                        <div class="col-md-4 position-relative">
                          <label for="inputWorkingStudent" class="form-label">Are you a Working Student?</label>
                          <select class="form-select" id="inputWorkingStudent" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!---OFW PARENTS -->
                        <div class="col-md-8 position-relative">
                          <label for="inputOfwParents" class="form-label">Do you have a Parent/s who is/are an OFW?</label>
                          <select class="form-select" id="inputOfwParents" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!--OFW FAMILY MEMBERS -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who are an OFW?</label>
                          <select class="form-select" id="inputOfwMembers" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!---PWD PARENTS -->
                        <div class="col-md-6 position-relative">
                          <label for="inputPwdParents" class="form-label">Do you have a Parent/s who have PWD?</label>
                          <select class="form-select" id="inputPwdParents" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!---PWD FAMILY MEMBERS -->
                        <div class="col-md-6 position-relative">
                          <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who have PWD?</label>
                          <select class="form-select" id="inputOfwMembers" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!---PARENTS STATUS -->
                        <div class="col-md-6 position-relative">
                          <label for="inputParentStatus" class="form-label">What is your Parents Status?</label>
                          <select class="form-select" id="inputParentStatus" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <!---STUDENT PWD -->
                        <div class="col-md-6 position-relative">
                          <label for="inputStudentPwd" class="form-label">Are you a Student with PWD?</label>
                          <select class="form-select" id="inputStudentPwd" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                      </form>
                      <!-- End Custom Styled Validation with Tooltips -->
                    </div>

                    <!-- PAGINATION -->
                    <div class="pt-3 d-grid gap-2 d-flex justify-content-end align-items-center" src="pagination.js">
                      </script>
                      <nav aria-label="pagination">
                        <ul class="pagination" id="borderedTabJustifiedPagination">
                          <li class="page-item">
                            <a class="page-link" href="#bordered-justified-personal-information" data-bs-slide-to="0">Back
                              to
                              first
                              page</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#bordered-justified-personal-information" data-bs-slide-to="0">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#bordered-justified-educational-background" data-bs-slide-to="1">2</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#bordered-justified-family-background" data-bs-slide-to="2">3</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#bordered-justified-additional-information" data-bs-slide-to="3">4</a>
                          </li>
                          <!-- <li class="page-item"><a class="page-link" href="#" data-bs-slide-to="1">Next</a></li> -->
                        </ul>
                      </nav>
                      <!-- End Basic Pagination -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->