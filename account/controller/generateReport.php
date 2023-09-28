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
        case 1:
            $data = [
                "Academic Year"   => (isset($_POST['ay'])           ? $_POST['ay']          : ''),
                "Semester"        => (isset($_POST['sem'])          ? $_POST['sem']         : ''),
                "scholarType"     => (isset($_POST['scholarType'])  ? $_POST['scholarType'] : ''),
                "educLevel"       => (isset($_POST['educLevel'])    ? $_POST['educLevel']   : ''),
                "schoolName"      => (isset($_POST['schoolName'])   ? $_POST['schoolName']  : ''),
                "yearLevel"       => (isset($_POST['yearLevel'])    ? $_POST['yearLevel']   : ''),
                "courseStrand"    => (isset($_POST['courseStrand']) ? $_POST['courseStrand']: ''),
                "status"          => (isset($_POST['status'])       ? $_POST['status']      : ''),
            ];
            echo createTable($report = 1, $data = $data);
            break;
    }
}

