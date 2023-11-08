<?php

require("../model/filterHandlerModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    $data = [
                "scholarType"       => [['0', ''], ['1', 'College Scholarship'], ['2', 'College Educational Assistance'], ['3', 'SHS Educational Assistance']],
                "educationLevel"    => [['0', ''], ['1', 'Senior High School'], ['2', 'College']],
                "school"            => getSchoolsDetailsArray(1, 4, 3, 0),
                "yearLevel"         => [['0', ''], ['11', 'Grade 11'], ['12', 'Grade 12'], ['1', 'First Year'], ['2', 'Second Year'], ['3', 'Third Year'], ['4', 'Fourth Year'], ['5', 'Fifth Year']],
                "classType"         => [['0', ''], ['1', 'Public (Within Sto.Tomas, Batangas)'], ['2', 'Private (Within Sto.Tomas, Batangas)'], ['3', 'Public (Outside Sto.Tomas, Batangas)'], ['4', 'Private (Outside Sto.Tomas, Batangas)']],
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
