<?php

include("validationModel.php");
include("functionModel.php");

function userLogin($user_name, $password, $type)
{
    include("dbconnection.php");

    // Checks if Account Exists
    $sql = "SELECT * FROM account WHERE user_name = '" . $user_name . "' LIMIT 1";
    $query = $conn->query($sql) or die("Error LQ001: " . $conn->error);

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $email = $row['email'];
        $access_level = $row['access_level'];
        $account_status = $row['account_status'];
        $account_type = $row['account_type'];
        $oldPw = $row['password'];

        // if an admin tries to login in login.php, an error will show because admins can only login at login_admin.php
        if ($type == 1 && $account_type > 1)
        {
            return 'Access Denied!';
        }
        else if ($type == 2 && $account_type <= 1)
        {
            return 'Access Denied!';
        }

        if ($account_status == 0)
        {
            return 'Account not yet verified or already deactivated.';
        }
        else if ($account_status == 4)
        {
            return 'Your account has been deleted. Please contact the administrator for more information.';
        }
        else if ($account_status == 5)
        {
            return '5';
        }

        if ($account_type == 0)
        {
            if ($password != $oldPw)
            {
                return 'Incorrect Password!';
            }
        }
        else
        {
            $checkPw = verifyHashPW($password, $oldPw);

            if (!$checkPw) return 'Incorrect Password!';
        }

        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['access_level'] = $access_level;
        $_SESSION['account_type'] = $account_type;
        $_SESSION['name'] = getUserNameFromId($id);

        if ($account_type > 1)
        {
            $sql = "SELECT scholarType FROM scholarship_application WHERE userId = '" . $id . "'";
            $query = $conn->query($sql) or die("Error LQ002: " . $conn->error);

            $scholarApp = "";

            if ($query->num_rows > 0) 
            {
                $row = $query->fetch_assoc();
                extract($row);

                $scholarApp = $scholarType;

                $_SESSION['scholarType'] = $scholarApp;
            }
        }

        return 'Success';
        
    } 
    else 
    {
        return 'Account does not exist';
    }
}

function user_sign_out()
{
    session_start();

    if (isset($_SESSION['id'])) 
    {
        $account_type = $_SESSION['account_type'];
        // unset($_SESSION['id']);
        // unset($_SESSION['account_type']);
        // unset($_SESSION['name']);
        session_unset();
        session_destroy();
        if ($account_type >= 2) 
        {
            return 'login.php';
        } 
        else if ($account_type <= 1) 
        {
            return 'login_admin.php';
        }
    }

    return 'No Session Found';
}

function changeAdminPassword($data)
{
    include("dbconnection.php");

    $userName = $data['user_name'];
    $password = $data['password'];

    $sql = "SELECT password, account_type FROM account WHERE user_name LIKE '" . $userName . "' AND account_status = 5 LIMIT 1";
    $query = $conn->query($sql) or die("Error LQ001: " . $conn->error);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();
        $oldPw = $row['password'];
        $account_type = $row['account_type'];

        if ($oldPw == $password)
        {
            return 'New password must be different from the old password.';
        }
        else
        {
            $hashedPassword = ($account_type == 0) ? $password : hashPassword($password);
            $sql = "UPDATE account SET password = '" . $hashedPassword . "', account_status = '1' WHERE user_name = '" . $userName . "' AND account_status = 5 LIMIT 1";
            $query = $conn->query($sql) or die("Error LQ002: " . $conn->error);

            if ($query)
            {
                return 'Success';
            }
            else
            {
                return 'Error LQ003: ' . $conn->error;
            }
        }
    }
    else
    {
        return 'Invalid Username';
    }

}

