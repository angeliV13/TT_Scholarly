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

function getAccountType($type)
{
    switch ($type)
    {
        case 0:
            return "Super Admin";
        case 1:
            return "Admin";
        case 2:
            return "Beneficiaries";
        case 3:
            return "Applicants";
        default:
            return "Unknown";
    }
}