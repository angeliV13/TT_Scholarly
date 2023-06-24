<?php

function userLogin($user_name, $password, $type){
    include("dbconnection.php");

    // Checks if Account Exists
    $query = "SELECT * FROM account WHERE user_name = '" . $user_name . "' AND password = '" . $password . "' AND account_type = '" . $type . "'";
    $sql = mysqli_query($conn, $query) or die("Error LQ001: " . mysqli_error($conn));

    if(mysqli_num_rows($sql)<>0){
        while ($row = mysqli_fetch_assoc($sql))
        {
            extract($row);
        }       
        session_start();

        $_SESSION['id'] = $id;
        return 'Success';
    }else{
        return 'Incorrect Username/Password';
    }
}

?>