<?php

include("functionModel.php");

function userLogin($user_name, $password, $type)
{
    include("dbconnection.php");

    // Checks if Account Exists
    $sql = "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type = '" . $type . "'";
    $query = mysqli_query($conn, $sql) or die("Error LQ001: " . mysqli_error($conn));

    if(mysqli_num_rows($query) <> 0)
    {
        while ($row = mysqli_fetch_assoc($query))
        {
            extract($row);
        }       

        session_start();

        $_SESSION['id'] = $id;

        return 'Success';
    }
    else
    {
        return 'Incorrect Username/Password';
    }
}

function registerAccount($data)
{
    include("dbconnection.php");

    $existCount = check_exist($data['email']);

    if ($existCount > 0)
    {
        return 'Email Already Exist';
    }
    
    $sql = "INSERT INTO account (password, email, account_type, access_level) VALUES ('" . $data['password'] . "', '" . $data['email'] . "', 3, 0)";
    $query = mysqli_query($conn, $sql) or die("Error RC001: " . mysqli_error($conn));

    if ($query)
    {
        $last_id = mysqli_insert_id($conn);

        $sql = "INSERT INTO user_info (account_id, first_name, middle_name, last_name, suffix, birth_date, birth_place, address_line, barangay, municipality, province, region, religion, gender, civil_status, contact_number)
        VALUES ('$last_id', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[birthdate]', '$data[birthPlace]', '$data[address]', '$data[barangay]', '$data[city]', '$data[province]', '$data[region]', '$data[religion]', '$data[gender]', '$data[civilStatus]', '$data[contactNo]')";
        $query = mysqli_query($conn, $sql) or die("Error RC002: " . mysqli_error($conn));

        if ($query)
        {
            $sql = "INSERT INTO email_token (user_id, email, token, date_generated) VALUES ('$last_id', '$data[email]', '" . generateRandomString(5) . "', NOW())";
            $query = mysqli_query($conn, $sql) or die("Error RC003: " . mysqli_error($conn));

            if ($query)
            {
                return 'Success';
            }
            else
            {
                echo 'Error RC004: ' . mysqli_error($conn);
            }
        }
        else
        {
            echo 'Error RC003: ' . mysqli_error($conn);
        }
    }
    else
    {
        echo 'Error RC002: ' . mysqli_error($conn);
    }
}

function check_exist($email)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM account WHERE email = '" . $email . "'";
    $query = mysqli_query($conn, $sql) or die("Error CE001: " . mysqli_error($conn));

    return mysqli_num_rows($query);
}