function registerAccount($data)
{
    include("dbconnection.php");

    $randomString = generateRandomString(5);
    $acadYear = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();


    $emailCheck = [
        'table'     => 'account',
        'column'    => 'email',
        'value'     => $data['email'],
    ];


    // $userCheck = [
    //     'table'     => 'account',
    //     'column'    => 'user_name',
    //     'value'     => $data['username'],
    // ];

    $emailCount = check_exist($emailCheck);
    // $userCount = check_exist($userCheck);

    if ($emailCount > 0) 
    {
        return 'Email Already Exist';
    } 
    // else if ($userCount > 0) 
    // {
    //     return 'Username Already Exist';
    // }

    do {
        $eacNumber = generateEacNumber();
        $eacCheck = [
            'table'     => 'user_info',
            'column'    => 'eac_number',
            'value'     => $eacNumber,
        ];

        $eaCount = check_exist($eacCheck);
    } while ($eaCount > 0);

    $website_header = get_website_info(0)['header'];

    $msg = '<p> Hello ' . $data['firstName'] . ' ' . $data['lastName'] . ', </p> ';
    $msg .= '<p> Your account has been created. </p>';
    $msg .= '<p> Here is your unique EAC Number which you will use to login to the system. </p>';
    $msg .= '<p> <b> EAC Number: ' . $eacNumber . ' </b> </p>';
    $msg .= '<p> Here is your verification code. This code will expire in 5 minutes. </p>';
    $msg .= '<p> <b> Code: ' . $randomString . ' </b> </p>';
    $msg .= '<p>This is a system generated email. Please do not reply.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>' .$website_header . '</p>';

    $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "1" : '3';

    $sendEmail = sendEmail($data['email'], 'Account Verification', $msg, $emailType);

    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $notifiedUsers = get_notif_type(1);

    $notifData = [
        'user_id'       => get_user_id_notification($notifiedUsers),
        'notif_type'    => 1,
        'notif_body'    => $data['firstName'] . ' ' . $data['lastName'] . ' has registered an account.',
        'notif_link'    => '?nav=manage_account_student',
    ];

    $notif = insert_notification($notifData);

    if ($notif !== 'success') return 'Error: ' . $notif;

    $sql = "INSERT INTO account (user_name, password, email, account_type, access_level) VALUES ('" . $eacNumber . "', '" . hashPassword($data['password']) . "', '" . $data['email'] . "', 3, 0)";
    $query = mysqli_query($conn, $sql) or die("Error RQ001: " . mysqli_error($conn));

    if ($query) 
    {
        $last_id = mysqli_insert_id($conn);

        if ($data['fbImg'] != "") 
        {
            $fbImg = upload_file($data['fbImg'], 'assets/img/uploads/fbProfile/', '../assets/img/uploads/fbProfile/', $options = [
                'type' => ['jpg', 'jpeg', 'png'],
            ]);

            if ($fbImg == 'Invalid File Type') {
                return 'Invalid File Type';
            }

            if ($fbImg['success'] == false) {
                return 'Error: ' . $fbImg['error'];
            }

            $img = $fbImg['path'];
        }

        $yearData = insert_acad_year_data($last_id); if ($yearData != 'success') return 'Registrants Acad Year Error : ' . $yearData;

        $sql = "INSERT INTO user_info (account_id, eac_number, first_name, middle_name, last_name, suffix, birth_date, birth_place, address_line, barangay, municipality, province, region, religion, gender, civil_status, contact_number, zip_code, citizenship, years_of_residency, language, fbName, fbUrl, fbImage)
        VALUES ('$last_id', '$eacNumber', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[birthdate]', '$data[birthPlace]', '$data[address]', '$data[barangay]', '$data[city]', '$data[province]', '$data[region]', '$data[religion]', '$data[gender]', '$data[civilStatus]', '$data[contactNo]', '$data[zipCode]', '$data[citizenship]', '$data[years]', '$data[language]', '$data[fbName]', '$data[fbUrl]', '$img')";
        $query = mysqli_query($conn, $sql) or die("Error RQ002: " . mysqli_error($conn));

        if ($query) 
        {
            $sql = "INSERT INTO email_token (user_id, email, token, date_generated, type) VALUES ('$last_id', '$data[email]', '" . $randomString . "', NOW(), 0)";
            $query = mysqli_query($conn, $sql) or die("Error RQ003: " . mysqli_error($conn));

            if ($query) 
            {
                $sql = "INSERT INTO scholarship_application (ay_id, sem_id, userId, scholarType, account_type, dateApplied, status, current_active) VALUES ('$acadYear', '$semId', '$last_id', '$data[scholarType]', '3', NOW(), 0, 'info_flag')";
                $query = mysqli_query($conn, $sql) or die("Error RQ004: " . mysqli_error($conn));

                if ($query) 
                {
                    echo 'Success';
                } 
                else 
                {
                    echo 'Error RQ005: ' . mysqli_error($conn);
                }
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

function email_confirmation($data)
{
    include("dbconnection.php");

    $sql = "SELECT id, user_id, date_generated, token FROM email_token WHERE email = '" . $data['email'] . "' ORDER BY date_generated DESC LIMIT 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_id = $row['user_id'];
        $date_generated = $row['date_generated'];
        $token = $row['token'];

        // add 5 minutes to date_generated
        $date_countdown = date("Y-m-d H:i:s", strtotime('+5 minutes', strtotime($date_generated)));

        $timeLeft = getDateTimeDiff($date_generated, $date_countdown, 'seconds');

        if ($timeLeft <= 0) 
        {
            return 'Error EQ003: Token Expired';
        }
        else if ($data['code'] != $token) 
        {
            return 'Invalid Token';
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
    $website_header = get_website_info(0)['header'];

    $msg = '<p> Here is your new code. This code will expire in 5 minutes. </p>';
    $msg .= '<p> <b> Code: ' . $randomToken . ' </b> </p>';
    $msg .= '<p>This is a system generated email. Please do not reply.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>' .$website_header . '</p>';

    $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "1" : '3';

    $sendEmail = sendEmail($data, 'Resend Verification Code', $msg, $emailType);

    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $sql = "UPDATE email_token SET token = '" . $randomToken . "', date_generated = NOW() WHERE email = '" . $data . "' AND type = 0 ORDER BY date_generated DESC LIMIT 1";
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

function forgot_password($email, $type)
{
    include("dbconnection.php");

    $exists = check_exist(['table' => 'account', 'column' => 'email', 'value' => $email]);
    if ($exists == 0) return 'Email does not exist!';

    $sql = "SELECT * FROM account WHERE email = '" . $email . "'";
    $sql .= ($type == 0) ? " AND account_status = 0" : '';
    $query = $conn->query($sql);

    $text = ($type == 0) ? 'Verification Code' : 'Password Reset Code';

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $user_name = $row['user_name'];

        $randomToken = generateRandomString(5);
        $website_header = get_website_info(0)['header'];

        $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "1" : '3';

        $msg = '<p> Hello ' . $user_name . ', </p> ';
        $msg .= '<p> Here is your ' . strtolower($text) . '. </p>';
        $msg .= '<p> <b> Code: ' . $randomToken . ' </b> </p>';
        $msg .= '<p>This is a system generated email. Please do not reply.</p>';
        $msg .= '<p>Thank you! <br></p>';
        $msg .= '<p>Best regards,</p>';
        $msg .= '<p>' .$website_header . '</p>';

        $sendEmail = sendEmail($email, $text, $msg, $emailType);

        if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

        $sql = "INSERT INTO email_token (user_id, email, token, date_generated, type) VALUES ('$id', '$email', '" . $randomToken . "', NOW(), '$type')";
        $query = $conn->query($sql);

        return ($query) ? 'Success' : 'Error EQ001: ' . $conn->error;
    } 
    else 
    {
        echo ($type == 0) ? 'Email Already Verified' : 'Email Not Found';
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

        $newPassword = hashPassword($data['newPassword']);

        $sql = "SELECT * FROM email_token WHERE email = '" . $data['email'] . "' AND token = '" . $data['code'] . "' AND type = 1 ORDER BY id DESC LIMIT 1";
        $query = $conn->query($sql);

        if ($query->num_rows > 0) 
        {
            $sql = "UPDATE email_token SET date_verified = NOW() WHERE user_id = '" . $id . "' AND token = '" . $data['code'] . "' AND type = 1 LIMIT 1";
            $query = $conn->query($sql);

            $sql = "UPDATE account SET password = '" . $newPassword . "' WHERE id = '" . $id . "' LIMIT 1";
            $query = $conn->query($sql);

            if ($query) 
            {
                $website_header = get_website_info(0)['header'];

                $msg = '<p> Hello ' . $user_name . ', </p> ';
                $msg .= '<p> Your password has been reset. </p>';
                $msg .= '<p> If you did not request a password reset, please contact us immediately. </p>';
                $msg .= '<p>This is a system generated email. Please do not reply.</p>';
                $msg .= '<p>Thank you! <br></p>';
                $msg .= '<p>Best regards,</p>';
                $msg .= '<p>' .$website_header . '</p>';

                $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "1" : '3';

                $sendEmail = sendEmail($data['email'], 'Password Reset Notification', $msg, $emailType);

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


function change_password($old, $new, $type = 0)
{
    include("dbconnection.php");

    session_start();

    $sql = ($type == 0) ? "SELECT id, account_type FROM account WHERE id = '" . $_SESSION['id'] . "' AND password = '" . $old . "' LIMIT 1" : "SELECT id, password, account_type FROM account WHERE id = '" . $_SESSION['id'] . "' LIMIT 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();
        $accountType = $row['account_type'];

        if ($accountType < 2)
        {
            if ($old == $new) 
            {
                echo 'New Password must be different from the Old Password 1';
                return;
            }
        }
        else
        {
            if (verifyHashPW($old, $row['password']) == false)
            {
                echo 'New Password must be different from the Old Password 2';
                return;
            }

            $new = hashPassword($new);
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
    $fileLocation = "assets/img/uploads/fbProfile/";
    $fileLocationQuery = "../assets/img/uploads/fbProfile/";

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


        //         $sql .= ", fbImage = '" . $fileDestination . "'";
        //     }
        // }

        $profileImg = upload_file($data['file'], $fileLocation, $fileLocationQuery, $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);

        if ($profileImg == 'Invalid File Type') return 'Invalid File Type';

        if ($profileImg['success'] == false) return 'Error: ' . $profileImg['error'];

        $img = $profileImg['path'];

        $sql .= ", fbImage = '" . $img . "'";
    }

    $sql .= " WHERE account_id = '" . $id . "' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'Success' : 'Error File Upload: ' . $conn->error;
}

function updateContactInfo($data)
{
    include("dbconnection.php");

    $status = update_status(1, $data['userId']);
    if (!$status) return 'Update Status Error: ' . $status;

    $sql = "UPDATE user_info SET contact_number = '" . $data['contactNo'] . "' WHERE account_id = '" . $data['userId'] . "' LIMIT 1";
    $query = $conn->query($sql);

    if ($query) 
    {
        $sql = "UPDATE account SET email = '" . $data['email'] . "' WHERE id = '" . $data['userId'] . "' LIMIT 1";
        $query = $conn->query($sql);

        return ($query) ? 'success' : 'Error Account Information: ' . $conn->error;
    } 
    else 
    {
        return 'Error User Information: ' . $conn->error;
    }
}

function updateAddInfo($data)
{
    $status = update_status(4, $data['userId']);
    if (!$status) return 'Update Status Error: ' . $status;

    $genInfo = updateGenInfo($data, 0, $data['userId']);
    if ($genInfo != 'success') return 'Update General Information Error for Addition Info: ' . $genInfo;

    return 'success';
}

function updateGenInfo($data, $type = 0, $userId = "")
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    if ($type == 0) // Additional Information
    {
        $sql = "UPDATE gen_info SET working_flag = '$data[working_flag]', ofw_flag = '$data[ofw_flag]', other_ofw = '$data[other_ofw]',
            pwd_flag = '$data[pwd_flag]', other_pwd = '$data[other_pwd]', status_flag = '$data[status_flag]', self_pwd_flag = '$data[self_pwd_flag]'
            WHERE user_id = '" . $data['userId'] . "' AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
    } 
    else if ($type == 1) // Education
    {
        $exists = check_exist_multiple(['table' => 'gen_info', 'column' => ['user_id' => ['=', $userId], 'ay_id' => ['=', $acadYear], 'sem_id' => ['=', $defaultYear]]]);
        $graduating_flag = ($data['graduating_flag'] == '0') ? 0 : 1;
        $graduation_year = ($data['graduating_flag'] == '1') ? "" : $data['graduation_year'];
        $honor_flag = ($data['honor_flag'] == '0') ? 0 : 1;
        $honor_type = ($data['honor_type'] == '') ? 4 : $data['honor_type'];
        $other_honor = ($data['other_honor'] == '') ? "" : $data['other_honor'];
        // $gwa = ($data['gwa'] == '') ? '' : $data['gwa'];

        if ($exists == 0) 
        {
            $sql = "INSERT INTO gen_info (user_id, ay_id, sem_id, graduating_flag, honor_flag, honor_type, other_honor, graduation_year) VALUES
                ('$userId', '$acadYear', '$defaultYear', '$graduating_flag', '$honor_flag', '$honor_type', '$other_honor', '$graduation_year')";
        } 
        else 
        {
            $sql = "UPDATE gen_info SET graduating_flag = '$graduating_flag', honor_flag = '$honor_flag', honor_type = '$honor_type',
                other_honor = '$other_honor', graduation_year = '$graduation_year' WHERE user_id = '$userId' AND ay_id = '$acadYear'
                AND sem_id = '$defaultYear' LIMIT 1";
        }
    } 
    else if ($type == 2) // Family
    {
        $family_flag = ($data['family_flag'] == '0') ? 0 : 1;
        $total_num = ($data['total_num'] == '') ? 0 : $data['total_num'];
        $birth_order = ($data['birth_order'] == '') ? 0 : $data['birth_order'];
        $source = ($data['source'] == '') ? 0 : $data['source'];
        $rent_flag = ($data['rent_flag'] == '0') ? 0 : 1;
        $monthly_payment = ($data['monthly_payment'] == '') ? 0 : $data['monthly_payment'];

        $sql = "UPDATE gen_info SET family_flag = '$family_flag', total_num = '$total_num', birth_order = '$birth_order', source = '$source',
            rent_flag = '$rent_flag', monthly_payment = '$monthly_payment' WHERE user_id = '$userId' AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
    }

    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error General Information: ' . $conn->error; $conn->rollback();
}

function updateEducationalInfo($data)
{
    $status = update_status(2, $data['userId']);
    if (!$status) return 'Update Status Error: ' . $status;
    $genInfo = updateGenInfo($data['other_info'], 1, $data['userId']);
    if ($genInfo != 'success') return 'Update General Information Error for Education: ' . $genInfo;

    // $college = $jhs = $shs = $elem = '';

    $collegeAwards = (!isset($data['college']['collegeAwards'])) ? [] : $data['college']['collegeAwards'];
    $shsAwards = (!isset($data['shs']['shsAwards'])) ? [] : $data['shs']['shsAwards'];
    $jhsAwards = (!isset($data['jhs']['jhsAwards'])) ? [] : $data['jhs']['jhsAwards'];
    $elemAwards = (!isset($data['elem']['elemAwards'])) ? [] : $data['elem']['elemAwards'];

    if ($data['college']['gwa'] != null)
    {
        if ($data['college'] != null) $college = updateSchool($data['college'], $data['userId'], $collegeAwards, 0);
        if ($college != 'success') return 'Update College Error: ' . $college;
    }

    if ($data['shs'] != null) $shs = updateSchool($data['shs'], $data['userId'], $shsAwards, 1);
    if ($shs != 'success') return 'Update SHS Error: ' . $shs;
    if ($data['jhs'] != null) $jhs = updateSchool($data['jhs'], $data['userId'], $jhsAwards, 2);
    if ($jhs != 'success') return 'Update JHS Error: ' . $jhs;
    if ($data['elem'] != null) $elem = updateSchool($data['elem'], $data['userId'], $elemAwards, 3);
    if ($elem != 'success') return 'Update Elem Error: ' . $elem;

    return 'success';
}

function updateSchool($data, $userId, $awards = [], $type)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $exists = 0;

    if ($data['educ_id'] != "") $exists = check_exist_multiple(['table' => 'education', 'column' => ['educ_id' => ['=', $data['educ_id']], 'ay_id' => ['=', $acadYear], 'sem_id' => ['=', $defaultYear]]]);
    // $exists = check_exist(['table' => 'education', 'column' => 'educ_id', 'value' => $data['educ_id']]);
    $course = ($data['courseText'] == "Others") ? $data['otherCourse'] : $data['course'];
    $major = $data['major'];
    $school = ($data['school'] == "Others") ? $data['otherSchool'] : $data['school'];
    $school_address = $data['school_address'];
    $year_level = $data['year_level'];
    $educ_id = $data['educ_id'];
    $gwa = $data['gwa'];

    if ($exists == 0) 
    {
        $sql = "INSERT INTO education (user_id, ay_id, sem_id, school, year_level, course, major, school_address, education_level, gwa)
        VALUES ('$userId', '$acadYear', '$defaultYear', '$school', '$year_level', '$course', '$major', '$school_address', '$type', '$gwa')";
    } 
    else 
    {
        $sql = "UPDATE education SET school = '$school', year_level = '$year_level', course = '$course', major = '$major',
            school_address = '$school_address', education_level = '$type', gwa = '$gwa' WHERE user_id = '$userId' AND educ_id = '$educ_id'
            AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
    }

    $query = $conn->query($sql);

    if ($exists == 0) $educ_id = $conn->insert_id;

    if ($query)
    {
        return updateAwards($awards, $data['educ_id']);
    }
    else
    {
        return 'Error Educational Information: ' . $conn->error;
        $conn->rollback();
    }
}

function updateAwards($data, $educId)
{
    include("dbconnection.php");

    // select all awards

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "SELECT id FROM user_awards WHERE school_id = '$educId' AND ay_id = '$acadYear' AND sem_id = '$defaultYear'";
    $query = $conn->query($sql);

    $dataArr = $deleteArr = [];

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $dataArr[] = $row['id'];
        }
    }

    if ($dataArr != null) 
    {
        foreach ($dataArr as $awardId) 
        {
            $awardArr = array_column($data, 'awardId');
            if (!in_array($awardId, $awardArr)) 
            {
                $deleteArr[] = $awardId;
            }
        }
    }

    if ($deleteArr != null) 
    {
        $sql = "DELETE FROM user_awards WHERE id IN (" . implode(',', $deleteArr) . ")";
        $query = $conn->query($sql);
    }
        
    if ($data != null) 
    {
        foreach ($data as $award) 
        {
            $awardId = $award['awardId'];
            $honor = $award['honor'];
            $acadsYear = $award['acadYear'];
            $sem = $award['sem'];
            $yearLevel = $award['yearLevel'];

            $exists = 0;

            if ($awardId != "") $exists = check_exist_multiple(['table' => 'user_awards', 'column' => ['id' => ['=', $awardId], 'ay_id' => ['=', $acadYear], 'sem_id' => ['=', $defaultYear]]]);
            // $exists = check_exist(['table' => 'user_awards', 'column' => 'id', 'value' => $awardId]);

            if ($exists == 0) 
            {
                $sql = "INSERT INTO user_awards (school_id, ay_id, sem_id, acad_year, honor, sem, year_level) VALUES
                    ('$educId', '$acadYear', '$defaultYear', '$acadsYear', '$honor', '$sem', '$yearLevel')";
            } 
            else 
            {
                $sql = "UPDATE user_awards SET acad_year = '$acadsYear', honor = '$honor', sem = '$sem', year_level = '$yearLevel'
                    WHERE id = '$awardId' AND school_id = '$educId' AND ay_id = '$acadYear' AND sem_id = '$defaultYear'";
            }

            $query = $conn->query($sql);
        }

        return ($query) ? 'success' : 'Error Awards: ' . $conn->error;
        $conn->rollback();
    } 
    else 
    {
        return 'success';
    }
}

function updateFamilyInfo($data)
{
    $status = update_status(3, $data['userId']);
    if (!$status) return 'Update Status Error: ' . $status;
    $genInfo = updateGenInfo($data['otherInfoArr'], 2, $data['userId']);
    if ($genInfo != 'success') return 'Update General Information Error for Family: ' . $genInfo;

    $father = $mother = $spouse = $siblings = $guardian = 'success';

    if ($data['fatherArr'] != null) $father = updateFamily($data['fatherArr'], 0, $data['userId']);
    if ($father != 'success') return 'Update Family Father Error: ' . $father;
    if ($data['motherArr'] != null) $mother = updateFamily($data['motherArr'], 1, $data['userId']);
    if ($mother != 'success') return 'Update Family Mother Error: ' . $mother;
    if ($data['spouseArr']['firstName'] != '') $spouse = updateFamily($data['spouseArr'], 2, $data['userId']);
    if ($spouse != 'success') return 'Update Family Spouse Error: ' . $spouse;
    if ($data['siblings'] != null) $siblings = updateFamily($data['siblings'], 3, $data['userId']);
    if ($siblings != 'success') return 'Update Family Sibling Error: ' . $siblings;
    if ($data['guardianArr']['firstName'] != '') $guardian = updateFamily($data['guardianArr'], 4, $data['userId']);
    if ($guardian != 'success') return 'Update Family Guardian Error: ' . $guardian;

    return 'success';
}

function updateFamily($data, $type, $userId)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    if ($type == 3) // Sibling
    {
        foreach ($data as $fam) 
        {
            $id = $fam['id'];
            $nameArr = explode('/', $fam['name']);
            $relationship = $fam['relationship'];
            $birth_order = $fam['birthOrder'];
            $age = $fam['age'];
            $occupation = $fam['occupation'];
            $firstName = $nameArr[1];
            $middleName = $nameArr[2];
            $lastName = $nameArr[0];

            $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => ['=', $userId], 'id' => ['=', $id], 'ay_id' => ['=', $acadYear], 'sem_id' => ['=', $defaultYear]]]);
            // $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => ['=', $userId], 'id' => ['=', $id]]]);

            if ($exists > 0) 
            {
                $sql = "UPDATE user_family SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', age = '$age', occupation = '$occupation',
                        relationship = '$relationship', birth_order = '$birth_order' WHERE user_id = '$userId' AND id = '$id' AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
            } 
            else 
            {
                $sql = "INSERT INTO user_family (user_id, ay_id, sem_id, firstName, middleName, lastName, age, occupation, relationship, fam_type, birth_order)
                        VALUES ('$userId', '$acadYear', '$defaultYear', '$firstName', '$middleName', '$lastName', '$age', '$occupation', '$relationship', '$type', '$birth_order')";
            }

            $query = $conn->query($sql);
        }

        return ($query) ? 'success' : 'Error Sibling Insertion: ' . $conn->error;
        $conn->rollback();
    } 
    else 
    {
        $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => ['=', $userId], 'fam_type' => ['=', $type], 'ay_id' => ['=', $acadYear], 'sem_id' => ['=', $defaultYear]]]);
        // $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => ['=', $userId], 'fam_type' => ['=', $type]]]);
        $occupation = ($data['occupation'] == "others") ? $data['otherOccupation'] : $data['occupation'];

        if ($exists > 0) 
        {
            $sql = "UPDATE user_family SET firstName = '$data[firstName]', middleName = '$data[middleName]', lastName = '$data[lastName]', suffix = '$data[suffix]', age = '$data[age]',
                    birth_date = '$data[birthday]', birth_place = '$data[birthplace]', contact_number = '$data[contact]', living_flag = '$data[living]', occupation = '$occupation',
                    company_name = '$data[company]', company_address = '$data[companyAddress]', income_flag = '$data[income]', attainment_flag = '$data[education]', relationship = '$data[relationship]'
                    WHERE user_id = '$userId' AND fam_type = '$type' AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
        } 
        else 
        {
            $sql = "INSERT INTO user_family (user_id, ay_id, sem_id, fam_type, firstName, middleName, lastName, suffix, age, birth_date, birth_place, contact_number, living_flag, occupation, company_name, company_address, income_flag, attainment_flag, relationship) VALUES
                    ('$userId', '$acadYear', '$defaultYear', '$type', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[age]', '$data[birthday]', '$data[birthplace]', '$data[contact]', '$data[living]', '$occupation', '$data[company]', '$data[companyAddress]', '$data[income]', '$data[education]', '$data[relationship]')";
        }

        $query = $conn->query($sql);

        return ($query) ? 'success' : 'Error Family Insertion: ' . $conn->error;
        $conn->rollback();
    }
}

