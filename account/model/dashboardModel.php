<?php

session_start();
include("functionModel.php");

function getTotalCounts()
{
    $acadYearId  = getDefaultAcadYearId();
    $acadYearEnd = getDefaultAcadYearColumn('to_ay');

    $data = [
        getAccounts(2, 1, 1),   // Applicant
        getAccounts(3, 1, 1),    // Beneficiaries
        getGraduating($acadYearEnd, 3, 1) // Graduating

    ];

    return json_encode($data);
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
            COUNT(CASE WHEN ayd.shs = 1 THEN 1 END) AS shs, 
            COUNT(CASE WHEN ayd.colEAPub = 1 THEN 1 END) AS colEAPub, 
            COUNT(CASE WHEN ayd.colEAPriv = 1 THEN 1 END) AS colEAPriv, 
            COUNT(CASE WHEN ayd.colSc = 1 THEN 1 END) AS colSc 
            FROM acad_year_data ayd JOIN acad_year ay ON ayd.ay_id = ay.id 
            JOIN semester sem ON ayd.sem_id = sem.id 
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
            $colEAArray[]   =   $colEAPub + $colEAPriv;
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
