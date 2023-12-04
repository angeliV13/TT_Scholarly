<?php


function generateRandomString($length = 5) // generates a random string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function generateEacNumber()
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);

    $randomString = $eac = '';

    for ($i = 0; $i < 5; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $eac = 'EAC-' . $randomString;

    return $eac;
}


function getDateTimeDiff($date1, $date2, $type = "minutes") // function that returns the difference between two dates
{
    $diff = abs(strtotime($date2) - strtotime($date1));

    switch ($type) {
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

function convertNumToText($num)
{
    $ones = array(
        0 => "",
        1 => "First",
        2 => "Second",
        3 => "Third",
        4 => "Fourth",
        5 => "Fifth",
        6 => "Sixth",
        7 => "Seventh",
        8 => "Eighth",
        9 => "Ninth"
    );

    $tens = array(
        0 => "",
        1 => "Tenth",
        2 => "Twentieth",
        3 => "Thirtieth",
        4 => "Fortieth",
        5 => "Fiftieth",
        6 => "Sixtieth",
        7 => "Seventieth",
        8 => "Eightieth",
        9 => "Ninetieth"
    );

    if ($num < 10) 
    {
        return $ones[$num];
    } 
    else if ($num < 20) 
    {
        return "Eleventh";
    } 
    else if ($num < 100) 
    {
        $tensDigit = floor($num / 10);
        $onesDigit = $num % 10;
        return $tens[$tensDigit] . " " . $ones[$onesDigit];
    } 
    else 
    {
        return "Number is out of range";
    }
}


function static_count()
{
    static $count = 0;

    $count++;

    return $count;
}

function get_age($birthday)
{
    return floor((time() - strtotime($birthday)) / 31556926);
}

function hashPassword($pass)
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function verifyHashPW($pass, $hash)
{
    return password_verify($pass, $hash);
}

function get_indicators($type, $applicant, $min, $max = "", $operator = '>=<=')
{
    include("dbconnection.php");
    if($applicant <= 2) $applicant = 2;

    $sql = "SELECT points FROM applicant_indicator WHERE indicator_category = '{$type}' AND indicator_applicant = '{$applicant}'";
    // if ($operator == '>=<=') $sql .= " AND indicator_low >= " . $min . " AND indicator_high <= " . $max . "";
    // if ($operator == 'bet') $sql .= "AND " . $min . " BETWEEN indicator_low AND indicator_high";
    if ($operator == '>=<=') $sql .= " AND indicator_low >= '{$min}' AND indicator_high <= '{$max}'";
    if ($operator == '<=>') $sql .= " AND indicator_low <= '{$min}' AND indicator_high >= '{$max}'";
    if ($operator == 'exa') $sql .= " AND indicator_exact = '" . $min . "'";
    if ($operator == 'bet') $sql .= "AND indicator_low  BETWEEN '{$min}' AND '{$max}'
                                    AND indicator_high BETWEEN '{$min}' AND '{$max}'";
                                    

    $sql .= " LIMIT 1";

    $query = $conn->query($sql);

    return ($query->num_rows > 0) ? $query->fetch_assoc()['points'] : 0;
}

function get_exam_scores($id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();
    
    $sql = "SELECT points FROM examination_applicant WHERE user_id = '" . $id . "' AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "' LIMIT 1";
    $query = $conn->query($sql);

    return ($query->num_rows > 0) ? $query->fetch_assoc()['points'] : 0;
}

function get_current_sem()
{
    include("dbconnection.php");

    $sql = "SELECT semester FROM semester WHERE default_sem = 1";
    $query = $conn->query($sql);

    $text = "";
    $sem = ($query->num_rows > 0) ? $query->fetch_assoc()['semester'] : "Unknown";

    if ($sem != "Unknown") 
    {
        $sql = "SELECT ay FROM acad_year WHERE default_ay = 1 LIMIT 1";
        $query = $conn->query($sql);

        $ay = ($query->num_rows > 0) ? $query->fetch_assoc()['ay'] : "Unknown";
    }

    if ($sem != "Unknown" && $ay != "Unknown") 
    {
        $text = $sem . " Semester, A.Y. " . $ay;
    }

    return $text;
}

function get_website_info($type = 0)
{
    include("dbconnection.php");

    if ($type == 0)
    {
        $table = "website_info";
    }
    else if ($type == 1)
    {
        $table = "website_other_info";
    }
    else if ($type == 2)
    {
        $table = "website_scholar_text";
    }
    else if ($type == 3)
    {
        $table = "website_slider";
    }

    $sql = "SELECT * FROM $table";
    $query = $conn->query($sql);

    $website_info = [];

    if ($query->num_rows > 0) 
    {
        if (in_array($type, [0, 1]))
        {
            $row = $query->fetch_assoc();

            $website_info = $row;
        }
        else
        {
            while ($row = $query->fetch_assoc()) 
            {
                $website_info[] = $row;
            }
        }
        
    }

    return $website_info;
}

function get_website_socials()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM website_socials";
    $query = $conn->query($sql);

    $website_socials = [];

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $socialType = $row['social_type'];
            $icon = "";

            if ($socialType == "0") 
            {
                $icon = "bi bi-facebook";
            } 
            else if ($socialType == "1") 
            {
                $icon = "bi bi-instagram";
            } 
            else if ($socialType == "2") 
            {
                $icon = "bi bi-twitter";
            } 
            else 
            {
                $icon = "bi bi-linkedin";
            }

            $website_socials[] = [
                'social_type' => $socialType,
                'icon' => $icon,
                'link' => $row['link']
            ];
        }
    }

    return $website_socials;
}

