<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");


function getTableHeader()
{
    include('dbconnection.php');

    $data = [];

    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$dbdatabase}' AND TABLE_NAME = 'account'";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_assoc()) {
        $data[] .= $row['COLUMN_NAME'];
    }

    return ($data);
}

function getTableBody()
{
    include('dbconnection.php');
    if($ay_id == '')  : getDefaultAcadYearId(); endif;
    if($sem_id == '') : getDefaultSemesterId(); endif;

    $data = [];

    $sql = "SELECT * FROM account";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_row()) {
        $data[] = $row;
    }

    return ($data);
}

function createTable()
{
    $array =  ['applicant'];
    $returnData = [];

    $tableHeader = getTableHeader();
    $tableBody   = getTableBody();

    $returnData = [$tableHeader, $tableBody];

    return (json_encode($returnData));
}
