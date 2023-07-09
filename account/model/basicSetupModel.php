<?php

    function generate_ay(){ 
        include("dbconnection.php");

        session_start();
        
        date_default_timezone_set("Asia/Manila");

        $from_ay = date("Y");
        $to_ay = date("Y") + 1;
        $ay = $from_ay . ' - ' . $to_ay;
        // Checks if AY Exists

        $sql = "SELECT * FROM acad_year WHERE from_ay = '" . $from_ay . "'";

        $query = $conn->query($sql) or die("Error BQ001: " . $conn->error);

    if($query->num_rows == 0)
    {
        $sql = "INSERT INTO acad_year (`id`, `ay`, `from_ay`, `to_ay`, `modified_by`, `modified_date`) VALUES ('0', '" . $ay . "', '" . $from_ay . "', '" . $to_ay . "', '" . $_SESSION['id'] . "', '" . date('Y-m-d H:i:s') . "')";

        $query = $conn->query($sql) or die("Error BQ002: " . $conn->error);

        return 'Insert Success';
    }
    else
    {
        return 'Academic Year already exists';
    }
}
