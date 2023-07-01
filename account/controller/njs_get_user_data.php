<?php

require("model/get_user_data.php");

if(isset($_SESSION['id'])){
    $user_data = get_user_data($_SESSION['id']);
}

?>