function getAccountInfo($id, $type = 0)
{
    switch ($type) 
    {
        case 0:
            return get_school_address($id);
            break;

        case 1:
            break;
    }
}

function check_application_data($id)
{
    include("dbconnection.php");

    $stat = check_status($id);
    $info_flag = $stat['info_flag'];
    if ($info_flag == 0) return "Please complete your personal information.";
    $educ_flag = $stat['educ_flag'];
    if ($educ_flag == 0) return "Please complete your educational background.";
    $family_flag = $stat['family_flag'];
    if ($family_flag == 0) return "Please complete your family background.";
    $add_flag = $stat['add_flag'];
    if ($add_flag == 0) return "Please complete your other general information.";
    $req_flag = $stat['req_flag'];
    if ($req_flag == 0) return "Please complete your requirements.";

    return "success";
}

function submitApplication($id)
{
    include("dbconnection.php");

    if ($id == "") session_start(); $id = $_SESSION['id'];

    $res = check_application_data($id);
    if ($res != "success") return $res;

    $sql = "SELECT email FROM account WHERE id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $email = $row['email'];

    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name FROM user_info WHERE account_id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    $rows = $query->fetch_assoc();
    $name = $rows['name'];

    $adminEmail = [
        'table' => 'account',
        'return' => 'email',
        'column' => [
            'account_type' => ['IN', '(0, 1)'],
        ]
    ];

    $adEmail = check_exist_multiple($adminEmail, 1);
    if (!is_array($adEmail)) return 'Error Admin Email: ' . $adEmail;

    $website_header = get_website_info(0)['header'];

    $msg = '<p>Hi ' . $name . ',<br></p>';
    $msg .= '<p>Your scholarship application has been submitted. You will be notified once your application has been reviewed.</p>';
    $msg .= '<p>This is a system generated email. Please do not reply.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>' .$website_header . '</p>';

    $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "2" : '4';

    $sendEmail = sendEmail($email, $name . ' - Scholarship Application Submission', $msg, $emailType, $adEmail);
    if ($sendEmail != "Success") return 'Error Sending Email: ' . $sendEmail;

    $notifiedUsers = get_notif_type(2);

    $notifData = [
        'user_id'       => get_user_id_notification($notifiedUsers),
        'notif_type'    => 2,
        'notif_body'    => $name . ' has submitted a scholarship application.',
        'notif_link'    => '?nav=new-applicants&applicationId=' . $id,
    ];

    $notif = insert_notification($notifData);
    if ($notif !== 'success') return 'Error Admin Notification: ' . $notif;

    $notifUserData = [
        'user_id'       => $id,
        'notif_type'    => 12,
        'notif_body'    => 'You have successfully submitted your scholarship application. You will be notified once your application has been reviewed.',
        'notif_link'    => '?nav=dashboard',
    ];

    $notif = insert_notification($notifUserData);
    if ($notif !== 'success') return 'Error User Notification: ' . $notif;

    $app = updateApplication(0, $id);
    if ($app != "success") return $app;

    return "success";
}

