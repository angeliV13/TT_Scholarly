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
        case "hours":
            return floor($diff / (60 * 60));
        case "minutes":
            return floor($diff / 60);
        case "seconds":
            return $diff;
    }
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