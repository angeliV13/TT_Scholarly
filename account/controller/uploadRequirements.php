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
            }
            break;
        case 2:         // Upload of Assessment Requirements
            $schoolIdCheck   = $_POST['schoolIdCheck'];
            $clearanceCheck  = $_POST['clearanceCheck'];
            $corCheck        = $_POST['corCheck'];
            $gradeCheck      = $_POST['gradeCheck'];
            $schoolIdFile    = isset($_FILES['schoolIdFile'])   ? $_FILES['schoolIdFile']   : "";
            $clearanceFile   = isset($_FILES['clearanceFile'])  ? $_FILES['clearanceFile']  : "";
            $corFile         = isset($_FILES['corFile'])        ? $_FILES['corFile']        : "";
            $gradeFile       = isset($_FILES['gradeFile'])      ? $_FILES['gradeFile']      : "";
            $validSchoolId   = 0;
            $validClearance  = 0;
            $validCor        = 0;
            $validGrade      = 0;

            //Validation
            $validSchoolId   = getFileChecks( $schoolIdCheck     , $schoolIdFile );
            $validClearance  = getFileChecks( $clearanceCheck    , $clearanceFile);
            $validCor        = getFileChecks( $corCheck          , $corFile      );
            $validGrade      = getFileChecks( $gradeCheck        , $gradeFile    );    

            if($validSchoolId == 0 || $validClearance == 0 || $validCor == 0 || $validGrade == 0){
                echo 'VC001: Error in File Validation';
            }else{
                $target_dir .= "/assessment/";
                // print_r(submitAssessment($target_dir, $schoolIdCheck, $clearanceCheck, $corCheck, $gradeCheck, $schoolIdFile, $clearanceFile, $corFile, $gradeFile));
                echo submitAssessment($target_dir, $schoolIdCheck, $clearanceCheck, $corCheck, $gradeCheck, $schoolIdFile, $clearanceFile, $corFile, $gradeFile);
            }

            break;
    }
}

?>