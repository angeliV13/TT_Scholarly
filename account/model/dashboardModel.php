<?php

session_start();
include("functionModel.php");

function getTotalCounts()
{
    $acadYearId  = getDefaultAcadYearId();
    $acadYearEnd = getDefaultAcadYearColumn('to_ay');
    $ay_sem = [
        "ay"    => getDefaultAcadYearId(),
        "sem"   => getDefaultSemesterId(),
    ];

    $data = [
        getAccounts(3, 1, 1, $ay_sem),   // Applicant
        getAccounts(2, 1, 1, $ay_sem),    // Beneficiaries
        getGraduating($acadYearEnd, 2, 1, $ay_sem) // Graduating

    ];

    return json_encode($data);
}

function getApplicantCount()
{
    $ay_id  = getDefaultAcadYearId();
    $sem_id = getDefaultSemesterId();

    $data = [
        "colEA" => getUserCount($ay_id, $sem_id, 3, 2), //College EA
        "colSc" => getUserCount($ay_id, $sem_id, 3, 1), //College SC
        "shs"   => getUserCount($ay_id, $sem_id, 3, 3) // SHS EA
    ];

    return json_encode($data);
}

function getUserCount($ay_id, $sem_id, $account_type, $scholarType){
    include("dbconnection.php");
    $sql = "SELECT COUNT(userId) AS 'value'
            FROM scholarship_application 
            WHERE ay_id = '{$ay_id}'
            AND sem_id = '{$sem_id}'
            AND account_type = '{$account_type}'
            AND scholarType = '{$scholarType}'";

    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    while($row = $query->fetch_assoc()) {
        extract($row);
    }

    return $value;
}

function getChartTrends()
{
    include("dbconnection.php");

    $data       = [];
    $categ      = [];
    $shsArray   = [];
    $colEAArray = [];
    $colScArray  = [];


    $sql = "SELECT ay.ay, sem.short_name, 
            COUNT(CASE WHEN sca.scholarType = 3 THEN 1 END) AS shs, 
            COUNT(CASE WHEN sca.scholarType = 2 THEN 1 END) AS colEA, 
            COUNT(CASE WHEN sca.scholarType = 1 THEN 1 END) AS colSc 
            FROM scholarship_application sca 
            JOIN acad_year ay ON sca.ay_id = ay.id 
            JOIN semester sem ON sca.sem_id = sem.id 
            GROUP BY ay_id, sem_id 
            ORDER BY ay_id ASC, sem_id ASC LIMIT 5";

    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {

            extract($row);
            // Category
            $categ[] = [$ay . ' ' . $short_name];

            // Data
            $shsArray[]     =   $shs;
            $colEAArray[]   =   $colEA;
            $colScArray[]   =   $colSc;
        }
        $data = [
            'categories' => $categ,
            'shs'        => $shsArray,
            'colEA'      => $colEAArray,
            'colSc'      => $colScArray
        ];
    }

    return json_encode($data);
}

function getBarangayTrends()
{
    include("dbconnection.php");
    $ay_id  = getDefaultAcadYearId();
    $sem_id = getDefaultSemesterId();

    $data       = [];
    $barangay   = [];
    $male_arr   = [];
    $female_arr = [];


    $sql = "SELECT uin.barangay, 
            COUNT( CASE WHEN gender = 0 THEN 1 END ) AS 'male', 
            COUNT( CASE WHEN gender = 1 THEN 1 END ) AS 'female' 
            FROM user_info uin
            JOIN scholarship_application sca ON uin.account_id = sca.userId
            WHERE uin.barangay IS NOT NULL 
            AND sca.ay_id = '{$ay_id}'
            AND sca.sem_id = '{$sem_id}'
            GROUP BY uin.barangay";

    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {

            extract($row);
            // Data
            $categories[]   =   $barangay;
            $male_arr[]     =   $male;
            $female_arr[]   =   $female;
        }
        $data = [
            'barangay'   => $categories,
            'male'       => $male_arr,
            'female'     => $female_arr
        ];
    }

    return json_encode($data);
}

