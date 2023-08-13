<?php

require("../model/basicSetupModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action) 
    {
        case 0.1:
            echo getDefaultSemesterId();
            break;
        case 0.2:
            if (isset($_REQUEST['sem'])) 
            {
                $sem = $_REQUEST['sem'];
                echo switchSemester($sem);
            }

            break;
        case 1:                             //Table Generations
            if (isset($_REQUEST['getTable'])) 
            {
                $getTable = $_REQUEST['getTable'];
                if ($getTable == 1)                        //Generate Acad Year Table
                {
                    echo getAcadYearTable();
                } 
                elseif ($getTable == 2)                  //Generate Assessment Table
                {
                    echo getSetAssessmentTable();
                } 
                elseif ($getTable == 3)                  //Generate Renewal Table
                {
                    echo getSetRenewalTable();
                } 
                elseif ($getTable == 4)                  //Generate Renewal Table
                {
                    echo getSetExamTable();
                } 
                elseif ($getTable == 5)                  //Generate Indicator EA Income
                {
                    echo getIndicatorEATable($_POST['tableCategory']);
                } 
                elseif ($getTable == 6)                  //Generate Indicator EA Income
                {
                    echo getIndicatorSCTable($_POST['tableCategory']);
                }
            }
            break;
        case 1.1:                           //Generate Academic Year
            echo generate_ay();
            break;
        case 1.2:                           //Default Academic Year
            if (isset($_POST['id'])) 
            {
                $id = $_POST['id'];

                echo defaultAY($id);
            } 
            else 
            {
                echo 'No AY Exists';
            }
            break;
        case 1.3:                           //Delete Academic Year
            if (isset($_POST['id'])) 
            {
                $id = $_POST['id'];

                echo deleteAY($id);
            } 
            else 
            {
                echo 'No AY Exists';
            }

            break;

        case 2.1:                           //Add Assessment Date
            $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
            $shs        = $_POST['shs'];
            $colEAPub   = $_POST['colEAPub'];
            $colEAPriv  = $_POST['colEAPriv'];
            $colSc      = $_POST['colSc'];

            echo addSetAssessment($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);

            break;
        case 2.2:                           //Update Assessment Date
            if (isset($_POST['id'])) 
            {
                $id         = $_POST['id'];
                $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
                $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
                $shs        = $_POST['shs'];
                $colEAPub   = $_POST['colEAPub'];
                $colEAPriv  = $_POST['colEAPriv'];
                $colSc      = $_POST['colSc'];

                echo editSetAssessment($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);
            }

            break;
        case 2.3:                           //Delete Assessment Date
            if (isset($_POST['id'])) 
            {
                $id = $_POST['id'];

                echo deleteSetAssessment($id);
            } 
            else 
            {
                echo 'No Assessment Exists';
            }

            break;
        case 3.1:                           //Add Renewal Date

            $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
            $shs        = $_POST['shs'];
            $colEAPub   = $_POST['colEAPub'];
            $colEAPriv  = $_POST['colEAPriv'];
            $colSc      = $_POST['colSc'];

            echo addSetRenewal($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);

            break;
        case 3.2:                           //Update Renewal Date
            if (isset($_POST['id'])) 
            {
                $id         = $_POST['id'];
                $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
                $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
                $shs        = $_POST['shs'];
                $colEAPub   = $_POST['colEAPub'];
                $colEAPriv  = $_POST['colEAPriv'];
                $colSc      = $_POST['colSc'];

                echo editSetRenewal($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);
            }

            break;
        case 3.3:                           //Delete Set Renewal
            if (isset($_POST['id'])) 
            {
                $id = $_POST['id'];

                echo deleteSetRenewal($id);
            } 
            else 
            {
                echo 'No Renewal Exists';
            }
            break;

        case 4.1:                           //Add Exam Date

            $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
            $time       = $_POST['time'];
            $shs        = $_POST['shs'];
            $colEAPub   = $_POST['colEAPub'];
            $colEAPriv  = $_POST['colEAPriv'];
            $colSc      = $_POST['colSc'];

            echo addSetExam($startDate, $endDate, $time, $shs, $colEAPub, $colEAPriv, $colSc);

            break;
        case 4.2:                           //Update Exam Date
            if (isset($_POST['id'])) 
            {
                $id         = $_POST['id'];
                $startDate  = date('Y-m-d', strtotime($_POST['startDate']));
                $endDate    = date('Y-m-d', strtotime($_POST['endDate']));
                $time       = $_POST['time'];
                $shs        = $_POST['shs'];
                $colEAPub   = $_POST['colEAPub'];
                $colEAPriv  = $_POST['colEAPriv'];
                $colSc      = $_POST['colSc'];

                echo editSetExam($id, $startDate, $time, $endDate, $shs, $colEAPub, $colEAPriv, $colSc);
            }

            break;
        case 4.3:                           //Delete Set Exam
            if (isset($_POST['id'])) 
            {
                $id = $_POST['id'];

                echo deleteSetExam($id);
            } 
            else 
            {
                echo 'No Exam Exists';
            }
            break;
        case 5.1:                           //Update Indicator
            if (isset($_POST['id'])) 
            {
                $id         = $_POST['id'];
                $type       = $_POST['type'];    
                $value      = $_POST['value'];
                $category   = $_POST['category'];
                $applicant  = $_POST['applicant'];

                echo updateIndicator($id, $type, $value, $category, $applicant);
            }

            break;
        case 6: // Add Notification
            $data = [
                'notifFunc'     => isset($_POST['notifFunc']) ? $_POST['notifFunc'] : '',
                'notifName'     => isset($_POST['notifName']) ? $_POST['notifName'] : '',
                'notifIcon'     => isset($_POST['notifIcon']) ? $_POST['notifIcon'] : '',
                'filledCheck'   => isset($_POST['filledCheck']) ? $_POST['filledCheck'] : '',
                'notifUsers'    => isset($_POST['notifUsers']) ? $_POST['notifUsers'] : '',
            ];

            echo addNotificationType($data);

            break;
        case 6.1: // Update Notification
            $data = [
                'notifId'       => isset($_POST['notifId']) ? $_POST['notifId'] : '',
                'notifName'     => isset($_POST['notifName']) ? $_POST['notifName'] : '',
                'notifIcon'     => isset($_POST['notifIcon']) ? $_POST['notifIcon'] : '',
                'filledCheck'   => isset($_POST['filledCheck']) ? $_POST['filledCheck'] : '',
                'notifUsers'    => isset($_POST['notifUsers']) ? $_POST['notifUsers'] : '',
            ];

            echo updateNotificationType($data);

            break;
        
        case 7: // Add School
            $data = [
                'userId'        => isset($_POST['userId']) ? $_POST['userId'] : '',
                'schoolName'    => isset($_POST['schoolName']) ? $_POST['schoolName'] : '',
                'schoolAddress' => isset($_POST['schoolAddress']) ? $_POST['schoolAddress'] : '',
                'schoolType'    => isset($_POST['schoolType']) ? $_POST['schoolType'][0][0] : '',
            ];

            echo addSchool($data);

            break;
        case 7.1: // Update School
            $data = [
                'id'      => isset($_POST['id']) ? $_POST['id'] : '',
                'name'    => isset($_POST['name']) ? $_POST['name'] : '',
                'address' => isset($_POST['address']) ? $_POST['address'] : '',
                'type'    => isset($_POST['type']) ? $_POST['type'][0][0] : '',
            ];

            echo updateSchool($data);

            break;
        case 7.2: // Delete School
            echo deleteSchool(isset($_POST['id']) ? $_POST['id'] : '');
            break;
    }
}
