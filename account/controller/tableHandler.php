<?php

include("../model/dbconnection.php");
include("../model/tableHandlerModel.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

session_start();

switch ($action) {
    case 1.1:                                           //Admin Acount Management
        echo accountListingTable($_SESSION['id'], $_SESSION['account_type'], 0);
        break;
    case 1.2:                                           //Student Account Management
        echo accountListingTable($_SESSION['id'], $_SESSION['account_type'], 1);
        break;
    case 2:                                             //Examination Questions
        echo examQuestionsTable();
        break;
    case 3:                                             //Notifications
        echo notificationTable();
        break;
    case 4:                                             //School Table
        echo schoolTable();
        break;
    case 5:                                             //Applicants Submitted
        echo userTables(1); 
        break;
    case 6:                                             //Website Socials
        echo websiteSocials();
        break;
    case 7:                                             //Graduated 
        echo graduatesTable();
        break;
    case 8:                                             //Beneficiaries + Applicant Approved
        echo userTables("", "", 2, 1);
        break;
    case 9:                                             //View Notification
        echo viewNotificationTable();
        break;
    case 10:                                            //Getting Profile
        echo getProfile($_POST['id']);
        break;
    case 11:                                            //Applicants ******
        echo userTables(3);
        break;
    case 12:                                            //Applicants ******
        echo userTables(2);
        break;
    case 13:
        echo userTables("", 4);
        break;
    case 14:
        echo userTables(2, "", 2, 1);                   //For Assessment (Beneficiaries + Applicant Approved)
        break;
    case 15:
        echo userTables(4, 3, 3);
        break;
    case 16:
        echo userTables("", 4, 2);
        break;
    case 17:                                            //Officials
        echo viewOfficials();
        break;
    case 18:                                            //Testimonial
        echo viewTestimony();
        break;
    case 19:                                            //Graduating
        echo graduatingTable();
        break;
    case 20:                                            //Examinee List
        echo examineeListTable();
        break;
}
