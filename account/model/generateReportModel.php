<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");


function getTableHeader($report)
{
    include('dbconnection.php');

    $data = [];

    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$dbdatabase}' AND TABLE_NAME = '{$report}'";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_assoc()) {
        $data[] .= $row['COLUMN_NAME'];
    }

    return ($data);
}

function getTableBody($report, $data)
{
    include('dbconnection.php');
    if ($data['Academic Year'] == '') getDefaultAcadYearId();
    // if ($data['Semester'] == '') getDefaultSemesterId();

    $body = [];
    $where = false;

    $sql = "SELECT * FROM {$report}";
    // Looping if Data for Filter Found
    foreach ($data as $key => $value) {
        if ($value <> '--' && $value <> '') {
            if ($where == false) {
                $sql .= " WHERE ";
                $where = true;
            }else{
                $sql .= " AND ";
            }
            $sql .= "`{$key}` LIKE '{$value}'";
        }
    }

    // return $sql;
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_row()) {
        $body[] = $row;
    }

    return ($body);
}

function createTable($report, $data)
{
    $array =  [0, 'applicant_report', 'beneficiary_report', 'graduate_report', 'exam_report', 'performance_report'];
    $returnData = [];
    $tableBodyTmp = [];

    $tableHeader    = getTableHeader($array[$report]);
    $tableBodyTmp   = getTableBody($array[$report], $data);
    $tableBody      = [];
    $tableRow       = [];

    // Get the Rows
    foreach($tableBodyTmp as $row){
        // Get the Rows
        foreach($row as $key => $field){
            // Check the Field if it is School Name and with School Type
            if($report <= 3){
                switch($key){
                    case '14':
                        $school_name = get_school_name_id($field);
                        $tableRow[$key] = ($school_name <> 'No data found') ? $school_name : $field;
                        break;
                    case '15':
                        $school_classification = get_school_classification($field);
                        $tableRow[$key] = ($school_classification <> 'No data found') ? $school_classification : $field;
                        break;
                    case '16':
                        $school_course = get_course_name($field);
                        $tableRow[$key] = ($school_course <> '') ? $school_course : $field;
                        break;
                    default:
                        $tableRow[$key] = $field;
                        break;
                } // End Switch
            }elseif($report == 4){
                switch($key){
                    case '11':
                        $school_name = get_school_name_id($field);
                        $tableRow[$key] = ($school_name <> 'No data found') ? $school_name : $field;
                        break;
                    case '12':
                        $school_classification = get_school_classification($field);
                        $tableRow[$key] = ($school_classification <> 'No data found') ? $school_classification : $field;
                        break;
                    default:
                        $tableRow[$key] = $field;
                        break;
                } // End Switch
            }
        } // End of Rows
        array_push($tableBody, $tableRow);
    } //End of Table


    $returnData = [$tableHeader, $tableBody];

    return (json_encode($returnData));
}
