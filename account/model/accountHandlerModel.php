<?php


function getUserNameFromId($id)
{
    include("dbconnection.php");


    // Checks if Account Exists


    $sql = "SELECT first_name, last_name FROM user_info WHERE id = '" . $id . "'";


    $query = $conn->query($sql) or die("Error UAQ000: " . $conn->error);
    while ($row = $query->fetch_assoc())
    {
        extract($row);
    }


    return $first_name . ' ' . $last_name;
}


function userLogin($user_name, $password, $type)
{
    include("dbconnection.php");


    // Checks if Account Exists


    $sql = ($type <= 1) ? "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type <= " . $type : "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type >= " . $type;


    $query = $conn->query($sql) or die("Error LQ001: " . $conn->error);


    if($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            extract($row);


        }      


        // $sql = "SELECT first_name, last_name FROM user_info WHERE id = '" . $id . "'";


        // $query = $conn->query($sql) or die("Error LQ002: " . $conn->error);
        // while ($row = $query->fetch_assoc())
        // {
        //     extract($row);
        // }


        session_start();


        $_SESSION['id'] = $id;
        $_SESSION['account_type'] = $account_type;
        $_SESSION['name'] = getUserNameFromId($id);


        return 'Success';
    }
    else
    {
        return 'Incorrect Username/Password';
    }
}


function user_sign_out()
{
    session_start();


    if (isset($_SESSION['id']))
    {
        $account_type = $_SESSION['account_type'];
        unset($_SESSION['id']);
        unset($_SESSION['account_type']);
        unset($_SESSION['name']);
        if($account_type>=2){
            return 'login.php';
        }
        else if($account_type<=1)
        {
            return 'login_admin.php';
        }
    }

    return 'No Session Found';
}