function get_social_type($type)
{
    switch ($type) {
        case 0:
            return "Facebook";
        case 1:
            return "Instagram";
        case 2:
            return "Twitter";
        case 3:
            return "LinkedIn";
    }
}

function get_calendar_of_activites()
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT * FROM website_coa WHERE active = 1";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $data[] = $row;
        }
    }

    return $data;
}

function website_officials($showAll = 0, $id = "")
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT * FROM website_officials";

    if ($id != "") 
    {
        $sql .= " WHERE id = " . $id;
    }

    if ($showAll == 0) 
    {
        $sql .= " WHERE active = 1";
    }

    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $socials = get_official_socials($row['id']);

            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'job_title' => $row['job_title'],
                'description' => $row['description'],
                'image' => $row['img'],
                'date_added' => $row['date_added'],
                'added_by' => $row['added_by'],
                'active' => $row['active'], // 0 = inactive, 1 = active
                'socials' => $socials
            ];
        }
    }

    return $data;
}

function get_official_socials($id)
{
    include("dbconnection.php");

    $data = [];

    $socType = 0;

    $sql = "SELECT * FROM official_socials WHERE official_id = " . $id;
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $socialType = $row['socialType'];

            if ($socialType == "0") 
            {
                $socType = "bi bi-facebook";
            } 
            else if ($socialType == "1") 
            {
                $socType = "bi bi-twitter";
            } 
            else if ($socialType == "2") 
            {
                $socType = "bi bi-instagram";
            } 
            else 
            {
                $socType = "bi bi-linkedin";
            }

            $data[] = [
                'socType' => $socType,
                'link' => $row['url']
            ];
        }
    }

    return $data;
}

function get_website_testimonials($showAll = 1)
{
    include("dbconnection.php");

    $data = [];
    $sql = "SELECT * FROM website_testimonials";

    if ($showAll == 0) 
    {
        $sql .= " WHERE active = 1";
    }

    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['alumni_name'],
                'job_title' => $row['job_title'],
                'description' => $row['testimony'],
                'image' => $row['image'],
                'date_added' => $row['date_added'],
                'added_by' => $row['added_by'],
                'active' => $row['active'], // 0 = inactive, 1 = active
                'sql' => $sql
            ];
        }
    }

    return $data;
}

function get_scholarship_requirements($type = "NA")
{
    // 0 - Renewal
    // 1 - Assessment
    // 2 - Application
    include("dbconnection.php");

    $data = [];
    $sql = "SELECT * FROM requirements";

    if ($type != "NA") 
    {
        $sql .= " WHERE ";

        if ($type == 0)
        {
            $sql .= " renewal = 1";
        }
        else if ($type == 1)
        {
            $sql .= " assessment = 1";
        }
        else
        {
            $sql .= " application = 1";
        }
    }

    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            $data[] = [
                'id' => $row['id'],
                'req' => $row['requirement_name'],
                'code' => $row['requirement_code'],
                'renewal' => $row['renewal'],
                'assessment' => $row['assessment'],
                'application' => $row['application'],
            ];
        }
    }

    return $data;
}

function get_scholar_type($type)
{
    switch ($type) 
    {
        case 1:
            return "College Scholarship";
        case 2:
            return "College Educational Assistance";
        case 3:
            return "SHS Educational Assistance";
        default:
            return "Unknown";
    }
}

function get_scholar_status($type)
{
    switch ($type)
    {
        case 0:
            return "Pending";
        case 1:
            return "Application Submitted";
        case 2:
            return "For Assesment Exam";
        case 3:
            return "For Interview";
        case 4:
            return "Application Approved";
        case 5:
            return "Application Rejected";
    }
}

