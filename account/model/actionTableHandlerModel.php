<?php

function getActionButton($row)
{
    extract($row);

    $personalInfo = '<!--PERSONAL INFORMATION-->
                        <div class="tab-pane fade show active" id="bordered-justified-personal-information" role="tabpanel" aria-labelledby="personal-information">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    Primary
                                    Information
                                </h5>
                            </div>
                            <!-- Custom Styled Validation with Tooltips -->
                            <form class="row g-4 pt-3 needs-validation" novalidate>
                                <!-- FULL NAME -->
                                <div class="col-md-3 position-relative">
                                    <label for="inputFirstName" class="form-label">First name</label>
                                    <input disabled type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="' . ucfirst($first_name) . '" required>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="inputMiddleName" class="form-label">Middle name</label>
                                    <input disabled type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="' . ucfirst($middle_name) . '" required>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="inputLastName" class="form-label">Last name</label>
                                    <input disabled type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="' . ucfirst($last_name) . '" required>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                                    <input disabled type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="' . ucfirst($suffix) . '" required>
                                </div>
                                <!-- CONTACT NUMBER AND EMAIL ADDRESS -->
                                <div class="col-md-5 position-relative">
                                    <label for="telephone" class="form-label">Contact Number</label>
                                    <div class="input-group">
                                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                        <input disabled type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" value="' . $contact_number . '" required>
                                    </div>
                                </div>
                                <div class="col-md-7 position-relative">
                                    <label for="EmailAddress" class="form-label">Email Address</label>
                                    <input disabled type="EmailAddress" class="form-control" id="inputEmailAddress" aria-describedby="inputEmailAddress" value="' . $email . '" required>
                                </div>
                                <!-- BIRTH -->
                                <div class="col-md-4 position-relative">
                                    <label for="inputDate" class="form-label">Birth Date</label>
                                    <input disabled type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="' . $birth_date . '" required>
                                </div>
                                <div class="col-md-8 position-relative">
                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                    <input disabled type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="' . ucfirst($birth_place) . '" required>
                                </div>
                                <!-- ADDRESS -->
                                <div class="col-md-4 position-relative">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input disabled type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" value="' . ucfirst($address_line) . '" required>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="inputBarangay" class="form-label">Barangay</label>
                                    <input disabled type="Barangay" class="form-control" id="inputBarangay" aria-describedby="inputBarangay" value="' . ucfirst($barangay) . '" required>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="inputMunicipality" class="form-label">Municipality</label>
                                    <input disabled type="Municipality" class="form-control" id="inputMunicipality" aria-describedby="inputMunicipality" value="' . ucfirst($municipality) . '" required>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="inputProvince" class="form-label">Province</label>
                                    <input disabled type="Province" class="form-control" id="inputProvince" aria-describedby="inputProvince" value="' . ucfirst($province) . '" required>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="inputZipCode" class="form-label">ZIP Code</label>
                                    <input type="zipCode" class="form-control" id="inputZipCode" aria-describedby="inputZipCode" value="' . $zip_code . '" required>
                                </div>
                                <!-- CITIZENSHIP -->
                                <div class="col-md-3 position-relative">
                                    <label for="inputCitizenship" class="form-label">Citizenship</label>
                                    <input type="citizenship" class="form-control" id="inputCitizenship" aria-describedby="inputCitizenship" value="' . $citizenship . '" required>
                                </div>
                                <!-- RESIDENCY -->
                                <div class="col-md-4 position-relative">
                                    <label for="inputResidency" class="form-label">Years of Residency in Santo Tomas</label>
                                    <input type="residency" class="form-control" id="inputResidency" aria-describedby="inputResidency" value="' . $years_of_residency . '" required>
                                </div>
                                <!-- LANGUAGE -->
                                <div class="col-md-3 position-relative">
                                    <label for="inputMotherTongue" class="form-label">Mother Tongue</label>
                                    <input type="Language" class="form-control" id="inputMotherTongue" aria-describedby="inputMotherTongue" value="' . $language . '" required>
                                </div>
                                <!-- START RELIGION -->
                                <div class="col-md-4 position-relative">
                                    <label for="inputReligion" class="form-label">Religion</label>
                                    <input disabled type="Religion" class="form-control" id="inputReligion" aria-describedby="inputReligion" value="' . ucfirst($religion) . '" required>
                                </div>
                                <!-- SEX -->

                                ------------------------------------------------------------------------------------------------------------------------------------
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
                        </div>';

    $education_bg = '<!--EDUCATIONAL BACKGROUND-->
                    <div class="tab-pane fade" id="bordered-justified-educational-background" role="tabpanel" aria-labelledby="educational-background">
                        <!--GENERAL EDUC-->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                                General
                                Educational
                                Information
                            </h5>
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
                                            <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have an Awards</label>
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
                                            <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have an Awards</label>
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
                                            <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have an Awards</label>
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
                                            <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have an Awards</label>
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
                    </div>';

    $family_bg = '<!--FAMILY BACKGROUND-->
                <div class="tab-pane fade" id="bordered-justified-family-background" role="tabpanel" aria-labelledby="family-background">
                    <!--FAMILY INFORMATION-->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            Family
                            Background
                        </h5>
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
                                    Sibling\'s
                                    Information
                                </h5>
                                <div class="d-flex align-items-center d-grid gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have a Sibling</label>
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
                    <!-- FATHER\'S INFORMATION -->
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <h5 class="card-title">
                            Father\'s
                            Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have a Father</label>
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
                            <label for="inputAge" class="form-label">Father\'s Age</label>
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
                        <!-- FATHER\'S OCCUPATION  -->
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
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
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
                    <!-- MOTHER\'S INFORMATION -->
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <h5 class="card-title">
                            Mother\'s
                            Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have a Mother</label>
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
                            <label for="inputAge" class="form-label">Mother\'s Age</label>
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
                        <!-- MOTHER\'S OCCUPATION  -->
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
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
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
                        <!-- END MOTHER\'S INFORMATION -->
                    </form>
                    <!-- End Custom Styled Validation with Tooltips -->
                    <!-- GUARDIAN\'S INFORMATION -->
                    <div class="d-flex justify-content-between align-items- py-3">
                        <h5 class="card-title">
                            Guardian\'s
                            Information
                        </h5>
                        <div class="d-flex align-items-center d-grid gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have a Guardian</label>
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
                            <label for="inputAge" class="form-label">Guardian\'s Age</label>
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
                        <!-- GUARDIAN\'S INFORMATION  -->
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
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
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
                        <!-- END GUARDIAN\'S INFORMATION -->
                    </form>
                    <!-- End Custom Styled Validation with Tooltips -->
                    <!-- GUARDIAN\'S INFORMATION -->
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
                                <label class="form-check-label" for="flexSwitchCheckDefault">I don\'t have a Spouse</label>
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
                            <label for="inputAge" class="form-label">Guardian\'s Age</label>
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
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
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
                </div>';

    $additional_bg = '<!--ADDITIONAL BACKGROUND-->
                    <div class="tab-pane fade" id="bordered-justified-additional-information" role="tabpanel" aria-labelledby="additional-information">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">
                                Additional
                                Information
                            </h5>
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
                    </div>';

    
    $profile = '<!--Profile -->
                <div id="profile' . $id . '" class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Profile Checking</h5>
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                                <!--SUB FORMS-->
                                <div class="overflow-auto-x" style="height: 100%">
                                    <!-- Multi Columns Form -->
                                    <form class="row g-3 py-2">
                                        <h4 class="menu-content text-muted mb-0 fs-6 fw-bold text">
                                            Applicant\'s other Information
                                        </h4>
                                        <hr class="my-3">
                                        <div class="row mb-4">
                                            <label for="inputIncome" class="col-sm-3 col-form-label">Income:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputIncome" class="form-control" placeholder="Applicant\'s Income" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" />
                                                    <input disabled type="inputIncomepoints" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputGrade" class="col-sm-3 col-form-label">GWA:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputGradepoints" class="form-control" placeholder="Applicant\'s General Weightd Average" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" />
                                                    <input disabled type="inputGradepoints" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputSchooltype" class="col-sm-3 col-form-label">School Type:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputSchooltype" class="form-control" placeholder="School Type" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" />
                                                    <input disabled type="inputSchooltype" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputResidency" class="col-sm-3 col-form-label">Residency:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputPointsResidency" class="form-control" placeholder="Applicant\'s Year/s of Residency" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" />
                                                    <input disabled type="inputPointsResidency" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="menu-content text-muted mb-0 fs-6 fw-bold text">
                                                Applicant\'s additional
                                                Information</h4>
                                        </div>
                                        <hr class="my-2">
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="applicantPwdCheckBox">
                                            <label class="mx-2 form-check-label" for="applicantPwdCheckBox"> Applicant PWD </label>
                                        </div>
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="selfSupportingCheckBox">
                                            <label class="mx-2 form-check-label" for="selfSupportingCheckBox"> Self-Supporting </label>
                                        </div>
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="continuingStudentCheckBox">
                                            <label class="mx-2 form-check-label" for="continuingStudentCheckBox"> Continuing Student </label>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="menu-content text-muted mb-0 fs-6 fw-bold text">
                                                Family\'s additional
                                                Information</h4>
                                        </div>
                                        <hr class="my-2">
                                        <div class="d-flex"> <input class="form-check-input" type="checkbox" value="" id="parFamPwdCheckBox">
                                            <label class="mx-2 form-check-label" for="parFamPwdCheckBox"> Parents/Other family members PWD </label>
                                        </div>
                                        <div class="d-flex "> <input class="form-check-input" type="checkbox" value="" id="singleParentCheckBox">
                                            <label class="mx-2 form-check-label" for="singleParentCheckBox"> Single Parent </label>
                                        </div>
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="parentDeceasedCheckBox">
                                            <label class="mx-2 form-check-label" for="parentDeceasedCheckBox"> Parent Deceased </label>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="menu-content text-muted mb-0 fs-6 fw-bold text ">
                                                Other Information</h4>
                                        </div>
                                        <hr class="my-2">
                                        <div class="d-flex"> <input class="form-check-input" type="checkbox" value="" id="jobOrderCheckBox">
                                            <label class="mx-2 form-check-label" for="jobOrderCheckBox"> City Employee Immediate Family Member <br>(Job Order)</br> </label>
                                        </div>
                                        <div class="d-flex"> <input class="form-check-input" type="checkbox" value="" id="recommendedCheckBox">
                                            <label class="mx-2 form-check-label" for="recommendedCheckBox"> Informed thru/Recommended by <br> Mayor/Vice Mayor/Councilor </br> </label>
                                        </div>
                                    </form>
                                    <!-- End Multi Columns Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="container h-500">
                            <div class="row d-flex justify-content-center h-100">
                                <div class="col col-lg-500 col-xl-500">
                                    <div class="card">

                                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height:300px">
                                                <img src="assets/img/profile-img.jpg" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                            </div>
                                            <div class="ms-4 adjustable-line-spacing" style="margin-top: 115px;">
                                                <h5 class="fw-bold">
                                                    ' . ucfirst($first_name) . ' ' . ucfirst($middle_name) . ' ' . ucfirst($last_name) . ' ' . ucfirst($suffix) . '
                                                </h5>
                                                <p>Educational
                                                    Assistance
                                                    Scholarship -
                                                    College level
                                                    <br>EAC-213991</br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="my-2 p-4 text-black" style="background-color: #ffff; height:10px;">
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
                                        <!-- QUILLO DRAGGABLE -->
                                        <div class="col-lg-5">
                                            <div id="mydiv">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h5 class="card-title" id="mydivheader">Requirements Remarks</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="mydivheader" aria-label="Close" id="dismissButton"></button>
                                                        </div>
                                                        <!-- Quill Editor Full -->
                                                        <div class="quill-editor-full" style="height: 300px">
                                                            <p>Hello World!</p>
                                                            <p>This is Quill <strong>full</strong> editor</p>
                                                        </div>
                                                        <!-- End Quill Editor Full -->
                                                        <div class="d-grid gap-2 pt-3 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-warning btn-sm">Save Remarks</button>
                                                            <button type="button" class="btn btn-danger btn-sm">Edit Remarks</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-4">
                                            <div id="others_form_view" class="max-height-200">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            
                                                            ' . $personalInfo . '
                                                            
                                                            <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

                                                            ' . $education_bg . '

                                                            <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

                                                            ' . $family_bg . '

                                                            <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

                                                            ' . $additional_bg . '

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
                        </div>
                    </div>
                </div>';

    $requirements = '<!-- Requirements -->
                    <div id="requirements' . $id . '" class="row d-none">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">GENERAL REQUIREMENTS</h5>
                                    </div>
                                    <div class="max-width-100">
                                        <!-- Set a max width for the container -->
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab'.$id.'" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link flex-fill" id="v-pills-cor-tab'.$id.'" data-bs-toggle="pill" data-bs-target="#v-pills-cor" type="button" role="tab" aria-controls="v-pills-cor" aria-selected="true">Certificate of Registration</button>
                                            <button class="nav-link flex-fill" id="v-pills-cob-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cob" type="button" role="tab" aria-controls="v-pills-cob" aria-selected="true">Certificate of Birth</button>
                                            <button class="nav-link flex-fill" id="v-pills-cgmc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cgmc" type="button" role="tab" aria-controls="v-pills-cgmc" aria-selected="false">Certificate of Good Moral Character</button>
                                            <button class="nav-link flex-fill" id="v-pills-grades-tab" data-bs-toggle="pill" data-bs-target="#v-pills-grades" type="button" role="tab" aria-controls="v-pills-grades" aria-selected="false">Grade Report</button>
                                            <button class="nav-link flex-fill" id="v-pills-idpic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-idpic" type="button" role="tab" aria-controls="v-pills-idpic" aria-selected="false">ID Photo (2x2 size)</button>
                                            <button class="nav-link flex-fill" id="v-pills-map-tab" data-bs-toggle="pill" data-bs-target="#v-pills-map" type="button" role="tab" aria-controls="v-pills-map" aria-selected="false">Vicinity Map</button>
                                            <button class="nav-link flex-fill" id="v-pills-brgyclearance-tab" data-bs-toggle="pill" data-bs-target="#v-pills-brgyclearance" type="button" role="tab" aria-controls="v-pills-brgyclearance" aria-selected="false">Barangay Clearance</button>
                                            <button class="nav-link flex-fill" id="v-pills-parvoteid-tab" data-bs-toggle="pill" data-bs-target="#v-pills-parvoteid" type="button" role="tab" aria-controls="v-pills-parvoteid" aria-selected="false">Parents Voter’s ID/ Voter’s Certification</button>
                                            <button class="nav-link flex-fill" id="v-pills-appvoteid-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appvoteid" type="button" role="tab" aria-controls="v-pills-appvoteid" aria-selected="false">Voter’s Certificate of the Applicant</button>
                                            <button class="nav-link flex-fill" id="v-pills-itr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-itr" type="button" role="tab" aria-controls="v-pills-itr" aria-selected="false">Income Tax Return or Certificate of Employment and Compensation (Parents)</button>
                                            <button class="nav-link flex-fill" id="v-pills-indigency-tab" data-bs-toggle="pill" data-bs-target="#v-pills-indigency" type="button" role="tab" aria-controls="v-pills-indigency" aria-selected="false">Certificate of Indigency</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row d-flex justify-content-center align-items-center h-500" style="width: 100%">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <!-- CERT OF REGISTRATION -->
                                            <div class="tab-pane fade show active pt-3" id="v-pills-cor" role="tabpanel" aria-labelledby="v-pills-cor-tab" style="height: 00%; width: 100%">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="card-title">Certificate of Registration</h6>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="corApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="corApproveApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="corReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="corReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="corModiDefault3">
                                                            <label class="mx-2 form-check-label" for="corModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BIRTH CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-cob" role="tabpanel" aria-labelledby="v-pills-cob-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">CERTIFICATE OF BIRTH</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cobApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="cobApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cobReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="cobReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cobModiDefault3">
                                                            <label class="mx-2 form-check-label" for="cobModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CERT OF GOOD MORAL -->
                                            <div class="tab-pane fade pt-3" id="v-pills-cgmc" role="tabpanel" aria-labelledby="v-pills-cgmc-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">CERTIFICATE OF GOOD MORAL CHARACTER</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="goodMoralApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="goodMoralApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="goodMoralReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="goodMoralReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="goodMoralModiDefault3">
                                                            <label class="mx-2 form-check-label" for="goodMoralModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- GRADE REPORT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-grades" role="tabpanel" aria-labelledby="v-pills-grades-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">GRADE REPORT</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gradeReportApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="gradeReportApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gradeReportReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="gradeReportReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="gradeReportModiDefault3">
                                                            <label class="mx-2 form-check-label" for="gradeReportModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ID PHOTO 2X2 -->
                                            <div class="tab-pane fade pt-3" id="v-pills-idpic" role="tabpanel" aria-labelledby="v-pills-idpic-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">ID Photo</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="2x2PhotoApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="gradeReportApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="2x2PhotoReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="gradeReportReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="2x2PhotoModiDefault3">
                                                            <label class="mx-2 form-check-label" for="2x2PhotoModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- VICINITY MAP -->
                                            <div class="tab-pane fade pt-3" id="v-pills-map" role="tabpanel" aria-labelledby="v-pills-map-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">VICINITY MAP</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="vicinityMapApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="vicinityMapApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="vicinityMapReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="vicinityMapReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="vicinityMapModiDefault3">
                                                            <label class="mx-2 form-check-label" for="vicinityMapModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BARANGAY CLEARANCE -->
                                            <div class="tab-pane fade pt-3" id="v-pills-brgyclearance" role="tabpanel" aria-labelledby="v-pills-parvoteid-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">BARANGAY CLEARANCE</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bgryClearanceApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bgryClearanceReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bgryClearanceModiDefault3">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PARENT\'S VOTERS CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-parvoteid" role="tabpanel" aria-labelledby="v-pills-parvoteid-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">PARENTS VOTER\'S ID / CERTIFICATION</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="parvoteidApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="parvoteidApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="parvoteidReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="parvoteideviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="parvoteidModiDefault3">
                                                            <label class="mx-2 form-check-label" for="parvoteidModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- APPLICANTS VOTERS CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-appvoteid" role="tabpanel" aria-labelledby="v-pills-appvoteid-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">APPLICANT VOTER\'S ID / CERTIFICATION</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="appvoteidApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="appvoteidApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="appvoteidReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="appvoteidReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="votecertpaModiDefault3">
                                                            <label class="mx-2 form-check-label" for="appvoteidModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- INCOME TAX CERT -->
                                            <div class="tab-pane fade pt-3  " id="v-pills-itr" role="tabpanel" aria-labelledby="v-pills-itr-tab">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">INCOME TAX RETURN OR CERTIFICATE OF <br>EMPLOYMENT AND COMPENSATION</br></h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="itrApproveRadioDefault1">
                                                            <label class="mx-2 form-check-label" for="itrApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="itrReviewDefault2">
                                                            <label class="mx-2 form-check-label" for="itrReviewCheckBox"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="itrModiDefault3">
                                                            <label class="mx-2 form-check-label" for="itrModiCheckBox"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- QUILLO DRAGGABLE -->
                                            <div class="col-lg-5">
                                                <div id="mydiv">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h5 class="card-title" id="mydivheader">Requirements Remarks</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="mydivheader" aria-label="Close" id="dismissButton"></button>
                                                            </div>
                                                            <!-- Quill Editor Full -->
                                                            <div class="quill-editor-full" style="height: 300px">
                                                                <p>Hello World!</p>
                                                                <p>This is Quill <strong>full</strong> editor</p>
                                                            </div>
                                                            <!-- End Quill Editor Full -->
                                                            <div class="d-grid gap-2 pt-3 d-flex justify-content-end">
                                                                <button type="button" class="btn btn-warning btn-sm">Save Remarks</button>
                                                                <button type="button" class="btn btn-danger btn-sm">Edit Remarks</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    
    $button = '<div class="btn-group-vertical d-flex justify-content-between align-items-center">
                    <!--CHECK PROFILE BUTTON-->
                    <button id="viewInfo" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewInfoModal">Check Information</button>
                    <div class="modal fade" id="viewInfoModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header gap-3">
                                    <form class="btn-group-toggle" data-toggle="buttons" onchange="infoRadio(' . $id . ')">
                                        <input type="radio" class="btn-check" name="info' . $id . '" id="infoProfile' . $id . '" value="1" autocomplete="off" checked>
                                        <label class="btn btn-outline-danger" for="infoProfile' . $id . '">Profile</label>

                                        <input type="radio" class="btn-check" name="info' . $id . '" id="infoRequirements' . $id . '" value="2" autocomplete="off">
                                        <label class="btn btn-outline-danger" for="infoRequirements' . $id . '">Requirements</label>
                                    </form>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <div class="">
                                            <input class="form-check-input me-2" type="radio" name="decisionRadio' . $id . '" id="qualiExamRadio' . $id . '">
                                            <label class="form-check-label" for="qualiExamRadio' . $id . '">For Qualification Exam</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input me-2" type="radio" name="decisionRadio' . $id . '" id="interviewRadio' . $id . '">
                                            <label class="form-check-label" for="interviewRadio' . $id . '">For Interview</label>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-primary" id="openButton">Add Comment</button>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    
                                    '. $profile .'

                                    '. $requirements .'

                                    <!-- Action Buttons -->
                                    <div class="modal-footer  d-grid gap-2 d-flex justify-content-end" style="height: 55px;">
                                        <button type="button" class="btn btn-warning btn-sm">Submit</button>
                                        <button type="button" class="btn btn-danger btn-sm">Cancel Submission</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- REMOVE BUTTON -->
                    <button id="removeApplicant" type="button" class="btn btn-danger">Removed Applicant</button>
                </div>';

    return $button;
}