function registerAccount($data)
{
    include("dbconnection.php");


    $emailCheck = [
        'table'     => 'account',
        'column'    => 'email',
        'value'     => $data['email'],
    ];


    $userCheck = [
        'table'     => 'account',
        'column'    => 'user_name',
        'value'     => $data['username'],
    ];


    $emailCount = check_exist($emailCheck);
    $userCount = check_exist($userCheck);
    $randomString = generateRandomString(5);


    if ($emailCount > 0)
    {
        return 'Email Already Exist';
    }
    else if ($userCount > 0)
    {
        return 'Username Already Exist';
    }


    $msg = '<p> Hello ' . $data['firstName'] . ' ' . $data['lastName'] . ', </p> ';
    $msg .= '<p> Your account has been created. Enter the code below to verify your account. This code will expire in 5 minutes. </p>';
    $msg .= '<p> <b> Code: ' . $randomString . ' </b> </p>';

    $sendEmail = sendEmail($data['email'], 'Account Verification', $msg);

    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $notifData = [
        'user_id'       => get_user_id_type(4),
        'notif_type'    => 1,
        'notif_body'    => $data['firstName'] . ' ' . $data['lastName'] . ' has registered an account.',
        'notif_link'    => '?nav=Adaccount-management',
    ];

    $notif = insert_notification($notifData);

    if ($notif !== 'success') return 'Error: ' . $notif;
   
    $sql = "INSERT INTO account (user_name, password, email, account_type, access_level) VALUES ('" . $data['username'] . "', '" . $data['password'] . "', '" . $data['email'] . "', 3, 0)";
    $query = mysqli_query($conn, $sql) or die("Error RQ001: " . mysqli_error($conn));

    if ($query)
    {
        $last_id = mysqli_insert_id($conn);

        if ($data['fbImg'] != "")
        {
            $fbImg = upload_file($data['fbImg'], 'assets/img/uploads/fbProfile/', '../assets/img/uploads/fbProfile/', $options = [
                'type' => ['jpg', 'jpeg', 'png'],
            ]);

            if ($fbImg == 'Invalid File Type')
            {
                return 'Invalid File Type';
            }

            if ($fbImg['success'] == false)
            {
                return 'Error: ' . $fbImg['error'];
            }

            $img = $fbImg['path'];
        }

        $sql = "INSERT INTO user_info (account_id, first_name, middle_name, last_name, suffix, birth_date, birth_place, address_line, barangay, municipality, province, region, religion, gender, civil_status, contact_number, zip_code, fbName, fbUrl, fbImg)
        VALUES ('$last_id', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[birthdate]', '$data[birthPlace]', '$data[address]', '$data[barangay]', '$data[city]', '$data[province]', '$data[region]', '$data[religion]', '$data[gender]', '$data[civilStatus]', '$data[contactNo]', '$data[zipCode]', '$data[fbName]', '$data[fbUrl]', '$img')";
        $query = mysqli_query($conn, $sql) or die("Error RQ002: " . mysqli_error($conn));

        if ($query)
        {
            $sql = "INSERT INTO email_token (user_id, email, token, date_generated, type) VALUES ('$last_id', '$data[email]', '" . $randomString . "', NOW(), 0)";
            $query = mysqli_query($conn, $sql) or die("Error RQ003: " . mysqli_error($conn));

            if ($query)
            {
                echo 'Success';
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


function check_exist($data)
{
    include("dbconnection.php");

    $table = $data['table'];
    $column = $data['column'];
    $value = $data['value'];

    $sql = "SELECT * FROM " . $table . " WHERE " . $column . " = '" . $value . "'";
    $query = $conn->query($sql);

    return $query->num_rows;
}


function email_confirmation($data)
{
    include("dbconnection.php");

    $sql = "SELECT id, user_id, date_generated FROM email_token WHERE email = '" . $data['email'] . "' AND token = '" . $data['code'] . "' ORDER BY id DESC LIMIT 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_id = $row['user_id'];
        $date_generated = $row['date_generated'];
       
        // add 5 minutes to date_generated
        $date_countdown = date("Y-m-d H:i:s", strtotime('+5 minutes', strtotime($date_generated)));

        $timeLeft = getDateTimeDiff($date_generated, $date_countdown, 'seconds');

        if ($timeLeft <= 0)
        {
            return 'Error EQ003: Token Expired';
        }
        else
        {
            $sql = "UPDATE account SET account_status = 1 WHERE id = '" . $user_id . "' AND account_status = 0 LIMIT 1";
            $query = $conn->query($sql);


            $sql = "UPDATE email_token SET date_verified = NOW() WHERE user_id = '" . $user_id . "' AND token = '" . $data['code'] . "' AND type = 0 LIMIT 1";
            $query = $conn->query($sql);

            return ($query) ? 'Success' : 'Error EQ002: ' . $conn->error;
        }
    }
    else
    {
        echo 'Invalid Token';
    }
}


function resend_email($data)
{
    include("dbconnection.php");

    $randomToken = generateRandomString(5);

    $msg = '<p> Here is your new code. This code will expire in 5 minutes. </p>';
    $msg .= '<p> <b> Code: ' . $randomToken . ' </b> </p>';

    $sendEmail = sendEmail($data, 'Resend Verification Code', $msg);

    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $sql = "UPDATE email_token SET token = '" . $randomToken . "', date_generated = NOW() WHERE email = '" . $data. "' AND type = 0 ORDER BY id DESC LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'Success' : 'Error EQ001: ' . $conn->error;
}


function delete_account($email)
{
    include("dbconnection.php");

    $sql = "DELETE FROM email_token WHERE email = '" . $email . "' AND type = 0";
    $query = $conn->query($sql);

    $sql = "SELECT id FROM account WHERE email = '" . $email . "'";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $id = $row['id'];

    $sql = "DELETE FROM account WHERE email = '" . $email . "'";
    $query = $conn->query($sql);

    $sql = "DELETE FROM user_info WHERE account_id = '" . $id . "'";
    $query = $conn->query($sql);
}


function forgot_password($email)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM account WHERE email = '" . $email . "'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_name = $row['user_name'];

        $randomToken = generateRandomString(5);

        $msg = '<p> Hello ' . $user_name . ', </p> ';
        $msg .= '<p> Here is your password reset code. </p>';
        $msg .= '<p> <b> Code: ' . $randomToken . ' </b> </p>';

        $sendEmail = sendEmail($email, 'Password Reset Code', $msg);

        if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

        $sql = "INSERT INTO email_token (user_id, email, token, date_generated, type) VALUES ('$id', '$email', '" . $randomToken . "', NOW(), 1)";
        $query = $conn->query($sql);

        return ($query) ? 'Success' : 'Error EQ001: ' . $conn->error;
    }
    else
    {
        echo 'Email Not Found';
    }
}


function password_reset($data)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM account WHERE email = '" . $data['email'] . "' LIMIT 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_name = $row['user_name'];

        $sql = "SELECT * FROM email_token WHERE email = '" . $data['email'] . "' AND token = '" . $data['code'] . "' AND type = 1 ORDER BY id DESC LIMIT 1";
        $query = $conn->query($sql);

        if ($query->num_rows > 0)
        {
            $sql = "UPDATE email_token SET date_verified = NOW() WHERE user_id = '" . $id . "' AND token = '" . $data['code'] . "' AND type = 1 LIMIT 1";
            $query = $conn->query($sql);

            $sql = "UPDATE account SET password = '" . $data['newPassword'] . "' WHERE id = '" . $id . "' LIMIT 1";
            $query = $conn->query($sql);

            if ($query)
            {
                $msg = '<p> Hello ' . $user_name . ', </p> ';
                $msg .= '<p> Your password has been reset. </p>';
                $msg .= '<p> If you did not request a password reset, please contact us immediately. </p>';

                $sendEmail = sendEmail($data['email'], 'Password Reset Notification', $msg);

                if ($sendEmail != "Success") return 'Error: ' . $sendEmail;


                echo 'Success';
            }
            else
            {
                echo 'Error EQ002: ' . $conn->error;
            }
        }
        else
        {
            echo 'Invalid Token';
        }
    }
    else
    {
        echo 'User Not Found';
    }
}


