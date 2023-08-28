<?php

include("../model/dbconnection.php");
include("../model/tableHandlerModel.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

session_start();

switch ($action) {
    case 1:
        echo accountListingTable($_SESSION['account_type']);
        break;
    case 2:
        echo examQuestionsTable();
        break;
    case 3:
        echo notificationTable();
        break;
    case 4:
        echo schoolTable();
        break;
    case 5:
        echo userTables(1);
        break;
    case 6:
        echo websiteSocials();
        break;
    case 7:
        echo graduatesTable();
        break;
    case 8:
        echo userTables(4, "", 2);
        break;
    case 9:
        echo viewNotificationTable();
        break;
    case 10:
        echo getProfile($_POST['id']);
        break;
    case 11:
        echo userTables(3);
        break;
    case 12:
        echo userTables(2);
        break;
    case 13:
        echo userTables("", 4);
        break;
    case 14:
        echo userTables(2, "", 2);
        break;
    case 15:
        echo userTables(4, 3, 2);
        break;
    case 16:
        echo userTables("", 4, 2);
        break;
}