function getUserNameFromId($id)
{
    include("dbconnection.php");

    // Checks if Account Exists

    $sql = "SELECT first_name, last_name FROM user_info WHERE id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error UAQ000: " . $conn->error);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();

        return $row['first_name'] . " " . $row['last_name'];
    }
    else
    {
        return "Unknown";
    }
}

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

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "SELECT * FROM gen_info WHERE user_id = '" . $id . "' AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "' LIMIT 1";
    $query = $conn->query($sql);

    $user_info = [];

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();

        $user_info = $row;
    }

    return $user_info;
}

function get_user_education($id, $latest = 0)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql   = "SELECT * FROM education WHERE user_id = '" . $id . "' AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";
    $sql  .= ($latest != 0) ? "ORDER BY education_level ASC LIMIT 1"  : '';
    $query = $conn->query($sql);

    $education = [];

    if ($query->num_rows > 0) 
    {
        if ($latest == 1)
        {
            $row = $query->fetch_assoc();

            $education = $row;
        }
        else
        {
            while ($row = $query->fetch_assoc()) 
            {
                $education[$row['education_level']] = $row;
            }

            $sql = "SELECT * FROM user_awards WHERE school_id IN (" . implode(",", array_map(function ($el) {
                return $el['educ_id'];
            }, $education)) . ") AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";

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
        }
    }

    return $education;
}

function get_user_family($id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "SELECT * FROM user_family WHERE user_id = '" . $id . "' AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";
    $query = $conn->query($sql);

    $family = [];

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $famType = $row['fam_type'];

            if ($famType == 0) 
            {
                $family['father'] = $row;
            } 
            else if ($famType == 1) 
            {
                $family['mother'] = $row;
            } 
            else if ($famType == 2) 
            {
                $family['spouse'] = $row;
            } 
            else if ($famType == 3) 
            {
                $family['siblings'][] = $row;
            } 
            else 
            {
                $family['guardian'] = $row;
            }
        }
    }

    return $family;
}

function get_delete_request($id)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM delete_account_form WHERE id = '" . $id . "'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0)
    {
        $row = $query->fetch_assoc();

        return $row;
    }
    else
    {
        return false;
    }
}

function get_delete_request_text($type)
{
    switch ($type)
    {
        case 0:
            return "Pending";
        case 1:
            return "Approved";
        case 2:
            return "Rejected";
    }
}

function get_status_text($type)
{
    switch ($type) {
        case 2:
            return "For Qualification Exam";
        case 3:
            return "For Interview";
        case 4:
            return "Application Approved";
        case 5:
            return "Application Rejected";
        case 6:
            return "Follow Up Action Needed";
    }
}

function get_message_text_status($type, $date = "", $endDate = "", $reason = "")
{
    $text = $notifType = "";
    switch ($type) 
    {
        case 2:
            $text .= "<p>Your scholarship application has been reviewed. You are now scheduled for a Qualification Exam</p><br>";
            $text .= "<p>Here are the details:</p>";
            $text .= "<p>Start Date: <b>" . date('F j,Y H:i:s', strtotime($date)) . "</b></p>";
            $text .= "<p>End Date: <b>" . date('F j,Y H:i:s', strtotime($endDate)) . "</b></p>";
            $text .= "<p>Please be on time.</p><br>";
            $notifType = 3;
            break;
        case 3:
            $text .= "<p>This is to inform you that you have passed the Assesment Exam. You are now scheduled for an Interview.</p><br>";
            $text .= "<p>Here are the details:</p>";
            $text .= "<p>Start Date: <b>" . date('F j,Y H:i:s', strtotime($date)) . "</b></p>";
            $text .= "<p>End Date: <b>" . date('F j,Y H:i:s', strtotime($endDate)) . "</b></p>";
            $text .= "<p>Please be on time.</p><br>";
            $notifType = 4;
            break;
        case 4:
            $text .= "<p>Congratulations! Your scholarship application has been approved.</p><br>";
            $notifType = 5;
            break;
        case 5:
            $text .= "<p>After careful consideration, we regret to inform you that your scholarship application has been rejected.</p>";
            $text .= "<p>With a reason of: <b>" . $reason . "</b></p>";
            $text .= "<p>Please contact the Scholarship Office for more information.</p><br>";
            $notifType = 6;
            break;
        case 6:
            $text .= "<p>Please be informed that your scholarship application cannot continue due to the following reason(s):</p><br>";
            $text .= "<p><b>" . $reason . "<b></p>";
            $text .= "<p>Please contact the Scholarship Office for more information.</p><br>";
            $notifType = 12;
            break;
    }

    return ['text' => $text, 'notifType' => $notifType];
}