function changePFP($data)
{
    include("dbconnection.php");

    session_start();

    $fbImg = $data['image'];
    $userId = $_SESSION['id'];

    $exists = check_exist_multiple(['table' => 'user_info', 'column' => ['account_id' => ['=', $userId]]], 1);
    $oldImg = $exists[0]['fbImage'];

    if ($fbImg != null) 
    {
        if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);

        $uploadImg = upload_file($fbImg, 'assets/img/uploads/fbProfile/', '../assets/img/uploads/fbProfile/', $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);

        if ($uploadImg == 'Invalid File Type') 
        {
            return 'Invalid File Type';
        }

        if ($uploadImg['success'] == false) 
        {
            return 'Error: ' . $uploadImg['error'];
        }

        $img = $uploadImg['path'];
    }

    $sql = "UPDATE user_info SET fbImage = '$img' WHERE account_id = '$userId' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}

function set_applicant_status($data)
{
    include("dbconnection.php");

    $id = $data['applicantId'];
    $decision = $data['decision'];
    $date = $data['date'];
    $endDate = $data['dateEnd'];
    $reason = $data['reason'];
    $decisionText = get_status_text($decision);
    $msgStatus = get_message_text_status($decision, $date, $endDate, $reason);
    $msgText = $msgStatus['text'];
    $msgType = $msgStatus['notifType'];

    $decision = ($decision == 6) ? 0 : $decision;

    $userInfo = get_user_info($id);
    $userData = get_user_data($id);
    $name = $userInfo['first_name'] . ' ' . $userInfo['last_name'];
    $email = $userData[2];

    $adminEmail = [
        'table' => 'account',
        'return' => 'email',
        'column' => [
            'account_type' => ['=', 1],
        ]
    ];

    $adminText = ($decision == 2 OR $decision == 3) ? $name . " is " . $decisionText : $decisionText;

    if ($decision == 4)
    {
        $adminText = $name . "\'s scholarship application has been approved.";
    }
    else if ($decision == 5)
    {
        $adminText = $name . "\'s scholarship application has been rejected.";
    }

    $adEmail = check_exist_multiple($adminEmail, 1);
    if (!is_array($adEmail)) return 'Error: ' . $adEmail;
    $website_header = get_website_info(0)['header'];

    $msg = '<p>Hi ' . $name . ',<br></p>';
    $msg .= $msgText;
    $msg .= '<p>This is a system generated email. Please do not reply.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>' .$website_header . '</p>';

    $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "2" : '4';

    $sendEmail = sendEmail($email, $name . ' - ' . $decisionText, $msg, $emailType, $adEmail);
    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $notifiedUsers = get_notif_type(2);

    $notifData = [
        // 'user_id'       => $id,
        'user_id'       => get_user_id_notification($notifiedUsers),
        'notif_type'    => $msgType,
        'notif_body'    => $adminText,
        'notif_link'    => '?nav=new-applicants&applicationId=' . $id,
    ];

    $notifAdmin = insert_notification($notifData);
    if ($notifAdmin !== 'success') return 'Error Admin Notification: ' . $notifAdmin;

    $notifUserData = [
        'user_id'       => $id,
        // 'user_id'       => get_user_id_notification($notifiedUsers),
        'notif_type'    => $msgType,
        'notif_body'    => $decisionText,
        'notif_link'    => '?nav=dashboard',
    ];

    $notifUser = insert_notification($notifUserData);
    if ($notifUser !== 'success') return 'Error User Notification: ' . $notifUser;

    $updateStatus = update_applicant_status($id, $decision, $date, $endDate, $reason);
    if ($updateStatus != 'success') return 'Error: ' . $updateStatus;

    if ($decision == 4)
    {
        $updateType = update_account_type($id, 2);
        if ($updateType != 'success') return 'Error: ' . $updateType;
    }

    return 'success';
}

