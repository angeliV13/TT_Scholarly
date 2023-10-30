<?php

function getProfile($account_id)
{
    include("../global_variables.php");

    $acadYearId = getDefaultAcadYearId();
    $semId      = getDefaultSemesterId();
    $entries    = getFileEntries($acadYearId, $semId, $account_id, 'applicant_file', 1);

    $user_data = get_user_data($account_id);
    $id = $user_data[0];
    $userName = $user_data[1];
    $email = $user_data[2];
    $accountType = $user_data[3];
    $accountStatus = $user_data[5];

    $user_info = get_user_info($account_id);
    $eac_number = $user_info['eac_number'];
    $first_name = $user_info['first_name'];
    $middle_name = $user_info['middle_name'];
    $last_name = $user_info['last_name'];
    $suffix = $user_info['suffix'];
    $contact_number = $user_info['contact_number'];
    $birth_date = date("F d, Y", strtotime($user_info['birth_date']));
    $birth_place = $user_info['birth_place'];
    $address_line = $user_info['address_line'];
    $barangay = $user_info['barangay'];
    $municipality = $user_info['municipality'];
    $province = $user_info['province'];
    $zip_code = $user_info['zip_code'];
    $citizenship = $user_info['citizenship'];
    $language = $user_info['language'];
    $religion = $user_info['religion'];
    $gender = $user_info['gender'];
    $civil_status = $user_info['civil_status'];
    $profile_img = $user_info['fbImage'];
    $fbUrl = $user_info['fbUrl'];
    $years_of_residency = $user_info['years_of_residency'];

    $education = get_user_education($account_id);
    $school = get_school();

    $family = get_user_family($account_id);
    
    $gen_info = get_user_gen_info($account_id);
    $source = isset($gen_info['source']) ? $incomeArr[$gen_info['source']] : "";
    $gwa = isset($gen_info['gwa']) ? $gen_info['gwa'] : "";
    $self_pwd_flag = (isset($gen_info['self_pwd_flag']) AND $gen_info['self_pwd_flag'] == 0) ? "checked" : "";
    $working_flag = (isset($gen_info['working_flag']) AND $gen_info['working_flag'] == 0) ? "checked" : "";
    $other_pwd_flag = (isset($gen_info['other_pwd']) AND $gen_info['other_pwd'] == 0) ? "checked" : "";
    
    $scholarType = check_status($account_id);
    $scholarTypeName = get_scholar_type($scholarType['scholarType']);
    $scholarStatus = get_scholar_status($scholarType['status']);

    $profile = '<div class="row" id="profile">';
    $profile .= '<input type="hidden" id="scholarStatus" value="' . $scholarStatus . '">';

    if ($accountType == 3)
    {
        $profile .= '<div class="col-lg-4">
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
                                                    <input disabled type="inputIncome" class="form-control" placeholder="Applicant\'s Income" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" value="' . $source . '" />
                                                    <input disabled type="inputIncomepoints" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputSchooltype" class="col-sm-3 col-form-label">School Type:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputSchooltype" class="form-control" placeholder="School Type" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" value="' . $gwa . '"/>
                                                    <input disabled type="inputSchooltype" class="col form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputResidency" class="col-sm-3 col-form-label">Residency:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-2">
                                                    <input disabled type="inputPointsResidency" class="form-control" placeholder="Applicant\'s Year/s of Residency" style="width: 75%" aria-label="Recipient\'s username" aria-describedby="basic-addon2" value="' . $years_of_residency . '"/>
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
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="applicantPwdCheckBox" ' . $self_pwd_flag . ' disabled>
                                            <label class="mx-2 form-check-label" for="applicantPwdCheckBox"> Applicant PWD </label>
                                        </div>
                                        <div class="d-flex col-md-6"> <input class="form-check-input" type="checkbox" value="" id="selfSupportingCheckBox" ' . $working_flag . ' disabled>
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
                                        <div class="d-flex"> <input class="form-check-input" type="checkbox" value="" id="parFamPwdCheckBox" ' . $other_pwd_flag . ' disabled>
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
                    </div>';
    }

    $col = ($accountType == 2) ? "12" : "8";

    $profile .= '<div class="col-lg-' . $col . '">
                    <div class="container h-500">
                        <div class="row d-flex justify-content-center h-100">
                            <div class="col col-lg-500 col-xl-500">
                                <div class="card">

                                    <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height:300px">
                                            <img id="output" src="'.$profile_img.'" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1; height: 150px">
                                        </div>
                                        <div class="ms-4 adjustable-line-spacing" style="margin-top: 115px;">
                                            <h5 class="fw-bold">
                                                ' . ucfirst($first_name) . ' ' . ucfirst($middle_name) . ' ' . ucfirst($last_name) . ' ' . ucfirst($suffix) . '
                                            </h5>
                                            <p>Educational
                                                Assistance
                                                Scholarship -
                                                '.$scholarTypeName.'
                                                <br>'.$eac_number.'</br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="my-2 p-4 text-black" style="background-color: #ffff; height:10px;">
                                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                            <li class="nav-item flex-fill text-danger" role="presentation">
                                                <button class="nav-link w-100 active" id="personal-information' . $account_id . '" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information' . $account_id . '" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
                                            </li>
                                            <li class="nav-item flex-fill text-danger" role="presentation">
                                                <button class="nav-link w-100" id="educational-background' . $account_id . '" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational-background' . $account_id . '" type="button" role="tab" aria-controls="educational-background" aria-selected="false">Educational Background</button>
                                            </li>
                                            <li class="nav-item flex-fill text-danger" role="presentation">
                                                <button class="nav-link w-100" id="family-background' . $account_id . '" data-bs-toggle="tab" data-bs-target="#bordered-justified-family-background' . $account_id . '" type="button" role="tab" aria-controls="family-background" aria-selected="false">Family Background</button>
                                            </li>
                                            <li class="nav-item flex-fill text-danger" role="presentation">
                                                <button class="nav-link w-100" id="additional-information' . $account_id . '" data-bs-toggle="tab" data-bs-target="#bordered-justified-additional-information' . $account_id . '" type="button" role="tab" aria-controls="additional-information" aria-selected="false">Additional Information</button>
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
                                                        <!-- PERSONAL INFORMATION -->
                                                        <div class="tab-pane fade show active" id="bordered-justified-personal-information' . $account_id . '" role="tabpanel" aria-labelledby="personal-information">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h5 class="card-title">
                                                                    Primary
                                                                    Information
                                                                </h5>
                                                            </div>
                                                            <!-- Custom Styled Validation with Tooltips -->
                                                            <form class="row g-4 pt-3 " >
                                                                <!-- FULL NAME -->
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputFirstName" class="form-label">First name</label>
                                                                    <input disabled type="text" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="' . ucfirst($first_name) . '">
                                                                </div>
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputMiddleName" class="form-label">Middle name</label>
                                                                    <input disabled type="text" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="' . ucfirst($middle_name) . '">
                                                                </div>
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputLastName" class="form-label">Last name</label>
                                                                    <input disabled type="text" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="' . ucfirst($last_name) . '">
                                                                </div>
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                                                                    <input disabled type="text" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="' . ucfirst($suffix) . '">
                                                                </div>
                                                                <!-- CONTACT NUMBER AND EMAIL ADDRESS -->
                                                                <div class="col-md-5 position-relative">
                                                                    <label for="telephone" class="form-label">Contact Number</label>
                                                                    <div class="input-group">
                                                                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                                                        <input disabled type="text" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" value="' . substr($contact_number, 2) . '">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7 position-relative">
                                                                    <label for="EmailAddress" class="form-label">Email Address</label>
                                                                    <input disabled type="text" class="form-control" id="inputEmailAddress" aria-describedby="inputEmailAddress" value="' . $email . '">
                                                                </div>
                                                                <div class="col-md-12 position-relative">
                                                                    <label for="EmailAddress" class="form-label">Facebook URL</label><a href="' . $fbUrl . '" target="_blank" class="btn btn-primary btn-sm ms-2">Go to Facebook</a>
                                                                    <input disabled type="text" class="form-control" id="inputFbUrl" aria-describedby="inputFbUrl" value="' . $fbUrl . '">
                                                                </div>
                                                                <!-- BIRTH -->
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="inputDate" class="form-label">Birth Date</label>
                                                                    <input disabled type="text" class="form-control" id="inputDate" aria-describedby="inputDate" value="' . $birth_date . '">
                                                                </div>
                                                                <div class="col-md-8 position-relative">
                                                                    <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                                                    <input disabled type="text" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="' . ucfirst($birth_place) . '">
                                                                </div>
                                                                <!-- ADDRESS -->
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="inputAddress" class="form-label">Address</label>
                                                                    <input disabled type="text" class="form-control" id="inputAddress" aria-describedby="inputAddress" value="' . ucfirst($address_line) . '">
                                                                </div>
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputBarangay" class="form-label">Barangay</label>
                                                                    <input disabled type="text" class="form-control" id="inputBarangay" aria-describedby="inputBarangay" value="' . ucfirst($barangay) . '">
                                                                </div>
                                                                <div class="col-md-2 position-relative">
                                                                    <label for="inputMunicipality" class="form-label">Municipality</label>
                                                                    <input disabled type="text" class="form-control" id="inputMunicipality" aria-describedby="inputMunicipality" value="' . ucfirst($municipality) . '">
                                                                </div>
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputProvince" class="form-label">Province</label>
                                                                    <input disabled type="text" class="form-control" id="inputProvince" aria-describedby="inputProvince" value="' . ucfirst($province) . '">
                                                                </div>
                                                                <div class="col-md-2 position-relative">
                                                                    <label for="inputZipCode" class="form-label">ZIP Code</label>
                                                                    <input disabled type="text" class="form-control" id="inputZipCode" aria-describedby="inputZipCode" value="' . $zip_code . '">
                                                                </div>
                                                                <!-- CITIZENSHIP -->
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputCitizenship" class="form-label">Citizenship</label>
                                                                    <input disabled type="text" class="form-control" id="inputCitizenship" aria-describedby="inputCitizenship" value="' . $citizenshipArr[$citizenship] . '">
                                                                </div>
                                                                <!-- RESIDENCY -->
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="inputResidency" class="form-label">Years of Residency in Santo Tomas</label>
                                                                    <input disabled type="text" class="form-control" id="inputResidency" aria-describedby="inputResidency" value="' . $years_of_residency . '">
                                                                </div>
                                                                <!-- LANGUAGE -->
                                                                <div class="col-md-3 position-relative">
                                                                    <label for="inputMotherTongue" class="form-label">Mother Tongue</label>
                                                                    <input disabled type="text" class="form-control" id="inputMotherTongue" aria-describedby="inputMotherTongue" value="' . $language . '">
                                                                </div>
                                                                <!-- START RELIGION -->
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="inputReligion" class="form-label">Religion</label>
                                                                    <input disabled type="text" class="form-control" id="inputReligion" aria-describedby="inputReligion" value="' . $religionArr[$religion] . '">
                                                                </div>
                                                                <!-- SEX -->
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="Gender" class="form-label">Gender</label>
                                                                    <input disabled type="text" class="form-control" id="Gender" aria-describedby="Gender" value="' . $genderArr[$gender] . '">
                                                                </div>
                                                                <div class="col-md-4 position-relative">
                                                                    <label for="civilStatus" class="form-label">Civil Status</label>
                                                                    <input disabled type="text" class="form-control" id="civilStatus" aria-describedby="civilStatus" value="' . $civilArr[$civil_status] . '">
                                                                </div>
                                                            </form>
                                                        </div>';
    // <div class="tab-pane fade" id="bordered-justified-educational-background' . $account_id . '" role="tabpanel" aria-labelledby="educational-background">';
    // DO NOT COMMENT THE ABOVE LINE
    // Educational Background 
    $profile .= '<div class="tab-pane fade" id="bordered-justified-educational-background' . $account_id . '" role="tabpanel" aria-labelledby="educational-background">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            General
                            Educational
                            Information
                        </h5>
                    </div>
                    <div class="row g-4 pt-3">
                        <!-- FULL NAME -->
                        <div class="col-md-6 position-relative">
                            <label for="inputGraduatingSem" class="form-label">Are you Graduating this Semester/Term?</label>
                            <input type="text" class="form-control" id="inputGraduatingSem" aria-describedby="inputGraduatingSem" value="' . (isset($gen_info['graduating_flag']) AND $gen_info['graduating_flag'] == 0 ? 'Yes' : 'No') . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputGraduatingHonors" class="form-label">Are you Graduating with Honors?</label>
                            <input type="text" class="form-control" id="inputGraduatingHonors" aria-describedby="inputGraduatingHonors" value="' . (isset($gen_info['honor_flag']) AND $gen_info['honor_flag'] == 0 ? 'Yes' : 'No') . '" disabled>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="inputSpecifyAward" class="form-label">Specify your Award/Honor</label>
                            <input type="text" class="form-control" id="inputGraduatingHonors" aria-describedby="inputGraduatingHonors" value="' . (isset($gen_info['honor_type']) ? $awardArr[$gen_info['honor_type']] : '')   . '" disabled>
                        </div>
                        <div class="col-md-8 position-relative">
                            <label for="inputOthers" class="form-label">If not specified in the list, kindly input your Honor/ Award here.</label>
                            <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="' . (isset($gen_info['other_honor']) ? $gen_info['other_honor'] : '')  . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputYearGraduation" class="form-label">If not Graduating, what year are you Graduating?</label>
                            <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="' . (isset($gen_info['graduation_year']) AND $gen_info['graduation_year'] != "" ? $gradYear[$gen_info['graduation_year']] : "")   . '" disabled>
                        </div>
                        <!-- END FULL NAME -->
                    </div>';


    if (isset($education[0]) AND in_array($scholarType, [1, 2]))
    {
        $collegeTable = "";

        if (isset($education[0]['awards']))
        {
            foreach ($education[0]['awards'] as $key => $award)
            {
                $collegeTable .= '<tr>
                                    <td class="text-center">' . ($key + 1) . '</td>
                                    <td class="text-center">' . $award['honor'] . '</td>
                                    <td class="text-center">' . $award['acad_year'] . '</td>
                                    <td class="text-center">' . $award['sem'] . '</td>
                                    <td class="text-center">' . $award['year_level'] . '</td>
                                </tr>';
            }
        }

        if ($collegeTable == "") $collegeTable = '<td colspan="5" class="text-center">No Data Available</td>';

        $profile .= '
                    <!--COLLEGE LEVEL-->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            College
                            Level
                        </h5>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 pt-3">
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                            <label for="inputCollegeSchoolName" class="form-label">Name of School Attended</label>
                            <input type="text" class="form-control" id="inputCollegeSchoolName" aria-describedby="inputCollegeSchoolName" value="' . (is_numeric($education[0]['school']) ? $school[$education[0]['school']]['school_name'] : "Others") . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCollegeOtherSchool" class="form-label">If others, other school name.</label>
                            <input type="Others" class="form-control" id="inputCollegeOtherSchool" aria-describedby="inputCollegeOtherSchool" value="'.(is_numeric($education[0]['school']) ? "" : $education[0]['school']).'" disabled>
                        </div>
                        <div class="col-md-2 position-relative">
                            <label for="inputCollegeYearLevel" class="form-label">Year Level</label>
                            <input type="text" class="form-control" id="inputCollegeSchoolName" aria-describedby="inputCollegeSchoolName" value="' . $education[0]['year_level'] . '" disabled>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="inputCourse" class="form-label">Course taking</label>
                            <input type="text" class="form-control" id="inputCollegeSchoolName" aria-describedby="inputCollegeSchoolName" value="' . $course[$education[0]['course']] . '" disabled>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="inputOtherCourse" class="form-label">If others, other course name</label>
                            <input type="Others" class="form-control" id="inputOtherCourse" aria-describedby="inputOtherCourse" value="'.(is_numeric($education[0]['course']) ? "" : $education[0]['course']).'" disabled>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="inputMajor" class="form-label">Major in</label>
                            <input type="Major" class="form-control" id="inputMajor" aria-describedby="inputMajor" value="'.$education[0]['major'].'" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="inputCollegeSchoolAddress" class="form-label">School Address</label>
                            <input type="Others" class="form-control" id="inputCollegeSchoolAddress" aria-describedby="inputCollegeSchoolAddress" value="'.$education[0]['school_address'].'" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="gwa" class="form-label">GWA</label>
                            <input type="number" step="any" class="form-control" id="gwa" placeholder="Applicant\'s General Weighted Average" aria-describedby="gwa" value="'.$education[0]['gwa'].'" disabled>
                        </div>
                        <div class="column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    List
                                    of
                                    Awards
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Honor/Award</th>
                                            <th>AcademicYear</th>
                                            <th>Semester</th>
                                            <th>Year Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$collegeTable.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
    }

    if (isset($education[1]))
    {
        // SHS
        $shsTable = "";

        if (isset($education[1]['awards']))
        {
            foreach ($education[1]['awards'] as $key => $award)
            {
                $shsTable .= '<tr>
                                    <td class="text-center">' . ($key + 1) . '</td>
                                    <td class="text-center">' . $award['honor'] . '</td>
                                    <td class="text-center">' . $award['acad_year'] . '</td>
                                    <td class="text-center">' . $award['sem'] . '</td>
                                    <td class="text-center">' . $award['year_level'] . '</td>
                                </tr>';
            }
        }

        if ($shsTable == "") $shsTable = '<td colspan="5" class="text-center">No Data Available</td>';

        $profile .= '<div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            Senior
                            Highschool
                            Level
                        </h5>
                    </div>
                    <div class="row g-4">
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                            <label for="inputSeniorSchoolName" class="form-label">Name of School Attended</label>
                            <input type="text" class="form-control" id="inputSeniorSchoolName" aria-describedby="inputSeniorSchoolName" value="' . (is_numeric($education[1]['school']) ? $school[$education[1]['school']]['school_name'] : "Others") . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputSeniorOtherSchool" class="form-label">If others, other school name.</label>
                            <input type="text" class="form-control" id="inputSeniorOtherSchool" aria-describedby="inputSeniorOtherSchool" value="'.(is_numeric($education[1]['school']) ? "" : $education[1]['school']).'" disabled>
                        </div>
                        <div class="col-md-2 position-relative">
                            <label for="inputSeniorYearLevel" class="form-label">Year Level</label>
                            <input type="text" class="form-control" id="inputSeniorYearLevel" aria-describedby="inputSeniorYearLevel" value="' . $education[1]['year_level'] . '" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputTrack" class="form-label">Strand Taken</label>
                            <input type="text" class="form-control" id="inputTrack" aria-describedby="inputTrack" value="' . $strand[$education[1]['course']] . '" disabled>
                        </div>
                        <div class="col-md-9 position-relative">
                            <label for="inputOtherTrack" class="form-label">If others, other strand name.</label>
                            <input type="text" class="form-control" id="inputOtherTrack" aria-describedby="inputOtherTrack" value="'.(is_numeric($education[1]['course']) ? "" : $education[1]['course']).'" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="inputSeniorSchoolAddress" class="form-label">School Address</label>
                            <input type="text" class="form-control" id="inputSeniorSchoolAddress" aria-describedby="inputSeniorSchoolAddress" value="' . $education[1]['school_address'] . '" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="gwa" class="form-label">GWA</label>
                            <input type="number" step="any" class="form-control" id="gwa" placeholder="Applicant\'s General Weighted Average" aria-describedby="gwa" value="'.$education[1]['gwa'].'" disabled>
                        </div>
                        <div class="column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    List
                                    of
                                    Awards
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Honor/Award</th>
                                            <th>AcademicYear</th>
                                            <th>Semester</th>
                                            <th>Year Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$shsTable.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
    }

    if (isset($education[2]))
    {
        // HS

        $hsTable = "";

        if (isset($education[2]['awards']))
        {
            foreach ($education[2]['awards'] as $key => $award)
            {
                $hsTable .= '<tr>
                                    <td class="text-center">' . ($key + 1) . '</td>
                                    <td class="text-center">' . $award['honor'] . '</td>
                                    <td class="text-center">' . $award['acad_year'] . '</td>
                                    <td class="text-center">' . $award['sem'] . '</td>
                                    <td class="text-center">' . $award['year_level'] . '</td>
                                </tr>';
            }
        }

        if ($hsTable == "") $hsTable = '<td colspan="5" class="text-center">No Data Available</td>';

        $profile .= '<div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            High
                            School
                            Level
                        </h5>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 pt-3 " >
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                            <label for="inputHighSchoolName" class="form-label">Name of School Attended</label>
                            <input type="text" class="form-control" id="inputHighSchoolName" aria-describedby="inputHighSchoolName" value="' . (is_numeric($education[2]['school']) ? $school[$education[2]['school']]['school_name'] : "Others") . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputHighOtherSchool" class="form-label">If others, other school name.</label>
                            <input type="text" class="form-control" id="inputHighOtherSchool" aria-describedby="inputHighOtherSchool" value="'.(is_numeric($education[2]['school']) ? "" : $education[2]['school']).'" disabled>
                        </div>
                        <div class="col-md-2 position-relative">
                            <label for="inputHighYearLevel" class="form-label">Year Level</label>
                            <input type="text" class="form-control" id="inputHighYearLevel" aria-describedby="inputHighYearLevel" value="' . $education[2]['year_level'] . '" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="inputHighSchoolAddress" class="form-label">School Address</label>
                            <input type="text" class="form-control" id="inputHighSchoolAddress" aria-describedby="inputHighSchoolAddress" value="' . $education[2]['school_address'] . '" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="gwa" class="form-label">GWA</label>
                            <input type="number" step="any" class="form-control" id="gwa" placeholder="Applicant\'s General Weighted Average" aria-describedby="gwa" value="'.$education[2]['gwa'].'" disabled>
                        </div>
                        <div class="column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    List
                                    of
                                    Awards
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Honor/Award</th>
                                            <th>AcademicYear</th>
                                            <th>Semester</th>
                                            <th>Year Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$hsTable.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
    }

    if (isset($education[3]))
    {
        $elemTable = "";

        if (isset($education[3]['awards']))
        {
            foreach ($education[3]['awards'] as $key => $award)
            {
                $elemTable .= '<tr>
                                    <td class="text-center">' . ($key + 1) . '</td>
                                    <td class="text-center">' . $award['honor'] . '</td>
                                    <td class="text-center">' . $award['acad_year'] . '</td>
                                    <td class="text-center">' . $award['sem'] . '</td>
                                    <td class="text-center">' . $award['year_level'] . '</td>
                                </tr>';
            }
        }

        if ($elemTable == "") $elemTable = '<td colspan="5" class="text-center">No Data Available</td>';

        $profile .= '<div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            Elementary
                            Level
                        </h5>
                    </div>
                    <div class="row g-4 pt-3">
                        <!-- COLLEGE -->
                        <div class="col-md-4 position-relative">
                            <label for="inputElementarySchoolName" class="form-label">Name of School Attended</label>
                            <input type="text" class="form-control" id="inputElementarySchoolName" aria-describedby="inputElementarySchoolName" value="' . (is_numeric($education[3]['school']) ? $school[$education[3]['school']]['school_name'] : "Others") . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputElementaryOtherSchool" class="form-label">If others, other school name.</label>
                            <input type="text" class="form-control" id="inputElementaryOtherSchool" aria-describedby="inputElementaryOtherSchool" value="'.(is_numeric($education[3]['school']) ? "" : $education[3]['school']).'" disabled>
                        </div>
                        <div class="col-md-2 position-relative">
                            <label for="inputHighYearLevel" class="form-label">Year Level</label>
                            <input type="text" class="form-control" id="inputHighYearLevel" aria-describedby="inputHighYearLevel" value="' . $education[3]['year_level'] . '" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="inputElementarySchoolAddress" class="form-label">School Address</label>
                            <input type="text" class="form-control" id="inputElementarySchoolAddress" aria-describedby="inputElementarySchoolAddress" value="' . $education[3]['school_address'] . '" disabled>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="gwa" class="form-label">GWA</label>
                            <input type="number" step="any" class="form-control" id="gwa" placeholder="Applicant\'s General Weighted Average" aria-describedby="gwa" value="'.$education[3]['gwa'].'" disabled>
                        </div>
                        <div class="column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    List
                                    of
                                    Awards
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Honor/Award</th>
                                            <th>AcademicYear</th>
                                            <th>Semester</th>
                                            <th>Year Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$elemTable.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
    }

    $profile .= '</div>';

    // Family Background

    $familyTable = "";
    $siblingCount = 0;

    if ($family != null)
    {
        foreach ($family as $key => $fam)
        {
            if ($key == 'siblings')
            {
                $siblingCount++;
                $familyTable .= '<tr>
                                    <td class="text-center">' . $siblingCount . '</td>
                                    <td class="text-center">' . $fam[0]['lastName'] . '/' . $fam[0]['firstName'] . '/' . $fam[0]['middleName'] . '</td>
                                    <td class="text-center">' . $fam[0]['relationship'] . '</td>
                                    <td class="text-center">' . $fam[0]['birth_order'] . '</td>
                                    <td class="text-center">' . $fam[0]['age'] . '</td>
                                    <td class="text-center">' . $fam[0]['occupation'] . '</td>
                                </tr>';
            }
        }

        if ($familyTable == "") $familyTable = '<td colspan="6" class="text-center">No Data Available</td>';
    }

    $profile .= '<div class="tab-pane fade" id="bordered-justified-family-background' . $account_id . '" role="tabpanel" aria-labelledby="family-background">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            Family
                            Background
                        </h5>
                    </div>
                    <div class="row g-4 pt-3">
                        <!-- GENERAL FAMILY INFORMATION -->
                        <div class="col-md-4 position-relative">
                            <label for="inputLivingFamily" class="form-label">Are you Living with Family?</label>
                            <input type="text" class="form-control" id="inputLivingFamily" aria-describedby="inputLivingFamily" value="' . (isset($gen_info['family_flag']) AND $gen_info['family_flag'] == 0 ? 'Yes' : 'No') . '" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputFamilyTotal" class="form-label">Total number of Family</label>
                            <input type="text" class="form-control" id="inputFamilyTotal" aria-describedby="inputFamilyTotal" value="' . (isset($gen_info['total_num']) ? $gen_info['total_num'] : '' ). '" disabled>
                        </div>
                        <div class="col-md-2 position-relative">
                            <label for="inputBirthOrder" class="form-label">Birth Order</label>
                            <input type="text" class="form-control" id="inputBirthOrder" aria-describedby="inputBirthOrder" value="' . (isset($gen_info['birth_order']) ? $gen_info['birth_order'] : '' ) . '" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputSourceLiving" class="form-label"> Source ofLiving?</label>
                            <input type="text" class="form-control" id="inputSourceLiving" aria-describedby="inputSourceLiving" value="' . (isset($gen_info['source']) ? $incomeArr[$gen_info['source']] : '' ) . '" disabled>
                        </div>
                        <div class="col-md-5 position-relative">
                            <label for="inputHomeType" class="form-label"> Is your Home Rent or Owned?</label>
                            <input type="text" class="form-control" id="inputHomeType" aria-describedby="inputHomeType" value="' . (isset($gen_info['rent_flag']) AND $gen_info['rent_flag'] == 0 ? 'Owned' : 'Rent') . '" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputRenting" class="form-label"> How much are you paying monthly?</label>
                            <input type="text" class="form-control" id="inputRenting" aria-describedby="inputRenting" value="' . (isset($gen_info['monthly_payment']) ? $incomeArr[$gen_info['monthly_payment']] : '' ) . '" disabled>
                        </div>
                        <!-- TABLE OF SIBLINGS -->
                        <div class="column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">
                                    Sibling\'s
                                    Information
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table id="college_table_view" class="table table-striped header-fixed" width="250%" cellspacing="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Name of Sibling (LN/FN/MN)</th>
                                            <th>Relationship</th>
                                            <th>Birth Order</th>
                                            <th>Age</th>
                                            <th>Occupation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ' . $familyTable . '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';

    // Father's Information

    if (isset($family['father']))
    {
        if (strpos(strtolower($family['father']['firstName']), 'na') === false)
        {
            $profile .= '<div class="d-flex justify-content-between align-items-center py-3">
                            <h5 class="card-title">
                                Father\'s
                                Information
                            </h5>
                        </div>
                        <!-- Custom Styled Validation with Tooltips -->
                        <div class="row g-4 " >
                            <!-- FULL NAME -->
                            <div class="col-md-3 position-relative">
                                <label for="inputFirstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="'.$family['father']['firstName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputMiddleName" class="form-label">Middle name</label>
                                <input type="text" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="'.$family['father']['middleName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputLastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="'.$family['father']['lastName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                                <input type="text" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="'.$family['father']['suffix'].'" disabled>
                            </div>
                            <!-- END FULL NAME -->
                            <!-- BIRTH -->
                            <div class="col-md-4 position-relative">
                                <label for="inputDate" class="form-label">Birth Date</label>
                                <input type="text" class="form-control" id="inputDate" aria-describedby="inputDate" value="'.date("F j, Y", strtotime($family['father']['birth_date'])).'" disabled>
                            </div>
                            <div class="col-md-5  position-relative">
                                <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="'.$family['father']['birth_place'].'" disabled>
                            </div>
                            <!-- END BIRTH -->
                            <!-- START AGE -->
                            <div class="col-md-3 position-relative">
                                <label for="inputAge" class="form-label">Father\'s Age</label>
                                <input type="text" class="form-control" id="inputAge" aria-describedby="inputAge" value="'.$family['father']['age'].'" disabled>
                            </div>
                            <!-- START AGE -->
                            <!-- CONTACT INFORMATION -->
                            <div class="col-md-3 position-relative">
                                <label for="telephone" class="form-label">Contact Number</label>
                                <div class="input-group">
                                    <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                    <input type="text" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" disabled value="'.substr($family['father']['contact_number'], 2).'">
                                </div>
                            </div>
                            <!-- END CONTACT INFORMATION -->
                            <!-- LIVING OR DECEASED -->
                            <div class="col-md-3 position-relative">
                                <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                                <input type="text" class="form-control" id="inputLivingDeceased" aria-describedby="inputLivingDeceased" value="'.($family['father']['living_flag'] == 0 ? 'Living' : 'Deceased').'" disabled>
                            </div>
                            <!-- FATHER\'S OCCUPATION  -->
                            <div class="col-md-6 position-relative">
                                <label for="inputOccupation" class="form-label"> Occupation</label>
                                <input type="text" class="form-control" id="inputOccupation" aria-describedby="inputOccupation" value="'.$occupationArr[$family['father']['occupation']].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputOthers" class="form-label">If others, input occupation name</label>
                                <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="'.($family['father']['occupation'] != "others" ? "" : $family['father']['occupation']).'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                                <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="'.$family['father']['company_name'].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
                                <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="'.$family['father']['company_address'].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                                <input type="text" class="form-control" id="inputIncome" aria-describedby="inputIncome" value="'.$incomeArr[$family['father']['income_flag']].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                                <input type="text" class="form-control" id="inputEducationalAttainment" aria-describedby="inputEducationalAttainment" value="'.$educAttainment[$family['father']['attainment_flag']].'" disabled>
                            </div>
                            <!-- END FULL NAME -->
                        </div>';
        }
    }


    // Mother's Information
    if (isset($family['mother']))
    {
        if (strpos(strtolower($family['mother']['firstName']), 'na') === false)
        {
            $profile .= '<div class="d-flex justify-content-between align-items-center pt-3">
                            <h5 class="card-title">
                                Mother\'s
                                Information
                            </h5>
                        </div>
                        <!-- Custom Styled Validation with Tooltips -->
                        <div class="row g-4 " >
                            <!-- FULL NAME -->
                            <div class="col-md-3 position-relative">
                                <label for="inputFirstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="'.$family['mother']['firstName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputMiddleName" class="form-label">Middle name</label>
                                <input type="text" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="'.$family['mother']['middleName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputLastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="'.$family['mother']['lastName'].'" disabled>
                            </div>
                            <div class="col-md-3 position-relative">
                                <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                                <input type="text" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="'.$family['mother']['suffix'].'" disabled>
                            </div>
                            <!-- END FULL NAME -->
                            <!-- BIRTH -->
                            <div class="col-md-4 position-relative">
                                <label for="inputDate" class="form-label">Birth Date</label>
                                <input type="text" class="form-control" id="inputDate" aria-describedby="inputDate" value="'.date("F j, Y", strtotime($family['mother']['birth_date'])).'" disabled>
                            </div>
                            <div class="col-md-5  position-relative">
                                <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="'.$family['mother']['birth_place'].'" disabled>
                            </div>
                            <!-- END BIRTH -->
                            <!-- START AGE -->
                            <div class="col-md-3 position-relative">
                                <label for="inputAge" class="form-label">Mother\'s Age</label>
                                <input type="text" class="form-control" id="inputAge" aria-describedby="inputAge" value="'.$family['mother']['age'].'" disabled>
                            </div>
                            <!-- START AGE -->
                            <!-- CONTACT INFORMATION -->
                            <div class="col-md-3 position-relative">
                                <label for="telephone" class="form-label">Contact Number</label>
                                <div class="input-group">
                                    <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                    <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" disabled value="'.substr($family['mother']['contact_number'], 2).'">
                                </div>
                            </div>
                            <!-- END CONTACT INFORMATION -->
                            <!-- LIVING OR DECEASED -->
                            <div class="col-md-3 position-relative">
                                <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                                <input type="text" class="form-control" id="inputLivingDeceased" aria-describedby="inputLivingDeceased" value="'.($family['mother']['living_flag'] == 0 ? 'Living' : 'Deceased').'" disabled>
                            </div>
                            <!-- MOTHER\'S OCCUPATION  -->
                            <div class="col-md-6 position-relative">
                                <label for="inputOccupation" class="form-label"> Occupation</label>
                                <input type="text" class="form-control" id="inputOccupation" aria-describedby="inputOccupation" value="'.$occupationArr[$family['mother']['occupation']].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputOthers" class="form-label">If others, input occupation name</label>
                                <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="'.($family['mother']['occupation'] != "others" ? "" : $family['mother']['occupation']).'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                                <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="'.$family['mother']['company_name'].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
                                <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="'.$family['mother']['company_address'].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                                <input type="text" class="form-control" id="inputIncome" aria-describedby="inputIncome" value="'.$incomeArr[$family['mother']['income_flag']].'" disabled>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                                <input type="text" class="form-control" id="inputEducationalAttainment" aria-describedby="inputEducationalAttainment" value="'.$educAttainment[$family['mother']['attainment_flag']].'" disabled>
                            </div>
                            <!-- END MOTHER\'S INFORMATION -->
                        </div>';
        }
    }

    // Guardian
    if (isset($family['guardian']))
    {
        $profile .= '<div class="d-flex justify-content-between align-items- py-3">
                        <h5 class="card-title">
                            Guardian\'s
                            Information
                        </h5>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 " >
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                            <label for="inputFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="'.$family['guardian']['firstName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputMiddleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="'.$family['guardian']['middleName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="'.$family['guardian']['lastName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                            <input type="text" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="'.$family['guardian']['suffix'].'" disabled>
                        </div>
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                            <label for="inputDate" class="form-label">Birth Date</label>
                            <input type="text" class="form-control" id="inputDate" aria-describedby="inputDate" value="'.date("F j, Y", strtotime($family['guardian']['birth_date'])).'" disabled>
                        </div>
                        <div class="col-md-5  position-relative">
                            <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="'.$family['guardian']['birth_place'].'" disabled>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                            <label for="inputAge" class="form-label">Guardian\'s Age</label>
                            <input type="text" class="form-control" id="inputAge" aria-describedby="inputAge" value="'.$family['guardian']['age'].'" disabled>
                        </div>
                        <!-- START AGE -->
                        <!-- START AGE -->
                        <div class="col-md-6 position-relative">
                            <label for="inputRelationship" class="form-label">Relationship</label>
                            <input type="text" class="form-control" id="inputRelationship" aria-describedby="inputRelationship" value="'.$family['guardian']['relationship'].'" disabled>
                        </div>
                        <!-- START AGE -->
                        <!-- CONTACT INFORMATION -->
                        <div class="col-md-3 position-relative">
                            <label for="telephone" class="form-label">Contact Number</label>
                            <div class="input-group">
                                <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" disabled value="'.substr($family['guardian']['contact_number'], 2).'">
                            </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                            <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                            <input type="text" class="form-control" id="inputLivingDeceased" aria-describedby="inputLivingDeceased" value="'.($family['guardian']['living_flag'] == 0 ? 'Living' : 'Deceased').'" disabled>
                        </div>
                        <!-- GUARDIAN\'S INFORMATION  -->
                        <div class="col-md-6 position-relative">
                            <label for="inputOccupation" class="form-label"> Occupation</label>
                            <input type="text" class="form-control" id="inputOccupation" aria-describedby="inputOccupation" value="'.$occupationArr[$family['guardian']['occupation']].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputOthers" class="form-label">If others, input occupation name</label>
                            <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="'.($family['guardian']['occupation'] != "others" ? "" : $family['guardian']['occupation']).'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="'.$family['guardian']['company_name'].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
                            <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="'.$family['guardian']['company_address'].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                            <input type="text" class="form-control" id="inputIncome" aria-describedby="inputIncome" value="'.$incomeArr[$family['guardian']['income_flag']].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                            <input type="text" class="form-control" id="inputEducationalAttainment" aria-describedby="inputEducationalAttainment" value="'.$educAttainment[$family['guardian']['attainment_flag']].'" disabled>
                        </div>
                        <!-- END GUARDIAN\'S INFORMATION -->
                    </div>';
    }

    // Spouse

    if (isset($family['spouse']))
    {
        $profile .= '<div class="d-flex justify-content-between align-items- py-3">
                        <h5 class="card-title">
                            Spouse
                            Information
                            (If
                            Married)
                        </h5>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4 " >
                        <!-- FULL NAME -->
                        <div class="col-md-3 position-relative">
                            <label for="inputFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="'.$family['spouse']['firstName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputMiddleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="'.$family['spouse']['middleName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="'.$family['spouse']['lastName'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                            <input type="text" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="'.$family['spouse']['suffix'].'" disabled>
                        </div>
                        <!-- END FULL NAME -->
                        <!-- BIRTH -->
                        <div class="col-md-4 position-relative">
                            <label for="inputDate" class="form-label">Birth Date</label>
                            <input type="text" class="form-control" id="inputDate" aria-describedby="inputDate" value="'.date("F j, Y", strtotime($family['spouse']['birth_date'])).'" disabled>
                        </div>
                        <div class="col-md-5  position-relative">
                            <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="'.$family['spouse']['birth_place'].'" disabled>
                        </div>
                        <!-- END BIRTH -->
                        <!-- START AGE -->
                        <div class="col-md-3 position-relative">
                            <label for="inputAge" class="form-label">Guardian\'s Age</label>
                            <input type="text" class="form-control" id="inputAge" aria-describedby="inputAge" value="'.$family['spouse']['age'].'" disabled>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="telephone" class="form-label">Contact Number</label>
                            <div class="input-group">
                                <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                                <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" disabled value="'.substr($family['spouse']['contact_number'], 2).'">
                            </div>
                        </div>
                        <!-- END CONTACT INFORMATION -->
                        <!-- LIVING OR DECEASED -->
                        <div class="col-md-3 position-relative">
                            <label for="inputLivingDeceased" class="form-label"> Living or Deceased? </label>
                            <input type="text" class="form-control" id="inputLivingDeceased" aria-describedby="inputLivingDeceased" value="'.($family['spouse']['living_flag'] == 0 ? 'Living' : 'Deceased').'" disabled>
                        </div>
                        <!-- SPOUSE INFORMATION  -->
                        <div class="col-md-6 position-relative">
                            <label for="inputOccupation" class="form-label"> Occupation</label>
                            <input type="text" class="form-control" id="inputOccupation" aria-describedby="inputOccupation" value="'.$occupationArr[$family['spouse']['occupation']].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputOthers" class="form-label">If others, input occupation name</label>
                            <input type="Others" class="form-control" id="inputOthers" aria-describedby="inputOthers" value="'.($family['spouse']['occupation'] != "others" ? "" : $family['spouse']['occupation']).'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyName" class="form-label">Company\'s Name</label>
                            <input type="inputCompanyName" class="form-control" id="inputCompanyName" aria-describedby="inputCompanyName" value="'.$family['spouse']['company_name'].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputCompanyAddress" class="form-label">Company\'s Address</label>
                            <input type="Others" class="form-control" id="inputCompanyAddress" aria-describedby="inputCompanyAddress" value="'.$family['spouse']['company_address'].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputIncome" class="form-label"> Average Monthly Income</label>
                            <input type="text" class="form-control" id="inputIncome" aria-describedby="inputIncome" value="'.$incomeArr[$family['spouse']['income_flag']].'" disabled>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="inputEducationalAttainment" class="form-label"> Highest Educational Attainment</label>
                            <input type="text" class="form-control" id="inputEducationalAttainment" aria-describedby="inputEducationalAttainment" value="'.$educAttainment[$family['spouse']['attainment_flag']].'" disabled>
                        </div>
                        <!-- END SPOUSE INFORMATION -->
                    </div>';
    }      

    $profile .= '</div>';
        
    // Additional Information

    $profile .= '<div class="tab-pane fade" id="bordered-justified-additional-information' . $account_id . '" role="tabpanel" aria-labelledby="additional-information">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">
                            Additional
                            Information
                        </h5>
                    </div>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4" >
                        <!-- WORKING STUDENT -->
                        <div class="col-md-4 position-relative">
                            <label for="inputWorkingStudent" class="form-label">Are you a Working Student?</label>
                            <input type="text" class="form-control" id="inputWorkingStudent" value="'.(isset($gen_info['working_flag']) AND $gen_info['working_flag'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                        <!---OFW PARENTS -->
                        <div class="col-md-8 position-relative">
                            <label for="inputOfwParents" class="form-label">Do you have a Parent/s who is/are an OFW?</label>
                            <input type="text" class="form-control" id="inputOfwParents" value="'.(isset($gen_info['ofw_flag']) AND $gen_info['ofw_flag'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                        <!--OFW FAMILY MEMBERS -->
                        <div class="col-md-6 position-relative">
                            <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who are an OFW?</label>
                            <input type="text" class="form-control" id="inputOfwParents" value="'.(isset($gen_info['other_ofw']) AND $gen_info['other_ofw'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                        <!---PWD PARENTS -->
                        <div class="col-md-6 position-relative">
                            <label for="inputPwdParents" class="form-label">Do you have a Parent/s who have PWD?</label>
                            <input type="text" class="form-control" id="inputPwdParents" value="'.(isset($gen_info['pwd_flag']) AND $gen_info['pwd_flag'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                        <!---PWD FAMILY MEMBERS -->
                        <div class="col-md-6 position-relative">
                            <label for="inputOfwMembers" class="form-label">Do you have other Family member/s who have PWD?</label>
                            <input type="text" class="form-control" id="inputPwdParents" value="'.(isset($gen_info['other_pwd']) AND $gen_info['other_pwd'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                        <!---PARENTS STATUS -->
                        <div class="col-md-6 position-relative">
                            <label for="inputParentStatus" class="form-label">What is your Parents Status?</label>
                            <input type="text" class="form-control" id="inputParentStatus" value="'.(isset($gen_info['status_flag']) ? $civilArr[$gen_info['status_flag']] : "") .'" disabled>
                        </div>
                        <!---STUDENT PWD -->
                        <div class="col-md-6 position-relative">
                            <label for="inputStudentPwd" class="form-label">Are you a Student with PWD?</label>
                            <input type="text" class="form-control" id="inputStudentPwd" value="'.(isset($gen_info['self_pwd_flag']) AND $gen_info['self_pwd_flag'] == 0 ? "Yes" : "No").'" disabled>
                        </div>
                    </div>
                </div>';


    // Requirements
    echo getRequirements($id, $account_id, $entries);

    
                                                    
    $profile .= '                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

    $profile .= '</div>';

    return $profile;
}