function change_password($old, $new)
{
    include("dbconnection.php");

    session_start();

    $sql = "SELECT id FROM account WHERE id = '" . $_SESSION['id'] . "' AND password = '" . $old . "' LIMIT 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        if ($old == $new)
        {
            echo 'New Password must be different from the Old Password';
            return;
        }

        $sql = "UPDATE account SET password = '" . $new . "' WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
        $query = $conn->query($sql);

        return ($query) ? 'Success' : 'Error EQ002: ' . $conn->error;
    }
    else
    {
        echo 'Invalid Password';
    }
}


function update_profile($data)
{
    include("dbconnection.php");

    session_start();

    $id = $_SESSION['id'];
    $fileLocation = "assets/img/uploads/profileImg/";
    $fileLocationQuery = "../assets/img/uploads/profileImg/";

    $sql = "UPDATE account SET email = '" . $data['email'] . "' WHERE id = '" . $id . "' LIMIT 1";
    $query = $conn->query($sql);


    $sql = "UPDATE user_info SET first_name = '" . $data['firstName'] . "', middle_name = '" . $data['middleName'] . "', last_name = '" . $data['lastName'] . "',
            address_line = '" . $data['addressLine'] . "', barangay = '" . $data['barangay'] . "', municipality = '" . $data['municipality'] . "',
            province = '" . $data['province'] . "', zip_code = '" . $data['zipCode'] . "', contact_number = '" . $data['contactNo'] . "'";

    if ($data['file'] != "")
    {
        // $files = $data['file'];
        // $fileName = $files['name'];


        // if ($fileName != "")
        // {
        //     $fileTmpName = $files['tmp_name'];


        //     $fileExt = explode('.', $fileName);
        //     $fileActualExt = strtolower(end($fileExt));


        //     $allowed = array('jpg', 'jpeg', 'png');


        //     if (in_array($fileActualExt, $allowed))
        //     {
        //         $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        //         $fileDestination = $fileLocation . $fileNameNew;
        //         $fileDestinationQuery = $fileLocationQuery . $fileNameNew;
        //         move_uploaded_file($fileTmpName, $fileDestinationQuery);


        //         $sql .= ", profile_img = '" . $fileDestination . "'";
        //     }
        // }

        $profileImg = upload_file($data['file'], $fileLocation, $fileLocationQuery, $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);

        if ($profileImg == 'Invalid File Type')
        {
            return 'Invalid File Type';
        }

        if ($profileImg['success'] == false)
        {
            return 'Error: ' . $profileImg['error'];
        }

        $img = $profileImg['path'];

        $sql .= ", profile_img = '" . $img . "'";
    }

    $sql .= " WHERE account_id = '" . $id . "' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'Success' : 'Error EQ002: ' . $conn->error;
}



