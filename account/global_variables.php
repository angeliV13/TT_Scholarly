<?php

$religionArr = ['0' => 'Roman Catholic', '1' => 'Islam', '2' => 'Iglesia ni Cristo', '3' => 'Born Again', '4' => 'Others', '5' => 'Prefer Not to Say'];
$genderArr = ['0' => 'Male', '1' => 'Female', '2' => 'Nonbinary', '3' => 'Others', '4' => 'Prefer Not to Say'];
$civilArr = ['0' => 'Single', '1' => 'Married', '2' => 'Widowed', '3' => 'Separated', '4' => 'Prefer Not to Say'];
$citizenshipArr = ['0' => 'Filipino', '1' => 'Others'];
$educAttainment = ['0' => 'Elementary', '1' => 'Junior High School', '2' => 'Senior High School', '3' => 'College', '4' => 'Vocational', '5' => 'Post Graduate'];
$incomeArr = ['0' => 'Less than 5000', '1' => '5001 - 10999', '2' => '11000 - 20999', '3' => 'Greater than 21000', '4' => 'N/A'];
$bootstrapIcons = ['Circle' => 'bi bi-check-circle-fill', 'User' => 'bi bi-people', 'Add User' => 'bi bi-person-plus', 
'Add' => 'bi bi-plus-circle', 'Delete User' => 'bi bi-person-x', 'Delete' => 'bi bi-trash3', 'Submit 1' => 'bi bi-file-earmark-check', 
'Submit 2' => 'bi bi-check-square', 'Archive' => 'bi bi-archive', 'Bar Graph' => 'bi bi-file-bar-graph', 'Card Image' => 'bi bi-card-image', 
'File Check' => 'bi bi-file-check', 'File Earmark Check' => 'bi bi-file-earmark-check', 'File Earmark X' => 'bi bi-file-earmark-x', 
'File Earmark Excel' => 'bi bi-file-earmark-excel', 'File Earmark Text' => 'bi bi-file-earmark-text', 'Person Check' => 'bi bi-person-check',
'Person Dash' => 'bi bi-person-dash', 'Person Plus' => 'bi bi-person-plus', 'Person X' => 'bi bi-person-x', 'Person' => 'bi bi-person',
'Info Cirle' => 'bi bi-info-circle', 'Question Circle' => 'bi bi-question-circle', 'X Circle' => 'bi bi-x-circle', 'X' => 'bi bi-x'];
$barangayArr = ['Barangay I (Pob.)', 'Barangay II (Pob.)', 'Barangay III (Pob.)', 'Barangay IV (Pob.)', 'San Agustin', 'San Antonio', 'San Bartolome', 'San Felix', 'San Fernando',
'San Francisco', 'San Isidro Norte', 'San Isidro Sur', 'San Joaquin', 'San Jose', 'San Juan', 'San Luis', 'San Miguel', 'San Pablo', 'San Pedro', 'San Rafael', 'San Roque', 'San Vicente',
'Santa Ana', 'Santa Anastacia', 'Santa Clara', 'Santa Cruz', 'Santa Elena', 'Santa Maria', 'Santa Teresita', 'Santiago'];

$accountTypeArr = ['0' => 'Super Admin', '1' => 'Admin', '2' => 'Beneficiaries', '3' => 'Applicant'];
$relationshipArr = ['Brother' => 'Brother', 'Sister' => 'Sister', 'Grandfather' => 'Grandfather', 'Grandmother' => 'Grandmother', 'Uncle' => 'Uncle', 'Aunt' => 'Aunt', 
'Cousin' => 'Cousin', 'Others' => 'Others'];

$occupationArr = ['unemployed' => 'Unemployed', 'employed' => 'Employed', 'self' => 'Self-Employed', 'gov' => 'Government Employee', 'others' => 'Others'];
$schoolClassArr = ['0' => 'Public', '1' => 'Private'];
$schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
$scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assistance', '3' => 'SHS Educational Assistance'];
$awardArr = ['0' => 'With Highest Honors', '1' => 'With High Honors', '2' => 'With Honors', '3' => 'Others', '4' => 'N/A'];
$gradYear = [];

for ($i = 2012; $i <= date("Y") + 5; $i++)
{
    $gradYear[$i] = $i;
}

if (isset($_SESSION)) 
{
    $strand = get_education_courses(1);
    $course = get_education_courses(0);
    $notificationFunc = get_notif_func(1, true, " used_flag = 0");
    $latestEducation = get_user_education($_SESSION['id'], 1);

    $latestSchoolName = $latestSchoolType = $latestCourseName = $major = $latestYearLevel = $latestEd = "NA";

    if ($latestEducation != null)
    {
        $latestSchoolName = (get_school_name($latestEducation['school']) == null) ? $latestEducation['school'] : get_school_name($latestEducation['school'])['school_name'];
        $latestSchoolType = get_school_type($latestEducation['education_level']);
        $latestCourseName = get_course_name($latestEducation['course']) == '' ? $latestEducation['course'] : get_course_name($latestEducation['course']);
        $major = $latestEducation['major'] == '' ? '' : "Major in " . $latestEducation['major'];
        $yearLevel = convertNumToText($latestEducation['year_level']) . " Level";

        $latestEd = $latestCourseName . " " . $major . " - " . strtoupper($yearLevel);
    }
    
    $defaultSem = getDefaultSemesterId();
    $defaultAy = getDefaultAcadYearId();

    if ($_SESSION['account_type'] > 2)
    {
        $status = check_status($_SESSION['id']);
        if ($status != null) $finishFlag = ($status['status'] > 0) ? true : false;
    }
}

$website_info = get_website_info();
$website_other = get_website_info(1);
$website_scholar_text = get_website_info(2);
$website_slider = get_website_info(3);
$website_socials = get_website_socials();
$website_testimony = get_website_testimonials(0);
$gen_req = get_scholarship_requirements(2);
$coa = get_calendar_of_activites();
$ofc = website_officials();
