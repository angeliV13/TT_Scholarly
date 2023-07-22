<?php

include("functionModel.php");

function get_user_data($id)
{
    include("dbconnection.php");

    $user_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM account WHERE id = '" . $id . "'";
    $sql = mysqli_query($conn, $query) or die("Error UD001: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  
    
    array_push($user_data, $id, $user_name, $email, $account_type, $access_level, $account_status);
    
    return $user_data;
}

function get_user_info($id)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM user_info WHERE account_id = '" . $id . "'";
    $query = $conn->query($sql);

    $user_info = [];

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();

        $user_info = $row;
    }

    return $user_info;
}

function getAccountType($type, $level)
{
    $data = [];

    switch ($type)
    {
        case 0:
            $typeName = "Super Admin";
            break;
        case 1:
            $typeName = "Admin";
            break;
        case 2:
            $typeName = "Beneficiaries";
            break;
        case 3:
            $typeName = "Applicants";
            break;
        default:
            $typeName = "Unknown";
    }

    switch ($level)
    {
        case 0:
            $levelName = "No Super Admin Access";
            break;
        case 1:
            $levelName = "Super Admin w/ limited Access";
            break;
        case 2:
            $levelName = "Super Admin w/ Full Access";
            break;
        default:
            $levelName = "Unknown";
    }

    array_push($data, $typeName, $levelName);

    return $data;
}


function getCurrentAY(){
    include("dbconnection.php");

    // Checks if Account Exists
    $query = "SELECT * FROM acad_year WHERE default_ay = '1'";
    $sql = mysqli_query($conn, $query) or die("Error AQ000: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  

    return $id;
}

function assessmentAccess()
{
    include("dbconnection.php");

    $ay = getCurrentAY();

    $assessment_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM set_assessment WHERE ay_id = '" . $ay . "' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  

    array_push($assessment_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
    return $assessment_data;
}

function renewalAccess()
{
    include("dbconnection.php");

    $ay = getCurrentAY();

    $renewal_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM set_renewal WHERE ay_id = '" . $ay . "' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  

    array_push($renewal_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
    return $renewal_data;
}

function examAccess()
{
    include("dbconnection.php");

    $ay = getCurrentAY();

    $exam_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM set_exam WHERE ay_id = '" . $ay . "' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  

    array_push($exam_data, $start_date, $end_date, $time, $colSc, $colEAPriv, $colEAPub, $shs);
    return $exam_data;
}
