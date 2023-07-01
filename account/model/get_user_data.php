<?php

function get_user_data($id){
    include("dbconnection.php");

    $user_data = [];

    // Checks if Account Exists
    $query = "SELECT * FROM account WHERE id = '" . $id . "'";
    $sql = mysqli_query($conn, $query) or die("Error UD001: " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql))
    {
        extract($row);
    }  
    array_push($user_data, $id, $user_name, $email, $account_type, $access_level, $account_status);
    
    return $user_data;
}

?>