<?php 

require("../model/basicSetupModel.php");


    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];

        switch ($action){
            case 1: 
                if(isset($_REQUEST['getTable'])){   //Table Generations
                    $getTable = $_REQUEST['getTable'];
                    if($getTable == 1)                      //Generate Acad Year Table
                    {
                        echo getAcadYearTable();
                    }
                }
                break;
            case 2:                                 //Generate Academic Year
                echo generate_ay();
        }
    }

?>