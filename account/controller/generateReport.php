<?php 

require("../model/generateReportModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action) 
    {
        case 0.1:
            echo getAcadYearOptions();
            break;
        case 0.2:
            echo json_encode(getSchoolsDetailsArray(0, 4, 3, 0));
            break;
        case 1: //applicant generate report
            $data = [
                "Academic Year"     => (isset($_POST['ay'])           ? $_POST['ay']          : ''),
                "Semester"          => (isset($_POST['sem'])          ? $_POST['sem']         : ''),
                "Scholar Type"      => (isset($_POST['scholarType'])  ? $_POST['scholarType'] : ''),
                "Educational Level" => (isset($_POST['educLevel'])    ? $_POST['educLevel']   : ''),
                "School Name"       => (isset($_POST['schoolName'])   ? $_POST['schoolName']  : ''),
                "Year Level"        => (isset($_POST['yearLevel'])    ? $_POST['yearLevel']   : ''),
                "Course Strand"     => (isset($_POST['courseStrand']) ? $_POST['courseStrand']: ''),
                "Scholar Status"    => (isset($_POST['status'])       ? $_POST['status']      : ''),
            ];
            echo createTable($report = 1, $data = $data);
            break;
        case 2: //beneficiaries generate report
            $data = [
                "Academic Year"     => (isset($_POST['ay'])           ? $_POST['ay']          : ''),
                "Semester"          => (isset($_POST['sem'])          ? $_POST['sem']         : ''),
                "Scholar Type"      => (isset($_POST['scholarType'])  ? $_POST['scholarType'] : ''),
                "Educational Level" => (isset($_POST['educLevel'])    ? $_POST['educLevel']   : ''),
                "School Name"       => (isset($_POST['schoolName'])   ? $_POST['schoolName']  : ''),
                "Year Level"        => (isset($_POST['yearLevel'])    ? $_POST['yearLevel']   : ''),
                "Course Strand"     => (isset($_POST['courseStrand']) ? $_POST['courseStrand']: ''),
                "Scholar Status"    => (isset($_POST['status'])       ? $_POST['status']      : ''),
            ];
            echo createTable($report = 2, $data = $data);
            break;
        case 3: //graduating generate report
            $data = [
                "Academic Year"     => (isset($_POST['ay'])           ? $_POST['ay']          : ''),
                "Semester"          => (isset($_POST['sem'])          ? $_POST['sem']         : ''),
                "Scholar Type"      => (isset($_POST['scholarType'])  ? $_POST['scholarType'] : ''),
                "Educational Level" => (isset($_POST['educLevel'])    ? $_POST['educLevel']   : ''),
                "School Name"       => (isset($_POST['schoolName'])   ? $_POST['schoolName']  : ''),
                "Year Level"        => (isset($_POST['yearLevel'])    ? $_POST['yearLevel']   : ''),
                "Course Strand"     => (isset($_POST['courseStrand']) ? $_POST['courseStrand']: ''),
                "Graduation Status"    => (isset($_POST['status'])       ? $_POST['status']      : ''),
        ];
        echo createTable($report = 3, $data = $data);
        break;
        case 4: //Examination generate report
            $data = [
                "Academic Year"     => (isset($_POST['ay'])           ? $_POST['ay']          : ''),
                "Semester"          => (isset($_POST['sem'])          ? $_POST['sem']         : ''),
                "Scholar Type"      => (isset($_POST['scholarType'])  ? $_POST['scholarType'] : ''),
                "Educational Level" => (isset($_POST['educLevel'])    ? $_POST['educLevel']   : ''),
                "School Name"       => (isset($_POST['schoolName'])   ? $_POST['schoolName']  : ''),
                "Year Level"        => (isset($_POST['yearLevel'])    ? $_POST['yearLevel']   : ''),
                "Course Strand"     => (isset($_POST['courseStrand']) ? $_POST['courseStrand']: ''),
                "Remarks"            => (isset($_POST['status'])       ? $_POST['status']      : ''),
        ];
        echo createTable($report = 4, $data = $data);
        break;
    }
}

