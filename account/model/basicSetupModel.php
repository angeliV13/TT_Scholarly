<?php
// ---------------------------------------------------
// Connection to Account Handler
function accountHandlerAccess($access, $id){
    include("dbconnection.php");

    $sql = "SELECT first_name, last_name FROM user_info WHERE id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error UAQ000: " . $conn->error);
    while ($row = $query->fetch_assoc())
    {
        extract($row);
    } 

    return $first_name . ' ' . $last_name;
}
// ---------------------------------------------------

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

function getDefaultSemesterId(){
    include("dbconnection.php");

    $sql = "SELECT * FROM semester WHERE default_sem = 1";
    $query = $conn->query($sql) or die("Error BSQ0015: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            return $id;
        }
    }
}

function getCheckboxValueDB($value){
    return ($value == 1) ? 'checked' : ''; 
}

function getAudience($shs, $colEAPub, $colEAPriv, $colSc){
    $audience = ($shs          == 1) ? 'Senior High <br>' : '';
    $audience .= ($colEAPub     == 1) ? 'College EA Public <br>' : '';
    $audience .= ($colEAPriv    == 1) ? 'College EA Private <br>' : '';
    $audience .= ($colSc        == 1) ? 'College Scholarship <br>' : '';
    return $audience;
}
// ----------------------------------------------------
// Change Semester
function switchSemester($sem = 1){
    include("dbconnection.php");

    $sql = "UPDATE semester SET default_sem = 0 WHERE default_sem = 1";
    $query = $conn->query($sql) or die("Error BSQ010: " . $conn->error);

    $sql = "UPDATE semester SET default_sem = 1 WHERE id = '". $sem ."'";
    $query = $conn->query($sql) or die("Error BSQ011: " . $conn->error);
    
    return 'Success';
}


// Acad Years

function getAcadYearTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $sql = "SELECT * FROM acad_year ORDER BY id DESC LIMIT 5";
    $query = $conn->query($sql) or die("Error BSQ001: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $button =   '<div class="row mx-auto ">
                            <a href="#" class="col-6 btn btn-warning btn-sm" onclick="defaultAY('. $from_ay .')">Make Default</a>
                            <a href="#" class="col-6 btn btn-danger btn-sm" onclick="deleteAY('. $from_ay .')">Delete</a>
                        </div>';
            if($default_ay == 1){
                $button = '<div class="align-content-center">
                                <p class="text-center fst-italic">Default Academic Year</p>
                            </div>';
            }

            $data[] = [
                $counter,
                $ay,
                accountHandlerAccess( 1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                $button,
            ];

            $counter++;
        }
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format


}

function generate_ay()
{
    include("dbconnection.php");

    session_start();

    date_default_timezone_set("Asia/Manila");

    $from_ay = date("Y");
    $to_ay = date("Y") + 1;
    $ay = $from_ay . ' - ' . $to_ay;
    // Checks if AY Exists

    $sql = "SELECT * FROM acad_year WHERE from_ay = '" . $from_ay . "'";

    $query = $conn->query($sql) or die("Error BSQ002: " . $conn->error);

    if ($query->num_rows == 0) {
        $sql = "INSERT INTO acad_year (`id`, `ay`, `from_ay`, `to_ay`, `modified_by`, `modified_date`) VALUES ('0', '" . $ay . "', '" . $from_ay . "', '" . $to_ay . "', '" . $_SESSION['id'] . "', '" . date('Y-m-d H:i:s') . "')";

        $query = $conn->query($sql) or die("Error BSQ003: " . $conn->error);

        return 'Insert Success';
    } else {
        return 'Academic Year already exists';
    }
}

function defaultAY($from_ay){
    include("dbconnection.php");

    $acadYearId = getDefaultAcadYearId();
    $semester   = switchSemester();

    $sql = "UPDATE acad_year SET default_ay = 0 WHERE id = '". $acadYearId ."'";
    $query = $conn->query($sql) or die("Error BSQ004: " . $conn->error);

    $sql = "UPDATE acad_year SET default_ay = 1 WHERE from_ay = '". $from_ay ."'";
    $query = $conn->query($sql) or die("Error BSQ005: " . $conn->error);
    
    return 'Default Updated Successfully';
}

function deleteAY($from_ay){
    include("dbconnection.php");

    $sql = "DELETE FROM acad_year WHERE from_ay = '". $from_ay ."'";
    $query = $conn->query($sql) or die("Error BSQ006: " . $conn->error);

    return 'Deleted Successfully';
}

