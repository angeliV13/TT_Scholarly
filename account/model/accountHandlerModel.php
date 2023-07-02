<?php

include("functionModel.php");

function userLogin($user_name, $password, $type)
{
    include("dbconnection.php");

    // Checks if Account Exists
    if($type <= 1){
        $sql = "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type <= '" . $type . "'";
    }else{
        $sql = "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type >= '" . $type . "'";
    }
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
    $query = mysqli_query($conn, $sql) or die("Error RQ001: " . mysqli_error($conn));

    if ($query)
    {
        $last_id = mysqli_insert_id($conn);

        $sql = "INSERT INTO user_info (account_id, first_name, middle_name, last_name, suffix, birth_date, birth_place, address_line, barangay, municipality, province, region, religion, gender, civil_status, contact_number)
        VALUES ('$last_id', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[birthdate]', '$data[birthPlace]', '$data[address]', '$data[barangay]', '$data[city]', '$data[province]', '$data[region]', '$data[religion]', '$data[gender]', '$data[civilStatus]', '$data[contactNo]')";
        $query = mysqli_query($conn, $sql) or die("Error RQ002: " . mysqli_error($conn));

        if ($query)
        {
            $sql = "INSERT INTO email_token (user_id, email, token, date_generated) VALUES ('$last_id', '$data[email]', '" . generateRandomString(5) . "', NOW())";
            $query = mysqli_query($conn, $sql) or die("Error RQ003: " . mysqli_error($conn));

            if ($query)
            {
                return 'Success';
            }
            else
            {
                echo 'Error RQ004: ' . mysqli_error($conn);
            }
        }
        else
        {
            echo 'Error RQ003: ' . mysqli_error($conn);
        }
    }
    else
    {
        echo 'Error RQ002: ' . mysqli_error($conn);
    }
}

function check_exist($email)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM account WHERE email = '" . $email . "'";
    $query = $conn->query($sql);

    return $query->num_rows;
}

function email_confirmation($data)
{
    include("dbconnection.php");

    $sql = "SELECT id, user_id, date_generated FROM email_token WHERE email = '" . $data['email'] . "' AND token = '" . $data['code'] . "' LIMIT 1";
    $query = $conn->query($sql);

    if ($query)
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_id = $row['user_id'];
        $date_generated = $row['date_generated'];

        $timeLeft = getDateTimeDiff($date_generated, date("Y-m-d H:i:s"));

        if ($timeLeft <= 0)
        {
            return 'Error EQ003: Token Expired';
        }
        else
        {
            $sql = "UPDATE account SET account_status = 1 WHERE id = '" . $user_id . "' AND account_status = 0 LIMIT 1";
            $query = $conn->query($sql);

            $sql = "UPDATE email_token SET verified_flag = 1, date_verified = NOW() WHERE id = '" . $id . "' AND token = '" . $data['code'] . "' LIMIT 1";
            $query = $conn->query($sql);

            if ($query)
            {
                echo 'Success';
            }
            else
            {
                echo 'Error EQ002: ' . $conn->error;
            }
        }
    }
    else
    {
        echo 'Error EQ001: ' . $conn->error;
    }
}