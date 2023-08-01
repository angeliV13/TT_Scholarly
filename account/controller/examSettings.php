<?php

require("../model/examSettingsModel.php");


if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];

    switch ($action) {
        case 0:
            echo getExamTotalItems();
            break;
        case 1:
            $english    = $_POST['english'];
            $math       = $_POST['math'];
            $genInfo    = $_POST['genInfo'];
            $abstract   = $_POST['abstract'];
            echo changeExamTotalItems($english, $math, $genInfo, $abstract);
            break;
        
    }
}
