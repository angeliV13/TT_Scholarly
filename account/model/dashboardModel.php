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
    $data = [];

    $acadYearId     = getDefaultAcadYearId();
    $acadYearInfo   = getAcadYearIdCount($acadYearId, 3);

}
