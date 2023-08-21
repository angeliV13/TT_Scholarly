<?php

require("../model/uploadRequirementsModel.php");
$target_dir = "../uploads";

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
    switch($action){
        case 1:
            $getTable = $_POST['getTable'];
            if($getTable == 1){
                echo getAssessmentBeneTable();
            }elseif($getTable == 2){
                echo getApplicationTable();
            }
            break;
        case 2:         // Upload of Assessment Requirements
            // $schoolIdNA      = isset($_POST['schoolIdNA'])      ? $_POST['schoolIdNA']   : "";
            // $clearanceNA     = isset($_POST['clearanceNA'])     ? $_POST['clearanceNA']  : "";
            // $corNA           = isset($_POST['corNA'])           ? $_POST['corNA']        : "";
            // $gradeNA         = isset($_POST['gradeNA'])         ? $_POST['gradeNA']      : "";
            $schoolIdFile    = isset($_FILES['schoolIdFile'])   ? $_FILES['schoolIdFile']   : $_POST['schoolIdFile'];
            $clearanceFile   = isset($_FILES['clearanceFile'])  ? $_FILES['clearanceFile']  : $_POST['clearanceFile'];
            $corFile         = isset($_FILES['corFile'])        ? $_FILES['corFile']        : $_POST['corFile'];
            $gradeFile       = isset($_FILES['gradeFile'])      ? $_FILES['gradeFile']      : $_POST['gradeFile'];

            $target_dir .= "/assessment/";
            // print_r(submitAssessment($target_dir, $schoolIdCheck, $clearanceCheck, $corCheck, $gradeCheck, $schoolIdFile, $clearanceFile, $corFile, $gradeFile));
            echo submitAssessment($target_dir, $schoolIdFile, $clearanceFile, $corFile, $gradeFile);

            break;
    }
}

?>