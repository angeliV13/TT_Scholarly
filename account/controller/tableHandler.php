<?php

include("../model/dbconnection.php");
include("../model/tableHandlerModel.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

session_start();

if ($action == 1)
{
    echo accountListingTable($_SESSION['account_type']);
}