function deleteUserRequest($data)
{
    include("dbconnection.php");
    
    session_start();
    
    $id = $data['id'];
    $reason = $data['reason'];
    $userId = $_SESSION['id'];
    $account_type = $_SESSION['account_type'];
    $name = $_SESSION['name'];

    $except = $col = [];

    if ($account_type == 0)
    {
        $except = [$userId];
        $col = ['account_type' => ['=', 0], 'id' => ['!=', $userId]];
    }
    else
    {
        $col = ['account_type' => ['=', 0]];
    }

    $applicantName = getUserNameFromId($id);
    $requesterName = getUserNameFromId($userId);
    $requesterEmail = (array)get_user_data($userId)[2];

    $adminEmail = [
        'table' => 'account',
        'return' => 'email',
        'column' => $col
    ];

    $adEmail = check_exist_multiple($adminEmail, 1);
    if (!is_array($adEmail)) return 'Error: ' . $adEmail;
    $website_header = get_website_info(0)['header'];

    $table = '<table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #dddddd; text-align: center; padding: 8px;" colspan=2>Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Requester Name</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $requesterName . '</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Applicant Name</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $applicantName . '</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Reason</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $reason . '</td>
                    </tr>
                </tbody>
            </table>';

    $msg = '<p>Hi approvers,<br></p>';
    $msg .= '<p>Below is the information for account deletion. Please review before proceeding with the action.</p><br>';
    $msg .= $table;
    $msg .= '<p>This is a system generated email. Please do not reply.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>' .$website_header . '</p>';

    $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "2" : '5';

    $sendEmail = sendEmail($adEmail, $applicantName . ' - Account Deletion', $msg, $emailType, $requesterEmail);
    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $sql = "INSERT INTO delete_account_form (userId, requestedBy, reason, date_inserted) VALUES ('$id', '$userId', '$reason', NOW())";
    $query = $conn->query($sql);

    $lastId = $conn->insert_id;

    if (!$query) return 'Error: ' . $conn->error;

    $notifData = [
        'user_id'       => get_user_id_notification([0], $except),
        'notif_type'    => 11,
        'notif_body'    => $requesterName . ' has submitted a deletion request.',
        'notif_link'    => '?nav=ntf_settings&id=' . $id . '&deleteFormId=' . $lastId,
    ];

    $notif = insert_notification($notifData);
    if ($notif !== 'success') return 'Error: ' . $notif;

    return 'success';
}

