<?php

function getFileChecks($check , $file){
    if($check == false){
        if($file['name'] != ''){
            return true;
        }
        else
        {
            return false;
        }
    }    
}

function submitAssessment($schoolId, $clearance, $cor, $grade, $schoolIdFile, $clearanceFile, $corFile, $gradeFile){
        
}

?>