function get_school_address($id)
{
    include("dbconnection.php");

    $sql = "SELECT school_address FROM school WHERE id = '" . $id . "'";
    $query = $conn->query($sql);

    return ($query and $query->num_rows > 0) ? $query->fetch_assoc()['school_address'] : "Error: School Address Not Found." . $conn->error;
}

function get_school_type($type)
{
    switch ($type) 
    {
        case 0:
            return "College";
            break;
        case 1:
            return "Senior High School";
            break;
        case 2:
            return "Junior High School";
            break;
        case 3:
            return "Elementary";
            break;
        case 4:
            return "Others";
    }
}

function get_school_class($type)
{
    switch ($type)
    {
        case 0:
            return "Public (Within Sto.Tomas, Batangas)";
            break;
        case 1:
            return "Private (Within Sto.Tomas, Batangas)";
            break;
        case 2:
            return "Public (Outside Sto.Tomas, Batangas)";
            break;
        case 3:
            return "Private (Outside Sto.Tomas, Batangas)";
            break;
    }
}

function get_lastID($data)
{
    include("dbconnection.php");

    $sql = "SELECT " . $data['column'] . " FROM " . $data['table'] . " ORDER BY " . $data['column'] . " DESC LIMIT 1";
    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    return ($query->num_rows > 0) ? $query->fetch_assoc()[$data['column']] : 0;
}

function sendEmail($to, $subject, $message, $type = 1, $cc = [], $bcc = []) // PHPMAILER FUNCTION
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
    $mail->Host     = ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') ? "smtp.gmail.com" : 'smtp.hostinger.com';
    $mail->Mailer   = "smtp";
    // $mail->SetFrom(" "); // email address
    
    if (is_array($to))
    {
        foreach ($to as $key => $value) 
        {
            $mail->AddAddress($value);
        }
    }
    else
    {
        $mail->AddAddress($to);
    }

    if (count($cc) > 0) 
    {
        foreach ($cc as $key => $value) 
        {
            $mail->AddCC($value);
        }
    }

    if (count($bcc) > 0) 
    {
        foreach ($bcc as $key => $value) 
        {
            $mail->AddBCC($value);
        }
    }

    $mail->Subject = $subject;
    // $mail->WordWrap   = 80;
    $mail->IsHTML(true);
    $mail->Body = $message;

    if (!$mail->Send()) 
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
    $twilioNumber = $row['number'];

    $client = new Twilio\Rest\Client($sid, $token);

    $send_number = $contact; // Add Number to Send To
    $twilio_number = $twilioNumber; // Add Your registered Twilio Number

    $client->messages->create(

        $send_number,

        array(
            'from' => $twilio_number,
            'body' => $msg,
        )
    );
}


function show_notification($view = 0, $limit = 0)
{
    include("dbconnection.php");


    $sql = "SELECT * FROM notification WHERE user_id = " . $_SESSION['id'] . " ";

    if ($view == 0) 
    {
        $sql .= "AND status = 0 ";
    }

    $sql .= " ORDER BY id DESC";

    $sql .= ($limit != 0) ? " LIMIT " . $limit : "";

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
            $body .= '<a href="' . $value['notif_link'] . '" class="w-100">';
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

        if ($_SESSION['account_type'] <= 1)
        {
            $body .= '<li class="dropdown-footer">';
            $body .= '<a href="?nav=ntf_settings">Show all notifications</a>';
            $body .= '</li>';
        }
    } 
    else 
    {
        $body .= '<li class="dropdown-header">';
        $body .= 'You have no new notifications';
        $body .= '</li>';
    }


    return ['count' => $count, 'body' => $body, 'data' => $data];
}

function insert_acad_year_data($id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "INSERT INTO acad_year_data (ay_id, sem_id, user_id) VALUES ('$acadYear', '$defaultYear', '$id')";
    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    return ($query) ? 'success' : $conn->error;
}

function insert_notification($data)
{
    include("dbconnection.php");

    $user_id = $data['user_id'];
    $notif_type = $data['notif_type'];
    $notif_body = $data['notif_body'];
    $notif_link = $data['notif_link'];

    $lastId = get_lastID(['table' => 'notification', 'column' => 'id']);
    $lastId++;

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
        $sql = "INSERT INTO notification (user_id, notif_type, notificationId, notif_body, notif_link, notif_date) VALUES ('$user_id', '$notif_type', '$lastId', '$notif_body', '$notif_link', NOW())";
    }

    $query = $conn->query($sql) or die("Error LC002: " . mysqli_error($conn));

    return ($query) ? 'success' : $conn->error;
}