function getRequirements($id, $account_id, $file)
{
    $requirements = '<!-- Requirements -->
                    <div id="requirements" class="row d-none">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">GENERAL REQUIREMENTS</h5>
                                    </div>
                                    <div class="max-width-100">
                                        <!-- Set a max width for the container -->
                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab' . $id . '" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link active flex-fill" id="v-pills-cor-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-cor' . $id . '" type="button" role="tab" aria-controls="v-pills-cor' . $id . '" aria-selected="true">Certificate of Registration</button>
                                            <button class="nav-link flex-fill" id="v-pills-grades-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-grades' . $id . '" type="button" role="tab" aria-controls="v-pills-grades' . $id . '" aria-selected="false">Grade Report</button>
                                            <button class="nav-link flex-fill" id="v-pills-cob-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-cob' . $id . '" type="button" role="tab" aria-controls="v-pills-cob' . $id . '" aria-selected="true">Certificate of Birth</button>
                                            <button class="nav-link flex-fill" id="v-pills-cgmc-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-cgmc' . $id . '" type="button" role="tab" aria-controls="v-pills-cgmc' . $id . '" aria-selected="false">Certificate of Good Moral Character</button>
                                            <button class="nav-link flex-fill" id="v-pills-idpic-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-idpic' . $id . '" type="button" role="tab" aria-controls="v-pills-idpic' . $id . '" aria-selected="false">ID Photo (2x2 size)</button>
                                            <button class="nav-link flex-fill" id="v-pills-map-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-map' . $id . '" type="button" role="tab" aria-controls="v-pills-map' . $id . '" aria-selected="false">Vicinity Map</button>
                                            <button class="nav-link flex-fill" id="v-pills-brgyclearance-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-brgyclearance' . $id . '" type="button" role="tab" aria-controls="v-pills-brgyclearance' . $id . '" aria-selected="false">Barangay Clearance</button>
                                            <button class="nav-link flex-fill" id="v-pills-parvoteid-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-parvoteid' . $id . '" type="button" role="tab" aria-controls="v-pills-parvoteid' . $id . '" aria-selected="false">Parents Voter’s ID/ Voter’s Certification</button>
                                            <button class="nav-link flex-fill" id="v-pills-appvoteid-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-appvoteid' . $id . '" type="button" role="tab" aria-controls="v-pills-appvoteid' . $id . '" aria-selected="false">Voter’s Certificate of the Applicant</button>
                                            <button class="nav-link flex-fill" id="v-pills-itr-tab' . $id . '" data-bs-toggle="pill" data-bs-target="#v-pills-itr' . $id . '" type="button" role="tab" aria-controls="v-pills-itr' . $id . '" aria-selected="false">Income Tax Return or Certificate of Employment and Compensation (Parents)</button>
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
                                            <div class="tab-pane fade show active pt-3" id="v-pills-cor' . $id . '" role="tabpanel" aria-labelledby="v-pills-cor-tab' . $id . '" style="height: 00%; width: 100%">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="card-title">Certificate of Registration</h6>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="corRadio' . $id . '" id="corApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="corApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="corRadio' . $id . '" id="corReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="corReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="corRadio' . $id . '" id="corModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="corModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                               ' . (isset($file[0]['file']) ? 'src="uploads/application/' . $file[0]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- GRADE REPORT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-grades' . $id . '" role="tabpanel" aria-labelledby="v-pills-grades-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">GRADE REPORT</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="gradesRadio' . $id . '" id="gradesApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="gradesApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="gradesRadio' . $id . '" id="gradesReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="gradesReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="gradesRadio' . $id . '" id="gradesModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="gradesModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[1]['file']) ? 'src="uploads/application/' . $file[1]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BIRTH CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-cob' . $id . '" role="tabpanel" aria-labelledby="v-pills-cob-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">CERTIFICATE OF BIRTH</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cobRadio' . $id . '" id="cobApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cobApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cobRadio' . $id . '" id="cobReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cobReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cobRadio' . $id . '" id="cobModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cobModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[2]['file']) ? 'src="uploads/application/' . $file[2]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CERT OF GOOD MORAL -->
                                            <div class="tab-pane fade pt-3" id="v-pills-cgmc' . $id . '" role="tabpanel" aria-labelledby="v-pills-cgmc-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">CERTIFICATE OF GOOD MORAL CHARACTER</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cgmcRadio' . $id . '" id="cgmcApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cgmcApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cgmcRadio' . $id . '" id="cgmcReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cgmcReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="cgmcRadio' . $id . '" id="cgmcModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="cgmcModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[3]['file']) ? 'src="uploads/application/' . $file[3]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ID PHOTO 2X2 -->
                                            <div class="tab-pane fade pt-3" id="v-pills-idpic' . $id . '" role="tabpanel" aria-labelledby="v-pills-idpic-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">ID Photo</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="idpicRadio' . $id . '" id="idpicApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="gradeReportApproveCheckBox"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="idpicRadio' . $id . '" id="idpicReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="idpicReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="idpicRadio' . $id . '" id="idpicModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="idpicModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[4]['file']) ? 'src="uploads/application/' . $file[4]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- VICINITY MAP -->
                                            <div class="tab-pane fade pt-3" id="v-pills-map' . $id . '" role="tabpanel" aria-labelledby="v-pills-map-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">VICINITY MAP</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="mapRadio' . $id . '" id="mapApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="mapApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="mapRadio' . $id . '" id="mapReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="mapReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="mapRadio' . $id . '" id="mapModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="mapModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[5]['file']) ? 'src="uploads/application/' . $file[5]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BARANGAY CLEARANCE -->
                                            <div class="tab-pane fade pt-3" id="v-pills-brgyclearance' . $id . '" role="tabpanel" aria-labelledby="v-pills-brgyclearance-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">BARANGAY CLEARANCE</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="brgyclearanceRadio' . $id . '" id="bgryClearanceApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="brgyclearanceRadio' . $id . '" id="bgryClearanceReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="brgyclearanceRadio' . $id . '" id="bgryClearanceModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="bgryClearanceModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[6]['file']) ? 'src="uploads/application/' . $file[6]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PARENT\'S VOTERS CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-parvoteid' . $id . '" role="tabpanel" aria-labelledby="v-pills-parvoteid-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">PARENTS VOTER\'S ID / CERTIFICATION</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="parvoteidRadio' . $id . '" id="parvoteidApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="parvoteidApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="parvoteidRadio' . $id . '" id="parvoteidReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="parvoteideview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="parvoteidRadio' . $id . '" id="parvoteidModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="parvoteidModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[7]['file']) ? 'src="uploads/application/' . $file[7]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- APPLICANTS VOTERS CERT -->
                                            <div class="tab-pane fade pt-3" id="v-pills-appvoteid' . $id . '" role="tabpanel" aria-labelledby="v-pills-appvoteid-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">APPLICANT VOTER\'S ID / CERTIFICATION</h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="appvoteidRadio' . $id . '" id="appvoteidApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="appvoteidApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="appvoteidRadio' . $id . '" id="appvoteidReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="appvoteidReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="appvoteidRadio' . $id . '" id="votecertpaModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="appvoteidModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[8]['file']) ? 'src="uploads/application/' . $file[8]['file'] . '.pdf"' : '') . '>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- INCOME TAX CERT -->
                                            <div class="tab-pane fade pt-3  " id="v-pills-itr' . $id . '" role="tabpanel" aria-labelledby="v-pills-itr-tab' . $id . '">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title">INCOME TAX RETURN OR CERTIFICATE OF <br>EMPLOYMENT AND COMPENSATION</br></h5>
                                                    <div class="d-flex align-items-center d-grid gap-3">
                                                        <label class="form-check-label fw-bold">Remarks:</label>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="itrRadio' . $id . '" id="itrApprove' . $id . '">
                                                            <label class="mx-2 form-check-label" for="itrApprove"> Approve </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="itrRadio' . $id . '" id="itrReview' . $id . '">
                                                            <label class="mx-2 form-check-label" for="itrReview"> For Review </label>
                                                        </div>
                                                        <div class="form-check form-radio">
                                                            <input class="form-check-input" type="radio" name="itrRadio' . $id . '" id="itrModify' . $id . '">
                                                            <label class="mx-2 form-check-label" for="itrModify"> For Modification </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card" style="height:100%">
                                                            <div class="card-body">
                                                                <embed id="viewcor' . $account_id . '" frameborder="0" width="100%" height="400px"
                                                                ' . (isset($file[9]['file']) ? 'src="uploads/application/' . $file[9]['file'] . '.pdf"' : '') . '>
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

    return $requirements;
}
