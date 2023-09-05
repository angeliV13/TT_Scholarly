<?php

require("../model/examSettingsModel.php");
require("../model/basicSetupModel.php");


if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];

    switch ($action) {
        case 0:
            echo json_encode(getExamTotalItems());
            break;
        case 1:
            $english    = $_POST['english'];
            $math       = $_POST['math'];
            $genInfo    = $_POST['genInfo'];
            $abstract   = $_POST['abstract'];
            echo changeExamTotalItems($english, $math, $genInfo, $abstract);
            break;
        case 2:
            $category        = $_POST['category'];
            $examAddQuestion = $_POST['examAddQuestion'];
            $examAddChoices  = $_POST['examAddChoices'];
            $examAddAnswer   = $_POST['examAddAnswer'];
            echo addExamItems($category, $examAddQuestion, $examAddChoices, $examAddAnswer);
            break;
        case 3:
            echo startExam();
            break;   
        case 4:
            echo getExam();
            break;
        case 5:
            $questionArrayValue = $_POST['questionArrayValue'] - 1;
            $questionAnswer     = $_POST['questionAnswer'];
            echo saveExam($questionArrayValue, $questionAnswer);
            break;
        case 6:
            echo submitExam();
            break;
        case 7:
            $id              = $_POST['id'];
            $category        = $_POST['category'];
            $examAddQuestion = $_POST['examAddQuestion'];
            $examAddChoices  = $_POST['examAddChoices'];
            $examAddAnswer   = $_POST['examAddAnswer'];
            echo editExamItems($id, $category, $examAddQuestion, $examAddChoices, $examAddAnswer);
            break;
        case 8:
            $id              = $_POST['id'];
            echo deleteExamItems($id);
            break;
        
    }
}
