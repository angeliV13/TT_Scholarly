<?php

require("../model/basicSetupModel.php");


if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];

    switch ($action) {
        case 1:                             //Table Generations
            if (isset($_REQUEST['getTable'])) {   
                $getTable = $_REQUEST['getTable'];
                if ($getTable == 1)                      //Generate Acad Year Table
                {
                    echo getAcadYearTable();
                }
                elseif ($getTable == 2)                  //Generate Acad Year Table
                {
                    echo getSetAssessmentTable();
                }
            }
            break;
        case 1.1:                           //Generate Academic Year
            echo generate_ay();
            break;
        case 1.2:                           //Default Academic Year
            if (isset($_POST['id'])) {       
                $id = $_POST['id'];

                echo defaultAY($id);
            }
            else
            {
                echo 'No AY Exists';
            }
            break;
        case 1.3:                           //Delete Academic Year
            if (isset($_POST['id'])) {       
                $id = $_POST['id'];

                echo deleteAY($id);
            }
            else
            {
                echo 'No AY Exists';
            }
            break;

        case 2.1:                           //Add Assessment Date
            if(isset($_POST['id'])){
                $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
                $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
                $shs        = $_POST['shs'];
                $colEAPub   = $_POST['colEAPub'];
                $colEAPriv  = $_POST['colEAPriv'];
                $colSc      = $_POST['colSc'];
            }
            echo addSetAssessment($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);

            break;
        case 2.2:                           //Update Assessment Date
            if(isset($_POST['id'])){
                $id         = $_POST['id'];
                $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
                $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
                $shs        = $_POST['shs'];
                $colEAPub   = $_POST['colEAPub'];
                $colEAPriv  = $_POST['colEAPriv'];
                $colSc      = $_POST['colSc'];
            }
            echo editSetAssessment($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);
            break;
    }
}