function update_notification($notificationId, $id = 'NA', $type = 0)
{
    include("dbconnection.php");

    $sql = "UPDATE notification SET status = 1 WHERE notificationId = " . $notificationId;

    if ($id != 'NA') 
    {
        $sql .= " AND user_id = " . $id;
    }

    $query = $conn->query($sql) or die("Error LC001: " . mysqli_error($conn));

    if ($type == 0) return ($query) ? 'success' : $conn->error;
}

function get_notif_func($id = 0, $all = false, $queries = "")
{
    include("dbconnection.php");

    $sql = "SELECT id, notif_func FROM system_notification";

    $sql .= ($all) ? "" : " WHERE id = '$id'";

    $sql .= ($all) ? " WHERE " . $queries : "";

    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        if ($all) 
        {
            $data = [];

            while ($row = $query->fetch_assoc()) 
            {
                $data[$row['id']] = $row['notif_func'];
            }

            return $data;
        } 
        else 
        {
            $row = $query->fetch_assoc();

            return $row['notif_func'];
        }
    }
}

function notif_view_type($link)
{
    // 0 - Modal
    // 1 - Page

    switch ($link)
    {
        case (strpos($link, 'deleteFormId') !== false):
            return 0;
        case (strpos($link, 'applicationId') !== false):
            return 1;
        default:
            return 1;
    }
}

function getAccountType($type, $level = 0)
{
    $data = [];

    switch ($type) 
    {
        case 0:
            $typeName = "Super Admin";
            break;
        case 1:
            $typeName = "Admin";
            break;
        case 2:
            $typeName = "Beneficiary";
            break;
        case 3:
            $typeName = "Applicant";
            break;
        default:
            $typeName = "Unknown";
    }

    switch ($level) 
    {
        case 0:
            $levelName = "No Super Admin Access";
            break;
        case 1:
            $levelName = "Super Admin w/ limited Access";
            break;
        case 2:
            $levelName = "Super Admin w/ Full Access";
            break;
        default:
            $levelName = "Unknown";
    }

    array_push($data, $typeName, $levelName);

    return $data;
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

    switch ($type) {
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

function get_user_id_notification($type = [], $except = [])
{
    include("dbconnection.php");

    $data = [];

    $getType = "";
    $getException = "";

    $getType = (count($type) > 0) ? "AND account_type IN (" . implode(",", $type) . ")" : "";
    $getException = (count($except) > 0) ? "AND id NOT IN (" . implode(",", $except) . ")" : "";

    $sql = "SELECT id, user_name FROM account WHERE account_status = 1 " . $getType . " " . $getException;
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

function get_notif_type($id)
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT notified_users FROM notification_type WHERE id = " . $id;
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();

        $data = explode(",", $row['notified_users']);
    }

    return $data;
}


function get_education_courses($type = '', $id = 0)
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT id, name FROM education_courses WHERE ";

    if ($id == 0) 
    {
        $sql .= "type = '{$type}' ";
    } 
    else 
    {
        $sql .= "id = '{$id}' ";
    }

    $query = $conn->query($sql);


    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $data[$row['id']] = $row['name'];
        }
    }

    return ($id == 0) ? $data : $data[$id];
}

function get_course_name($id)
{
    include("dbconnection.php");

    $data = '';

    $sql = "SELECT name FROM education_courses WHERE id = '{$id}'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();

        $data = $row['name'];
    }

    return $data;

    // echo $sql;
}

function get_school()
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT * FROM school";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $data[$row['id']] = $row;
        }
    }

    return $data;
}

function get_school_name($id)
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT * FROM school WHERE id =  '{$id}'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();

        $data = $row;
    }

    return $data;
}

function get_school_name_id($id){
    include("dbconnection.php");
    $data = "";

    $sql = "SELECT school_name FROM school WHERE id = '" . $id . "'";
    $query = $conn->query($sql);
    
    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();

        return ($row['school_name']);
    }else{
        return 'No data found';
    }
}

function get_school_classification($id){
    include("dbconnection.php");
    $data = "";

    $sql = "SELECT class_type FROM school WHERE id = '" . $id . "'";
    $query = $conn->query($sql);
    
    if ($query->num_rows > 0) 
    {
        $row = $query->fetch_assoc();

        return get_school_class($row['class_type']);
    }else{
        return 'No data found';
    }
}

