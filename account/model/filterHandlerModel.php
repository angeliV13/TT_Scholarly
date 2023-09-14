<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");

// Filtering
function filter($data, $id = 0, $scholarType = 0, $educationLevel = 0, $school = 0, $yearLevel = 0)
{
    if($id == 'ScholarType'){
        if($scholarType == 2){
            $data = [
                "scholarType"       => [['2', 'Full Scholarship']],
                "educationLevel"    => [['2', 'College - Private']],
                "school"            => getSchoolsDetailsArray(1, 4, 3, 1),
                "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }
    }elseif($id == 'EducationLevel'){
        if($educationLevel == 0){       //SHS 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['1', 'Senior High School']],
                "school"            => getSchoolsDetailsArray(1, 1, 3, 0),
                "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
            ];
        }elseif($educationLevel == 1){  //Col Priv 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['2', 'College - Private']],
                "school"            => getSchoolsDetailsArray(1, 0, 1, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }else{                          // Col Pub
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['3', 'College - Public']],
                "school"            => getSchoolsDetailsArray(1, 0, 0, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }
    }elseif($id == 'School'){
        if($school == 0){

        }else{
            
        }
    }elseif($id == 'YearLevel'){
        if($yearLevel == 0){

        }else{
            
        }
    }

    return json_encode($data);
}

function getSchoolsDetailsArray($blank, $school_type, $class_type, $partner){

    include("dbconnection.php");

    ($blank == 1) ? $data = [['0', '--']] : $data = [];

    $sql = "SELECT * FROM school";
    if($school_type < 4 || $class_type < 3 || $partner <> 0){
        $sql .= " WHERE 1 ";
        if($school_type < 4){
            $sql .= "AND school_type = '{$school_type}'";
        }
        if($class_type < 3){
            $sql .= "AND class_type = '{$class_type}'";
        }
        if($partner == 1){
            $sql .= "AND partner = '{$partner}'";
        }
    }    
    
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);
            $data[] = [$id , $school_name];
        }
    }

    return $data;
    
}
