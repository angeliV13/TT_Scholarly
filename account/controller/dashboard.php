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

        case 3: // Chart of Scholar Trends;
            echo getRecentActivity();
            break;
        case 4: // Chart Count for Application Trends
            echo getApplicantCount();
            break;
        case 5: // Chart Count for Application Trends
            echo getBarangayTrends();
            break;
        case 6: // Chart of Gender Trends;
            echo getGenderTrends();
            break;
        case 7: // Chart of Gender Trends;
            echo getSchoolTrends();
            break;
    }
}