function addAdminAccount($data)
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
    $password  = generateRandomString(8);

    if ($emailCount > 0) 
    {
        return 'Email Already Exist';
    } 
    else if ($userCount > 0) 
    {
        return 'Username Already Exist';
    }

    $sql = "INSERT INTO `account`(`id`, `user_name`, `password`, `email`, `account_type`, `access_level`, `account_status`) 
            VALUES ('0', '{$data['username']}', '{$password}', '{$data['email']}', '{$data['accountType']}', '{$data['sAdminAccess']}', '5')";
            // -- VALUES ('0', '{$data['username']}', '{$password}', '{$data['email']}', '{$data['accountType']}', '{$data['sAdminAccess']}', '{$data['accountStatus']}')";
    $query = $conn->query($sql);

    $last_id = mysqli_insert_id($conn);

    $sql = "INSERT INTO user_info (account_id, eac_number, first_name, middle_name, last_name)
            VALUES ('$last_id', '', '$data[firstName]', '$data[middleName]', '$data[lastName]')";
    $query = mysqli_query($conn, $sql) or die("Error RQ002: " . mysqli_error($conn));

    if ($query) 
    {
        $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "1" : '5';
        $name = $data['firstName'] . ' ' . $data['lastName'];

        $website_header = get_website_info(0)['header'];

        $msg = '<p> Hello ' . $data['firstName'] . ' ' . $data['lastName'] . ', </p> ';
        $msg .= '<p> Your account has been created. Please use this password to navigate your account. </p>';
        $msg .= '<p> <b> Username: ' . $data['username'] . ' </b> </p>';
        $msg .= '<p> <b> Password: ' . $password . ' </b> </p>';
        $msg .= '<p> You are required to change your password upon login. </p>';
        $msg .= '<p>This is a system generated email. Please do not reply.</p>';
        $msg .= '<p>Thank you! <br></p>';
        $msg .= '<p>Best regards,</p>';
        $msg .= '<p>' .$website_header . '</p>';

        $sendEmail = sendEmail($data['email'], $name . ' - Account Created Successfully', $msg, $emailType);

        if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

        return "Insert Success";
    }
}

