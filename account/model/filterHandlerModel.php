<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");

// Filtering
function filter($data, $id = 0, $scholarType = 0, $educationLevel = 0, $school = 0, $yearLevel = 0)
{
    if($id == 'ScholarType'){
        if($educationLevel == 1){       //SHS 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['1', 'Senior High School']],
                "school"            => getSchoolsDetailsArray(1, 1, 3, 0),
                "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
            ];
        }elseif($educationLevel == 2){  //Col Priv 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['2', 'College - Private']],
                "school"            => getSchoolsDetailsArray(1, 0, 1, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }else{                          // Col Pub
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance']],
                "educationLevel"    => [['3', 'College - Public']],
                "school"            => getSchoolsDetailsArray(1, 0, 0, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }
        if($scholarType == 2){
            $data = [
                "scholarType"       => [['2', 'Full Scholarship']],
                "educationLevel"    => [['2', 'College - Private']],
                "school"            => getSchoolsDetailsArray(1, 4, 3, 1),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }
        
    }elseif($id == 'EducationLevel'){
        if($educationLevel == 1){       //SHS 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['1', 'Senior High School']],
                "school"            => getSchoolsDetailsArray(1, 1, 3, 0),
                "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
            ];
        }elseif($educationLevel == 2){  //Col Priv 
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                "educationLevel"    => [['2', 'College - Private']],
                "school"            => getSchoolsDetailsArray(1, 0, 1, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }else{                          // Col Pub
            $data = [
                "scholarType"       => [['0', '--'], ['1', 'Educational Assitance']],
                "educationLevel"    => [['3', 'College - Public']],
                "school"            => getSchoolsDetailsArray(1, 0, 0, 0),
                "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
            ];
        }
    }elseif($id == 'School'){
        if($school == 0){
            if($educationLevel == 1){
                $data = [
                    "scholarType"       => [['1', 'Educational Assitance']],
                    "educationLevel"    => [['1', 'Senior High School']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
                ];
            }elseif($educationLevel > 1){
                $data = [
                    "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                    "educationLevel"    => [['2', 'College - Private'], ['3', 'College - Public']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
                ];
            }elseif($educationLevel == 0){
                $data = [
                    "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                    "educationLevel"    => [['2', 'College - Private'], ['3', 'College - Public']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
                ];
            }
        }
    }elseif($id == 'YearLevel'){
        if($yearLevel == 1 || $yearLevel == 2){
            if($educationLevel == 1){
                $data = [
                    "scholarType"       => [['1', 'Educational Assitance']],
                    "educationLevel"    => [['1', 'Senior High School']],
                    "school"            => getSchoolsDetailsArray(1, 1, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
                ];
            }elseif($educationLevel == 0){
                $data = [
                    "scholarType"       => [['1', 'Educational Assitance']],
                    "educationLevel"    => [['1', 'Senior High School']],
                    "school"            => getSchoolsDetailsArray(1, 1, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['1', 'Grade 11'], ['2', 'Grade 12']],
                ];
            }
            
        }elseif($yearLevel > 2){
            if($educationLevel == 1){
                $data = [
                    "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                    "educationLevel"    => [['0', '--'], ['2', 'College - Private'], ['3', 'College - Public']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
                ];
            }elseif($educationLevel < 1){
                $data = [
                    "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                    "educationLevel"    => [['0', '--'], ['2', 'College - Private'], ['3', 'College - Public']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
                ];
            }elseif($educationLevel == 0){
                $data = [
                    "scholarType"       => [['0', '--'], ['1', 'Educational Assitance'], ['2', 'Full Scholarship']],
                    "educationLevel"    => [['0', '--'], ['2', 'College - Private'], ['3', 'College - Public']],
                    "school"            => getSchoolsDetailsArray(1, 0, 0, 0), //Schools not Necessarily Needed
                    "yearLevel"         => [['0', '--'], ['3', 'First Year'], ['4', 'Second Year'], ['5', 'Third Year'], ['6', 'Fourth Year'], ['7', 'Fifth Year']],
                ];
            }
            
        }
    }

    return json_encode($data);
}


