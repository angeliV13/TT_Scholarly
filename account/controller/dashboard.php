<?php

require("../model/dashboardModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action) 
    {
        case 1: // Counts of Dashboard;
            echo getTotalCounts();
            break;

        case 2: // Chart of Scholar Trends;
            echo getChartTrends();
            break;
    }
}