function editAccount($data)
{
    session_start();
    include("dbconnection.php");

    $session_name = $_SESSION['name'];

    $sql = "SELECT * FROM account WHERE id = '{$data['id']}'";
    $query_1 = $conn->query($sql) or die($conn->error);

    // die(var_dump($query));
    if ($query_1->num_rows <> 0) 
    {
        while ($row = $query_1->fetch_assoc()) 
        {
            extract($row);

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
            $password  = generateRandomString(8);

            if ($email <> $data['email'] && $emailCount > 0) 
            {
                return 'Email Already Exist';
            }
            if ($user_name <> $data['username'] && $userCount > 0) 
            {
                return 'Username Already Exist';
            }

            $sql = "UPDATE `account` SET `user_name`     = '{$data['username']}', 
                                         `email`         = '{$data['email']}',
                                         `account_type`  = '{$data['accountType']}',
                                         `access_level`  = '{$data['sAdminAccess']}',
                                         `account_status`= '{$data['accountStatus']}' 
                                    WHERE id = {$data['id']}";
            $query = $conn->query($sql);

            $last_id = mysqli_insert_id($conn);

            $account_type = ($data['accountType'] == 0) ? 'Super Admin' : (($data['accountType'] == 1) ? 'Admin' : (($data['accountType'] == 2) ? 'Beneficiary' : 'Applicant'));

            // if ($query) {
            //     $msg = '<p> Hello ' . $data['username'] . ', </p> ';
            //     $msg .= '<p> Your account credentials has been changed by ' . $session_name . '. If you did not request this changes, kindly report to the YDO Office. </p>';
            //     $msg .= '<p> <b> Username: '        . $data['username'] . ' </b> </p>';
            //     $msg .= '<p> <b> Email: '           . $data['email'] . ' </b> </p>';
            //     $msg .= '<p> <b> Account Type: '    . $data['accountType'] . ' </b> </p>';

            //     $sendEmail = sendEmail($data['email'], 'Account Created', $msg);

            //     if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

            //     return "Insert Success";
            // }
            return "Update Success";
        }
    }
}

