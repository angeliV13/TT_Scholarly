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
                                    <img id="profileImage" src="<?php echo $user_info['profile_img'] == null ? "assets/img/profile-img.jpg" : $user_info['profile_img'] ?>" alt="Profile" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                    <input type="file" id="imageInput" style="display: none;">
                                    <button onclick="document.getElementById('imageInput').click()">Change Profile Image</button>
                                </div>
                                <div class="ms-4 adjustable-line-spacing" style="margin-top: 115px;">
                                    <h5 class="fw-bold" id="userName">JUAN DELA CRUZ</h5>
                                    <p>
                                        <span id="userDetails">Educational Assistance Scholarship - College level</span><br>
                                        <span id="userCode">EAC-213991</span>
                                    </p>
                                    <span id="editIcon" class="fa fa-edit" style="cursor: pointer;"></span>
                                </div>
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
                                                <!--REMARKS RADIO BUTTON -->
                                                <div class="d-flex align-items-center d-grid gap-3">
                                                    <label class="form-check-label fw-bold">Remarks:</label>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="personalInfoApproveRadioDefault1">
                                                        <label class="mx-2 form-check-label" for="personalInfoApproveCheckBox"> Approve </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="personalInfoReviewDefault2">
                                                        <label class="mx-2 form-check-label" for="personalInfoReviewCheckBox"> For Review </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="personalInfoModiDefault3">
                                                        <label class="mx-2 form-check-label" for="personalInModiCheckBox"> For Modification </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FORM FOR PERSONAL INFORMATION -->
                                            <form class="row g-4 pt-3 needs-validation" novalidate>
                                                <!-- FULL NAME -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputFirstName" class="form-label">First name</label>
                                                    <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="<?php echo $user_info['first_name'] ?>">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputMiddleName" class="form-label">Middle name</label>
                                                    <input type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="<?php echo $user_info['middle_name'] ?>">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputLastName" class="form-label">Last name</label>
                                                    <input type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="<?php echo $user_info['last_name'] ?>">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                                                    <input type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="<?php echo $user_info['suffix'] ?>">
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

                                                <div class="col-md-8 position-relative">
                                                    <label for="birth_place" class="form-label">Place of Birth</label>
                                                    <input form="benefInfo" type="date" name="Birth Place" class="form-control" id="birth_place" aria-describedby="inputBirthPlace" value="<?php echo $user_info['birth_place'] ?>" <?php echo $user_info['birth_place'] != null ? "disabled" : "" ?>>
                                                </div>

                                                <!-- HOME ADDRESS -->
                                                <!-- ADDRESS If living in If living in subdivisions-->
                                                <div class="col-md-12 position-relative">
                                                    <label for="address_line" class="form-label">Address (House No./ Purok /Street / Block and Lot Number/ Street/Subdivision Name)</label>
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

                                                <!-- ZIP CODE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="zip_code" class="form-label">ZIP Code</label>
                                                    <input form="benefInfo" type="zipCode" name="Zip Code" class="form-control" id="zip_code" aria-describedby="inputZipCode" value="<?php echo $user_info['zip_code'] ?>" <?php echo $user_info['zip_code'] != null ? "disabled" : "" ?>>
                                                </div>

                                                <!-- CITIZENSHIP -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="citizenship" class="form-label">Citizenship</label>
                                                    <input form="benefInfo" type="text" name="Citizenship" class="form-control" id="citizenship" aria-describedby="inputCitizenship" value="<?php echo $user_info['citizenship'] ?>" <?php echo $user_info['citizenship'] != null ? "disabled" : "" ?>>
                                                </div>

                                                <!-- RESIDENCY -->
                                                <div class="col-md-5 position-relative">
                                                    <label for="years_of_residency" class="form-label">Years of Residency in Santo Tomas</label>
                                                    <input form="benefInfo" type="number" name="Years of Residency" class="form-control" id="years_of_residency" aria-describedby="inputResidency" value="<?php echo $user_info['years_of_residency'] ?>" <?php echo $user_info['years_of_residency'] != null ? "disabled" : "" ?>>
                                                </div>

                                                <!-- LANGUAGE -->
                                                <div class="col-md-4 position-relative">
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
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="educApproveRadioDefault1">
                                                        <label class="mx-2 form-check-label" for="educApproveCheckBox"> Approve </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="educReviewDefault2">
                                                        <label class="mx-2 form-check-label" for="educReviewCheckBox"> For Review </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="educModiDefault3">
                                                        <label class="mx-2 form-check-label" for="educModiCheckBox"> For Modification </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="row g-4 pt-3  mb-3 needs-validation" novalidate>
                                                <div class="col-md-6 position-relative">
                                                    <label for="graduating_flag" class="form-label">Are you Graduating this Semester/Term?</label>
                                                    <select class="form-select" id="graduating_flag" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select Yes or No.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="honor_flag" class="form-label">Are you Graduating with Honors?</label>
                                                    <select class="form-select" id="honor_flag">
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0">Yes</option>
                                                        <option value="1">No</option>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select Yes or No.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 position-relative">
                                                    <label for="honor_type" class="form-label">Specify your Award/Honor</label>
                                                    <select class="form-select" id="honor_type">
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
                                                    <input type="Others" class="form-control" id="other_honor" aria-describedby="other_honor" value="">
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="graduation_year" class="form-label">If not Graduating, what year are you Graduating?</label>
                                                    <select class="form-select" id="graduation_year">
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php for ($i = 2012; $i <= date("Y"); $i++) : ?>
                                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select expected Year of Graduation.
                                                    </div>
                                                </div>
                                            </form>

                                            <!--COLLEGE LEVEL-->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title">
                                                    College
                                                    Level
                                                </h5>
                                            </div>
                                            <form class="row g-4 pt-3 needs-validation" novalidate>
                                                <div class="col-md-6   position-relative">
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
                                                    <label for="c_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                                                    <input type="text" class="form-control" id="c_otherSchool" aria-describedby="c_otherSchool">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="c_year_level" class="form-label">Year Level</label>
                                                    <select class="form-select" id="c_year_level">
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
                                                <div class="col-md-8 position-relative">
                                                    <label for="c_course" class="form-label">Course Taken</label>
                                                    <select class="form-select" id="c_course">
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
                                                    <input type="text" class="form-control" id="c_otherCourse" aria-describedby="c_otherCourse">
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="c_major" class="form-label">Major in</label>
                                                    <input type="text" class="form-control" id="c_major" aria-describedby="c_major">
                                                </div>
                                                <div class="col-md-12 position-relative">
                                                    <label for="c_school_address" class="form-label">School Address</label>
                                                    <input type="text" class="form-control" id="c_school_address" aria-describedby="c_school_address">
                                                </div>
                                                <!-- TABLE FOR AWARDS COLLEGE -->
                                                <div class="column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">List of Awards </h5>
                                                        <div class="d-flex align-items-center d-grid gap-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                                                            </div>
                                                            <!-- ADD AWARD MODAL -->
                                                            <button id="collgeAddAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#collgeAddAwardModal">Add Award</button>
                                                            <div class="modal fade" id="collgeAddAwardModal" tabindex="-1">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-flex justify-content-between align-items-center"> Award</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!--SUB FORMS-->
                                                                                        <form class="col-sm-3 py-3">
                                                                                            <div class="row mt-4">
                                                                                                <!-- Table No -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="no" class="col-sm-3 col-form-label fw-bold">No.</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputGradepoints" class="form-control" disabled />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Award -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputAward" class="col-sm-3 col-form-label fw-bold">Award:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputAward" class="form-control" placeholder="Indicate an Award" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Academic Year -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_acadYear" class="col-sm-3 col-form-label fw-bold">Academic Year</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_acadYear">
                                                                                                            <option selected disabled value="">Select Academic Year</option>
                                                                                                            <option value="0">AY: 2022-2023</option>
                                                                                                            <option value="1">AY: 2022-2023</option>
                                                                                                            <option value="2">AY: 2022-2023</option>
                                                                                                            <option value="3">AY: 2022-2023</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Academic Year.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Semester -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_semester" class="col-sm-3 col-form-label fw-bold">Semester</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_semester">
                                                                                                            <option selected disabled value="">Select Semester</option>
                                                                                                            <option value="0">1st Semester</option>
                                                                                                            <option value="1">2nd Semester</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Semester.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Year Level -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_yearLevel" class="col-sm-3 col-form-label fw-bold">Year Level</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_yearLevel">
                                                                                                            <option selected disabled value="">Select Year Level</option>
                                                                                                            <option value="0">1st Year</option>
                                                                                                            <option value="1">2nd Year</option>
                                                                                                            <option value="2">3rd Year</option>
                                                                                                            <option value="3">4th Year</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Year Level.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>

                                                                                        <!-- End Multi Columns Form -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer pt-2 d-flex justify-content-end">
                                                                                <button id="saveAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#saveAwardModal">Save Award</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                                                    <div class="table-responsive">
                                                        <table id="collegeAward_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
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
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                                                            <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
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
                                                <!-- SHS -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="s_school" class="form-label">Name of School Attended</label>
                                                    <select class="form-select" id="s_school">
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($school as $key => $col) : ?>
                                                            <?php if ($col['school_type'] == 1) : ?>
                                                                <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select School.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="s_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                                                    <input type="Others" class="form-control" id="s_otherSchool" aria-describedby="s_otherSchool">
                                                </div>
                                                <div class="col-md-2 position-relative">
                                                    <label for="s_year_level" class="form-label">Year Level</label>
                                                    <select class="form-select" id="s_year_level">
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
                                                    <select class="form-select" id="s_strand">
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($strand as $key => $str) : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $str ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select Course.
                                                    </div>
                                                </div>
                                                <div class="col-md-9 position-relative">
                                                    <label for="s_otherStand" class="form-label">If not specified in the list, kindly input the Strand.</label>
                                                    <input type="Others" class="form-control" id="s_otherStand" aria-describedby="s_otherStand">
                                                </div>
                                                <div class="col-md-12 position-relative">
                                                    <label for="s_schoolAddress" class="form-label">School Address</label>
                                                    <input type="Others" class="form-control" id="s_schoolAddress" aria-describedby="s_schoolAddress">
                                                </div>
                                                <div class="column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">List of Awards </h5>
                                                        <div class="d-flex align-items-center d-grid gap-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                                                            </div>
                                                            <!-- ADD AWARD MODAL -->
                                                            <button id="seniorHighAddAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#seniorHighAddAwardModal">Add Award</button>
                                                            <div class="modal fade" id="seniorHighAddAwardModal" tabindex="-1">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-flex justify-content-between align-items-center"> Award</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!--SUB FORMS-->
                                                                                        <form class="col-sm-3 py-3">
                                                                                            <div class="row mt-4">
                                                                                                <!-- Table No -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="no" class="col-sm-3 col-form-label fw-bold">No.</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputGradepoints" class="form-control" disabled />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Award -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputAward" class="col-sm-3 col-form-label fw-bold">Award:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputAward" class="form-control" placeholder="Indicate an Award" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Academic Year -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_acadYear" class="col-sm-3 col-form-label fw-bold">Academic Year</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_acadYear">
                                                                                                            <option selected disabled value="">Select Academic Year</option>
                                                                                                            <option value="0">AY: 2022-2023</option>
                                                                                                            <option value="1">AY: 2022-2023</option>
                                                                                                            <option value="2">AY: 2022-2023</option>
                                                                                                            <option value="3">AY: 2022-2023</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Academic Year.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Semester -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_semester" class="col-sm-3 col-form-label fw-bold">Semester</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_semester">
                                                                                                            <option selected disabled value="">Select Semester</option>
                                                                                                            <option value="0">1st Semester</option>
                                                                                                            <option value="1">2nd Semester</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Semester.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Year Level -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_yearLevel" class="col-sm-3 col-form-label fw-bold">Year Level</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_yearLevel">
                                                                                                            <option selected disabled value="">Select Year Level</option>
                                                                                                            <option value="0">1st Year</option>
                                                                                                            <option value="1">2nd Year</option>
                                                                                                            <option value="2">3rd Year</option>
                                                                                                            <option value="3">4th Year</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Year Level.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>

                                                                                        <!-- End Multi Columns Form -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer pt-2 d-flex justify-content-end">
                                                                                <button id="saveAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#saveAwardModal">Save Award</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                                                    <div class="table-responsive">
                                                        <table id="collegeAward_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
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
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                                                            <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
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
                                                <!-- HIGHSCHOOL -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="j_school" class="form-label">Name of School Attended</label>
                                                    <select class="form-select" id="j_school" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($school as $key => $col) : ?>
                                                            <?php if ($col['school_type'] == 2) : ?>
                                                                <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select School.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="j_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                                                    <input type="Others" class="form-control" id="j_otherSchool" aria-describedby="j_otherSchool">
                                                </div>
                                                <div class="col-md-2 position-relative">
                                                    <label for="j_year_level" class="form-label">Year Level</label>
                                                    <select class="form-select" id="j_year_level" required>
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
                                                <div class="col-md-12 position-relative">
                                                    <label for="j_school_address" class="form-label">School Address</label>
                                                    <input type="Others" class="form-control" id="j_school_address" aria-describedby="j_school_address" value="" required>
                                                </div>
                                                <div class="column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">List of Awards </h5>
                                                        <div class="d-flex align-items-center d-grid gap-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                                                            </div>
                                                            <!-- ADD AWARD MODAL -->
                                                            <button id="highSchoolAddAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#highSchoolAddAwardModal">Add Award</button>
                                                            <div class="modal fade" id="highSchoolAddAwardModal" tabindex="-1">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-flex justify-content-between align-items-center"> Award</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!--SUB FORMS-->
                                                                                        <form class="col-sm-3 py-3">
                                                                                            <div class="row mt-4">
                                                                                                <!-- Table No -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="no" class="col-sm-3 col-form-label fw-bold">No.</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputGradepoints" class="form-control" disabled />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Award -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputAward" class="col-sm-3 col-form-label fw-bold">Award:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputAward" class="form-control" placeholder="Indicate an Award" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Academic Year -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_acadYear" class="col-sm-3 col-form-label fw-bold">Academic Year</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_acadYear">
                                                                                                            <option selected disabled value="">Select Academic Year</option>
                                                                                                            <option value="0">AY: 2022-2023</option>
                                                                                                            <option value="1">AY: 2022-2023</option>
                                                                                                            <option value="2">AY: 2022-2023</option>
                                                                                                            <option value="3">AY: 2022-2023</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Academic Year.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Semester -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_semester" class="col-sm-3 col-form-label fw-bold">Semester</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_semester">
                                                                                                            <option selected disabled value="">Select Semester</option>
                                                                                                            <option value="0">1st Semester</option>
                                                                                                            <option value="1">2nd Semester</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Semester.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Year Level -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_yearLevel" class="col-sm-3 col-form-label fw-bold">Year Level</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_yearLevel">
                                                                                                            <option selected disabled value="">Select Year Level</option>
                                                                                                            <option value="0">1st Year</option>
                                                                                                            <option value="1">2nd Year</option>
                                                                                                            <option value="2">3rd Year</option>
                                                                                                            <option value="3">4th Year</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Year Level.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>

                                                                                        <!-- End Multi Columns Form -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer pt-2 d-flex justify-content-end">
                                                                                <button id="saveAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#saveAwardModal">Save Award</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                                                    <div class="table-responsive">
                                                        <table id="collegeAward_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
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
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                                                            <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
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
                                                <!-- ELEMENTARY -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="e_school" class="form-label">Name of School Attended</label>
                                                    <select class="form-select" id="e_school">
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($school as $key => $col) : ?>
                                                            <?php if ($col['school_type'] == 3) : ?>
                                                                <option value="<?php echo $key ?>"><?php echo $col['school_name'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Please select School.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="e_otherSchool" class="form-label">If not specified in the list, kindly input the School Name.</label>
                                                    <input type="Others" class="form-control" id="e_otherSchool" aria-describedby="e_otherSchool">
                                                </div>
                                                <div class="col-md-2 position-relative">
                                                    <label for="inputHighYearLevel" class="form-label">Year Level</label>
                                                    <select class="form-select" id="inputHighYearLevel" required>
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
                                                    <input type="Others" class="form-control" id="e_school_address" aria-describedby="e_school_address">
                                                </div>
                                                <div class="column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">List of Awards </h5>
                                                        <div class="d-flex align-items-center d-grid gap-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have an Awards</label>
                                                            </div>
                                                            <!-- ADD AWARD MODAL -->
                                                            <button id="elemAddAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#elemAddAwardModal">Add Award</button>
                                                            <div class="modal fade" id="elemAddAwardModal" tabindex="-1">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-flex justify-content-between align-items-center"> Award</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!--SUB FORMS-->
                                                                                        <form class="col-sm-3 py-3">
                                                                                            <div class="row mt-4">
                                                                                                <!-- Table No -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="no" class="col-sm-3 col-form-label fw-bold">No.</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputGradepoints" class="form-control" disabled />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Award -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputAward" class="col-sm-3 col-form-label fw-bold">Award:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputAward" class="form-control" placeholder="Indicate an Award" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Academic Year -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_acadYear" class="col-sm-3 col-form-label fw-bold">Academic Year</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_acadYear">
                                                                                                            <option selected disabled value="">Select Academic Year</option>
                                                                                                            <option value="0">AY: 2022-2023</option>
                                                                                                            <option value="1">AY: 2022-2023</option>
                                                                                                            <option value="2">AY: 2022-2023</option>
                                                                                                            <option value="3">AY: 2022-2023</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Academic Year.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Semester -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_semester" class="col-sm-3 col-form-label fw-bold">Semester</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_semester">
                                                                                                            <option selected disabled value="">Select Semester</option>
                                                                                                            <option value="0">1st Semester</option>
                                                                                                            <option value="1">2nd Semester</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Semester.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Year Level -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="award_yearLevel" class="col-sm-3 col-form-label fw-bold">Year Level</label>
                                                                                                    <div class="col-sm-9 mb-2">
                                                                                                        <select class="form-select" id="award_yearLevel">
                                                                                                            <option selected disabled value="">Select Year Level</option>
                                                                                                            <option value="0">1st Year</option>
                                                                                                            <option value="1">2nd Year</option>
                                                                                                            <option value="2">3rd Year</option>
                                                                                                            <option value="3">4th Year</option>
                                                                                                        </select>
                                                                                                        <div class="invalid-tooltip">
                                                                                                            Please select Year Level.
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>

                                                                                        <!-- End Multi Columns Form -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer pt-2 d-flex justify-content-end">
                                                                                <button id="saveAward" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#saveAwardModal">Save Award</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                                                    <div class="table-responsive">
                                                        <table id="collegeAward_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
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
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editAward" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAwardModal">Edit </button>
                                                                            <button id="deleteAward" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAwardModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
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
                                                <h5 class="card-title"> Family Background</h5>
                                                <div class="d-flex align-items-center d-grid gap-3">
                                                    <label class="form-check-label fw-bold">Remarks:</label>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="famApproveRadioDefault1">
                                                        <label class="mx-2 form-check-label" for="famApproveCheckBox"> Approve </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="famReviewDefault2">
                                                        <label class="mx-2 form-check-label" for="famReviewCheckBox"> For Review </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="famModiDefault3">
                                                        <label class="mx-2 form-check-label" for="famModiCheckBox"> For Modification </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="row g-4 pt-3 needs-validation" novalidate>
                                                <!-- GENERAL FAMILY INFORMATION -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="family_flag" class="form-label">Are you Living with Family?</label>
                                                    <select class="form-select" id="family_flag" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="total_num" class="form-label">Total number of Family</label>
                                                    <input type="number" class="form-control" id="total_num" aria-describedby="total_num">
                                                </div>
                                                <div class="col-md-2 position-relative">
                                                    <label for="birth_order" class="form-label">Birth Order</label>
                                                    <input type="number" class="form-control" id="birth_order" aria-describedby="birth_order">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label for="source" class="form-label"> Source of Living?</label>
                                                    <select class="form-select" id="source" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($incomeArr as $key => $inc) : ?>
                                                            <option value="<?php echo $key ?>" <?php echo $gen_info[2] != null and $gen_info[2] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 position-relative">
                                                    <label for="rent_flag" class="form-label"> Is your Home Rent or Owned?</label>
                                                    <select class="form-select" id="rent_flag" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Owned</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>Rent</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7 position-relative">
                                                    <label for="inputOthers" class="form-label">If not specified in the list, kindly input here.</label>
                                                    <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="" required>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="monthly_payment" class="form-label"> How much paying monthly (If renting or paying-to-own)</label>
                                                    <select class="form-select" id="monthly_payment" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($incomeArr as $key => $inc) : ?>
                                                            <option value="<?php echo $key ?>" <?php echo $gen_info[2] != null and $gen_info[2] == $key ? "selected" : "" ?>><?php echo $inc ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <!-- TABLE OF SIBLINGS -->
                                                <div class="column">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title">List of Siblings </h5>
                                                        <div class="d-flex align-items-center d-grid gap-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Siblings</label>
                                                            </div>
                                                            <!-- ADD SIBLING MODAL -->
                                                            <button id="siblingAdd" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#siblingAddModal">Add Sibling</button>
                                                            <div class="modal fade" id="siblingAddModal" tabindex="-1">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title d-flex justify-content-between align-items-center">Sibling Information</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-lg-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <!--SIBLING FORMS-->
                                                                                        <form class="col-sm-3 py-3">
                                                                                            <div class="row mt-4">
                                                                                                <!-- Table No -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="no" class="col-sm-3 col-form-label fw-bold">No.</label>
                                                                                                    <div class="col-sm-2">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputSibling" class="form-control" disabled />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- FIRST NAME SIBLING -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputFnameSibling" class="col-sm-3 col-form-label fw-bold">First Name:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputFnameSibling" class="form-control" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- MIDDLE NAME -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputMnameSibling" class="col-sm-3 col-form-label fw-bold">Middle Name:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputMnameSibling" class="form-control" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- LAST NAME -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputLnameSibling" class="col-sm-3 col-form-label fw-bold">Last Name:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="inputLnameSibling" class="form-control" style="width: 90%" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- BIRTH ORDER -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="birth_order" class="col-sm-3 col-form-label fw-bold">Birth Order:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="number" class="form-control" id="birth_order" aria-describedby="birth_order" style="width: 90%">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- SIBLING AGE -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputAge" class="col-sm-3 col-form-label fw-bold">Sibling Age:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <input type="age" class="form-control" id="inputAge" aria-describedby="inputAge" style="width: 90%">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- OCCUPATION -->
                                                                                                <div class="row mb-2">
                                                                                                    <label for="inputOccupation" class="col-sm-3 col-form-label fw-bold">Occupation:</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <div class="input-group mb-2">
                                                                                                            <select class="form-select" id="inputOccupation" required>
                                                                                                                <option selected disabled value="">Choose...</option>
                                                                                                                <option>...</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer pt-2 d-flex justify-content-end">
                                                                                <button id="saveSibling" type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#saveSiblingModal">Save Sibling</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- TABLE AWARDS FOR COLLEGE LEVEL -->
                                                    <div class="table-responsive">
                                                        <table id="sibling_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>No</th>
                                                                    <th>Name of Sibling</th>
                                                                    <th>Birth Order </th>
                                                                    <th>Age</th>
                                                                    <th>Occupation</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">1</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editSibling" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSiblingModal">Edit </button>
                                                                            <button id="deleteSibling" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSiblingModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">2</td>
                                                                    <td class="text-center">Biscocho, Val Juniel Biscocho</td>
                                                                    <td class="text-center">College</td>
                                                                    <td class="text-center">1st Year </td>
                                                                    <td class="text-center">Santo Tomas</td>
                                                                    <td>
                                                                        <div class="btn-sm btn-group d-flex">
                                                                            <button id="editSibling" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSiblingModal">Edit </button>
                                                                            <button id="deleteSibling" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSiblingModal">Delete </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>

                                            <!-- FATHER'S INFORMATION -->
                                            <div class="d-flex justify-content-between align-items-center py-3">
                                                <h5 class="card-title">Father's Information </h5>
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

                                                <!-- BIRTH -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="inputDate" class="form-label">Birth Date</label>
                                                    <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                                                </div>
                                                <div class="col-md-8  position-relative">
                                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                                    <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputAge" class="form-label">Father's Age</label>
                                                    <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                                                </div>

                                                <!-- CONTACT INFORMATION -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="telephone" class="form-label">Contact Number</label>
                                                    <div class="input-group">
                                                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                                        <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>

                                                <!-- LIVING OR DECEASED -->
                                                <div class="col-md-6 position-relative">
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
                                                        <?php foreach ($educAttainment as $key => $educ) : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </form>

                                            <!-- MOTHER'S INFORMATION -->
                                            <div class="d-flex justify-content-between align-items-center pt-3">
                                                <h5 class="card-title">Mother's Information</h5>
                                                <div class="d-flex align-items-center d-grid gap-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Mother</label>
                                                    </div>
                                                </div>
                                            </div>
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


                                                <!-- BIRTH -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="inputDate" class="form-label">Birth Date</label>
                                                    <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                                                </div>
                                                <div class="col-md-8  position-relative">
                                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                                    <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputAge" class="form-label">Mother's Age</label>
                                                    <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                                                </div>

                                                <!-- CONTACT INFORMATION -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="telephone" class="form-label">Contact Number</label>
                                                    <div class="input-group">
                                                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                                        <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>

                                                <!-- LIVING OR DECEASED -->
                                                <div class="col-md-6 position-relative">
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
                                                        <?php foreach ($educAttainment as $key => $educ) : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </form>

                                            <!-- GUARDIAN'S INFORMATION -->
                                            <div class="d-flex justify-content-between align-items- py-3">
                                                <h5 class="card-title"> Guardian's Information</h5>
                                                <div class="d-flex align-items-center d-grid gap-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">I don't have a Guardian</label>
                                                    </div>
                                                </div>
                                            </div>
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

                                                <!-- BIRTH -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="inputDate" class="form-label">Birth Date</label>
                                                    <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                                                </div>
                                                <div class="col-md-5  position-relative">
                                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                                    <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputAge" class="form-label">Guardian's Age</label>
                                                    <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputRelationship" class="form-label">Relationship</label>
                                                    <input type="Age" class="form-control" id="inputRelationship" aria-describedby="inputRelationship" value="" required>
                                                </div>

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
                                                        <?php foreach ($educAttainment as $key => $educ) : ?>
                                                            <option value="<?php echo $key ?>"><?php echo $educ ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </form>

                                            <!-- SPOUSE'S INFORMATION -->
                                            <div class="d-flex justify-content-between align-items- py-3">
                                                <h5 class="card-title"> Spouse Information (If Married) </h5>
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

                                                <!-- BIRTH -->
                                                <div class="col-md-4 position-relative">
                                                    <label for="inputDate" class="form-label">Birth Date</label>
                                                    <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                                                </div>
                                                <div class="col-md-8  position-relative">
                                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                                    <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputAge" class="form-label">Spouse's Age</label>
                                                    <input type="Age" class="form-control" id="inputAge" aria-describedby="inputAge" value="" required>
                                                </div>

                                                <!-- START AGE -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="inputLivingDeceased" class="form-label"> Relationship </label>
                                                    <select class="form-select" id="inputLivingDeceased" required>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option>Husband</option>
                                                        <option>Wife</option>
                                                    </select>
                                                </div>

                                                <!-- CONTACT INFORMATION -->
                                                <div class="col-md-3 position-relative">
                                                    <label for="telephone" class="form-label">Contact Number</label>
                                                    <div class="input-group">
                                                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                                        <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>

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
                                            </form>
                                        </div>

                                        <!--ADDITIONAL BACKGROUND-->
                                        <div class="tab-pane fade" id="bordered-justified-additional-information" role="tabpanel" aria-labelledby="additional-information">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title"> Additional Information</h5>
                                                <div class="d-flex align-items-center d-grid gap-3">
                                                    <label class="form-check-label fw-bold">Remarks:</label>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="addInfoApproveRadioDefault1">
                                                        <label class="mx-2 form-check-label" for="addInfoApproveCheckBox"> Approve </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="addInfoReviewDefault2">
                                                        <label class="mx-2 form-check-label" for="addInfoReviewCheckBox"> For Review </label>
                                                    </div>
                                                    <div class="form-check form-radio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="addInfoModiDefault3">
                                                        <label class="mx-2 form-check-label" for="addInfoModiCheckBox"> For Modification </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Custom Styled Validation with Tooltips -->
                                            <form class="row g-4 needs-validation" novalidate>
                                                <div class="col-md-4 position-relative">
                                                    <label for="inputWorkingStudent" class="form-label">Are you a Working Student?</label>
                                                    <select class="form-select" id="inputWorkingStudent" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>

                                                <!---OFW PARENTS -->
                                                <div class="col-md-8 position-relative">
                                                    <label for="inputOfwParents" class="form-label">Do you have a Parent/s who is/are an OFW?</label>
                                                    <select class="form-select" id="inputOfwParents" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>

                                                <!--OFW FAMILY MEMBERS -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who are an OFW?</label>
                                                    <select class="form-select" id="inputOfwMembers" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>

                                                <!---PWD PARENTS -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputPwdParents" class="form-label">Do you have a Parent/s who have PWD?</label>
                                                    <select class="form-select" id="inputPwdParents" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>

                                                <!---PWD FAMILY MEMBERS -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who have PWD?</label>
                                                    <select class="form-select" id="inputOfwMembers" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>

                                                <!---PARENTS STATUS -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputParentStatus" class="form-label">What is your Parents Status?</label>
                                                    <select class="form-select" id="inputParentStatus" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <?php foreach ($civilArr as $key => $value) : ?>
                                                            <option value="<?php echo $key ?>" <?php echo $key == $user_info['civil_status'] ? "selected" : "" ?>><?php echo $value ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <!---STUDENT PWD -->
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputStudentPwd" class="form-label">Are you a Student with PWD?</label>
                                                    <select class="form-select" id="inputStudentPwd" <?php echo $gen_info[2] != null ? "disabled" : "" ?>>
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="0" <?php echo $gen_info[2] != null and $gen_info[2] == 0 ? "selected" : "" ?>>Yes</option>
                                                        <option value="1" <?php echo $gen_info[2] != null and $gen_info[2] == 1 ? "selected" : "" ?>>No</option>
                                                    </select>
                                                </div>
                                            </form>
                                            <!-- End Custom Styled Validation with Tooltips -->
                                        </div>

                                        <!-- PAGINATION -->
                                        <div class=" d-grid mt-5 gap-2 d-flex justify-content-end align-items-center" src="pagination.js">
                                            </script>
                                            <nav aria-label="pagination">
                                                <ul class="pagination" id="borderedTabJustifiedPagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#bordered-justified-personal-information" data-bs-slide-to="0">Back to first page</a>
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