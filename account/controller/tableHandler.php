<?php

include("../model/dbconnection.php");
include("../model/tableHandlerModel.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

session_start();

switch ($action)
{
    case 1:
        echo accountListingTable($_SESSION['account_type']);
        break;
    case 2:
        echo examQuestionsTable();
        break;
    case 3:
        echo notificationTable();
        break;
}
    