function check_status($id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $status = ($_SESSION['account_type'] == 2) ? 3 : 0;

    $data = [];

    do
    {
        $count = 0;
        $sql = "SELECT * FROM scholarship_application WHERE userId = " . $id . " AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "' ORDER BY id DESC LIMIT 1";
        $query = $conn->query($sql);
        
        if ($query->num_rows > 0) 
        {
            $row = $query->fetch_assoc();
    
            $data = $row;

            $count++;
        }
        else
        {
            // $sql = "INSERT INTO scholarship_application (userId, ay_id, sem_id, scholarType, account_type, status, dateApplied) VALUES (" . $id . ", '" . $acadYear . "', '" . $defaultYear . "', '" . $_SESSION['scholarType'] . "', '" . $_SESSION['account_type'] . "', '" . $status . "', NOW())";
            $sql = "INSERT INTO scholarship_application (userId, ay_id, sem_id, scholarType, account_type, status, dateApplied) 
                    VALUES (" . $id . ", '" . $acadYear . "', '" . $defaultYear . "', '" . $_SESSION['scholarType'] . "', '" . $_SESSION['account_type'] . "', '" . 0 . "', NOW())"; //Status is Set to 0 (Reset)

            $query = $conn->query($sql);
        }

    } while ($count == 0);

    return $data;
}

function update_status($type, $id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $typeName = "";
    $typeUpdate = "";

    switch ($type) {
        case 1:
            $typeName = 'info_flag';
            $typeUpdate = 'educ_flag';
            break;
        case 2:
            $typeName = 'educ_flag';
            $typeUpdate = 'family_flag';
            break;
        case 3:
            $typeName = 'family_flag';
            $typeUpdate = 'add_flag';
            break;
        case 4:
            $typeName = 'add_flag';
            $typeUpdate = 'add_flag';
            break;
        case 5:
            $typeName = 'req_flag';
            break;
    }
    
    $sql = "UPDATE scholarship_application SET " . $typeName . " = 1, current_active = '$typeUpdate' WHERE userId = " . $id . " 
            AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";
    $query = $conn->query($sql);

    return ($query) ? true : $conn->error; $conn->rollback();
}

function updateDeleteRequest($data)
{
    include("dbconnection.php");

    $formId = $data['id'];
    $notifId = $data['notifId'];
    $modifiedBy = $data['modifiedBy'];
    $reason = $data['reason'];
    $status = $data['status'];

    $notif = update_notification($notifId);
    if ($notif !== 'success') return 'Error: ' . $notif;

    $sql = "UPDATE delete_account_form SET modifiedBy = " . $modifiedBy . ", modifierReason = '" . $reason . "', status = " . $status . ", date_updated = NOW() 
            WHERE id = " . $formId;
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function update_applicant_status($id, $status, $date = "", $end = "", $reason = "")
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "UPDATE scholarship_application SET status = " . $status . "";

    if ($date != "")
    {
        $sql .= ($status == 2) ? ", exam_start_date = '" . $date . "', exam_end_date = '" . $end . "'" : ", interview_start_date = '" . $date . "', interview_end_date = '" . $end . "'";
    }

    if ($reason != "")
    {
        $sql .= ", reason_of_admin = '" . $reason . "'";
    }

    $sql .= " WHERE userId = " . $id . " AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "'";

    $query = $conn->query($sql);

    return ($query) ? true : $conn->error;
    $conn->rollback();
}

function update_account_status($id, $status)
{
    include("dbconnection.php");

    $sql = "UPDATE account SET account_status = " . $status . " WHERE id = " . $id;
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
    $conn->rollback();
}

function update_account_type($id, $type)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "UPDATE account SET account_type = " . $type . " WHERE id = " . $id;
    $query = $conn->query($sql);

    if (!$query) return $conn->error;

    // $sql2 = "UPDATE scholarship_application SET account_type = " . $type . " WHERE userId = " . $id . " AND ay_id = '" . $acadYear . "' AND sem_id = '" . $defaultYear . "' LIMIT 1";
    // $query2 = $conn->query($sql2);
    // return ($query2) ? "success" : $conn->error;
    return ($query) ? "success" : $conn->error;
    $conn->rollback();
}

function upload_file($file, $mainPath, $viewPath, $options = ['type' => [], 'queryPath' => '', 'errorValidation' => ['0' => 'Invalid File Type']])
{
    if ($file != "") 
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $options['type'])) 
        {
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = $mainPath . $fileNewName;
            $fileDestinationQuery = $viewPath . $fileNewName;
            if (move_uploaded_file($fileTmpName, $fileDestinationQuery)) 
            {
                return ['success' => true, 'path' => $fileDestination];
            } 
            else 
            {
                return ['success' => false, 'error' => 'Error LC001: File Upload Failed'];
            }
        } 
        else 
        {
            return "Invalid File Type";
        }
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

