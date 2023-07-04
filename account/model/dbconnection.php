<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbdatabase = 'db_scholarsystem';
    $dbport = 3306;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

    // Check connection
    if (mysqli_connect_errno()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>