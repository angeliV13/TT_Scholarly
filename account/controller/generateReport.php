<?php 

require("../model/generateReportModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action) 
    {
        case 1: 
            $data = [
                "applicant" => "account"
            ];
            echo createTable();
            break;
    }
}