function check_exist_multiple($data, $type = 0) // 0 - Num Rows, 1 - Data
{
    include("dbconnection.php");

    $table = $data['table'];
    $return = (!isset($data['return'])) ? "*" : $data['return'];
    $column = isset($data['column']) ? $data['column'] : null;

    $sql = "SELECT " . $return . " FROM " . $table . "  ";

    if ($column != null)
    {
        $sql .= "WHERE ";

        foreach ($column as $key => $value) 
        {
            $sql .= $key ;

            foreach ($value as $key2 => $value2) 
            {
                $sql .= " " . $value2;
            }

            $sql .= " AND ";

            // $sql .= $key . " = '" . $value . "' AND ";
        }

        $sql = substr($sql, 0, -4);
    }

    $query = $conn->query($sql);

    if ($type == 0) 
    {
        return $query->num_rows;
    } 
    else 
    {
        $values = [];

        if ($query->num_rows > 0) 
        {
            while ($row = $query->fetch_assoc()) 
            {
                $values[] = (!isset($data['return'])) ? $row : $row[$data['return']];
            }

            return $values;
        } 
        else 
        {
            return $conn->error;
        }
    }
}

function insert_logs($data)
{
    include("dbconnection.php");

    $table = $data['table'];
    $id = $data['userId'];

    $sql = "INSERT INTO " . $table . " (";

    foreach ($data['column'] as $key => $column) {
        $sql .= $key . ", ";
    }

    $sql .= "deleted_by, date_deleted) VALUES (";

    foreach ($data['column'] as $key => $value) {
        $sql .= "'" . $value . "', ";
    }

    $sql .= "'" . $id . "', NOW())";

    $query = $conn->query($sql);

    return ($query) ? true : $conn->error;
}

function get_table_columns($table)
{
    include("dbconnection.php");

    $data = [];

    $sql = "SHOW COLUMNS FROM " . $table;
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $data[] = $row['Field'];
        }
    }

    return $data;
}

function updateApplication($type, $id)
{
    include("dbconnection.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "UPDATE scholarship_application SET ";

    if ($type == 0) // Finished
    {
        $sql .= " dateFinished = NOW(), status = '1' ";
    }

    $sql .= " WHERE userId = " . $id . " AND ay_id = " . $acadYear . " AND sem_id = " . $defaultYear;
    $query = $conn->query($sql);

    return ($query) ? 'success' : $conn->error;
}

function getDefaultAcadYearColumn($column)
{
    include("dbconnection.php");

    $sql = "SELECT {$column} FROM acad_year WHERE default_ay = 1";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);

            return (${$column});
        }
    }
}

function getDefaultAcadYearId()
{
    include("dbconnection.php");

    $readOnly = checkReadOnlyStatus();
    if ($readOnly <> 0) 
    {

        $sql = "SELECT * FROM acad_year WHERE read_only = 1";
        $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

        if ($query->num_rows <>  0) 
        {
            while ($row = $query->fetch_assoc()) 
            {
                extract($row);
            }
        }
    } 
    else 
    {
        $sql = "SELECT * FROM acad_year WHERE default_ay = 1";
        $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

        if ($query->num_rows <>  0) 
        {
            while ($row = $query->fetch_assoc()) 
            {
                extract($row);
            }
        }
    }

    return $id;
}

function getDefaultSemesterId()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM semester WHERE default_sem = 1";
    $query = $conn->query($sql) or die("Error BSQ0015: " . $conn->error);

    if ($query->num_rows <>  0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);

            return $id;
        }
    }
}

function getCheckboxValueDB($value)
{
    return ($value == 1) ? 'checked' : '';
}

function getAudience($shs, $colEAPub, $colEAPriv, $colSc)
{
    $audience = ($shs          == 1) ? 'Senior High <br>' : '';
    $audience .= ($colEAPub     == 1) ? 'College EA Public <br>' : '';
    $audience .= ($colEAPriv    == 1) ? 'College EA Private <br>' : '';
    $audience .= ($colSc        == 1) ? 'College Scholarship <br>' : '';
    return $audience;
}

function getFileEntries($acadYearId, $semId, $userid, $file, $fetch = 0, $notSubmitted = 0)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM {$file} WHERE ay_id = '{$acadYearId}' AND sem_id = '{$semId}' AND account_id = '{$userid}' ";
    $sql .= ($notSubmitted == 1) ? "AND status != '1' " : " "; 
    $sql .= "ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error URQ005: " . $conn->error);

    if ($fetch == 0) 
    {
        return $query;
    } 
    elseif ($fetch == 1) 
    {
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}

