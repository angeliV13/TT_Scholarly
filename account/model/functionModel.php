<?php

function generateRandomString($length = 5) // generates a random string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getDateTimeDiff($date1, $date2, $type = "minutes") // function that returns the difference between two dates
{
    $diff = abs(strtotime($date2) - strtotime($date1));

    switch($type)
    {
        case "days":
            return floor($diff / (60 * 60 * 24));
        case "hours":
            return floor($diff / (60 * 60));
        case "minutes":
            return floor($diff / 60);
        case "seconds":
            return $diff;
    }
}

function static_count()
{
    static $count = 0;

    $count++;

    return $count;
}

function get_lastID($data)
{
    include("dbconnection.php");

    $sql = "SELECT " . $data['column'] . " FROM " . $data['table'] . " ORDER BY " . $data['column'] . " DESC LIMIT 1";
    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    return ($query->num_rows > 0) ? $query->fetch_assoc()[$data['column']] : 0;
}

function sendEmail($to, $subject, $message, $type = 1) // PHPMAILER FUNCTION
{
    require_once('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
    require_once('../../vendor/phpmailer/phpmailer/src/SMTP.php');
    require_once('../../vendor/phpmailer/phpmailer/src/Exception.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // DO NOT USE THE TYPE 0 AS IT WILL NOT WORK

    $credentials = account_credentials($type);

    if ($credentials != false)
    {
        $mail->Username = $credentials['email'];
        $mail->Password = $credentials['password'];
        $mail->SetFrom($credentials['email'], $credentials['name']);
    }
    else
    {
        return "Error: No Credentials Found";
    }

    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port     = 465;  
    // $mail->Username = ""; // email address
    // $mail->Password = ""; // password
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    // $mail->SetFrom(" "); // email address
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    // $mail->WordWrap   = 80;
    $mail->IsHTML(true);
    $mail->Body = $message;

    if(!$mail->Send()) 
    {
        return "Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        return "Success";
    }

    $mail->smtpClose();

    unset($mail);
}

function account_credentials($type)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM admin_account WHERE type = " . $type;
    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    return ($query->num_rows > 0) ? $query->fetch_assoc() : false;
}

function sms_verification($contact, $msg) // function that sends an OTP to the user's contact number
{
    require_once('../../vendor/autoload.php');

    include("dbconnection.php");

    $sql = "SELECT sid, token, number FROM sms_config";
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
    $sid = $row['sid'];
    $token = $row['token'];
    $twilio_number = $row['number'];

    $client = new Twilio\Rest\Client($sid, $token);

    $send_number = $contact; // Add Number to Send To
    $twilio_number = $twilio_number; // Add Your registered Twilio Number

    $client->messages->create(

        $send_number,

        array(
            'from' => $twilio_number,
            'body' => $msg,
        )
    );
}

function show_notification()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM notification WHERE user_id = " . $_SESSION['id'] . " ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    $count = ($query->num_rows > 0) ? $query->num_rows : 0;
    $body = "";
    $data = [];    

    if ($count > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $data[] = $row;
        }

        $sql = "SELECT id, notif_name, notif_icon FROM notification_type WHERE id IN (";

        $ids = implode(',', array_map(function ($el) {
            return $el['notif_type'];
        }, $data));

        $sql .= $ids . ")";

        $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                foreach ($data as $key => $value)
                {
                    if ($value['notif_type'] == $row['id'])
                    {
                        $data[$key]['notif_name'] = $row['notif_name'];
                        $data[$key]['notif_icon'] = $row['notif_icon'];
                    }
                }
            }
        }

        $body .= '<li class="dropdown-header">';
        $body .= 'You have ' . $count . ' new notification(s)';
        $body .= '<a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>';
        $body .= '</li>';
        $body .= '<li><hr class="dropdown-divider"></li>';

        foreach ($data as $key => $value)
        {
            $body .= '<a href="' . $value['notif_link'] . '">';
            $body .= '<li class="notification-item">';
            $body .= '<i class="' . $value['notif_icon'] . '"></i>';
            $body .= '<div>';
            $body .= '<h4>' . $value['notif_name'] . '</h4>';
            $body .= '<p>' . $value['notif_body'] . '</p>';
            $body .= '<p>' . $value['notif_date'] . '</p>';
            $body .= '</div>';
            $body .= '</li>';
            $body .= '<li><hr class="dropdown-divider"></li>';
            $body .= '</a>';
        }

        $body .= '<li class="dropdown-footer">';
        $body .= '<a href="#">Show all notifications</a>';
        $body .= '</li>';
    }
    else
    {
        $body .= '<li class="dropdown-header">';
        $body .= 'You have no new notifications';
        $body .= '</li>';
    }

    return ['count' => $count, 'body' => $body];
}

function insert_notification($data)
{
    include("dbconnection.php");

    $user_id = $data['user_id'];
    $notif_type = $data['notif_type'];
    $notif_body = $data['notif_body'];
    $notif_link = $data['notif_link'];

    $lastId = (get_lastID(['table' => 'system_notification', 'column' => 'id']) > 0) ? get_lastID(['table' => 'system_notification', 'column' => 'id']) + 1 : 1;

    $new_link = (strpos($notif_link, '?') !== false) ? $notif_link . '&notif=' . $lastId : $notif_link . '?notif=' . $lastId;

    if (is_array($user_id))
    {
        $sql = "INSERT INTO notification (user_id, notif_type, notificationId, notif_body, notif_link, notif_date) VALUES ";

        foreach ($user_id as $key => $id)
        {
            $notif_text = "Hi " . $id . ", <br>" . $notif_body;
            $sql .= "('$key', '$notif_type', '$lastId', '$notif_text', '$new_link', NOW()),";
        }

        $sql = rtrim($sql, ",");
    }
    else
    {
        $sql = "INSERT INTO notification (user_id, notif_type, notificationId, notif_body, notif_link) VALUES ($notif_type', '$lastId', '$notif_body', '$notif_link')"; 
    }

    $query = $conn->query($sql) or die("Error LC002: " . mysqli_error($conn));

    return ($query) ? 'success' : $conn->error;
}

function update_notification($notificationId, $id = 'NA')
{
    include("dbconnection.php"); 

    $sql = "UPDATE notification SET status = 1 WHERE notificationId = " . $notificationId;

    if ($id != 'NA')
    {
        $sql .= " AND user_id = " . $id;
    }

    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    return ($query) ? 'success' : $conn->error;
}

function get_user_id_type($type)
{
    // 0 - Super Admin
    // 1 - Admin
    // 2 - Beneficiaries
    // 3 - Applicants
    // 4 - All Admins
    // 5 - All Registered Users
    // 6 - All Users

    include("dbconnection.php");

    $data = [];

    switch ($type)
    {
        case 0:
            $getType = "AND account_type = 0";
            break;
        case 1:
            $getType = "AND account_type = 1";
            break;
        case 2:
            $getType = "AND account_type = 2";
            break;
        case 3:
            $getType = "AND account_type = 3";
            break;
        case 4:
            $getType = "AND account_type IN (0, 1)";
            break;
        case 5:
            $getType = "AND account_type IN (2, 3)";
            break;
        case 6:
            $getType = "";
            break;
    }

    $sql = "SELECT id, user_name FROM account WHERE account_status = 1 " . $getType;
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $data[$row['id']] = $row['user_name']; 
        }
    }

    return $data;
}

function get_education_courses($type)
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT id, name FROM education_courses WHERE type = " . $type;
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $data[$row['id']] = $row['name']; 
        }
    }

    return $data;
}