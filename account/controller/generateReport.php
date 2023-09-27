<?php 

require("../model/generateReportModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action) 
    {
        case 1: 
            echo createTable(1);
            break;
    }
}

