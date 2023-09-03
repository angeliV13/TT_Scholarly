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
            $categ[] = [ $ay . ' '. $short_name ];

            // Data
            $shsArray[]     =   $shs ;
            $colEAArray[]   =   $colEAPub + $colEAPriv;
            $colScArray[]   =   $colSc ;
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
