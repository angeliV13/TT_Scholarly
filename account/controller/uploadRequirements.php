<?php

require("../model/basicSetupModel.php");

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
    switch($action){
        case 1:         // Upload of Assessment Requirements
            $schoolIdCheck   = $_POST['schoolIdCheck'];
            $clearanceCheck  = $_POST['clearanceCheck'];
            $corCheck        = $_POST['corCheck'];
            $gradeCheck      = $_POST['gradeCheck'];
            $schoolIdFile    = $_FILES['schoolIdFile'];
            $clearanceFile   = $_FILES['clearanceFile'];
            $corFile         = $_FILES['corFile'];
            $gradeFile       = $_FILES['gradeFile'];
            $validSchoolId   = false;
            $validClearance  = false;
            $validCor        = false;
            $validGrade      = false;

            //Validation
            $validSchoolId   = getFileChecks( $schoolIdCheck     , $schoolIdFile );
            $validClearance  = getFileChecks( $clearanceCheck    , $clearanceFile);
            $validCor        = getFileChecks( $corCheck          , $corFile      );
            $validGrade      = getFileChecks( $gradeCheck        , $gradeFile    );    

            if($validSchoolId == false || $validClearance == false || $validCor == false || $validGrade == false){
                echo 'VC001: Error in File Validation';
            }else{
                echo submitAssessment($schoolIdCheck, $clearanceCheck, $corCheck, $gradeCheck, $schoolIdFile, $clearanceFile, $corFile, $gradeFile);
            }

            break;
    }
}

?>