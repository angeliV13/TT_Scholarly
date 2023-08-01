<?php

require("model/get_user_data.php");

if(isset($_SESSION['id']))
{
    $user_data = get_user_data($_SESSION['id']);
    $user_info = get_user_info($_SESSION['id']);
    $accountType = getAccountType($user_data[3], $user_data[4]);

    $accType = $accountType[0];
    $accAccess = $accountType[1];

    if($user_data[3] >= 2)
    { //Checking Account Type if beneficiary or applicant
        $assessmentAccess   = assessmentAccess();
        $renewalAccess      = renewalAccess();
        if($user_data[3] == 3)
        {
           $examAccess      = examAccess();
        }
    }
    
}

date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d');

?>