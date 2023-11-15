<?php

function getCurrentAY()
{
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

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  

        // array_push($assessment_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
        array_push($assessment_data, $start_date, $end_date, $colSc, $colEAPub, $shs);
    }

    return $assessment_data;

}

function applicationAccess()
{
    include("dbconnection.php");

    $ay = getCurrentAY();

    $application_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM set_application WHERE ay_id = '" . $ay . "' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  

        // array_push($application_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
        array_push($application_data, $start_date, $end_date, $colSc, $colEAPub, $shs);
    }

    return $application_data;

}

function renewalAccess()
{
    include("dbconnection.php");

    $ay = getCurrentAY();

    $renewal_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM set_renewal WHERE ay_id = '" . $ay . "' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  

        // array_push($renewal_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
        array_push($renewal_data, $start_date, $end_date, $colSc, $colEAPub, $shs);
    }

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

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  

        // array_push($exam_data, $start_date, $end_date, $time, $colSc, $colEAPriv, $colEAPub, $shs);
        array_push($exam_data, $start_date, $end_date, $time, $colSc, $colEAPub, $shs);
    }

    return $exam_data;
}

function scholarType($id)
{
    include("dbconnection.php");

    $ay = getCurrentAY();
    $scholarType = "";

    // Checks if Account Exists
    $query = "SELECT scholarType FROM scholarship_application WHERE ay_id = '{$ay}' AND userId = '{$id}' ORDER BY id DESC LIMIT 1";
    $sql = mysqli_query($conn, $query) or die("Error AQ001: " . mysqli_error($conn));

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  
    }

    return $scholarType;
}