// Assessments

function getSetAssessmentTable(){
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $sql = "SELECT * FROM set_assessment WHERE ay_id = '". $acadYearId ."' AND sem_id = '". $semId ."' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ007: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal_'.$id.'">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetAssessment('. $id .')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="assessment_edit_modal_'.$id.'" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Assessment Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentStartDate_'.$id.'" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="assessmentStartDate_'.$id.'" aria-describedby="assessmentStartDate" name="assessmentStartDate" value="'.$start_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentEndDate_'.$id.'" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="assessmentEndDate_'.$id.'" aria-describedby="assessmentEndDate" name="assessmentEndDate" value="'.$end_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentShsCheckBox_'.$id.'" '. getCheckboxValueDB($shs) .'>
                                                    <label class="mx-2 form-check-label" for="assessmentShsCheckBox_'.$id.'">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPubCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPub) .'>
                                                    <label class="mx-2 form-check-label" for="assessmentColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPrivCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPriv) .'>
                                                    <label class="mx-2 form-check-label" for="assessmentColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColScCheckBox_'.$id.'" '. getCheckboxValueDB($colSc) .'>
                                                    <label class="mx-2 form-check-label" for="assessmentColScCheckBox_'.$id.'">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetAssessment('.$id.')">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>';

            $data[] = [
                $counter,
                $start_date,
                $end_date,
                getAudience($shs, $colEAPub, $colEAPriv, $colSc),
                accountHandlerAccess( 1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess( 1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                $button,
            ];

            $counter++;
        }
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}

function addSetAssessment($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv== true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_assessment (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '".$acadYearId."', '".$semId."',  '".$startDate."', '".$endDate."', ".$shs.",".$colEAPub.",".$colEAPriv.",".$colSc.", '".$sessionId."', '".$date."', '".$sessionId."', '".$date."')";
    $query = $conn->query($sql) or die("Error BSQ008: " . $conn->error);

    return 'Assessment Date Added';
}

function editSetAssessment($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_assessment SET   `start_date`= '".$startDate."',
                                        `end_date`= '".$endDate."' ,
                                        `shs`= ".$shs." ,
                                        `colEAPub`= ".$colEAPub." ,
                                        `colEAPriv`= ".$colEAPriv." ,
                                        `colSc`= ".$colSc." ,
                                        `modified_by`='".$sessionId."' ,
                                        `modified_date`='".$date."' 
                                WHERE   id = '".$id."'";
    
    $query = $conn->query($sql) or die("Error BSQ009: " . $conn->error);

    return 'Assessment Date Updated';
}

function deleteSetAssessment($id){
    include("dbconnection.php");

    $sql = "DELETE FROM set_assessment WHERE id = '". $id ."'";
    $query = $conn->query($sql) or die("Error BSQ010: " . $conn->error);

    return 'Deleted Successfully';
}


// Renewal

function getSetRenewalTable(){
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $sql = "SELECT * FROM set_renewal WHERE ay_id = '". $acadYearId ."' AND sem_id = '". $semId ."' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ011: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#renewal_edit_modal_'.$id.'">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetRenewal('. $id .')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="renewal_edit_modal_'.$id.'" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Renewal Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="RenewaltartDate_'.$id.'" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="renewalStartDate_'.$id.'" aria-describedby="renewalStartDate" name="renewalStartDate" value="'.$start_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="renewalEndDate_'.$id.'" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="renewalEndDate_'.$id.'" aria-describedby="renewalEndDate" name="renewalEndDate" value="'.$end_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="renewalStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalShsCheckBox_'.$id.'" '. getCheckboxValueDB($shs) .'>
                                                    <label class="mx-2 form-check-label" for="renewalShsCheckBox_'.$id.'">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColEAPubCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPub) .'>
                                                    <label class="mx-2 form-check-label" for="renewalColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColEAPrivCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPriv) .'>
                                                    <label class="mx-2 form-check-label" for="renewalColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColScCheckBox_'.$id.'" '. getCheckboxValueDB($colSc) .'>
                                                    <label class="mx-2 form-check-label" for="renewalColScCheckBox_'.$id.'">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetRenewal('.$id.')">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>';

            $data[] = [
                $counter,
                $start_date,
                $end_date,
                getAudience($shs, $colEAPub, $colEAPriv, $colSc),
                accountHandlerAccess( 1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess( 1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                $button,
            ];

            $counter++;
        }
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}

