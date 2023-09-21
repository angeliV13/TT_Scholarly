<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");


function getTableHeader(){
    include('dbconnection.php');

    $data = [];

    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '{$dbdatabase}' AND TABLE_NAME = 'account'";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while($row = $query->fetch_assoc()){
        $data[] .= $row['COLUMN_NAME'];
    }

    return($data);
}

function getTableBody(){
    include('dbconnection.php');

    $data = [];

    $sql = "SELECT * FROM account";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while($row = $query->fetch_row()){
        $data[] = $row;
    }

    return($data);
}

function createTable(){
    $data = [];

    $tableHeader = getTableHeader();
    $tableBody   = getTableBody();

    $data = [ $tableHeader, $tableBody ];

    return (json_encode($data));

}