function deleteAccount($data)
{
    include("dbconnection.php");

    $sql = "UPDATE account SET `account_status`= '4' 
            WHERE id = '{$data['id']}'";
    $query = $conn->query($sql) or die($conn->error);

    if($query)
    {
        return "Delete Success";
    }
}

function updateAdminAccount($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $userName = $data['userName'];
    $firstName = $data['firstName'];
    $middleName = $data['middleName'];
    $lastName = $data['lastName'];
    $telephone = $data['telephone'];
    $emailAddress = $data['emailAddress'];

    $emailCheck = [
        'table'     => 'account',
        'column'    => 'email',
        'value'     => $emailAddress,
    ];


    $userCheck = [
        'table'     => 'account',
        'column'    => 'user_name',
        'value'     => $userName,
    ];

    $sql = "SELECT user_name, email FROM account WHERE id = '$userId' LIMIT 1";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $oldEmail = $row['email'];
    $oldUsername = $row['user_name'];

    if ($emailAddress != $oldEmail) 
    {
        $emailCount = check_exist($emailCheck);
        if ($emailCount > 0) return 'Email Already Exist';
    }

    if ($userName != $oldUsername) 
    {
        $userCount = check_exist($userCheck);
        if ($userCount > 0) return 'Username Already Exist';
    }

    $sql = "UPDATE account SET user_name = '$userName', email = '$emailAddress' WHERE id = '$userId' LIMIT 1";
    $query = $conn->query($sql);

    if (!$query) return 'Error: ' . $conn->error;

    $sql = "UPDATE user_info SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', contact_number = '$telephone' WHERE account_id = '$userId' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}

function cancelSubmitApplication($id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();
    
    $sql = "UPDATE scholarship_application SET  `info_flag`='0',
                                                `educ_flag`='0',
                                                `family_flag`='0',
                                                `add_flag`='0',
                                                `req_flag`='0',
                                                `current_active` = 'info_flag',
                                                `status`='0'
                                            WHERE userId = " . $id . " 
            AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";
    $query = $conn->query($sql);

    return ($query) ? 'success': $conn->error; $conn->rollback();
}

function updateToGraduate($id)
{
    include("dbconnection.php");

    $sql = "UPDATE account SET account_status = '2' WHERE id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}

function undoGraduate($data)
{
    include("dbconnection.php");

    $id = $data['id'];

    $sql = "UPDATE account SET account_status = '1' WHERE id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}

function saveRemarks($data)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();
    $scholarId = $data['scholarId'];
    $singleParentCheckBox = $data['singleParentCheckBox'];
    $continuingStudentCheckBox = $data['continuingStudentCheckBox'];
    $parentDeceasedCheckBox = $data['parentDeceasedCheckBox'];
    $jobOrderCheckBox = $data['jobOrderCheckBox'];
    $recommendedCheckBox = $data['recommendedCheckBox'];

    $sql = "UPDATE scholarship_application SET parent_flag = '$singleParentCheckBox', 
            continue_flag = '$continuingStudentCheckBox', parent_deceased = '$parentDeceasedCheckBox', 
            employee_flag = '$jobOrderCheckBox', informed_flag = '$recommendedCheckBox' 
            WHERE id = '$scholarId' AND ay_id = '$acadYear' AND sem_id = '$defaultYear' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}