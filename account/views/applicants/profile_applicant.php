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
                <div class="profile-pic ms-4 mt-5 d-flex flex-column" style="width: 150px; height:170px">
                  <label class="-label" for="file">
                    <span class="glyphicon glyphicon-camera"></span>
                    <span>Change Image</span>
                  </label>
                  <input id="file" type="file" onchange="loadFile(event)" />
                  <!-- <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg" id="output" width="200" /> -->
                  <img id="output" src="<?php echo $user_info['profile_img'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                </div>
                <!-- <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height:300px">
                  <img src="<?php echo $user_info['profile_img'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                </div> -->

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
                <input type="hidden" id="currentActive" value="<?= $status['current_active'] ?>">

              </div>
              <!-- Bordered Tabs Justified -->
              <div class="my-2 p-4 text-black" style="background-color: #ffff; height:10px;">
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="personal-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation" id="educBG" data-status=<?= ($status['info_flag'] == 0) ? "disabled" : "" ?>>
                    <button class="nav-link  w-100" id="educational-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational-background" type="button" role="tab" aria-controls="educational-background" aria-selected="false">Educational Background</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation" id="famBG" data-status=<?= ($status['educ_flag'] == 0) ? "disabled" : "" ?>>
                    <button class="nav-link w-100" id="family-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-family-background" type="button" role="tab" aria-controls="family-background" aria-selected="false">Family Background</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation" id="addBG" data-status=<?= ($status['family_flag'] == 0) ? "disabled" : "" ?>>
                    <button class="nav-link w-100" id="additional-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-additional-information" type="button" role="tab" aria-controls="additional-information" aria-selected="false">Additional Information</button>
                  </li>
                </ul>
              </div>
              <div class="card-body p-3">
                <!-- BENEFICIARIES INFORMATION -->
                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                  <!-- PERSONAL INFORMATION -->
                  <div class="tab-pane fade" id="bordered-justified-personal-information" role="tabpanel" aria-labelledby="personal-information">
                    <form method="post" id="benefInfo">
                      <!-- <h5 class="card-title">Primary Information</h5> -->
                      <!-- Custom Styled Validation with Tooltips -->
                      <div class="row g-4">
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

                        <div class="col-md-5 position-relative">
                          <label for="contact_number" class="form-label">Contact Number</label>
                          <div class="input-group">
                            <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                            <input form="benefInfo" type="telephone" name="Contact Number" class="form-control" id="contact_number" aria-describedby="inputGroupPrepend2" value="<?php echo substr($user_info['contact_number'], 2) ?>" <?= $finishFlag ? "disabled" : "" ?>>
                          </div>
                        </div>

                        <div class="col-md-7 position-relative">
                          <label for="email" class="form-label">Email Address</label>
                          <input form="benefInfo" type="email" name="Email Address" class="form-control" id="email" aria-describedby="inputEmailAddress" value="<?php echo $user_data[2] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                        </div>

                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                          <label for="birth_date" class="form-label">Birth Date</label>
                          <input form="benefInfo" type="date" name="Birthdate" class="form-control" id="birth_date" aria-describedby="inputDate" value="<?php echo $user_info['birth_date'] ?>" <?php echo $user_info['birth_date'] != null ? "disabled" : "" ?>>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="birth_place" class="form-label">Place of Birth</label>
                          <input form="benefInfo" type="text" name="Birth Place" class="form-control" id="birth_place" aria-describedby="birth_place" value="<?php echo $user_info['birth_place'] ?>" <?php echo $user_info['birth_place'] != null ? "disabled" : "" ?>>
                        </div>

                        <!-- ADDRESS -->
                        <div class="col-md-4 position-relative">
                          <label for="address_line" class="form-label">Address</label>
                          <input form="benefInfo" type="text" name="Address Line" class="form-control" id="address_line" aria-describedby="inputAddress" value="<?php echo $user_info['address_line'] ?>" <?php echo $user_info['address_line'] != null ? "disabled" : "" ?>>
                        </div>

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
                      </div>

                      <div class="float-end">
                        <?php if (!$finishFlag) : ?>
                          <button type="submit" class="btn btn-outline-success" form="benefInfo">Save</button>
                        <?php endif; ?>
                      </div>
                    </form>
                  </div>

                  <!-- EDUCATIONAL BACKGROUND -->
                  <div class="tab-pane fade" id="bordered-justified-educational-background" role="tabpanel" aria-labelledby="educational-background">
                    <form method="post" id="educationBG">
                      <h5 class="card-title"> General Education Information</h5>
                      <div class="row g-4">
                        <!-- General Education Information -->
                        <div class="col-md-6 position-relative">
                          <label for="graduating_flag" class="form-label">Are you Graduating this Semester/Term?</label>
                          <?php if ($gen_info != null) : ?>
                            <select class="form-select" name="Graduating Flag" id="graduating_flag" <?= $finishFlag ? "disabled" : "" ?>>
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
                            <select class="form-select" name="Graduating with Honor Flag" id="honor_flag" <?= $finishFlag ? "disabled" : "" ?>>
                              <option selected disabled value="">Choose...</option>
                              <option value="0" <?php echo $gen_info['honor_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                              <option value="1" <?php echo $gen_info['honor_flag'] == 1 ? "selected" : "" ?>>No</option>
                            </select>
                          <?php else : ?>
                            <select class="form-select" id="honor_flag" name="Graduating with Honor Flag">
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
                            <select class="form-select" name="Honor Type" id="honor_type" <?= $finishFlag ? "disabled" : "" ?>>
                              <option selected disabled value="">Choose...</option>
                              <option value="0" <?php echo $gen_info['honor_type'] == 0 ? "selected" : "" ?>>With Highest Honors</option>
                              <option value="1" <?php echo $gen_info['honor_type'] == 1 ? "selected" : "" ?>>With High Honors</option>
                              <option value="2" <?php echo $gen_info['honor_type'] == 2 ? "selected" : "" ?>>With Honors</option>
                              <option value="3" <?php echo $gen_info['honor_type'] == 3 ? "selected" : "" ?>>Others</option>
                              <option value="4" <?php echo $gen_info['honor_type'] == 3 ? "selected" : "" ?>>N/A</option>
                            </select>
                            <div class="invalid-tooltip">
                              Please select Awards/Honor.
                            </div>
                        </div>
                        <div class="col-md-8 position-relative">
                          <label for="other_honor" class="form-label">If not specified in the list, kindly input your Honor/ Award here.</label>
                          <input type="text" class="form-control" id="other_honor" name="Other Honor" aria-describedby="other_honor" value="<?= $gen_info['other_honor'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                        </div>
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
                        <input type="text" class="form-control" id="other_honor" aria-describedby="other_honor" name="Other Honor">
                      </div>
                    <?php endif; ?>
                    <div class="col-md-6 position-relative">
                      <label for="graduation_year" class="form-label">If not Graduating, what year are you Graduating?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" name="Year of Graduation" id="graduation_year" <?= $finishFlag ? "disabled" : "" ?>>
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
                    <div class="col-md-6 position-relative">
                      <label for="gwa" class="form-label">GWA</label>
                      <?php if ($gen_info != null) : ?>
                        <input type="number" name="GWA" id="gwa" min="50" step="any" class="form-control col" value="<?= $gen_info['gwa'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                      <?php else : ?>
                        <input type="number" name="GWA" id="gwa" min="50" step="any" class="form-control col">
                      <?php endif; ?>
                    </div>
                  </div>
                  <input type="hidden" id="collegeId" value="<?= (!isset($education[1]['educ_id'])) ? "" : $education[1]['educ_id'] ?>">
                  <input type="hidden" id="shsId" value="<?= (!isset($education[2]['educ_id'])) ? "" : $education[2]['educ_id'] ?>">
                  <input type="hidden" id="jhsId" value="<?= (!isset($education[3]['educ_id'])) ? "" : $education[3]['educ_id'] ?>">
                  <input type="hidden" id="elemId" value="<?= (!isset($education[4]['educ_id'])) ? "" : $education[4]['educ_id'] ?>">

                  <!-- COLLEGE LEVEL -->
                  <?php if ($_SESSION['scholarType'] == 1) : ?>
                    <h5 class="card-title mt-3">College Level</h5>
                    <!-- Custom Styled Validation with Tooltips -->
                    <?php if (isset($education[1])) : ?>
                      <div class="row g-4">
                        <!-- COLLEGE LEVEL-->
                        <div class="col-md-6 position-relative">
                          <label for="c_school" class="form-label">Name of School Attended</label>
                          <select class="form-select" name="College Attended" id="c_school" <?= $finishFlag ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($school as $key => $col) : ?>
                              <?php if ($col['school_type'] == 0) : ?>
                                <option value="<?php echo $key ?>" <?php echo $education[1]['school'] == $key ? "selected" : "" ?>><?php echo $col['school_name'] ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!is_numeric($education[1]['school'])) : ?>
                              <option value="Others" selected>Others</option>
                            <?php else : ?>
                              <option value="Others">Others</option>
                            <?php endif; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select School.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="c_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="text" name="Other College Attended" class="form-control" id="c_otherSchool" aria-describedby="c_otherSchool" <?= $finishFlag ? "disabled" : "" ?> value="<?= is_numeric($education[1]['school']) ? "" : $education[1]['school'] ?>">
                        </div>
                        <div class="col-md-2 position-relative">
                          <label for="c_year_level" class="form-label">Year Level</label>
                          <select class="form-select" id="c_year_level" name="College Year Level" <?= $finishFlag ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <?php for ($i = 5; $i >= 1; $i--) : ?>
                              <?php if ($i == 1) : ?>
                                <option value="<?php echo $i ?>" <?php echo $education[1]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>st Year</option>
                              <?php elseif ($i == 2) : ?>
                                <option value="<?php echo $i ?>" <?php echo $education[1]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>nd Year</option>
                              <?php elseif ($i == 3) : ?>
                                <option value="<?php echo $i ?>" <?php echo $education[1]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>rd Year</option>
                              <?php else : ?>
                                <option value="<?php echo $i ?>" <?php echo $education[1]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>th Year</option>
                              <?php endif; ?>
                            <?php endfor; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Year Level.
                          </div>
                        </div>
                        <div class="col-md-10 position-relative">
                          <label for="c_course" class="form-label">Course Taken</label>
                          <select class="form-select" id="c_course" name="College Course" <?= $finishFlag ? "disabled" : "" ?>>
                            <option selected disabled value="">Choose...</option>
                            <?php foreach ($course as $key => $cr) : ?>
                              <option value="<?php echo $key ?>" <?php echo $education[1]['course'] == $key ? "selected" : "" ?>><?php echo $cr ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-tooltip">
                            Please select Course.
                          </div>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="c_otherCourse" class="form-label">If not specified in the list, kindly input the Course.</label>
                          <input type="text" name="Other College Course" class="form-control" id="c_otherCourse" aria-describedby="c_otherCourse" value="<?= is_numeric($education[1]['course']) ? "" : $education[1]['course'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="c_major" class="form-label">Major</label>
                          <input type="text" name="College Major" class="form-control" id="c_major" aria-describedby="c_major" value="<?= $education[1]['major'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="c_school_address" class="form-label">School Address</label>
                          <input type="text" name="College Adddress" class="form-control" id="c_school_address" aria-describedby="c_school_address" value="<?= $education[1]['school_address'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                        </div>
                        <!-- COLLEGE AWARD TABLE -->
                        <div class="column">
                          <div class="card">
                            <div class="card-body">
                              <div class="table-responsive">
                                <div class="d-flex justify-content-between align-items-center">
                                  <h5 class="card-title">List of Awards</h5>
                                  <button class="btn btn-small btn-warning" type="button" id="addCollegeTable" <?= $finishFlag ? "disabled" : "" ?>>Add Awards/Honor</button>
                                </div>
                                <!-- COLLGE AWARD TABLE 1 -->
                                <table class="table table-striped header-fixed" id="collegeTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr class="text-center">
                                      <th>No</th>
                                      <th>Award ID</th>
                                      <th>Honor/Award</th>
                                      <th>Academic Year</th>
                                      <th>Semester/Quarter</th>
                                      <th>Year Level</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (isset($education[1]['awards'])) : ?>
                                      <?php foreach ($education[1]['awards'] as $key => $award) : ?>
                                        <tr>
                                          <td class="text-center"><?php echo $key + 1 ?></td>
                                          <td class="text-center"><?php echo $award['id'] ?></td>
                                          <td><?php echo $award['honor'] ?></td>
                                          <td class="text-center"><?php echo $award['acad_year'] ?></td>
                                          <td class="text-center"><?php echo $award['sem'] ?></td>
                                          <td class="text-center"><?php echo $award['year_level'] ?></td>
                                          <td class="text-center">
                                            <?php if ($finishFlag) : ?>
                                              <span class="text-danger">You already submitted your application.</span>
                                            <?php else : ?>
                                              <button class="editCollegeRow btn btn-primary btn-sm">Edit</button><button class="deleteCollegeRow btn btn-danger btn-sm">Delete</button>
                                            <?php endif; ?>
                                          </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php else : ?>
                      <div class="row g-4">
                        <!-- COLLEGE -->
                        <div class="col-md-6 position-relative">
                          <label for="c_school" class="form-label">Name of School Attended</label>
                          <select class="form-select" name="College Attended" id="c_school">
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
                        <div class="col-md-6 position-relative">
                          <label for="c_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                          <input type="text" name="Other College Attended" class="form-control" id="c_otherSchool" aria-describedby="c_otherSchool">
                        </div>
                        <div class="col-md-2 position-relative">
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
                        <div class="col-md-10 position-relative">
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
                        <div class="col-md-6 position-relative">
                          <label for="c_otherCourse" class="form-label">If not specified in the list, kindly input the Course.</label>
                          <input type="text" name="Other College Course" class="form-control" id="c_otherCourse" aria-describedby="c_otherCourse">
                        </div>
                        <div class="col-md-6 position-relative">
                          <label for="c_major" class="form-label">Major in</label>
                          <input type="text" name="College Major" class="form-control" id="c_major" aria-describedby="c_major">
                        </div>
                        <div class="col-md-12 position-relative">
                          <label for="c_school_address" class="form-label">School Address</label>
                          <input type="text" name="College Adddress" class="form-control" id="c_school_address" aria-describedby="c_school_address">
                        </div>
                        <!-- COLLEGE AWARD TABLE 2 -->
                        <div class="column">
                          <div class="card">
                            <div class="card-body">
                              <div class="table-responsive">
                                <div class="d-flex justify-content-between align-items-center">
                                  <h5 class="card-title">List of Awards</h5>
                                  <button class="btn btn-small btn-warning" type="button" id="addCollegeTable">Add Awards/Honor</button>
                                </div>
                              </div>
                              <!-- Table with stripped rows -->
                              <table class="table datatable table-striped header-fixed" id="collegeTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr class="text-center">
                                    <th>No</th>
                                    <th>Award ID</th>
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
                        </div>
                      </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- SENIOR HIGHSCHOOL -->
          <?php if ($_SESSION['scholarType'] <= 2) : ?>
            <h5 class="card-title">Senior Highschool Level</h5>
            <?php if (isset($education[2])) : ?>
              <div class="row g-4">
                <!-- SENIOR HIGHSCHOOL -->
                <div class="col-md-6 position-relative">
                  <label for="s_school" class="form-label">Name of School Attended</label>
                  <select class="form-select" id="s_school" name="Senior High School Name" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($school as $key => $col) : ?>
                      <?php if ($col['school_type'] == 1) : ?>
                        <option value="<?php echo $key ?>" <?php echo $education[2]['school'] == $key ? "selected" : "" ?>><?php echo $col['school_name'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!is_numeric($education[2]['school'])) : ?>
                      <option value="Others" selected>Others</option>
                    <?php else : ?>
                      <option value="Others">Others</option>
                    <?php endif; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select School.
                  </div>
                </div>
                <div class="col-md-6 position-relative">
                  <label for="s_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                  <input type="Others" name="Other Senior High School Name" class="form-control" id="s_otherSchool" aria-describedby="s_otherSchool" <?= $finishFlag ? "disabled" : "" ?> value="<?= is_numeric($education[2]['school']) ? "" : $education[2]['school'] ?>">
                </div>
                <div class="col-md-2 position-relative">
                  <label for="s_year_level" class="form-label">Year Level</label>
                  <select class="form-select" id="s_year_level" name="SHS Year Level" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php for ($i = 12; $i >= 11; $i--) : ?>
                      <option value="<?php echo $i ?>" <?php echo $education[2]['year_level'] == $i ? "selected" : "" ?>>Grade <?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select Year Level.
                  </div>
                </div>
                <div class="col-md-3 position-relative">
                  <label for="s_strand" class="form-label">Strand Taken</label>
                  <select class="form-select" id="s_strand" name="SHS Strand" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($strand as $key => $str) : ?>
                      <option value="<?php echo $key ?>" <?php echo $education[2]['course'] == $key ? "selected" : "" ?>><?php echo $str ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select Course.
                  </div>
                </div>
                <div class="col-md-7 position-relative">
                  <label for="s_otherStrand" class="form-label">If not specified in the list, kindly input the Strand.</label>
                  <input type="Others" name="Other SHS Strand" class="form-control" id="s_otherStrand" aria-describedby="s_otherStrand" value="<?= is_numeric($education[2]['course']) ? "" : $education[2]['course'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                </div>
                <div class="col-md-12 position-relative">
                  <label for="s_schoolAddress" class="form-label">School Address</label>
                  <input type="Others" name="Other SHS Address" class="form-control" id="s_schoolAddress" aria-describedby="s_schoolAddress" value="<?= $education[2]['school_address'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                </div>
                <!-- SENIOR HIGHSCHOOL AWARD TABLE -->
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-warning" type="button" id="addSHSTable" <?= $finishFlag ? "disabled" : "" ?>>Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped header-fixed" id="shsTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
                              <th>Honor/Award</th>
                              <th>Academic Year</th>
                              <th>Semester/Quarter</th>
                              <th>Year Level</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($education[2]['awards'])) : ?>
                              <?php foreach ($education[2]['awards'] as $key => $award) : ?>
                                <tr>
                                  <td class="text-center"><?php echo $key + 1 ?></td>
                                  <td class="text-center"><?php echo $award['id'] ?></td>
                                  <td><?php echo $award['honor'] ?></td>
                                  <td class="text-center"><?php echo $award['acad_year'] ?></td>
                                  <td class="text-center"><?php echo $award['sem'] ?></td>
                                  <td class="text-center"><?php echo $award['year_level'] ?></td>
                                  <td class="text-center">
                                    <?php if ($finishFlag) : ?>
                                      <span class="text-danger">You already submitted your application.</span>
                                    <?php else : ?>
                                      <button class="editSHSRow btn btn-primary btn-sm">Edit</button><button class="deleteSHSRow btn btn-danger btn-sm">Delete</button>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="row g-4">
                <!-- SENIOR HIGHSCHOOL -->
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
                  <input type="Others" name="Other Senior High School Name" class="form-control" id="s_otherSchool" aria-describedby="s_otherSchool">
                </div>
                <div class="col-md-2 position-relative">
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
                <div class="col-md-7 position-relative">
                  <label for="s_otherStrand" class="form-label">If not specified in the list, kindly input the Strand.</label>
                  <input type="Others" name="Other SHS Strand" class="form-control" id="s_otherStrand" aria-describedby="s_otherStrand">
                </div>
                <div class="col-md-12 position-relative">
                  <label for="s_schoolAddress" class="form-label">School Address</label>
                  <input type="Others" name="Other SHS Address" class="form-control" id="s_schoolAddress" aria-describedby="s_schoolAddress">
                </div>
                <!-- SENIOR HIGHSCHOOL -->
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-small btn-warning" type="button" id="addSHSTable">Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped header-fixed" id="shsTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
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
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- HIGHSCHOOL LEVEL -->
          <?php if ($_SESSION['scholarType'] <= 3) : ?>
            <h5 class="card-title">High School Level</h5>
            <?php if (isset($education[3])) : ?>
              <div class="row g-4">
                <!-- HIGHSCHOOL AWARD TABLE 1 -->
                <div class="col-md-3 position-relative">
                  <label for="j_school" class="form-label">Name of School Attended</label>
                  <select class="form-select" id="j_school" name="JHS Name" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($school as $key => $col) : ?>
                      <?php if ($col['school_type'] == 2) : ?>
                        <option value="<?php echo $key ?>" <?php echo $education[3]['school'] == $key ? "selected" : "" ?>><?php echo $col['school_name'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!is_numeric($education[3]['school'])) : ?>
                      <option value="Others" selected>Others</option>
                    <?php else : ?>
                      <option value="Others">Others</option>
                    <?php endif; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select School.
                  </div>
                </div>
                <div class="col-md-9 position-relative">
                  <label for="j_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                  <input type="Others" name="Other JHS Name" class="form-control" id="j_otherSchool" aria-describedby="j_otherSchool" <?= $finishFlag ? "disabled" : "" ?> value="<?= is_numeric($education[3]['school']) ? "" : $education[3]['school'] ?>">
                </div>
                <div class="col-md-3 position-relative">
                  <label for="j_year_level" class="form-label">Year Level</label>
                  <select class="form-select" id="j_year_level" name="JHS Year Level" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php for ($i = 4; $i >= 1; $i--) : ?>
                      <?php if ($i == 1) : ?>
                        <option value="<?php echo $i ?>" <?php echo $education[3]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>st Year</option>
                      <?php elseif ($i == 2) : ?>
                        <option value="<?php echo $i ?>" <?php echo $education[3]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>nd Year</option>
                      <?php elseif ($i == 3) : ?>
                        <option value="<?php echo $i ?>" <?php echo $education[3]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>rd Year</option>
                      <?php else : ?>
                        <option value="<?php echo $i ?>" <?php echo $education[3]['year_level'] == $i ? "selected" : "" ?>><?php echo $i ?>th Year</option>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select Year Level.
                  </div>
                </div>
                <div class="col-md-9 position-relative">
                  <label for="j_school_address" class="form-label">School Address</label>
                  <input type="text" name="Other JHS Name" class="form-control" id="j_school_address" aria-describedby="j_school_address" <?= $finishFlag ? "disabled" : "" ?> value="<?= $education[3]['school_address'] ?>">
                </div>
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-small btn-warning" type="button" id="addHSTable" <?= $finishFlag ? "disabled" : "" ?>>Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover" id="jhsTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
                              <th>Honor/Award</th>
                              <th>Academic Year</th>
                              <th>Semester/Quarter</th>
                              <th>Year Level</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($education[3]['awards'])) : ?>
                              <?php foreach ($education[3]['awards'] as $key => $award) : ?>
                                <tr>
                                  <td class="text-center"><?php echo $key + 1 ?></td>
                                  <td class="text-center"><?php echo $award['id'] ?></td>
                                  <td><?php echo $award['honor'] ?></td>
                                  <td class="text-center"><?php echo $award['acad_year'] ?></td>
                                  <td class="text-center"><?php echo $award['sem'] ?></td>
                                  <td class="text-center"><?php echo $award['year_level'] ?></td>
                                  <td class="text-center">
                                    <?php if ($finishFlag) : ?>
                                      <span class="text-danger">You already submitted your application.</span>
                                    <?php else : ?>
                                      <button class="editJSRow btn btn-primary btn-sm">Edit</button><button class="deleteJSRow btn btn-danger btn-sm">Delete</button>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="row g-4">
                <!-- HIGHSCHOOL AWARD TABLE 2 -->
                <div class="col-md-3 position-relative">
                  <label for="j_school" class="form-label">Name of School Attended</label>
                  <select class="form-select" id="j_school" name="JHS Name">
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($school as $key => $col) : ?>
                      <?php if ($col['school_type'] == 2) : ?>
                        <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <option value="Others">Others</option>
                  </select>
                  <div class="invalid-tooltip">
                    Please select School.
                  </div>
                </div>
                <div class="col-md-9 position-relative">
                  <label for="j_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                  <input type="Others" name="Other JHS Name" class="form-control" id="j_otherSchool" aria-describedby="j_otherSchool">
                </div>
                <div class="col-md-3 position-relative">
                  <label for="j_year_level" class="form-label">Year Level</label>
                  <select class="form-select" id="j_year_level" name="JHS Year Level">
                    <option selected disabled value="">Choose...</option>
                    <?php for ($i = 4; $i >= 1; $i--) : ?>
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
                <div class="col-md-9 position-relative">
                  <label for="j_school_address" class="form-label">School Address</label>
                  <input type="text" name="Other JHS Name" class="form-control" id="j_school_address" aria-describedby="j_school_address">
                </div>
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-small btn-warning" type="button" id="addHSTable">Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover" id="jhsTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
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
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- ELEMENTARY LEVEL -->
          <?php if ($_SESSION['scholarType'] <= 4) : ?>
            <h5 class="card-title">Elementary Level</h5>
            <?php if (isset($education[4])) : ?>
              <div class="row g-4">
                <!-- ELEMENTARY -->
                <div class="col-md-3 position-relative">
                  <label for="e_school" class="form-label">Name of School Attended</label>
                  <select class="form-select" id="e_school" name="Elementary Name" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($school as $key => $col) : ?>
                      <?php if ($col['school_type'] == 3) : ?>
                        <option value="<?php echo $key ?>" <?php echo $education[4]['school'] == $key ? "selected" : "" ?>><?php echo $col['school_name'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!is_numeric($education[4]['school'])) : ?>
                      <option value="Others" selected>Others</option>
                    <?php else : ?>
                      <option value="Others">Others</option>
                    <?php endif; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select School.
                  </div>
                </div>
                <div class="col-md-7 position-relative">
                  <label for="e_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                  <input type="text" name="Other Elementary Name" class="form-control" id="e_otherSchool" aria-describedby="e_otherSchool" <?= $finishFlag ? "disabled" : "" ?> value="<?= is_numeric($education[4]['school']) ? "" : $education[4]['school'] ?>">
                </div>
                <div class="col-md-2 position-relative">
                  <label for="e_grade_level" class="form-label">Grade Level</label>
                  <select class="form-select" id="e_grade_level" name="Elementary Grade Level" <?= $finishFlag ? "disabled" : "" ?>>
                    <option selected disabled value="">Choose...</option>
                    <?php for ($i = 6; $i >= 1; $i--) : ?>
                      <option value="<?php echo $i ?>" <?php echo $education[4]['year_level'] == $i ? "selected" : "" ?>>Grade <?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select Year Level.
                  </div>
                </div>
                <div class="col-md-12 position-relative">
                  <label for="e_school_address" class="form-label">School Address</label>
                  <input type="text" name="Elementary School Address" class="form-control" id="e_school_address" aria-describedby="e_school_address" <?= $finishFlag ? "disabled" : "" ?> value="<?= $education[4]['school_address'] ?>">
                </div>
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-small btn-warning" type="button" id="addElemTable" <?= $finishFlag ? "disabled" : "" ?>>Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover" id="elemTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
                              <th>Honor/Award</th>
                              <th>Academic Year</th>
                              <th>Semester/Quarter</th>
                              <th>Year Level</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($education[4]['awards'])) : ?>
                              <?php foreach ($education[4]['awards'] as $key => $award) : ?>
                                <tr>
                                  <td class="text-center"><?php echo $key + 1 ?></td>
                                  <td class="text-center"><?php echo $award['id'] ?></td>
                                  <td><?php echo $award['honor'] ?></td>
                                  <td class="text-center"><?php echo $award['acad_year'] ?></td>
                                  <td class="text-center"><?php echo $award['sem'] ?></td>
                                  <td class="text-center"><?php echo $award['year_level'] ?></td>
                                  <td class="text-center">
                                    <?php if ($finishFlag) : ?>
                                      <span class="text-danger">You already submitted your application.</span>
                                    <?php else : ?>
                                      <button class="editElemRow btn btn-primary btn-sm">Edit</button><button class="deleteElemRow btn btn-danger btn-sm">Delete</button>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="row g-4">
                <!-- ELEMENTARY -->
                <div class="col-md-3 position-relative">
                  <label for="e_school" class="form-label">Name of School Attended</label>
                  <select class="form-select" id="e_school" name="Elementary Name">
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($school as $key => $col) : ?>
                      <?php if ($col['school_type'] == 3) : ?>
                        <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <option value="Others">Others</option>
                  </select>
                  <div class="invalid-tooltip">
                    Please select School.
                  </div>
                </div>
                <div class="col-md-7 position-relative">
                  <label for="e_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                  <input type="text" name="Other Elementary Name" class="form-control" id="e_otherSchool" aria-describedby="e_otherSchool">
                </div>
                <div class="col-md-2 position-relative">
                  <label for="e_grade_level" class="form-label">Grade Level</label>
                  <select class="form-select" id="e_grade_level" name="Elementary Grade Level">
                    <option selected disabled value="">Choose...</option>
                    <?php for ($i = 6; $i >= 1; $i--) : ?>
                      <option value="<?php echo $i ?>">Grade <?php echo $i ?></option>
                    <?php endfor; ?>
                  </select>
                  <div class="invalid-tooltip">
                    Please select Year Level.
                  </div>
                </div>
                <div class="col-md-12 position-relative">
                  <label for="e_school_address" class="form-label">School Address</label>
                  <input type="text" name="Elementary School Address" class="form-control" id="e_school_address" aria-describedby="e_school_address">
                </div>
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-small btn-warning" type="button" id="addElemTable">Add Awards/Honor</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover" id="elemTable" width="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Award ID</th>
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
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="float-end">
              <?php if (!$finishFlag) : ?>
                <button type="submit" class="btn btn-outline-success">Save</button>
              <?php endif; ?>
            </div>
            </form>
            </div>
          <?php endif; ?>

          <!--  FAMILY BACKGROUND -->
          <div class="tab-pane fade" id="bordered-justified-family-background" role="tabpanel" aria-labelledby="family-background">
            <form method="post" id="familyBG">
              <h5 class="card-title">General Family Information</h5>
              <!-- Custom Styled Validation with Tooltips -->
              <div class="row g-4">
                <!-- GENERAL FAMILY INFORMATION -->
                <div class="col-md-4 position-relative">
                  <label for="family_flag" class="form-label">Are you Living with Family?</label>
                  <?php if ($gen_info != null) : ?>
                    <select class="form-select" name="Living with Family Flag" id="family_flag" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <option value="0" <?php echo $gen_info['family_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                      <option value="1" <?php echo $gen_info['family_flag'] == 1 ? "selected" : "" ?>>No</option>
                    </select>
                  <?php else : ?>
                    <select class="form-select" name="Living with Family Flag" id="family_flag">
                      <option selected disabled value="">Choose...</option>
                      <option value="0">Yes</option>
                      <option value="1">No</option>
                    </select>
                  <?php endif; ?>
                </div>
                <div class="col-md-3 position-relative">
                  <label for="total_num" class="form-label">Total number of Family</label>
                  <?php if ($gen_info != null) : ?>
                    <input type="number" class="form-control" name="Total Number in the Family" id="total_num" aria-describedby="total_num" value="<?= $gen_info['total_num'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                  <?php else : ?>
                    <input type="number" class="form-control" name="Total Number in the Family" id="total_num" aria-describedby="total_num">
                  <?php endif; ?>
                </div>
                <div class="col-md-2 position-relative">
                  <label for="birth_order" class="form-label">Birth Order</label>
                  <?php if ($gen_info != null) : ?>
                    <input type="number" class="form-control" id="birth_order" name="Birth Order" aria-describedby="birth_order" value="<?= $gen_info['birth_order'] ?>" <?= $finishFlag ? "disabled" : "" ?>>
                  <?php else : ?>
                    <input type="number" class="form-control" id="birth_order" name="Birth Order" aria-describedby="birth_order">
                  <?php endif; ?>
                </div>
                <div class="col-md-3 position-relative">
                  <label for="source" class="form-label"> Source of Living?</label>
                  <?php if ($gen_info != null) : ?>
                    <select class="form-select" id="source" name="Source of Living" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>" <?php echo $gen_info['source'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php else : ?>
                    <select class="form-select" id="source" name="Source of Living">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>"><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php endif; ?>
                </div>
                <div class="col-md-5 position-relative">
                  <label for="rent_flag" class="form-label"> Is your Home Rent or Owned?</label>
                  <?php if ($gen_info != null) : ?>
                    <select class="form-select" id="rent_flag" name="Rent Flag" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <option value="0" <?php echo $gen_info['rent_flag'] == 0 ? "selected" : "" ?>>Owned</option>
                      <option value="1" <?php echo $gen_info['rent_flag'] == 1 ? "selected" : "" ?>>Rent</option>
                    </select>
                  <?php else : ?>
                    <select class="form-select" id="rent_flag" name="Rent Flag">
                      <option selected disabled value="">Choose...</option>
                      <option value="0">Owned</option>
                      <option value="1">Rent</option>
                    </select>
                  <?php endif; ?>
                </div>
                <div class="col-md-7 position-relative">
                  <label for="monthly_payment" class="form-label"> How much paying monthly (If renting or paying-to-own)</label>
                  <?php if ($gen_info != null) : ?>
                    <select class="form-select" id="monthly_payment" name="Monthly Payment" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>" <?php echo $gen_info['monthly_payment'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php else : ?>
                    <select class="form-select" id="monthly_payment" name="Monthly Payment">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>"><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php endif; ?>
                </div>

                <!-- TABLE OF SIBLINGS -->
                <div class="column">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                          <h5 class="card-title">List of Awards</h5>
                          <button class="btn btn-warning" type="button" id="addSibling" <?= $finishFlag ? "disabled" : "" ?>>Add Siblings</button>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-striped table-hover" id="siblingTable" wid SDEZRRXth="100%" cellspacing="0">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Sibling Id</th>
                              <th>Name of Sibling (LN/FN/MN)</th>
                              <th>Relationship</th>
                              <th>Birth Order</th>
                              <th>Age</th>
                              <th>Occupation</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if ($family != null) : ?>
                              <?php $count = 0; ?>
                              <?php foreach ($family as $key => $fam) : ?>
                                <?php if ($key == 'siblings') : ?>
                                  <tr class="text-center">
                                    <td><?= ++$count; ?></td>
                                    <td><?= $fam[0]['id'] ?></td>
                                    <td><?= $fam[0]['lastName'] . '/' . $fam[0]['firstName'] . '/' . $fam[0]['middleName'] ?></td>
                                    <td><?= $fam[0]['relationship'] ?></td>
                                    <td><?= $fam[0]['birth_order'] ?></td>
                                    <td><?= $fam[0]['age'] ?></td>
                                    <td><?= $fam[0]['occupation'] ?></td>
                                    <td>
                                      <?php if (!$finishFlag) : ?>
                                        <button class="editSiblingRow btn btn-primary btn-sm">Edit</button><button class="deleteSiblingRow btn btn-danger btn-sm">Delete</button>
                                      <?php else : ?>
                                        <span class="text-danger">You already submitted your application.</span>
                                      <?php endif; ?>
                                    </td>
                                  </tr>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END GENERAL FAMILY INFORMATION -->
              </div><!-- End Custom Styled Validation with Tooltips -->

              <!-- FATHER'S INFORMATION -->
              <h5 class="card-title">Father's Information</h5>
              <!-- Custom Styled Validation with Tooltips -->
              <?php if ($family != null) : ?>
                <div class="row g-4">
                  <!-- FULL NAME -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherFN" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fatherFN" aria-describedby="fatherFN" name="Father's Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['firstName'] ?>">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherMN" class="form-label">Middle name</label>
                    <input type="text" class="form-control" id="fatherMN" aria-describedby="fatherMN" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['middleName'] ?>">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherLN" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="fatherLN" aria-describedby="fatherLN" name="Father's Last Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['lastName'] ?>">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                    <input type="text" class="form-control" id="fatherSuffix" aria-describedby="fatherSuffix" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['suffix'] ?>">
                  </div>
                  <!-- END FULL NAME -->

                  <!-- BIRTH -->
                  <div class="col-md-4 position-relative">
                    <label for="fatherBday" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="fatherBday" aria-describedby="fatherBday" name="Father's Birthdate" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['birth_date'] ?>">
                  </div>
                  <div class="col-md-5  position-relative">
                    <label for="fatherBplace" class="form-label">Place of Birth</label>
                    <input type="inputBirthPlace" class="form-control" id="fatherBplace" aria-describedby="fatherBplace" name="Father's Birthplace" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['birth_place'] ?>">
                  </div>
                  <!-- END BIRTH -->

                  <!-- START AGE -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherAge" class="form-label">Father's Age</label>
                    <input type="number" class="form-control" id="fatherAge" aria-describedby="fatherAge" name="Father's Age" readonly value="<?= $family['father']['age'] ?>">
                  </div>
                  <!-- START AGE -->

                  <!-- CONTACT INFORMATION -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherContact" class="form-label">Contact Number</label>
                    <div class="input-group">
                      <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                      <input type="tel" class="form-control" id="fatherContact" aria-describedby="inputGroupPrepend2" name="Father's Contact Number" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['contact_number'] ?>">
                    </div>
                  </div>
                  <!-- END CONTACT INFORMATION -->

                  <!-- LIVING OR DECEASED -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherLivingFlag" class="form-label"> Living or Deceased? </label>
                    <select class="form-select" id="fatherLivingFlag" name="Father's Living Flag" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <option value="0" <?= $family['father']['living_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                      <option value="1" <?= $family['father']['living_flag'] == 1 ? "selected" : "" ?>>No</option>
                    </select>
                  </div>

                  <!-- FATHER'S OCCUPATION  -->
                  <div class="col-md-6 position-relative">
                    <label for="fatherOccupation" class="form-label"> Occupation</label>
                    <select class="form-select" id="fatherOccupation" name="Father's Occupation" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($occupationArr as $key => $occ) : ?>
                        <option value="<?php echo $key ?>" <?= $family['father']['occupation'] == $key ? "selected" : "" ?>><?php echo $occ ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="fatherOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                    <input type="text" class="form-control" id="fatherOtherOccupation" aria-describedby="fatherOtherOccupation" name="Father's Other Occupation" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['occupation'] != "others" ? "" : $family['father']['occupation'] ?>">
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherCompany" class="form-label">Company's Name</label>
                    <input type="text" class="form-control" id="fatherCompany" aria-describedby="fatherCompany" name="Father's Company Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['father']['company_name'] ?>">
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherCompanyAddress" class="form-label">Work Address</label>
                    <textarea class="form-control" name="Father's Work Address" id="fatherCompanyAddress" cols="30" rows="5" <?= $finishFlag ? "disabled" : "" ?>><?= $family['father']['company_address'] ?></textarea>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherIncome" class="form-label"> Average Monthly Income</label>
                    <select class="form-select" id="fatherIncome" name="Father's Monthly Income" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>" <?php echo $family['father']['income_flag'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherEducation" class="form-label"> Highest Educational Attainment</label>
                    <select class="form-select" id="fatherEducation" name="Father's Highest Educational Attainment" <?= $finishFlag ? "disabled" : "" ?>>
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($educAttainment as $key => $educ) : ?>
                        <option value="<?php echo $key ?>" <?php echo $family['father']['attainment_flag'] == $key ? "selected" : "" ?>><?php echo $educ ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- END FULL NAME -->
                </div><!-- End Custom Styled Validation with Tooltips -->
              <?php else : ?>
                <div class="row g-4">
                  <!-- FULL NAME -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherFN" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fatherFN" aria-describedby="fatherFN" name="Father's Name">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherMN" class="form-label">Middle name</label>
                    <input type="text" class="form-control" id="fatherMN" aria-describedby="fatherMN">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherLN" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="fatherLN" aria-describedby="fatherLN" name="Father's Last Name">
                  </div>
                  <div class="col-md-3 position-relative">
                    <label for="fatherSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                    <input type="text" class="form-control" id="fatherSuffix" aria-describedby="fatherSuffix">
                  </div>
                  <!-- END FULL NAME -->

                  <!-- BIRTH -->
                  <div class="col-md-4 position-relative">
                    <label for="fatherBday" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="fatherBday" aria-describedby="fatherBday" name="Father's Birthdate">
                  </div>
                  <div class="col-md-5  position-relative">
                    <label for="fatherBplace" class="form-label">Place of Birth</label>
                    <input type="inputBirthPlace" class="form-control" id="fatherBplace" aria-describedby="fatherBplace" name="Father's Birthplace">
                  </div>
                  <!-- END BIRTH -->

                  <!-- START AGE -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherAge" class="form-label">Father's Age</label>
                    <input type="number" class="form-control" id="fatherAge" aria-describedby="fatherAge" name="Father's Age" readonly>
                  </div>
                  <!-- START AGE -->

                  <!-- CONTACT INFORMATION -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherContact" class="form-label">Contact Number</label>
                    <div class="input-group">
                      <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                      <input type="tel" class="form-control" id="fatherContact" aria-describedby="inputGroupPrepend2" name="Father's Contact Number">
                    </div>
                  </div>
                  <!-- END CONTACT INFORMATION -->

                  <!-- LIVING OR DECEASED -->
                  <div class="col-md-3 position-relative">
                    <label for="fatherLivingFlag" class="form-label"> Living or Deceased? </label>
                    <select class="form-select" id="fatherLivingFlag" name="Father's Living Flag">
                      <option selected disabled value="">Choose...</option>
                      <option value="0">Yes</option>
                      <option value="1">No</option>
                    </select>
                  </div>

                  <!-- FATHER'S OCCUPATION  -->
                  <div class="col-md-6 position-relative">
                    <label for="fatherOccupation" class="form-label"> Occupation</label>
                    <select class="form-select" id="fatherOccupation" name="Father's Occupation">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($occupationArr as $key => $occ) : ?>
                        <option value="<?php echo $key ?>"><?php echo $occ ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-12 position-relative">
                    <label for="fatherOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                    <input type="text" class="form-control" id="fatherOtherOccupation" aria-describedby="fatherOtherOccupation" name="Father's Other Occupation">
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherCompany" class="form-label">Company's Name</label>
                    <input type="text" class="form-control" id="fatherCompany" aria-describedby="fatherCompany" name="Father's Company Name">
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherCompanyAddress" class="form-label">Work Address</label>
                    <textarea class="form-control" name="Father's Work Address" id="fatherCompanyAddress" cols="30" rows="5"></textarea>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherIncome" class="form-label"> Average Monthly Income</label>
                    <select class="form-select" id="fatherIncome" name="Father's Monthly Income">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($incomeArr as $key => $inc) : ?>
                        <option value="<?php echo $key ?>"><?php echo $inc ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6 position-relative">
                    <label for="fatherEducation" class="form-label"> Highest Educational Attainment</label>
                    <select class="form-select" id="fatherEducation" name="Father's Highest Educational Attainment">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach ($educAttainment as $key => $educ) : ?>
                        <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- END FULL NAME -->
                </div><!-- End Custom Styled Validation with Tooltips -->
              <?php endif; ?>


              <!-- MOTHER'S INFORMATION -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Mother's Information</h5>
                  <!-- Custom Styled Validation with Tooltips -->
                  <?php if ($family != null) : ?>
                    <div class="row g-4">
                      <!-- FULL NAME -->
                      <div class="col-md-3 position-relative">
                        <label for="motherFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="motherFN" aria-describedby="motherFN" name="Mother's First Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['firstName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="motherMN" aria-describedby="motherMN" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['middleName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="motherLN" aria-describedby="motherLN" name="Mother's Last Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['lastName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="motherSuffix" aria-describedby="motherSuffix" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['suffix'] ?>">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="motherBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="motherBday" aria-describedby="motherBday" name="Mother's Birthdate" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['birth_date'] ?>">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="motherBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="motherBplace" aria-describedby="motherBplace" name="Mother's Birthplace" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['birth_place'] ?>">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="motherAge" class="form-label">Mother's Age</label>
                        <input type="number" class="form-control" id="motherAge" aria-describedby="motherAge" name="Mother's Age" readonly value="<?= $family['mother']['age'] ?>">
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="motherContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="motherContact" aria-describedby="inputGroupPrepend2" name="Mother's Contact Number" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['contact_number'] ?>">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="motherLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="motherLivingFlag" name="Mother's Living Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <o value="0" <?= $family['mother']['living_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                            <o value="1" <?= $family['mother']['living_flag'] == 1 ? "selected" : "" ?>>No</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="motherOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="motherOccupation" name="Mother's Occupation" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>" <?= $family['mother']['occupation'] == $key ? "selected" : "" ?>><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="motherOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="motherOtherOccupation" aria-describedby="motherOtherOccupation" name="Mother's Other Occupation" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['occupation'] == "others" ? $family['mother']['occupation'] : "" ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="motherCompany" aria-describedby="motherCompany" name="Mother's Company Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['mother']['company_name'] ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="Mother's Work Address" id="motherCompanyAddress" cols="30" rows="5" <?= $finishFlag ? "disabled" : "" ?>><?= $family['mother']['company_address'] ?></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="motherIncome" name="Mother's Monthly Income" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['mother']['income_flag'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="motherEducation" name="Mother's Highest Educational Attainment" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['mother']['attainment_flag'] == $key ? "selected" : "" ?>><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php else : ?>
                    <div class="row g-4">
                      <!-- FULL NAME -->
                      <div class="col-md-3 position-relative">
                        <label for="motherFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="motherFN" aria-describedby="motherFN" name="Mother's First Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="motherMN" aria-describedby="motherMN">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="motherLN" aria-describedby="motherLN" name="Mother's Last Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="motherSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="motherSuffix" aria-describedby="motherSuffix">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="motherBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="motherBday" aria-describedby="motherBday" name="Mother's Birthdate">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="motherBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="motherBplace" aria-describedby="motherBplace" name="Mother's Birthplace">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="motherAge" class="form-label">Mother's Age</label>
                        <input type="number" class="form-control" id="motherAge" aria-describedby="motherAge" name="Mother's Age" readonly>
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="motherContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="motherContact" aria-describedby="inputGroupPrepend2" name="Mother's Contact Number">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="motherLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="motherLivingFlag" name="Mother's Living Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="motherOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="motherOccupation" name="Mother's Occupation">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="motherOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="motherOtherOccupation" aria-describedby="motherOtherOccupation" name="Mother's Other Occupation">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="motherCompany" aria-describedby="motherCompany" name="Mother's Company Name">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="Mother's Work Address" id="motherCompanyAddress" cols="30" rows="5"></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="motherIncome" name="Mother's Monthly Income">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>"><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="motherEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="motherEducation" name="Mother's Highest Educational Attainment">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php endif; ?>
                </div>
              </div>

              <!-- GUARDIAN'S INFORMATION -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Guardian's Information</h5>
                  <?php if (isset($family['guardian'])) : ?>
                    <div class="col-md-3 position-relative py-4">
                      <label for="inputGuardian" class="form-label"> Do you have a Guardian? </label>
                      <select class="form-select" id="inputGuardian" <?= $finishFlag ? "disabled" : "" ?>>
                        <option selected disabled value="">Choose...</option>
                        <option value="0" <?php echo $family['guardian'] != null ? "selected" : "" ?>>Yes</option>
                        <option value="1" <?php echo $family['guardian'] == null ? "selected" : "" ?>>No</option>
                      </select>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 <?php echo $family['guardian'] != null ? "" : "d-none" ?>" id="guardianInfo">
                      <!-- FULL NAME -->
                      <div class="col-md-12 position-relative">
                        <label for="guardianRelationship" class="form-label"> Relationship</label>
                        <select class="form-select" id="guardianRelationship" name="Guardian's Relationship" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($relationshipArr as $key => $rel) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['guardian']['relationship'] == $key ? "selected" : "" ?>><?php echo $rel ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="guardianFN" aria-describedby="guardianFN" name="Guardian's First Name" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['firstName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="guardianMN" aria-describedby="guardianMN" name="Guardian's Middle Name" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['middleName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="guardianLN" aria-describedby="guardianLN" name="Guardian's Last Name" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['lastName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="guardianSuffix" aria-describedby="guardianSuffix" name="Guardian's Name Suffix" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['suffix'] ?>">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="guardianBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="guardianBday" aria-describedby="guardianBday" name="Guardian's Birthdate" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['birth_date'] ?>">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="guardianBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="guardianBplace" aria-describedby="guardianBplace" name="Guardian's Birthplace" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['birth_place'] ?>">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianAge" class="form-label">Guardian's Age</label>
                        <input type="number" class="form-control" id="guardianAge" aria-describedby="guardianAge" name="Guardian's Age" readonly value="<?php echo $family['guardian']['age'] ?>">
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="guardianContact" aria-describedby="inputGroupPrepend2" name="Guardian's Contact Number" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['contact_number'] ?>">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="guardianLivingFlag" name="Guardian's Living Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $family['guardian']['living_flag'] == 0 ? "selected" : "" ?>>Living</option>
                          <option value="1" <?php echo $family['guardian']['living_flag'] == 1 ? "selected" : "" ?>>Deceased</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="guardianOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="guardianOccupation" name="Guardian's Occupation" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['guardian']['occupation'] == $key ? "selected" : "" ?>><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="guardianOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="guardianOtherOccupation" aria-describedby="guardianOtherOccupation" name="Guardian's Other Occupation" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['occupation'] == "others" ? $family['guardian']['occupation'] : "" ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="guardianCompany" aria-describedby="guardianCompany" name="Guardian's Company Name" <?= $finishFlag ? "disabled" : "" ?> value="<?php echo $family['guardian']['company_name'] ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="guardian's Work Address" id="GuardianCompanyAddress" cols="30" rows="5"><?= $finishFlag ? "disabled" : "" ?> <?php echo $family['guardian']['company_address'] ?></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="guardianIncome" name="Guardian's Monthly Income" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['guardian']['income_flag'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="guardianEducation" name="Guardian's Highest Educational Attainment" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['guardian']['attainment_flag'] == $key ? "selected" : "" ?>><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php else : ?>
                    <div class="col-md-3 position-relative py-4">
                      <label for="inputGuardian" class="form-label"> Do you have a Guardian? </label>
                      <select class="form-select" id="inputGuardian">
                        <option selected disabled value="">Choose...</option>
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                      </select>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 d-none" id="guardianInfo">
                      <!-- FULL NAME -->
                      <div class="col-md-12 position-relative">
                        <label for="guardianRelationship" class="form-label"> Relationship</label>
                        <select class="form-select" id="guardianRelationship" name="Guardian's Relationship">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($relationshipArr as $key => $rel) : ?>
                            <option value="<?php echo $key ?>" <?php echo $gen_info == $key ? "selected" : "" ?>><?php echo $rel ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="guardianFN" aria-describedby="guardianFN" name="Guardian's First Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="guardianMN" aria-describedby="guardianMN">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="guardianLN" aria-describedby="guardianLN" name="Guardian's Last Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="guardianSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="guardianSuffix" aria-describedby="guardianSuffix">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="guardianBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="guardianBday" aria-describedby="guardianBday" name="Guardian's Birthdate">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="guardianBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="guardianBplace" aria-describedby="guardianBplace" name="Guardian's Birthplace">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianAge" class="form-label">Guardian's Age</label>
                        <input type="number" class="form-control" id="guardianAge" aria-describedby="guardianAge" name="Guardian's Age" readonly>
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="guardianContact" aria-describedby="inputGroupPrepend2" name="Guardian's Contact Number">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="guardianLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="guardianLivingFlag" name="Guardian's Living Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="guardianOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="guardianOccupation" name="Guardian's Occupation">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="guardianOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="guardianOtherOccupation" aria-describedby="guardianOtherOccupation" name="Guardian's Other Occupation">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="guardianCompany" aria-describedby="guardianCompany" name="Guardian's Company Name">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="guardian's Work Address" id="GuardianCompanyAddress" cols="30" rows="5"></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="guardianIncome" name="Guardian's Monthly Income">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>" <?php echo $gen_info['source'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="guardianEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="guardianEducation" name="Guardian's Highest Educational Attainment">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php endif; ?>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Spouse's Information</h5>
                  <?php if (isset($family['spouse'])) : ?>
                    <div class="col-md-3 position-relative py-4">
                      <label for="inputSpouse" class="form-label"> Do you have a Spouse? </label>
                      <select class="form-select" id="inputSpouse" name="Spouse's Flag" <?= $finishFlag ? "disabled" : "" ?>>
                        <option selected disabled value="">Choose...</option>
                        <option value="0" <?= $family['spouse'] != null ? "selected" : "" ?>>Yes</option>
                        <option value="1" <?= $family['spouse'] == null ? "selected" : "" ?>>No</option>
                      </select>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 <?= $family['spouse'] == null ? "d-none" : "" ?>" id="spouseInfo">
                      <!-- FULL NAME -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="spouseFN" aria-describedby="spouseFN" name="Spouse's First Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['firstName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouseMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="spouseMN" aria-describedby="spouseMN" name="Spouse's Middle Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['middleName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouserLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="spouserLN" aria-describedby="spouserLN" name="Spouse's Last Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['lastName'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouseSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="spouseSuffix" aria-describedby="spouseSuffix" name="Spouse's Name Suffix" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['suffix'] ?>">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="spouseBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="spouseBday" aria-describedby="spouseBday" name="Spouse's Birthdate" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['birth_date'] ?>">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="spouseBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="spouseBplace" aria-describedby="spouseBplace" name="Spouse's Birthplace" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['birth_place'] ?>">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseAge" class="form-label">Spouse's Age</label>
                        <input type="number" class="form-control" id="spouseAge" aria-describedby="spouseAge" name="Spouse's Age" readonly value="<?= $family['spouse']['age'] ?>">
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="spouseContact" aria-describedby="inputGroupPrepend2" name="Spouse's Contact Number" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['contact_number'] ?>">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="spouseLivingFlag" name="Spouse's Living Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?= $family['spouse']['living_flag'] == 0 ? "selected" : "" ?>>Yes</option>
                          <option value="1" <?= $family['spouse']['living_flag'] == 1 ? "selected" : "" ?>>No</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="spouseOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="spouseOccupation" name="Spouse's Occupation" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>" <?= $family['spouse']['occupation'] == $key ? "selected" : "" ?>><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="spouseOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="spouseOtherOccupation" aria-describedby="spouseOtherOccupation" name="Spouse's Other Occupation" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['occupation'] == "others" ? $family['spouse']['occupation'] : "" ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="spouseCompany" aria-describedby="spouseCompany" name="Spouse's Company Name" <?= $finishFlag ? "disabled" : "" ?> value="<?= $family['spouse']['company_name'] ?>">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="spouse's Work Address" id="spouseCompanyAddress" cols="30" rows="5"><?= $family['spouse']['company_address'] ?></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="spouseIncome" name="Spouse's Monthly Income" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['spouse']['income_flag'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="spouseEducation" name="Spouse's Highest Educational Attainment" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>" <?php echo $family['spouse']['attainment_flag'] == $key ? "selected" : "" ?>><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php else : ?>
                    <div class="col-md-3 position-relative py-4">
                      <label for="inputSpouse" class="form-label"> Do you have a Spouse? </label>
                      <select class="form-select" id="inputSpouse">
                        <option selected disabled value="">Choose...</option>
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                      </select>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 d-none" id="spouseInfo">
                      <!-- FULL NAME -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseFN" class="form-label">First name</label>
                        <input type="text" class="form-control" id="spouseFN" aria-describedby="spouseFN" name="Spouse's First Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouseMN" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="spouseMN" aria-describedby="spouseMN">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouserLN" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="spouserLN" aria-describedby="spouserLN" name="Spouse's Last Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="spouseSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                        <input type="text" class="form-control" id="spouseSuffix" aria-describedby="spouseSuffix">
                      </div>
                      <!-- END FULL NAME -->

                      <!-- BIRTH -->
                      <div class="col-md-4 position-relative">
                        <label for="spouseBday" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="spouseBday" aria-describedby="spouseBday" name="Spouse's Birthdate">
                      </div>
                      <div class="col-md-5  position-relative">
                        <label for="spouseBplace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="spouseBplace" aria-describedby="spouseBplace" name="Spouse's Birthplace">
                      </div>
                      <!-- END BIRTH -->

                      <!-- START AGE -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseAge" class="form-label">Spouse's Age</label>
                        <input type="number" class="form-control" id="spouseAge" aria-describedby="spouseAge" name="Spouse's Age" readonly>
                      </div>
                      <!-- START AGE -->

                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseContact" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="tel" class="form-control" id="spouseContact" aria-describedby="inputGroupPrepend2" name="Spouse's Contact Number">
                        </div>
                      </div>
                      <!-- END CONTACT INFORMATION -->

                      <!-- LIVING OR DECEASED -->
                      <div class="col-md-3 position-relative">
                        <label for="spouseLivingFlag" class="form-label"> Living or Deceased? </label>
                        <select class="form-select" id="spouseLivingFlag" name="Spouse's Living Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      </div>

                      <!-- FATHER'S OCCUPATION  -->
                      <div class="col-md-6 position-relative">
                        <label for="spouseOccupation" class="form-label"> Occupation</label>
                        <select class="form-select" id="spouseOccupation" name="Spouse's Occupation">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($occupationArr as $key => $occ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $occ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-12 position-relative">
                        <label for="spouseOtherOccupation" class="form-label">If Occupation is not in the list,please specify here</label>
                        <input type="text" class="form-control" id="spouseOtherOccupation" aria-describedby="spouseOtherOccupation" name="Spouse's Other Occupation">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseCompany" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="spouseCompany" aria-describedby="spouseCompany" name="Spouse's Company Name">
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseCompanyAddress" class="form-label">Work Address</label>
                        <textarea class="form-control" name="spouse's Work Address" id="spouseCompanyAddress" cols="30" rows="5"></textarea>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseIncome" class="form-label"> Average Monthly Income</label>
                        <select class="form-select" id="spouseIncome" name="Spouse's Monthly Income">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($incomeArr as $key => $inc) : ?>
                            <option value="<?php echo $key ?>" <?php echo $gen_info['source'] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-6 position-relative">
                        <label for="spouseEducation" class="form-label"> Highest Educational Attainment</label>
                        <select class="form-select" id="spouseEducation" name="Spouse's Highest Educational Attainment">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($educAttainment as $key => $educ) : ?>
                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <!-- END FULL NAME -->
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  <?php endif; ?>
                </div>
              </div>
              <div class="float-end">
                <?php if (!$finishFlag) : ?>
                  <button type="submit" class="btn btn-outline-success" id="famBTN">Save</button>
                <?php endif; ?>
              </div>
            </form>
          </div>

          <!-- ADDITIONAL INFORMATION -->
          <div class="tab-pane fade" id="bordered-justified-additional-information" role="tabpanel" aria-labelledby="additional-information">
            <form method="post" id="otherInfo">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row g-4">
                    <!-- WORKING STUDENT -->
                    <div class="col-md-4 position-relative">
                      <label for="working_flag" class="form-label">Are you a Working Student?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="working_flag" name="Working Student Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['working_flag'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['working_flag'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="working_flag" name="Working Student Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>

                    <!---OFW PARENTS -->
                    <div class="col-md-8 position-relative">
                      <label for="ofw_flag" class="form-label">Do you have a Parent/s who is/are an OFW?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="ofw_flag" name="OFW Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['ofw_flag'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['ofw_flag'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="ofw_flag" name="OFW Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>

                    <!--OFW FAMILY MEMBERS -->
                    <div class="col-md-6 position-relative">
                      <label for="other_ofw" class="form-label">Do you have other Family member/s who are an OFW?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="other_ofw" name="Other OFW Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['other_ofw'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['other_ofw'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="other_ofw" name="Other OFW Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>

                    <!---PWD PARENTS -->
                    <div class="col-md-6 position-relative">
                      <label for="pwd_flag" class="form-label">Do you have a Parent/s who have PWD?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="pwd_flag" name="Parent PWD Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['pwd_flag'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['pwd_flag'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="pwd_flag" name="Parent PWD Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>

                    <!---PWD FAMILY MEMBERS -->
                    <div class="col-md-6 position-relative">
                      <label for="other_pwd" class="form-label">Do you have other Family member/s who have PWD?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="other_pwd" name="Other Family PWD Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['other_pwd'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['other_pwd'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="other_pwd" name="Other Family PWD Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>

                    <!---PARENTS STATUS -->
                    <div class="col-md-6 position-relative">
                      <label for="status_flag" class="form-label">What is your Parents Status?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="status_flag" name="Parent Status Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($civilArr as $key => $value) : ?>
                            <option value="<?php echo $key ?>" <?php echo $gen_info['status_flag'] == $key ? 'selected' : '' ?>><?php echo $value ?></option>
                          <?php endforeach; ?>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="status_flag" name="Parent Status Flag">
                          <option selected disabled value="">Choose...</option>
                          <?php foreach ($civilArr as $key => $value) : ?>
                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                          <?php endforeach; ?>
                        </select>
                      <?php endif ?>
                    </div>

                    <!---STUDENT PWD -->
                    <div class="col-md-6 position-relative">
                      <label for="self_pwd_flag" class="form-label">Are you a Student with PWD?</label>
                      <?php if ($gen_info != null) : ?>
                        <select class="form-select" id="self_pwd_flag" name="Student PWD Flag" <?= $finishFlag ? "disabled" : "" ?>>
                          <option selected disabled value="">Choose...</option>
                          <option value="0" <?php echo $gen_info['self_pwd_flag'] == 0 ? 'selected' : '' ?>>Yes</option>
                          <option value="1" <?php echo $gen_info['self_pwd_flag'] == 1 ? 'selected' : '' ?>>No</option>
                        </select>
                      <?php else : ?>
                        <select class="form-select" id="self_pwd_flag" name="Student PWD Flag">
                          <option selected disabled value="">Choose...</option>
                          <option value="0">Yes</option>
                          <option value="1">No</option>
                        </select>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="float-end">
                <?php if (!$finishFlag) : ?>
                  <button type="submit" class="btn btn-outline-success" id="otherInfoBTN">Save</button>
                <?php endif; ?>
              </div>
            </form>
          </div>
          </div>
        </div>
        <!-- End Bordered Tabs Justified -->
        <div class="card-body">
          <div class="float-end">
            <?php if (!$finishFlag) : ?>
              <!-- <button type="button" class="btn btn-success" id="submitApplication">Submit Application</button> -->
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
  </section>
</main><!-- End #main -->
