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
    $array =  [0, 'applicant_report', 'beneficiary_report', 'graduate_report', 'examination_report', 'performance_report'];
    $returnData = [];
    $tableBodyTmp = [];

    $tableHeader = getTableHeader($array[$report]);
    $tableBody   = getTableBody($array[$report], $data);

    // Send to Temp
    $tableBodyTmp = $tableBody;
    // TEST
    // $tableBody = [];
    foreach($tableBodyTmp as $key => $value){
        // Get the position
        // if position and $array is match apply changes of value for school
        // Use get_school_name($id) of function model
        // Push Changes
    }


    $returnData = [$tableHeader, $tableBody];

    return (json_encode($returnData));
}