function addSetRenewal($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv== true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_renewal (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '".$acadYearId."', '".$semId."',  '".$startDate."', '".$endDate."', ".$shs.",".$colEAPub.",".$colEAPriv.",".$colSc.", '".$sessionId."', '".$date."', '".$sessionId."', '".$date."')";
    $query = $conn->query($sql) or die("Error BSQ012: " . $conn->error);

    return 'Renewal Date Added';
}

function editSetRenewal($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_renewal SET   `start_date`= '".$startDate."',
                                        `end_date`= '".$endDate."' ,
                                        `shs`= ".$shs." ,
                                        `colEAPub`= ".$colEAPub." ,
                                        `colEAPriv`= ".$colEAPriv." ,
                                        `colSc`= ".$colSc." ,
                                        `modified_by`='".$sessionId."' ,
                                        `modified_date`='".$date."' 
                                WHERE   id = '".$id."'";
    
    $query = $conn->query($sql) or die("Error BSQ013: " . $conn->error);

    return 'Renewal Date Updated';
}

function deleteSetRenewal($id){
    include("dbconnection.php");

    $sql = "DELETE FROM set_renewal WHERE id = '". $id ."'";
    $query = $conn->query($sql) or die("Error BSQ014: " . $conn->error);

    return 'Deleted Successfully';
}


// Examination

function getSetExamTable(){
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $sql = "SELECT * FROM set_exam WHERE ay_id = '". $acadYearId ."' AND sem_id = '". $semId ."' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ015: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#exam_edit_modal_'.$id.'">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetExam('. $id .')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="exam_edit_modal_'.$id.'" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Exam Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="ExamtartDate_'.$id.'" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="examStartDate_'.$id.'" aria-describedby="examStartDate" name="examStartDate" value="'.$start_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEndDate_'.$id.'" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="examEndDate_'.$id.'" aria-describedby="examEndDate" name="examEndDate" value="'.$end_date.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examTime" class="form-label col-3">Exam Time</label>
                                            <input type="time" class="form-control col" id="examTime_'.$id.'" aria-describedby="examTime" name="examTime" value="'.$time.'">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examShsCheckBox_'.$id.'" '. getCheckboxValueDB($shs) .'>
                                                    <label class="mx-2 form-check-label" for="examShsCheckBox_'.$id.'">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColEAPubCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPub) .'>
                                                    <label class="mx-2 form-check-label" for="examColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColEAPrivCheckBox_'.$id.'" '. getCheckboxValueDB($colEAPriv) .'>
                                                    <label class="mx-2 form-check-label" for="examColEACheckBox_'.$id.'">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColScCheckBox_'.$id.'" '. getCheckboxValueDB($colSc) .'>
                                                    <label class="mx-2 form-check-label" for="examColScCheckBox_'.$id.'">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetExam('.$id.')">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>';

            $data[] = [
                $counter,
                $start_date,
                $end_date,
                $time,
                getAudience($shs, $colEAPub, $colEAPriv, $colSc),
                accountHandlerAccess( 1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess( 1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                $button,
            ];

            $counter++;
        }
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}

function addSetExam($startDate, $endDate, $time, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $sql = "INSERT INTO set_exam (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `time`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '".$acadYearId."', '".$semId."',  '".$startDate."', '".$endDate."','".$time."', ".$shs.",".$colEAPub.",".$colEAPriv.",".$colSc.", '".$sessionId."', '".$date."', '".$sessionId."', '".$date."')";
    $query = $conn->query($sql) or die("Error BSQ016: " . $conn->error);

    return 'Exam Date Added';
}

function editSetExam($id, $startDate, $time, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_exam SET   `start_date`= '".$startDate."',
                                        `end_date`= '".$endDate."' ,
                                        `time`= '".$time."' ,
                                        `shs`= ".$shs." ,
                                        `colEAPub`= ".$colEAPub." ,
                                        `colEAPriv`= ".$colEAPriv." ,
                                        `colSc`= ".$colSc." ,
                                        `modified_by`='".$sessionId."' ,
                                        `modified_date`='".$date."' 
                                WHERE   id = '".$id."'";
    
    $query = $conn->query($sql) or die("Error BSQ017: " . $conn->error);

    return 'Exam Date Updated';
}

function deleteSetExam($id){
    include("dbconnection.php");

    $sql = "DELETE FROM set_exam WHERE id = '". $id ."'";
    $query = $conn->query($sql) or die("Error BSQ018: " . $conn->error);

    return 'Deleted Successfully';
}