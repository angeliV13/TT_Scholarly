<?php

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

function get_user_gen_info($id)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM gen_info WHERE user_id = '" . $id . "'";
    $query = $conn->query($sql);

    $user_info = [];

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();

        $user_info = $row;
    }

    return $user_info;
}

function get_user_education($id)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM education WHERE user_id = '" . $id . "'";
    $query = $conn->query($sql);

    $education = [];

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $education[] = $row;
        }
    }

    $sql = "SELECT * FROM user_awards WHERE school_id IN (SELECT id FROM education WHERE user_id = '" . $id . "')";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            foreach ($education as $key => $value)
            {
                if ($value['educ_id'] == $row['school_id'])
                {
                    $education[$key]['awards'][] = $row;
                }
            }
        }
    }

    return $education;
}

function get_user_family($id)
{
    include ("dbconnection.php");

    $sql = "SELECT * FROM user_family WHERE user_id = '" . $id . "'";
    $query = $conn->query($sql);

    $family = [];

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $family[] = $row;
        }
    }
}

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

        array_push($assessment_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
    }

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

    if ($sql->num_rows > 0)
    {
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }  

        array_push($renewal_data, $start_date, $end_date, $colSc, $colEAPriv, $colEAPub, $shs);
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

        array_push($exam_data, $start_date, $end_date, $time, $colSc, $colEAPriv, $colEAPub, $shs);
    }

    return $exam_data;
}