function getRecentActivity()
{
    include("dbconnection.php");
    $user = $_SESSION['id'];

    $data = "";
    $count = 1;

    $sql = "SELECT * FROM notification WHERE user_id = '{$user}' ORDER BY notif_date DESC LIMIT 6";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);
            $body = explode('<br>', $notif_body)[1];
            $date = $notif_date;
            $data .= activityButton($count, $body, $notif_link, $notif_date);

            $count++;
        }
    }
    return $data;
}

function activityButton($count = 0, $notif_body="", $notif_link = "", $notif_date)
{
    $buttonArray = ['', 'success', 'danger', 'primary', 'info', 'warning', 'muted',];
    $start_date = new DateTime($notif_date);
    $diff_date = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));
    $date = "";

    if($diff_date->m <> 0){
        $date = $diff_date->m . ' month/s';
    }
    elseif($diff_date->d <> 0){
        $date = $diff_date->d . ' day/s';
    }
    elseif($diff_date->h <> 0){
        $date = $diff_date->h . ' hour/s';
    }
    elseif($diff_date->i <> 0){
        $date = $diff_date->i . ' min/s';
    }
    else{
        $date = $diff_date->s . ' sec/s';
    }

    $data = '   <div class="activity-item d-flex">
                    <div class="activite-label">'. $date .'</div>
                    <i class="bi bi-circle-fill activity-badge text-'. $buttonArray[$count] .' align-self-start"></i>
                    <div class="activity-content">
                    <a href="index.php'.$notif_link.'" class="text-dark">'. $notif_body .'</a>
                    </div>
                </div><!-- End activity item-->';

    return $data;
}

function getGenderTrends()
{
    include("dbconnection.php");
    $ay_id  = getDefaultAcadYearId();
    $sem_id = getDefaultSemesterId();

    $data       = [];


    $sql = "SELECT 
            COUNT( CASE WHEN gender = 0 AND scholarType != 3 THEN 1 END ) AS 'col_male', 
            COUNT( CASE WHEN gender = 0 AND scholarType = 3 THEN 1 END ) AS 'shs_male', 
            COUNT( CASE WHEN gender = 1 AND scholarType != 3 THEN 1 END ) AS 'col_female', 
            COUNT( CASE WHEN gender = 1 AND scholarType = 3 THEN 1 END ) AS 'shs_female' 
            FROM user_info uin
            JOIN scholarship_application sca ON uin.account_id = sca.userId
            WHERE sca.ay_id = '{$ay_id}'
            AND sca.sem_id = '{$sem_id}'";

    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {

            extract($row);
            // Data
            $shs_male_arr[]     =   $shs_male;
            $col_male_arr[]     =   $col_male;
            $shs_female_arr[]   =   $shs_female;
            $col_female_arr[]   =   $col_female;
        }
        $data = [
            'shs_male'       => $shs_male_arr,
            'col_male'       => $col_male_arr,
            'shs_female'     => $shs_female_arr,
            'col_female'     => $col_female_arr,
        ];
    }

    return json_encode($data);
}

function getSchoolTrends()
{
    include("dbconnection.php");
    $ay_id  = getDefaultAcadYearId();
    $sem_id = getDefaultSemesterId();

    $data       = [];
    $schools    = [];
    $male_arr   = [];
    $female_arr = [];


    $sql = "SELECT uin.barangay, 
            COUNT( CASE WHEN gender = 0 THEN 1 END ) AS 'male', 
            COUNT( CASE WHEN gender = 1 THEN 1 END ) AS 'female' 
            FROM user_info uin
            JOIN scholarship_application sca ON uin.account_id = sca.userId
            WHERE uin.barangay IS NOT NULL 
            AND sca.ay_id = '{$ay_id}'
            AND sca.sem_id = '{$sem_id}'
            GROUP BY uin.barangay";

    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {

            extract($row);
            // Data
            $categories[]   =   $barangay;
            $male_arr[]     =   $male;
            $female_arr[]   =   $female;
        }
        $data = [
            'barangay'   => $categories,
            'male'       => $male_arr,
            'female'     => $female_arr
        ];
    }

    return json_encode($data);
}