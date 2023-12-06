<?php

require("../model/uploadRequirementsModel.php");
$target_dir = "../uploads";

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
    $dashboard = (isset($_POST['dashboard']) ? 1 : 0);

    switch($action){
        case 1:
            $getTable = $_POST['getTable'];
            if($getTable == 1){
                echo getAssessmentBeneTable($dashboard);
            }elseif($getTable == 2){
                echo getApplicationTable($dashboard);
            }
            elseif($getTable == 3){
                echo getRenewalTable($dashboard);
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
        case 3:         // Upload of Application Requirements
            // corFile, gradesFile, cobFile, cgmcFile, idpicFile, mapFile, brgyclearanceFile, parvoteidFile, appvoteidFile, itrFile, indigencyFile);

            $corFile            = isset($_FILES['corFile'])             ? $_FILES['corFile']            : $_POST['corFile'];
            $gradesFile         = isset($_FILES['gradesFile'])          ? $_FILES['gradesFile']         : $_POST['gradesFile'];
            $cobFile            = isset($_FILES['cobFile'])             ? $_FILES['cobFile']            : $_POST['cobFile'];
            $cgmcFile           = isset($_FILES['cgmcFile'])            ? $_FILES['cgmcFile']           : $_POST['cgmcFile'];
            $idpicFile          = isset($_FILES['idpicFile'])           ? $_FILES['idpicFile']          : $_POST['idpicFile'];
            $mapFile            = isset($_FILES['mapFile'])             ? $_FILES['mapFile']            : $_POST['mapFile'];
            $brgyclearanceFile  = isset($_FILES['brgyclearanceFile'])   ? $_FILES['brgyclearanceFile']  : $_POST['brgyclearanceFile'];
            $parvoteidFile      = isset($_FILES['parvoteidFile'])       ? $_FILES['parvoteidFile']      : $_POST['parvoteidFile'];
            $appvoteidFile      = isset($_FILES['appvoteidFile'])       ? $_FILES['appvoteidFile']      : $_POST['appvoteidFile'];
            $itrFile            = isset($_FILES['itrFile'])             ? $_FILES['itrFile']            : $_POST['itrFile'];
            // $indigencyFile      = isset($_FILES['indigencyFile'])       ? $_FILES['indigencyFile']      : $_POST['indigencyFile'];

            $target_dir .= "/application/";
            echo submitApplication($target_dir, $corFile, $gradesFile, $cobFile, $cgmcFile, $idpicFile, $mapFile, $brgyclearanceFile, $parvoteidFile, $appvoteidFile, $itrFile);

            break;
        case 4:         // Upload of Renewal Requirements
            $schoolIdFile    = isset($_FILES['schoolIdFile'])   ? $_FILES['schoolIdFile']   : $_POST['schoolIdFile'];
            $corFile         = isset($_FILES['corFile'])        ? $_FILES['corFile']        : $_POST['corFile'];

            $target_dir .= "/renewal/";
            // print_r(submitAssessment($target_dir, $schoolIdCheck, $clearanceCheck, $corCheck, $gradeCheck, $schoolIdFile, $clearanceFile, $corFile, $gradeFile));
            echo submitRenewal($target_dir, $schoolIdFile, $corFile);

            break;
        case 5:
            $uid     = isset($_POST['uid'])    ? $_POST['uid']    : "";
            $id     = isset($_POST['id'])    ? $_POST['id']    : "";
            $act    = isset($_POST['act'])   ? $_POST['act']   : "";
            $state  = isset($_POST['state']) ? $_POST['state'] : "";
            $remarks  = isset($_POST['remarks']) ? $_POST['remarks'] : "";
            if($act == 'app' ){
                echo setRequirements($uid, $id, 2, $state, $remarks);
            }
            else if($act == 'mod'){
                echo setRequirements($uid, $id, 3, $state, $remarks);
            }

    }
}

?>