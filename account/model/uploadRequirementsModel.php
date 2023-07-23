<?php

function generateRandomString($length = 5) // generates a random string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getFileChecks($check , $file){
    if($check == false){
        if($file['name'] != ''){
            return 1;
        }
        else
        {
            return 0;
        }
    }  
    else{
        return 2;
    }  
}

// function getAssessmentBeneTable(){
//     include("dbconnection.php");

//     $totalData = 0;
//     $data = [];
//     $counter = 1;

//     $sql = "SELECT * FROM assessment_file ORDER BY id DESC LIMIT 5";
//     $query = $conn->query($sql) or die("Error BSQ001: " . $conn->error);

//     if ($query->num_rows <>  0) {
//         while ($row = $query->fetch_assoc())
//         {
//             extract($row);

//             $button =   '<div class="btn-group d-flex align-content-center">
//                             <a href="#" class="col-6 btn btn-warning btn-sm" onclick="defaultAY('. $from_ay .')">Make Default</a>
//                             <a href="#" class="col-6 btn btn-danger btn-sm" onclick="deleteAY('. $from_ay .')">Delete</a>
//                         </div>';
//             if($default_ay == 1){
//                 $button = '<div class="align-content-center">
//                                 <p class="text-center fst-italic">Default Academic Year</p>
//                             </div>';
//             }

//             $data[] = [
//                 $counter,
//                 $ay,
//                 accountHandlerAccess( 1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
//                 $button,
//             ];

//             $counter++;
//         }
//     }

//     $json_data = array(
//         "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
//         "recordsTotal"    => intval($totalData),  // total number of records
//         "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
//         "data"            => $data   // total data array
//     );

//     echo json_encode($json_data);  // send data as json format
// }

function getDefaultAcadYearId(){
    include("dbconnection.php");

    $sql = "SELECT * FROM acad_year WHERE default_ay = 1";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            return $id;
        }
    }
}

function uploadFile($ay, $userid, $target_dir, $file, $type, $code){

    $errors = "";
    $file_name  = $ay . "_" . $userid . "_" . $code . "_" . $type;  
    $file_size  = $file['size'];
    $file_tmp   = $file['tmp_name'];
    // $file_ext   = strtolower(end(explode('.', $name_of_file)));
    $tmp = explode('.', $file['name']);
    $file_ext = strtolower(end($tmp));
    
    
    $extensions= array("pdf");
    
    if(in_array($file_ext,$extensions)=== false){
        $errors ="extension not allowed, please choose a pdf file format.";
    }
    
    if($file_size > 5242880){
        $errors ='File size must be maximum of 5 MB';
    }
    
    if(empty($errors)==true){
        move_uploaded_file($file_tmp, $target_dir . $file_name . '.' . $file_ext);
        return "Success";
    }else{
        return($errors);
    }
}

function submitAssessment($target_dir, $schoolId, $clearance, $cor, $grade, $schoolIdFile, $clearanceFile, $corFile, $gradeFile){
    session_start();  
    include("dbconnection.php");

    $ay     = getDefaultAcadYearId();
    $userid = $_SESSION['id'];
    $uniqueCode = generateRandomString();

    if($schoolId == 'false'){
        $type = "schoolid";
        $value = uploadFile($ay, $userid, $target_dir, $schoolIdFile, $type, $code);
    }
    if($clearance == 'false'){
        $type = "clearance";
        $value = uploadFile($ay, $userid, $target_dir, $clearanceFile, $type, $code);
    }
    if($cor == 'false'){
        $type = "cor";
        $value = uploadFile($ay, $userid, $target_dir, $corFile, $type, $code);
    }
    if($grade == 'false'){
        $type = "grade";
        $value = uploadFile($ay, $userid, $target_dir, $gradeFile, $type, $code);
    }

    return $value;
}

?>