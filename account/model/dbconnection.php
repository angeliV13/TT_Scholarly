<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'db_scholarsystem';
    $port = 3306;

    $conn=mysqli_connect($host, $user, $password, $database, $port);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        echo "It works";
    }
?>