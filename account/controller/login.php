<?php

require("../model/login.php");
if ($_POST['user_name'] <> '' && $_POST['password'] <> '' && $_POST['type'] <> '') {
    $lv_return = userLogin($_POST['user_name'], $_POST['password'], $_POST['type']);

    echo $lv_return;
}else{
    echo 'Error LC001: No Data Found';
}
