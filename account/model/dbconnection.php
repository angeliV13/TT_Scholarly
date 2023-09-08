<?php
    if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
        $dbuser     = 'root';
        $dbpassword = '';
        $dbdatabase = 'db_scholarsystem';
    } else {
        $dbuser     = 'u497506402_admin';
        $dbpassword = 'Santotomas.0907';
        $dbdatabase = 'u497506402_scholarsystem';
    }

    $dbhost = 'localhost';
    // $dbuser = 'root';
    // $dbpassword = '';
    // $dbdatabase = 'db_scholarsystem';
    $dbport = 3306;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

    // Check connection
    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>