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
                  <img src="<?php echo $user_info['profile_img'] == null ? "assets/img/profile-img.jpg" : $user_info['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                </div>
                <div class="ms-4 adjustable-line-spacing" style="margin-top: 115px;">
                  <h5 class="fw-bold"><?php echo $user_info['first_name'] . " " . $user_info['last_name'] ?></h5>
                  <p>Educational
                    Assistance
                    Scholarship -
                    <?= get_scholar_type($_SESSION['scholarType']) ?>
                    <br><?php echo $user_info['eac_number'] ?></br>
                  </p>
                </div>
                <input type="hidden" id="userId" value="<?= $_SESSION['id'] ?>">
                <input type="hidden" id="scholarLevel" value="<?= $_SESSION['scholarType'] ?>">
              </div>
              <!-- Bordered Tabs Justified -->
              <div class="my-2 p-4 text-black" style="background-color: #ffff; height:10px;">
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="personal-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link  w-100" id="educational-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational-background" type="button" role="tab" aria-controls="educational-background" aria-selected="false">Educational Background</button>
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
                <!-- BENEFICIARIES INFORMATION -->
                <div class="tab-content" id="borderedTabJustifiedContent">
                  <!-- PERSONAL INFORMATION -->
                  <div class="tab-pane fade show active" id="bordered-justified-personal-information" role="tabpanel" aria-labelledby="personal-information">
                    <!-- <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title">
                        Primary
                        Information
                      </h5>
                    </div> -->
                    <form class="row g-4 pt-3 needs-validation" method="post" id="benefInfo">
                      <!-- FULL NAME -->
                      <div class="col-md-3 position-relative">
                        <label for="inputFirstName" class="form-label">First name</label>
                        <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="<?php echo $user_info['first_name'] ?>" disabled>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="inputMiddleName" class="form-label">Middle name</label>
                        <input type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="<?php echo $user_info['middle_name'] ?>" disabled>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="inputLastName" class="form-label">Last name</label>
                        <input type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="<?php echo $user_info['last_name'] ?>" disabled>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="<?php echo $user_info['suffix'] ?>" disabled>
                      </div>

                      <!-- CONTACT NUMBER AND EMAIL ADDRESS -->
                      <div class="col-md-5 position-relative">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input form="benefInfo" type="telephone" name="Contact Number" class="form-control" id="contact_number" aria-describedby="inputGroupPrepend2" value="<?php echo substr($user_info['contact_number'], 2) ?>">
                        </div>
                      </div>

                      <!-- EMAIL ADDRESS -->
                      <div class="col-md-7 position-relative">
                        <label for="email" class="form-label">Email Address</label>
                        <input form="benefInfo" type="email" name="Email Address" class="form-control" id="email" aria-describedby="inputEmailAddress" value="<?php echo $user_data[2] ?>">
                      </div>

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input form="benefInfo" type="date" name="Birthdate" class="form-control" id="birth_date" aria-describedby="inputDate" value="<?php echo $user_info['birth_date'] ?>" <?php echo $user_info['birth_date'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- PLACE OF BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="birth_place" class="form-label">Place of Birth</label>
                        <input form="benefInfo" type="text" name="Birth Place" class="form-control" id="birth_place" aria-describedby="birth_place" value="<?php echo $user_info['birth_place'] ?>" <?php echo $user_info['birth_place'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- ADDRESS -->
                      <div class="col-md-4 position-relative">
                        <label for="address_line" class="form-label">Address</label>
                        <input form="benefInfo" type="text" name="Address Line" class="form-control" id="address_line" aria-describedby="inputAddress" value="<?php echo $user_info['address_line'] ?>" <?php echo $user_info['address_line'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- REGION -->
                      <div class="col-md-3 position-relative">
                        <label for="region" class="form-label">Region</label>
                        <?php if ($user_info['region'] != "") : ?>
                          <input class="form-control" type="text" value="<?php echo $user_info['region'] ?>" disabled>
                        <?php else : ?>
                          <select form="benefInfo" name="Region" class="form-select" id="region">
                            <option selected disabled value="">Choose...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid Province.
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- PROVINCE -->
                      <div class="col-md-3 position-relative">
                        <label for="province" class="form-label">Province</label>
                        <?php if ($user_info['province'] != "") : ?>
                          <input class="form-control" type="text" value="<?php echo $user_info['province'] ?>" disabled>
                        <?php else : ?>
                          <select form="benefInfo" name="Province" class="form-select" id="province">
                            <option selected disabled value="">Choose...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid Province.
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- MUNICIPALITY -->
                      <div class="col-md-3 position-relative">
                        <label for="city" class="form-label">Municipality</label>
                        <?php if ($user_info['municipality'] != "") : ?>
                          <input class="form-control" type="text" value="<?php echo $user_info['municipality'] ?>" disabled>
                        <?php else : ?>
                          <select form="benefInfo" name="City" class="form-select" id="city">
                            <option selected disabled value="">Choose...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid Municipality.
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- BARANGAY -->
                      <div class="col-md-3 position-relative">
                        <label for="barangay" class="form-label">Barangay</label>
                        <?php if ($user_info['barangay'] != "") : ?>
                          <input class="form-control" type="text" value="<?php echo $user_info['barangay'] ?>" disabled>
                        <?php else : ?>
                          <select form="benefInfo" name="Barangay" class="form-select" id="barangay">
                            <option selected disabled value="">Choose...</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select a valid Barangay.
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- ZIP CODE -->
                      <div class="col-md-2 position-relative">
                        <label for="zip_code" class="form-label">ZIP Code</label>
                        <input form="benefInfo" type="zipCode" name="Zip Code" class="form-control" id="zip_code" aria-describedby="inputZipCode" value="<?php echo $user_info['zip_code'] ?>" <?php echo $user_info['zip_code'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- CITIZENSHIP -->
                      <div class="col-md-3 position-relative">
                        <label for="citizenship" class="form-label">Citizenship</label>
                        <input form="benefInfo" type="text" name="Citizenship" class="form-control" id="citizenship" aria-describedby="inputCitizenship" value="<?php echo ($user_info['citizenship'] == 0 ? "Filipino" : "Others") ?>" <?php echo $user_info['citizenship'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- RESIDENCY -->
                      <div class="col-md-4 position-relative">
                        <label for="years_of_residency" class="form-label">Years of Residency in Santo Tomas</label>
                        <input form="benefInfo" type="number" name="Years of Residency" class="form-control" id="years_of_residency" aria-describedby="inputResidency" value="<?php echo $user_info['years_of_residency'] ?>" <?php echo $user_info['years_of_residency'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- LANGUAGE -->
                      <div class="col-md-3 position-relative">
                        <label for="language" class="form-label">Mother Tongue</label>
                        <input form="benefInfo" type="text" name="Language" class="form-control" id="language" aria-describedby="inputMotherTongue" value="<?php echo $user_info['language'] ?>" <?php echo $user_info['language'] != null ? "disabled" : "" ?>>
                      </div>

                      <!-- START RELIGION -->
                      <div class="col-md-4 position-relative">
                        <label for="religion" class="form-label">Religion</label>
                        <select form="benefInfo" name="Religion" class="form-select" id="religion" disabled>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($religionArr as $key => $value) : ?>
                            <option value="<?php echo $key ?>" <?php echo $key == $user_info['religion'] ? "selected" : "" ?>><?php echo $value ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="invalid-tooltip">
                          Please select a Religion.
                        </div>
                      </div>

                      <!-- SEX -->
                      <div class="col-md-4 position-relative">
                        <label for="gender" class="form-label">Gender</label>
                        <select form="benefInfo" name="Gender" class="form-select" id="gender" disabled>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($genderArr as $key => $value) : ?>
                            <option value="<?php echo $key ?>" <?php echo $key == $user_info['gender'] ? "selected" : "" ?>><?php echo $value ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid Gender.
                        </div>
                      </div>

                      <!--CIVIL STATUS -->
                      <div class="col-md-4 position-relative">
                        <label for="civil_status" class="form-label">Civil Status</label>
                        <select form="benefInfo" name="Civil Status" class="form-select" id="civil_status" disabled>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($civilArr as $key => $value) : ?>
                            <option value="<?php echo $key ?>" <?php echo $key == $user_info['civil_status'] ? "selected" : "" ?>><?php echo $value ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid Civil Status.
                        </div>
                      </div>


                      <!-- BUTTON -->
                      <div class="float-end">
                        <button type="submit" class="btn btn-outline-success" form="benefInfo">Save</button>
                        <!-- <button type="button" class="btn btn-outline-warning">Edit Profile</button> -->
                      </div>
                    </form>
                  </div>

                  <!-- EDUCATIONAL BACKGROUND -->
                  <div class="tab-pane fade" id="bordered-justified-educational-background" role="tabpanel" aria-labelledby="educational-background">
                    <h5 class="card-title" style="margin-bottom: 0;">General Education Information</h5>
                    <form class="row g-4 pt-2 needs-validation" method="post" id="educationBG">
                      <!-- GENERAL EDUC -->
                      <div class="col-md-6 position-relative">
                        <label for="graduating_flag" class="form-label">Are you Graduating this Semester/Term?</label>
                        <?php if ($gen_info != null) : ?>
                          <select class="form-select" name="Graduating Flag" id="graduating_flag" <?php echo $gen_info['graduating_flag'] != null ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <option value="0" <?php echo $gen_info['graduating_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                            <option value="1" <?php echo $gen_info['graduating_flag'] == 1 ? "selected" : "" ?>>No</option>
                          </select>
                        <?php else : ?>
                          <select class="form-select" id="graduating_flag" name="Graduating Flag">
                            <option selected disabled value="">Choose...</option>
                            <option value="0">Yes</option>
                            <option value="1">No</option>
                          </select>
                        <?php endif; ?>
                        <div class="invalid-tooltip">
                          Please select Yes or No.
                        </div>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="honor_flag" class="form-label">Are you Graduating with Honors?</label>
                        <?php if ($gen_info != null) : ?>
                          <select class="form-select" name="Honor Flag" id="honor_flag" <?php echo $gen_info['honor_flag'] != null ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <option value="0" <?php echo $gen_info['honor_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                            <option value="1" <?php echo $gen_info['honor_flag'] == 1 ? "selected" : "" ?>>No</option>
                          </select>
                        <?php else : ?>
                          <select class="form-select" id="honor_flag" name="Honor Flag">
                            <option selected disabled value="">Choose...</option>
                            <option value="0">Yes</option>
                            <option value="1">No</option>
                          </select>
                        <?php endif; ?>
                        <div class="invalid-tooltip">
                          Please select Yes or No.
                        </div>
                      </div>
                      <div class="col-md-4 position-relative">
                        <label for="honor_type" class="form-label">Specify your Award/Honor</label>
                        <?php if ($gen_info != null) : ?>
                          <select class="form-select" name="Honor Type" id="honor_type" <?php echo $gen_info['honor_type'] != null ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <option value="0" <?php echo $gen_info['honor_type'] == 0 ? "selected" : "" ?>>With Highest Honors</option>
                            <option value="1" <?php echo $gen_info['honor_type'] == 1 ? "selected" : "" ?>>With High Honors</option>
                            <option value="2" <?php echo $gen_info['honor_type'] == 2 ? "selected" : "" ?>>With Honors</option>
                            <option value="3" <?php echo $gen_info['honor_type'] == 3 ? "selected" : "" ?>>Others</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Awards/Honor.
                          </div>
                      </div>
                      <div class="col-md-8 position-relative">
                        <label for="other_honor" class="form-label">If not specified in the list, kindly input your Honor/ Award here.</label>
                        <input type="text" class="form-control" id="other_honor" name="Other Honor" aria-describedby="other_honor" value="<?= $gen_info['other_honor'] ?>">
                      <?php else : ?>
                        <select class="form-select" id="honor_type" name="Honor Type">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">With Highest Honors</option>
                          <option value="1">With High Honors</option>
                          <option value="2">With Honors</option>
                          <option value="3">Others</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select Awards/Honor.
                        </div>
                      </div>
                      <div class="col-md-8 position-relative">
                        <label for="other_honor" class="form-label">If not specified in the list, kindly input your Honor/ Award here.</label>
                        <input type="text" class="form-control" id="other_honor" aria-describedby="other_honor" name="Other Honor" disabled>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="graduation_year" class="form-label">If not Graduating, what year are you Graduating?</label>
                        <?php if ($gen_info != null) : ?>
                          <select class="form-select" name="Year of Graduation" id="graduation_year" <?php echo $gen_info['graduation_year'] != null ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <?php for ($i = 2012; $i <= date("Y") + 5; $i++) : ?>
                              <option value="<?php echo $i ?>" <?php echo $gen_info['graduation_year'] == $i ? "selected" : "" ?>><?php echo $i ?></option>
                            <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select expected Year of Graduation.
                          </div>
                        <?php else : ?>
                          <select class="form-select" id="graduation_year" name="Year of Graduation">
                            <option selected disabled value="">Choose...</option>
                            <?php for ($i = 2012; $i <= date("Y") + 5; $i++) : ?>
                              <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php endfor; ?>
                          </select>
                        <?php endif; ?>
                        <div class="invalid-tooltip">
                          Please select expected Year of Graduation.
                        </div>
                      </div>
                    <?php endif; ?>
                    </form>

                    <!-- COLLEGE LEVEL -->
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title mt-4">College Level</h5>
                    </div>
                    <form class="row g-4 needs-validation" novalidate>
                      <?php if ($_SESSION['scholarType'] == 1) : ?>
                        <!-- SCHOOL NAME -->
                        <div class="col-md-5 position-relative">
                          <label for="c_school" class="form-label">Name of School Attended</label>
                          <select class="form-select" name="College Attended" id="c_school" <?php echo $education[2] != null ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($school as $key => $col) : ?>
                              <?php if ($col['school_type'] == 0) : ?>
                                <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                            <option value="Others">Others</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select School.
                          </div>
                        </div>
                        <!-- IF NOT SPECIFIED -->
                        <div class="col-md-7 position-relative">
                          <label for="c_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="text" name="Other College Attended" class="form-control" id="c_otherSchool" aria-describedby="c_otherSchool" disabled>
                        </div>
                        <!-- YEAR LEVEL -->
                        <div class="col-md-3 position-relative">
                          <label for="c_year_level" class="form-label">Year Level</label>
                          <select class="form-select" id="c_year_level" name="College Year Level">
                            <option selected disabled value="">Choose...</option>
                            <?php for ($i = 5; $i >= 1; $i--) : ?>
                              <?php if ($i == 1) : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?>st Year</option>
                              <?php elseif ($i == 2) : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?>nd Year</option>
                              <?php elseif ($i == 3) : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?>rd Year</option>
                              <?php else : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?>th Year</option>
                              <?php endif; ?>
                            <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Year Level.
                          </div>
                        </div>
                        <!-- COURSE TAKEN -->
                        <div class="col-md-9 position-relative">
                          <label for="c_course" class="form-label">Course Taken</label>
                          <select class="form-select" id="c_course" name="College Course">
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($course as $key => $cr) : ?>
                              <option value="<?php echo $key ?>"><?php echo $cr ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Course.
                          </div>
                        </div>
                        <!-- IF NOT SPECIFIED -->
                        <div class="col-md-12 position-relative">
                          <label for="c_otherCourse" class="form-label">If not specified in the list, kindly input the Course.</label>
                          <input type="text" name="Other College Course" class="form-control" id="c_otherCourse" aria-describedby="c_otherCourse" disabled>
                        </div>
                        <!-- MAJOR IN -->
                        <div class="col-md-12 position-relative">
                          <label for="c_major" class="form-label">Major in</label>
                          <input type="text" name="College Major" class="form-control" id="c_major" aria-describedby="c_major">
                        </div>
                        <!-- SCHOOL ADDRESS -->
                        <div class="col-md-12 position-relative">
                          <label for="c_school_address" class="form-label">School Address</label>
                          <input type="text" name="College Adddress" class="form-control" id="c_school_address" aria-describedby="c_school_address" disabled>
                        </div>

                        <!-- TABLE OF AWARDS FOR COLLEGE LEVEL -->
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">List of Awards</h5>
                            <!-- CLOSE TABLE -->
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <div class="add">
                                <button class="btn btn-sm btn-primary me-2" type="button" id="addCollegeTable">Add Awards/Honor</button>
                              </div>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped table-hover" id="collegeTable" width="100%" cellspacing="100%">
                              <thead>
                                <tr class="text-center">
                                  <th>No</th>
                                  <th>Honor/Award</th>
                                  <th>Academic Year</th>
                                  <th>Semester/Quarter</th>
                                  <th>Year Level</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      <?php endif; ?>
                    </form>

                    <!-- SENIOR HIGHSCHOOL LEVEL -->
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title mt-4">Senior Highschool Level</h5>
                    </div>
                    <form class="row g-4 needs-validation" novalidate>
                      <?php if ($_SESSION['scholarType'] <= 2) : ?>
                        <!-- se -->
                        <div class="col-md-6 position-relative">
                          <label for="s_school" class="form-label">Name of School Attended</label>
                          <select class="form-select" id="s_school" name="Senior High School Name">
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($school as $key => $col) : ?>
                              <?php if ($col['school_type'] == 1) : ?>
                                <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                            <option value="Others">Others</option>
                          </select>
                          <div class="invalid-tooltip">
                            Please select School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="s_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="Others" name="Other Senior High School Name" class="form-control" id="s_otherSchool" aria-describedby="s_otherSchool" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="s_year_level" class="form-label">Year Level</label>
                          <select class="form-select" id="s_year_level" name="SHS Year Level">
                            <option selected disabled value="">Choose...</option>
                            <?php for ($i = 12; $i >= 11; $i--) : ?>
                              <option value="<?php echo $i ?>">Grade <?php echo $i ?></option>
                            <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Year Level.
                          </div>
                        </div>
                        <div class="col-md-3 position-relative">
                          <label for="s_strand" class="form-label">Strand Taken</label>
                          <select class="form-select" id="s_strand" name="SHS Strand">
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($strand as $key => $str) : ?>
                              <option value="<?php echo $key ?>"><?php echo $str ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Course.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="s_otherStrand" class="form-label">If not specified in the list, kindly input the Strand.</label>
                          <input type="Others" name="Other SHS Strand" class="form-control" id="s_otherStrand" aria-describedby="s_otherStrand" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="s_schoolAddress" class="form-label">School Address</label>
                          <input type="Others" name="Other SHS Address" class="form-control" id="s_schoolAddress" aria-describedby="s_schoolAddress" disabled>
                        </div>
                        <div class="column">
                          <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">List of Awards</h5>
                            <!-- CLOSE TABLE -->
                            <div class="d-flex align-items-center d-grid gap-2">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                              </div>
                              <div class="add">
                                <button class="btn btn-sm btn-primary me-2" type="button" id="addSHSTable">Add Awards/Honor</button>
                              </div>
                            </div>
                          </div>
                          <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable table-striped table-hover" id="shsTable" width="100%" cellspacing="0">
                              <thead>
                                <tr class="text-center">
                                  <th>No</th>
                                  <th>Honor/Award</th>
                                  <th>Academic Year</th>
                                  <th>Semester/Quarter</th>
                                  <th>Year Level</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                        <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Bordered Tabs Justified -->
              <div class="button">
                <div class="d-flex justify-content-end align-items-end mt-5">
                  <button type="button" class="btn btn-success" id="submitApplication">Submit Application</button>
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