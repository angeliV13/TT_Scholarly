<?php

require("../model/filterHandlerModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['0', '--'], ['1', 'Senior High School'], ['2', 'College - Private'], ['3', 'College - Public']],
                "school"            => getSchoolsDetailsArray(1, 4, 3, 0),
                "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];

    switch ($action) 
    {
        case 0:
            echo json_encode($data);
            break;
        case 1:
            $id              = $_POST['id'];
            $scholarType     = $_POST['scholarType'];
            $educationLevel  = $_POST['educationLevel'];
            $school          = $_POST['school'];
            $yearLevel       = $_POST['yearLevel'];
            echo filter($data, $id, $scholarType, $educationLevel, $school, $yearLevel);
            break;
    }
}
