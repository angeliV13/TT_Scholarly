<?php

    $dbhost = 'localhost';
    $dbuser = ($_SERVER['HTTP_HOST'] == '127.0.0.1') ? 'root' : 'u497506402_admin';
    $dbpassword = ($_SERVER['HTTP_HOST'] == '127.0.0.1') ? '' : 'Santotomas.0907';
    $dbdatabase = ($_SERVER['HTTP_HOST'] == '127.0.0.1') ? 'db_scholarsystem' : 'u497506402_scholarsystem';
    $dbport = 3306;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

    // Check connection
    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>