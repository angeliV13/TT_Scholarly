<?php

include("functionModel.php");

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

        $sql = "SELECT scholarType FROM scholarship_application WHERE userId = '" . $id . "'";
        $query = $conn->query($sql) or die("Error LQ002: " . $conn->error);

        $scholarApp = "";

        if ($query->num_rows > 0)
        {
            $row = $query->fetch_assoc();
            extract($row);

            $scholarApp = $scholarType;
        }


        session_start();


        $_SESSION['id'] = $id;
        $_SESSION['account_type'] = $account_type;
        $_SESSION['name'] = getUserNameFromId($id);
        $_SESSION['scholarType'] = $scholarApp;


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

    $randomString = generateRandomString(5);

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

    if ($emailCount > 0)
    {
        return 'Email Already Exist';
    }
    else if ($userCount > 0)
    {
        return 'Username Already Exist';
    }

    do {
        $eacNumber = generateEacNumber();
        $eacCheck = [
            'table'     => 'user_info',
            'column'    => 'eac_number',
            'value'     => $eacNumber,
        ];

        $eaCount = check_exist($eacCheck);

    } while ($eaCount > 0);

    $msg = '<p> Hello ' . $data['firstName'] . ' ' . $data['lastName'] . ', </p> ';
    $msg .= '<p> Your account has been created. Enter the code below to verify your account. This code will expire in 5 minutes. </p>';
    $msg .= '<p> <b> Code: ' . $randomString . ' </b> </p>';

    $sendEmail = sendEmail($data['email'], 'Account Verification', $msg);

    if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $notifiedUsers = get_notif_type(1);

    $notifData = [
        'user_id'       => get_user_id_notification($notifiedUsers),
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

        $sql = "INSERT INTO user_info (account_id, eac_number, first_name, middle_name, last_name, suffix, birth_date, birth_place, address_line, barangay, municipality, province, region, religion, gender, civil_status, contact_number, zip_code, citizenship, years_of_residency, language, fbName, fbUrl, fbImg)
        VALUES ('$last_id', '$eacNumber', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[birthdate]', '$data[birthPlace]', '$data[address]', '$data[barangay]', '$data[city]', '$data[province]', '$data[region]', '$data[religion]', '$data[gender]', '$data[civilStatus]', '$data[contactNo]', '$data[zipCode]', '$data[citizenship]', '$data[years]', '$data[language]', '$data[fbName]', '$data[fbUrl]', '$img')";
        $query = mysqli_query($conn, $sql) or die("Error RQ002: " . mysqli_error($conn));

        if ($query)
        {
            $sql = "INSERT INTO email_token (user_id, email, token, date_generated, type) VALUES ('$last_id', '$data[email]', '" . $randomString . "', NOW(), 0)";
            $query = mysqli_query($conn, $sql) or die("Error RQ003: " . mysqli_error($conn));

            if ($query)
            {
                $sql = "INSERT INTO scholarship_application (userId, scholarType, dateApplied, status, current_active) VALUES ('$last_id', '$data[scholarType]', NOW(), 0, 'info_flag')";
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

    $sql = "SELECT id, user_id, date_generated FROM email_token WHERE email = '" . $data['email'] . "' AND token = '" . $data['code'] . "' ORDER BY date_generated DESC LIMIT 1";
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

    $sql = "UPDATE email_token SET token = '" . $randomToken . "', date_generated = NOW() WHERE email = '" . $data. "' AND type = 0 ORDER BY date_generated DESC LIMIT 1";
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

    if ($type == 0) $exists = check_exist(['table' => 'account', 'column' => 'email', 'value' => $email]); if ($exists == 0) return 'Email does not exist!';

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

        $msg = '<p> Hello ' . $user_name . ', </p> ';
        $msg .= '<p> Here is your '. strtolower($text) .'. </p>';
        $msg .= '<p> <b> Code: ' . $randomToken . ' </b> </p>';

        $sendEmail = sendEmail($email, $text, $msg);

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

    return ($query) ? 'Success' : 'Error File Upload: ' . $conn->error;
}

function updateContactInfo($data)
{
    include("dbconnection.php");

    $status = update_status(1, $data['userId']); if (!$status) return 'Update Status Error: ' . $status;

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
    $status = update_status(4, $data['userId']); if (!$status) return 'Update Status Error: ' . $status;
    $genInfo = updateGenInfo($data, 0, $data['userId']); if ($genInfo != 'success') return 'Update General Information Error for Addition Info: ' . $genInfo; 

    return 'success';
}

function updateGenInfo($data, $type = 0, $userId = "")
{
    include("dbconnection.php");

    if ($type == 0) // Additional Information
    {
        $sql = "UPDATE gen_info SET working_flag = '$data[working_flag]', ofw_flag = '$data[ofw_flag]', other_ofw = '$data[other_ofw]',
            pwd_flag = '$data[pwd_flag]', other_pwd = '$data[other_pwd]', status_flag = '$data[status_flag]', self_pwd_flag = '$data[self_pwd_flag]'
            WHERE user_id = '" . $data['userId'] . "' LIMIT 1";
    }
    else if ($type == 1) // Education
    {
        $exists = check_exist(['table' => 'gen_info', 'column' => 'user_id', 'value' => $userId]);
        $graduating_flag = ($data['graduating_flag'] == '0') ? 0 : 1;
        $graduation_year = ($data['graduating_flag'] == '1') ? "" : $data['graduation_year'];
        $honor_flag = ($data['honor_flag'] == '0') ? 0 : 1;
        $honor_type = ($data['honor_type'] == '') ? 4 : $data['honor_type'];
        $other_honor = ($data['other_honor'] == '') ? "" : $data['other_honor'];

        if ($exists == 0)
        {
            $sql = "INSERT INTO gen_info (user_id, graduating_flag, honor_flag, honor_type, other_honor, graduation_year) VALUES
                ('$userId', '$graduating_flag', '$honor_flag', '$honor_type', '$other_honor', '$graduation_year')";
        }
        else
        {
            $sql = "UPDATE gen_info SET graduating_flag = '$graduating_flag', honor_flag = '$honor_flag', honor_type = '$honor_type',
                other_honor = '$other_honor', graduation_year = '$graduation_year' WHERE user_id = '$userId' LIMIT 1";
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
            rent_flag = '$rent_flag', monthly_payment = '$monthly_payment' WHERE user_id = '$userId' LIMIT 1";
    }

    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error General Information: ' . $conn->error; $conn->rollback();
}

function updateEducationalInfo($data)
{
    $status = update_status(2, $data['userId']); if (!$status) return 'Update Status Error: ' . $status;
    $genInfo = updateGenInfo($data['other_info'], 1, $data['userId']); if ($genInfo != 'success') return 'Update General Information Error for Education: ' . $genInfo;

    // $college = $jhs = $shs = $elem = '';

    if ($data['college'] != null) $college = updateSchool($data['college'], $data['userId'], $data['college']['collegeAwards'], 0); if ($college != 'success') return 'Update College Error: ' . $college;
    if ($data['shs'] != null) $shs = updateSchool($data['shs'], $data['userId'], $data['shs']['shsAwards'], 1); if ($shs != 'success') return 'Update SHS Error: ' . $shs;
    if ($data['jhs'] != null) $jhs = updateSchool($data['jhs'], $data['userId'], $data['jhs']['jhsAwards'], 2); if ($jhs != 'success') return 'Update JHS Error: ' . $jhs;
    if ($data['elem'] != null) $elem = updateSchool($data['elem'], $data['userId'], $data['elem']['elemAwards'], 3); if ($elem != 'success') return 'Update Elem Error: ' . $elem;

    return 'success';
}

function updateSchool($data, $userId, $awards = [], $type)
{
    include("dbconnection.php");

    $exists = check_exist(['table' => 'education', 'column' => 'educ_id', 'value' => $data['educ_id']]);
    $course = ($data['courseText'] == "Others") ? $data['otherCourse'] : $data['course'];
    $major = $data['major'];
    $school = ($data['school'] == "Others") ? $data['otherSchool'] : $data['school'];
    $school_address = $data['school_address'];
    $year_level = $data['year_level'];
    $educ_id = $data['educ_id'];

    if ($exists == 0)
    {
        $sql = "INSERT INTO education (user_id, school, year_level, course, major, school_address, education_level)
        VALUES ('$userId', '$school', '$year_level', '$course', '$major', '$school_address', '$type')";
    }
    else
    {
        $sql = "UPDATE education SET school = '$school', year_level = '$year_level', course = '$course', major = '$major',
            school_address = '$school_address', education_level = '$type' WHERE user_id = '$userId' AND educ_id = '$educ_id' LIMIT 1";
    }

    $query = $conn->query($sql);

    if ($exists == 0) $educ_id = $conn->insert_id;

    return ($query) ? updateAwards($awards, $educ_id) : 'Error Educational Information: ' . $conn->error; $conn->rollback();

}

function updateAwards($data, $educId)
{
    include("dbconnection.php");

    // select all awards

    $sql = "SELECT id FROM user_awards WHERE school_id = '$educId'";
    $query = $conn->query($sql);

    $dataArr = $deleteArr = [];

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $dataArr[] = $row['id'];
        }
    }

    if ($data != null)
    {
        if ($dataArr != null)
        {
            foreach ($dataArr as $awardId)
            {
                if (!in_array($awardId, $data['awardId']))
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

        foreach ($data as $award)
        {
            $awardId = $award['awardId'];
            $honor = $award['honor'];
            $acadYear = $award['acadYear'];
            $sem = $award['sem'];
            $yearLevel = $award['yearLevel'];

            $exists = check_exist(['table' => 'user_awards', 'column' => 'id', 'value' => $awardId]);

            if ($exists == 0)
            {
                $sql = "INSERT INTO user_awards (school_id, acad_year, honor, sem, year_level) VALUES
                    ('$educId', '$acadYear', '$honor', '$sem', '$yearLevel')";
            }
            else
            {
                $sql = "UPDATE user_awards SET acad_year = '$acadYear', honor = '$honor', sem = '$sem', year_level = '$yearLevel'
                    WHERE id = '$awardId' AND school_id = '$educId' LIMIT 1";
            }

            $query = $conn->query($sql);
        }

        return ($query) ? 'success' : 'Error Awards: ' . $conn->error; $conn->rollback();
    }
    else
    {
        return 'success';
    }
}

function updateFamilyInfo($data)
{
    $status = update_status(3, $data['userId']); if (!$status) return 'Update Status Error: ' . $status;
    $genInfo = updateGenInfo($data['otherInfoArr'], 2, $data['userId']); if ($genInfo != 'success') return 'Update General Information Error for Family: ' . $genInfo;
    
    $father = $mother = $spouse = $siblings = $guardian = 'success';

    if ($data['fatherArr'] != null) $father = updateFamily($data['fatherArr'], 0, $data['userId']); if ($father != 'success') return 'Update Family Father Error: ' . $father;
    if ($data['motherArr'] != null) $mother = updateFamily($data['motherArr'], 1, $data['userId']); if ($mother != 'success') return 'Update Family Mother Error: ' . $mother;
    if ($data['spouseArr']['firstName'] != '') $spouse = updateFamily($data['spouseArr'], 2, $data['userId']); if ($spouse != 'success') return 'Update Family Spouse Error: ' . $spouse;
    if ($data['siblings'] != null) $siblings = updateFamily($data['siblings'], 3, $data['userId']); if ($siblings != 'success') return 'Update Family Sibling Error: ' . $siblings;
    if ($data['guardianArr']['firstName'] != '') $guardian = updateFamily($data['guardianArr'], 4, $data['userId']); if ($guardian != 'success') return 'Update Family Guardian Error: ' . $guardian;

    return 'success';
}

function updateFamily($data, $type, $userId)
{
    include("dbconnection.php");

    if ($type == 3) // Sibling
    {
        foreach ($data AS $fam)
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

            $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => $userId, 'id' => $id]]);

            if ($exists > 0)
            {
                $sql = "UPDATE user_family SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', age = '$age', occupation = '$occupation',
                        relationship = '$relationship', birth_order = '$birth_order' WHERE user_id = '$userId' AND id = '$id' LIMIT 1";
            }
            else
            {
                $sql = "INSERT INTO user_family (user_id, firstName, middleName, lastName, age, occupation, relationship, fam_type, birth_order)
                        VALUES ('$userId', '$firstName', '$middleName', '$lastName', '$age', '$occupation', '$relationship', '$type', '$birth_order')";
            }

            $query = $conn->query($sql);
        }

        return ($query) ? 'success' : 'Error Sibling Insertion: ' . $conn->error; $conn->rollback();
    }
    else
    {
        $exists = check_exist_multiple(['table' => 'user_family', 'column' => ['user_id' => $userId, 'fam_type' => $type]]);
        $occupation = ($data['occupation'] == "others") ? $data['otherOccupation'] : $data['occupation'];

        if ($exists > 0)
        {
            $sql = "UPDATE user_family SET firstName = '$data[firstName]', middleName = '$data[middleName]', lastName = '$data[lastName]', suffix = '$data[suffix]', age = '$data[age]',
                    birth_date = '$data[birthday]', birth_place = '$data[birthplace]', contact_number = '$data[contact]', living_flag = '$data[living]', occupation = '$occupation',
                    company_name = '$data[company]', company_address = '$data[companyAddress]', income_flag = '$data[income]', attainment_flag = '$data[education]', relationship = '$data[relationship]'
                    WHERE user_id = '$userId' AND fam_type = '$type' LIMIT 1";
        }
        else
        {
            $sql = "INSERT INTO user_family (user_id, fam_type, firstName, middleName, lastName, suffix, age, birth_date, birth_place, contact_number, living_flag, occupation, company_name, company_address, income_flag, attainment_flag, relationship) VALUES
                    ('$userId', '$type', '$data[firstName]', '$data[middleName]', '$data[lastName]', '$data[suffix]', '$data[age]', '$data[birthday]', '$data[birthplace]', '$data[contact]', '$data[living]', '$occupation', '$data[company]', '$data[companyAddress]', '$data[income]', '$data[education]', '$data[relationship]')";
        }

        $query = $conn->query($sql);

        return ($query) ? 'success' : 'Error Family Insertion: ' . $conn->error; $conn->rollback();
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

function check_data($id)
{
    include("dbconnection.php");

    // $genCol = get_table_columns('gen_info');
    // $userFam = get_table_columns('user_family');
    // $educ = get_table_columns('education');

    // $data = [];

    // $text = "";

    // $sql = "SELECT * FROM gen_info WHERE user_id = '" . $id . "' LIMIT 1";
    // $query = $conn->query($sql);

    // if ($query->num_rows > 0)
    // {
    //     while ($row = $query->fetch_assoc())
    //     {
    //         foreach ($genCol as $key => $value)
    //         {
    //             if ($row[$value] == NULL)
    //             {
    //                 $data['General Information'][] = $value;
    //             }
    //         }
    //     }
    // }
    // else
    // {
    //     return 'Error EQ002 (General Information): ' . $conn->error;
    // }

    // $sql = "SELECT * FROM user_family WHERE user_id = '" . $id . "'";
    // $query = $conn->query($sql);

    // if ($query->num_rows > 0)
    // {
    //     while ($row = $query->fetch_assoc())
    //     {
    //         foreach ($userFam as $key => $value)
    //         {
    //             if ($row[$value] == NULL)
    //             {
    //                 $data['Family Background'][] = $value;
    //             }
    //         }
    //     }
    // }
    // else
    // {
    //     return 'Error EQ002 (Family Data): ' . $conn->error;
    // }

    // $sql = "SELECT * FROM education WHERE user_id = '" . $id . "'";
    // $query = $conn->query($sql);

    // if ($query->num_rows > 0)
    // {
    //     while ($row = $query->fetch_assoc())
    //     {
    //         foreach ($educ as $key => $value)
    //         {
    //             if ($row[$value] == NULL)
    //             {
    //                 $data['Educational Background'][] = $value;
    //             }
    //         }
    //     }
    // }
    // else
    // {
    //     return 'Error EQ002 (Education Background): ' . $conn->error;
    // }

    // if ($data != null)
    // {
    //     foreach ($data as $key => $value)
    //     {
    //         $text .= "<h4>" . $key . "</h4>";

    //         foreach ($value as $key2 => $value2)
    //         {
    //             $text .= "<p>" . $value2 . "</p>";
    //         }
    //     }

    //     return $text;
    // }

    $stat = check_status($id);
    $info_flag = $stat['info_flag']; if ($info_flag == 0) return "Please complete your personal information.";
    $educ_flag = $stat['educ_flag']; if ($educ_flag == 0) return "Please complete your educational background.";
    $family_flag = $stat['family_flag']; if ($family_flag == 0) return "Please complete your family background.";
    $add_flag = $stat['add_flag']; if ($add_flag == 0) return "Please complete your other general information.";

    return "success";
}


function submitApplication($id)
{
    include("dbconnection.php");

    $res = check_data($id); if ($res != "success") return $res;

    $sql = "SELECT email FROM account WHERE id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $email = $row['email'];

    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name FROM user_info WHERE account_id = '$id' LIMIT 1";
    $query = $conn->query($sql);

    $rows = $query->fetch_assoc();
    $name = $rows['name'];

    $msg = '<p>Hi '.$name.',<br></p>';
    $msg .= '<p>Your scholarship application has been submitted. You will be notified once your application has been reviewed.</p>';
    $msg .= '<p>Thank you! <br></p>';
    $msg .= '<p>Best regards,</p>';
    $msg .= '<p>Youth Development Scholarship</p>';

    $sendEmail = sendEmail($email, 'Application Submission', $msg, 2); if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

    $notifiedUsers = get_notif_type(2);

    $notifData = [
        'user_id'       => get_user_id_notification($notifiedUsers),
        'notif_type'    => 2,
        'notif_body'    => $name . ' has submitted a scholarship application.',
        'notif_link'    => '?nav=Adaccount-management',
    ];

    $notif = insert_notification($notifData); if ($notif !== 'success') return 'Error: ' . $notif;

    $app = updateApplication(0, $id); if ($app != "success") return $app;

    return "success";
}

function changePFP($data)
{
    include("dbconnection.php");

    $fbImg = $data['image'];
    $userId = $data['userId'];

    if ($fbImg != null)
    {
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

    $sql = "UPDATE user_info SET profile_img = '$img' WHERE account_id = '$userId' LIMIT 1";
    $query = $conn->query($sql);

    return ($query) ? 'success' : 'Error: ' . $conn->error;
}