function getAccounts($account_type, $account_status = 1, $count = 0, $ay_sem = [])
{
    include("dbconnection.php");

    $sql = "SELECT * FROM scholarship_application sca
            JOIN gen_info gin ON sca.userId = gin.user_id  
                            AND sca.ay_id = gin.ay_id
                            AND sca.sem_id = gin.sem_id
            JOIN account acc ON gin.user_id = acc.id
                AND gin.sem_id = sca.sem_id
            WHERE sca.account_type ='{$account_type}' 
            AND acc.account_status = '{$account_status}'
            AND sca.ay_id = '{$ay_sem['ay']}' 
            AND sca.sem_id = '{$ay_sem['sem']}'
            GROUP BY sca.userId
            ORDER BY acc.id ASC";
    $query = $conn->query($sql) or die("Error URQ007: " . $conn->error);

    if ($count == 1) 
    {
        return $query->num_rows;
    }
}

function getGraduating($graduation_year, $account_type, $count = 0, $ay_sem = [])
{
    include("dbconnection.php");

    $sql = "SELECT * FROM account acc 
            JOIN user_info inf ON acc.id = inf.account_id 
            JOIN gen_info gin ON acc.id = gin.user_id
            WHERE acc.account_type IN (2,3) 
            AND acc.account_status = '1'
            AND gin.graduating_flag = '0'
            AND gin.ay_id = '{$ay_sem['ay']}'
            AND gin.sem_id = '{$ay_sem['sem']}'";
    $query = $conn->query($sql) or die("Error URQ007: " . $conn->error);

    if ($count == 1) 
    {
        return $query->num_rows;
    }
}

function checkBasicSettings($table, $ay)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM {$table}
            WHERE ay_id = '{$ay}'";
    $query = $conn->query($sql) or die("Error URQ007: " . $conn->error);

    return $query->num_rows;
}

function checkReadOnlyStatus($id = 0)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM acad_year WHERE read_only = '1'" . (($id <> 0) ? " AND id = '{$id}'" : '');
    $query = $conn->query($sql) or die("Error URQ007: " . $conn->error);

    return $query->num_rows;
}

// function getAcadYearIdCount($id = 0, $limit = 0)
// {
//     include("dbconnection.php");

//     $data = [];

//     $sql = "SELECT * FROM acad_year WHERE id <= '{$id}' ORDER BY id ASC LIMIT '{$limit}'";
//     $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

//     if ($query->num_rows <>  0) {
//         while ($row = $query->fetch_assoc()) {
//             $data[] = [$row];
//         }
//     }

//     return $data;
// }

function getAcadYearOptions(){
    include("dbconnection.php");
    $data = [];

    $sql = "SELECT id, ay FROM acad_year ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            $data[] = [
                $row['id'],
                $row['ay'],
            ];
        }
    }

    return json_encode($data);
}

function getSchoolsDetailsArray($blank, $school_type, $class_type, $partner){

    include("dbconnection.php");

    ($blank == 1) ? $data = [['0', '']] : $data = [];

    $sql = "SELECT * FROM school";
    if($school_type < 4 || $class_type < 3 || $partner <> 0){
        $sql .= " WHERE 1 ";
        if($school_type < 4){
            $sql .= "AND school_type = '{$school_type}'";
        }
        if($class_type < 3){
            $sql .= "AND class_type = '{$class_type}'";
        }
        if($partner == 1){
            $sql .= "AND partner = '{$partner}'";
        }
    }    
    
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);
            $data[] = [$id , $school_name];
        }
    }

    return $data;
    
}

function getApplicantUserId($acadYearId, $semId, $shs, $colEAPub, $colEAPriv, $colSc, $active){
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT acc.id FROM account acc 
            JOIN scholarship_application sca ON acc.id = sca.userId ";

    $sql .= "WHERE sca.ay_id = '{$acadYearId}' AND sca.sem_id = '{$semId}' AND acc.account_status != 0";
    $sql .= ($shs       == 'true') ? " AND sca.scholarType = 3 " : "";
    $sql .= ($colEAPub  == 'true') ? " AND sca.scholarType = 2 " : "";
    $sql .= ($colEAPriv == 'true') ? " AND sca.scholarType = 2 " : "";
    $sql .= ($colSc     == 'true') ? " AND sca.scholarType = 1 " : "";
    
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if($query->num_rows <> 0){
        while($row = $query->fetch_assoc()){
            extract($row);
            $data[] = $id;
        }
    }
    return($data);
}

function getRequirementDesc($reqId){
    include("dbconnection.php");

    $data = "";

    $sql = "SELECT * FROM requirements WHERE id = '{$reqId}'";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    while($row = $query->fetch_assoc()){
        $data = $row['requirement_name'];
    }
    
    return ($data);
}

function getAllEmails($active = 1){
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT email FROM `account` WHERE account_status = '{$active}'";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    while($row = $query->fetch_assoc()){
        $data[] = $row['email'];
    }
    
    return ($data);
}