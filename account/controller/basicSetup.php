<?php 

require("../model/basicSetupModel.php");


    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];

        switch ($action){
            case 1:     //Generate Academic Year
                echo generate_ay();
        }
    }

?>