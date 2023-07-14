<?php

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

            $button =   '<div class="btn-group d-flex align-content-center">
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
                $modified_by . '<br><span class="small">' . $modified_date . '</span>',
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

    $sql = "UPDATE acad_year SET default_ay = 0 WHERE id = '". $acadYearId ."'";
    $query = $conn->query($sql) or die("Error BSQ004: " . $conn->error);

    $sql = "UPDATE acad_year SET default_ay = 1 WHERE from_ay = '". $from_ay ."'";
    $query = $conn->query($sql) or die("Error BSQ005: " . $conn->error);
    
    return 'Default Updated Successfully';
}

function deleteAY($from_ay){
    include("dbconnection.php");

    $sql = "DELETE acad_year WHERE id = '". $from_ay ."'";
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

    $sql = "SELECT * FROM set_assessment WHERE ay_id = '". $acadYearId ."' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ007: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal_'.$id.'">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteAY('. $id .')">Delete</button>
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
                                            <input type="date" class="form-control col" id="assessmentEndDate_'.$id.'" aria-describedby="assessmentEndDate" name="assessmentEndDate" value="'.$end_date.'"">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="shsCheckBox_'.$id.'">
                                                    <label class="mx-2 form-check-label" for="shsCheckBox_'.$id.'">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="colEAPubCheckBox_'.$id.'">
                                                    <label class="mx-2 form-check-label" for="colEACheckBox_'.$id.'">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="colEAPrivCheckBox_'.$id.'">
                                                    <label class="mx-2 form-check-label" for="colEACheckBox_'.$id.'">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="colScCheckBox_'.$id.'">
                                                    <label class="mx-2 form-check-label" for="colScCheckBox_'.$id.'">
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
                $audience,
                $created_by . '<br><span class="small">' . $created_date . '</span>',
                $modified_by . '<br><span class="small">' . $modified_date . '</span>',
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
    $date = date("Y");

    $acadYearId = getDefaultAcadYearId();
    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv== true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_assessment (`id`, `ay_id`, `start_date`, `end_date`, `audience`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '".$acadYearId."', '".$startDate."', '".$endDate."', '".$audience."', '".$sessionId."', '".$date."', '".$sessionId."', '".$date."')";
    $query = $conn->query($sql) or die("Error BSQ008: " . $conn->error);

    return 'Assessment Date Added';
}

function editSetAssessment($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc){
    include("dbconnection.php");

    session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv== true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "UPDATE set_assessment SET   `start_date`= '".$startDate."',
                                        `end_date`= '".$endDate."' ,
                                        `audience`= '".$audience."' ,
                                        `modified_by`='".$sessionId."' ,
                                        `modified_date`='".$date."' 
                                WHERE   id = '".$id."'";
    
    $query = $conn->query($sql) or die("Error BSQ009: " . $conn->error);

    return 'Assessment Date Updated';
}