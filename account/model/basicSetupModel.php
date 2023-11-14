<?php
// ---------------------------------------------------
session_start();
include("validationModel.php");
include("functionModel.php");
include("examSettingsModel.php");

// Connection to Account Handler
function accountHandlerAccess($access, $id)
{
    include("dbconnection.php");

    $sql = "SELECT first_name, last_name FROM user_info WHERE id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error UAQ000: " . $conn->error);
    while ($row = $query->fetch_assoc()) {
        extract($row);
    }

    return $first_name . ' ' . $last_name;
}
// ---------------------------------------------------


// ----------------------------------------------------
// Change Semester
function switchSemester($sem = 1)
{
    include("dbconnection.php");

    $sql = "UPDATE semester SET default_sem = 0 WHERE default_sem = 1";
    $query = $conn->query($sql) or die("Error BSQ010: " . $conn->error);

    $sql = "UPDATE semester SET default_sem = 1 WHERE id = '" . $sem . "'";
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
    $prevId = 0;

    $sql = "SELECT * FROM acad_year ORDER BY id DESC LIMIT 5";
    $query = $conn->query($sql) or die("Error BSQ001: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            if (checkReadOnlyStatus($id) == 1) {
                $button =   '<div class="row mx-auto ">
                                <a href="#" class="col-6 btn btn-dark btn-sm" onclick="readOnlyAY(' . $from_ay . ',' . $id . ', 0)">Unshow Records</a>
                                <a href="#" class="col-6 btn btn-danger btn-sm" onclick="deleteAY(' . $from_ay . ')">Delete</a>
                            </div>';
            }else{
                $button = '';
            }

            // Check if Read Only is Active
            if (checkReadOnlyStatus() == 0) {
                // Checks the Buttons if Need to have a make default
                if ($default_ay == 1) {
                    $button = '<div class="align-content-center">
                                    <p class="text-center fst-italic">Default Academic Year</p>
                                </div>';
                } elseif ($counter <= 2 && checkBasicSettings('set_assessment', $prevId) == 0 && checkBasicSettings('set_renewal', $prevId) == 0 && checkBasicSettings('set_exam', $prevId) == 0) {
                    $button =   '<div class="row mx-auto ">
                                    <a href="#" class="col-6 btn btn-warning btn-sm" onclick="defaultAY(' . $from_ay . ')">Make Default</a>
                                    <a href="#" class="col-6 btn btn-danger btn-sm" onclick="deleteAY(' . $from_ay . ')">Delete</a>
                                </div>';
                } else {
                    // Default Button
                    $button =   '<div class="row mx-auto ">
                                    <a href="#" class="col-6 btn btn-dark btn-sm" onclick="readOnlyAY(' . $from_ay . ', ' . $id . ', 1)">Show Records</a>
                                    <a href="#" class="col-6 btn btn-danger btn-sm" onclick="deleteAY(' . $from_ay . ')">Delete</a>
                                </div>';
                }
            }

            $data[] = [
                $counter,
                $ay,
                accountHandlerAccess(1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                $button,
            ];

            $counter++;

            $prevId = $id;
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

    date_default_timezone_set("Asia/Manila");

    $from_ay = date("Y");
    $to_ay = date("Y") + 1;
    $ay = $from_ay . ' - ' . $to_ay;
    // Checks if AY Exists

    $sql = "SELECT * FROM acad_year WHERE from_ay = '" . $from_ay . "'";

    $query = $conn->query($sql) or die("Error BSQ002: " . $conn->error);

    if ($query->num_rows == 0) {
        $sql = "INSERT INTO acad_year (`id`, `ay`, `from_ay`, `to_ay`, `modified_by`, `modified_date`) 
                VALUES ('0', '" . $ay . "', '" . $from_ay . "', '" . $to_ay . "', '" . $_SESSION['id'] . "', '" . date('Y-m-d H:i:s') . "')";
        $query = $conn->query($sql) or die("Error BSQ003: " . $conn->error);

        return 'Insert Success';
    } else {
        return 'Academic Year already exists';
    }
}

function defaultAY($from_ay)
{
    include("dbconnection.php");

    $acadYearId = getDefaultAcadYearId();
    $semester   = switchSemester();

    $sql = "UPDATE acad_year SET default_ay = 0 WHERE id = '" . $acadYearId . "'";
    $query = $conn->query($sql) or die("Error BSQ004: " . $conn->error);

    $sql = "UPDATE acad_year SET default_ay = 1 WHERE from_ay = '" . $from_ay . "'";
    $query = $conn->query($sql) or die("Error BSQ005: " . $conn->error);

    return 'Default Updated Successfully';
}

function readOnlyAY($id, $status)
{
    include("dbconnection.php");

    $sql = "UPDATE acad_year SET read_only = '{$status}' WHERE id = '{$id}'";
    $query = $conn->query($sql) or die("Error BSQ004 Read Only: " . $conn->error);

    return 'Success';
}

function deleteAY($from_ay)
{
    include("dbconnection.php");

    $sql = "DELETE FROM acad_year WHERE from_ay = '" . $from_ay . "'";
    $query = $conn->query($sql) or die("Error BSQ006: " . $conn->error);

    return 'Deleted Successfully';
}

// Application

function getSetApplicationTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();
    $readOnly = checkReadOnlyStatus();


    $sql = "SELECT * FROM set_application WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ007: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#application_edit_modal_' . $id . '">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetApplication(' . $id . ')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="application_edit_modal_' . $id . '" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Application Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="applicationStartDate_' . $id . '" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="applicationStartDate_' . $id . '" aria-describedby="applicationStartDate" name="applicationStartDate" value="' . $start_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="applicationEndDate_' . $id . '" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="applicationEndDate_' . $id . '" aria-describedby="applicationEndDate" name="applicationEndDate" value="' . $end_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="applicationStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="applicationShsCheckBox_' . $id . '" ' . getCheckboxValueDB($shs) . '>
                                                    <label class="mx-2 form-check-label" for="applicationShsCheckBox_' . $id . '">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="applicationColEAPubCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPub) . '>
                                                    <label class="mx-2 form-check-label" for="applicationColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="applicationColEAPrivCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPriv) . '>
                                                    <label class="mx-2 form-check-label" for="applicationColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="applicationColScCheckBox_' . $id . '" ' . getCheckboxValueDB($colSc) . '>
                                                    <label class="mx-2 form-check-label" for="applicationColScCheckBox_' . $id . '">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetApplication(' . $id . ')">Update</button>
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
                accountHandlerAccess(1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess(1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                ($readOnly == 0) ? $button : '',
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

function addSetApplication($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv == true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_application (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '" . $acadYearId . "', '" . $semId . "',  '" . $startDate . "', '" . $endDate . "', " . $shs . "," . $colEAPub . "," . $colEAPriv . "," . $colSc . ", '" . $sessionId . "', '" . $date . "', '" . $sessionId . "', '" . $date . "')";
    $query = $conn->query($sql) or die("Error BSQ008: " . $conn->error);

    return 'Application Date Added';
}

function editSetApplication($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_application SET   `start_date`= '" . $startDate . "',
                                        `end_date`= '" . $endDate . "' ,
                                        `shs`= " . $shs . " ,
                                        `colEAPub`= " . $colEAPub . " ,
                                        `colEAPriv`= " . $colEAPriv . " ,
                                        `colSc`= " . $colSc . " ,
                                        `modified_by`='" . $sessionId . "' ,
                                        `modified_date`='" . $date . "' 
                                WHERE   id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error BSQ009: " . $conn->error);

    return 'Application Date Updated';
}

function deleteSetApplication($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM set_application WHERE id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error BSQ010: " . $conn->error);

    return 'Deleted Successfully';
}


// Assessments

function getSetAssessmentTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();
    $readOnly = checkReadOnlyStatus();

    $sql = "SELECT * FROM set_assessment WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ007: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal_' . $id . '">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetAssessment(' . $id . ')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="assessment_edit_modal_' . $id . '" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Assessment Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentStartDate_' . $id . '" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="assessmentStartDate_' . $id . '" aria-describedby="assessmentStartDate" name="assessmentStartDate" value="' . $start_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentEndDate_' . $id . '" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="assessmentEndDate_' . $id . '" aria-describedby="assessmentEndDate" name="assessmentEndDate" value="' . $end_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="assessmentStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentShsCheckBox_' . $id . '" ' . getCheckboxValueDB($shs) . '>
                                                    <label class="mx-2 form-check-label" for="assessmentShsCheckBox_' . $id . '">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPubCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPub) . '>
                                                    <label class="mx-2 form-check-label" for="assessmentColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColEAPrivCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPriv) . '>
                                                    <label class="mx-2 form-check-label" for="assessmentColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="assessmentColScCheckBox_' . $id . '" ' . getCheckboxValueDB($colSc) . '>
                                                    <label class="mx-2 form-check-label" for="assessmentColScCheckBox_' . $id . '">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetAssessment(' . $id . ')">Update</button>
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
                accountHandlerAccess(1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess(1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                ($readOnly == 0) ? $button : '',
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

function addSetAssessment($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv == true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_assessment (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '" . $acadYearId . "', '" . $semId . "',  '" . $startDate . "', '" . $endDate . "', " . $shs . "," . $colEAPub . "," . $colEAPriv . "," . $colSc . ", '" . $sessionId . "', '" . $date . "', '" . $sessionId . "', '" . $date . "')";
    $query = $conn->query($sql) or die("Error BSQ008: " . $conn->error);

    return 'Assessment Date Added';
}

function editSetAssessment($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_assessment SET   `start_date`= '" . $startDate . "',
                                        `end_date`= '" . $endDate . "' ,
                                        `shs`= " . $shs . " ,
                                        `colEAPub`= " . $colEAPub . " ,
                                        `colEAPriv`= " . $colEAPriv . " ,
                                        `colSc`= " . $colSc . " ,
                                        `modified_by`='" . $sessionId . "' ,
                                        `modified_date`='" . $date . "' 
                                WHERE   id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error BSQ009: " . $conn->error);

    return 'Assessment Date Updated';
}

function deleteSetAssessment($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM set_assessment WHERE id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error BSQ010: " . $conn->error);

    return 'Deleted Successfully';
}


// Renewal

function getSetRenewalTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();
    $readOnly = checkReadOnlyStatus();

    $sql = "SELECT * FROM set_renewal WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ011: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#renewal_edit_modal_' . $id . '">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetRenewal(' . $id . ')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="renewal_edit_modal_' . $id . '" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Renewal Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="RenewaltartDate_' . $id . '" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="renewalStartDate_' . $id . '" aria-describedby="renewalStartDate" name="renewalStartDate" value="' . $start_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="renewalEndDate_' . $id . '" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="renewalEndDate_' . $id . '" aria-describedby="renewalEndDate" name="renewalEndDate" value="' . $end_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="renewalStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalShsCheckBox_' . $id . '" ' . getCheckboxValueDB($shs) . '>
                                                    <label class="mx-2 form-check-label" for="renewalShsCheckBox_' . $id . '">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColEAPubCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPub) . '>
                                                    <label class="mx-2 form-check-label" for="renewalColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColEAPrivCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPriv) . '>
                                                    <label class="mx-2 form-check-label" for="renewalColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="renewalColScCheckBox_' . $id . '" ' . getCheckboxValueDB($colSc) . '>
                                                    <label class="mx-2 form-check-label" for="renewalColScCheckBox_' . $id . '">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetRenewal(' . $id . ')">Update</button>
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
                accountHandlerAccess(1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess(1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                ($readOnly == 0) ? $button : '',
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

function addSetRenewal($startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $audience  = ($shs      == true) ? '1' : '';
    $audience .= ($colEAPub == true) ? '2' : '';
    $audience .= ($colEAPriv == true) ? '3' : '';
    $audience .= ($colSc    == true) ? '4' : '';

    $sql = "INSERT INTO set_renewal (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '" . $acadYearId . "', '" . $semId . "',  '" . $startDate . "', '" . $endDate . "', " . $shs . "," . $colEAPub . "," . $colEAPriv . "," . $colSc . ", '" . $sessionId . "', '" . $date . "', '" . $sessionId . "', '" . $date . "')";
    $query = $conn->query($sql) or die("Error BSQ012: " . $conn->error);

    return 'Renewal Date Added';
}

function editSetRenewal($id, $startDate, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_renewal SET   `start_date`= '" . $startDate . "',
                                        `end_date`= '" . $endDate . "' ,
                                        `shs`= " . $shs . " ,
                                        `colEAPub`= " . $colEAPub . " ,
                                        `colEAPriv`= " . $colEAPriv . " ,
                                        `colSc`= " . $colSc . " ,
                                        `modified_by`='" . $sessionId . "' ,
                                        `modified_date`='" . $date . "' 
                                WHERE   id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error BSQ013: " . $conn->error);

    return 'Renewal Date Updated';
}

function deleteSetRenewal($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM set_renewal WHERE id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error BSQ014: " . $conn->error);

    return 'Deleted Successfully';
}


// Examination

function getSetExamTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();
    $readOnly = checkReadOnlyStatus();

    $sql = "SELECT * FROM set_exam WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' ORDER BY id DESC";
    $query = $conn->query($sql) or die("Error BSQ015: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            $button =   '<div class="row mx-auto">
                            <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#exam_edit_modal_' . $id . '">Edit</button>
                            <button class="col-6 btn btn-danger" onclick="deleteSetExam(' . $id . ')">Delete</button>
                        </div>
                        <!-- Acad Year Make Default Modal -->
                        <div class="modal fade" id="exam_edit_modal_' . $id . '" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Exam Date</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="ExamtartDate_' . $id . '" class="form-label col-3">Start Date</label>
                                            <input type="date" class="form-control col" id="examStartDate_' . $id . '" aria-describedby="examStartDate" name="examStartDate" value="' . $start_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEndDate_' . $id . '" class="form-label col-3">End Date</label>
                                            <input type="date" class="form-control col" id="examEndDate_' . $id . '" aria-describedby="examEndDate" name="examEndDate" value="' . $end_date . '">
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examTime' . $id . '" class="form-label col-3">Exam Duration Time</label>
                                            <input type="text" class="form-control col" id="examTime_' . $id . '" aria-describedby="examTime" name="examTime" value="' . $time . '">
                                        </div>
                                        <script>
                                            $(function () {
                                                $("#examTime_' . $id . '").timepicker({
                                                    // format: "hh:ii:00",
                                                    showMeridian: false,
                                                    showInputs: true,
                                                    showSeconds: true,
                                                    defaultTime: "00:00:00"
                                                });
                                            });
                                        </script>
                                        <!--
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEndTime" class="form-label col-3">Exam End Time</label>
                                            <input type="time" class="form-control col" id="examEndTime_' . $id . '" aria-describedby="examEndTime" name="examEndTime" value="' . $time . '">
                                        </div>
                                        -->
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examStartDate" class="form-label col-3">Audience</label>
                                            <div class="col">
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examShsCheckBox_' . $id . '" ' . getCheckboxValueDB($shs) . '>
                                                    <label class="mx-2 form-check-label" for="examShsCheckBox_' . $id . '">
                                                        Senior High School
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColEAPubCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPub) . '>
                                                    <label class="mx-2 form-check-label" for="examColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Public
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColEAPrivCheckBox_' . $id . '" ' . getCheckboxValueDB($colEAPriv) . '>
                                                    <label class="mx-2 form-check-label" for="examColEACheckBox_' . $id . '">
                                                        College Educational Assistance - Private
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <input class="form-check-input" type="checkbox" value="" id="examColScCheckBox_' . $id . '" ' . getCheckboxValueDB($colSc) . '>
                                                    <label class="mx-2 form-check-label" for="examColScCheckBox_' . $id . '">
                                                        College Scholars
                                                    </label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="updateSetExam(' . $id . ')">Update</button>
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
                // $end_time,
                getAudience($shs, $colEAPub, $colEAPriv, $colSc),
                accountHandlerAccess(1, $created_by) . '<br><span class="small">' . $created_date . '</span>',
                accountHandlerAccess(1, $modified_by) . '<br><span class="small">' . $modified_date . '</span>',
                ($readOnly == 0) ? $button : '',
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

function addSetExam($startDate, $endDate, $time, $end_time, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $acadYearId = getDefaultAcadYearId();
    $semId = getDefaultSemesterId();

    $sql = "INSERT INTO set_exam (`id`, `ay_id`, `sem_id`, `start_date`, `end_date`, `time`, `end_time`, `shs`, `colEAPub`, `colEAPriv`, `colSc`, `created_by`, `created_date`, `modified_by`, `modified_date`) 
            VALUES (NULL, '" . $acadYearId . "', '" . $semId . "',  '" . $startDate . "', '" . $endDate . "','" . $time . "' ,'" . $end_time . "', " . $shs . "," . $colEAPub . "," . $colEAPriv . "," . $colSc . ", '" . $sessionId . "', '" . $date . "', '" . $sessionId . "', '" . $date . "')";
    $query = $conn->query($sql) or die("Error BSQ016: " . $conn->error);

    // Getting the ID set from Exam
    $sql = "SELECT LAST_INSERT_ID() AS lastId";
    $query = $conn->query($sql) or die("Error BSQ022: " . $conn->error);

    while ($row = $query->fetch_assoc()) {
        extract($row);
    }


    // Get All users that should take the examination
    $applicants = getApplicantUserId($acadYearId, $semId, $shs, $colEAPub, $colEAPriv, $colSc, 1);
    foreach($applicants as $applicant){

        // Check if Examination Already Exists in DB
        $examExists     = checkExamExist($acadYearId, $semId, $applicant);

        if ($examExists->num_rows == 0) {
            // Sets the User for Examination
            startExam($applicant, $lastId);
        }
        
    }
    return 'Exam Date Added';

}

function editSetExam($id, $startDate, $time, $end_time, $endDate, $shs, $colEAPub, $colEAPriv, $colSc)
{
    include("dbconnection.php");

    // session_start();
    $sessionId = $_SESSION['id'];

    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d");

    $sql = "UPDATE set_exam SET   `start_date`= '" . $startDate . "',
                                        `end_date`= '" . $endDate . "' ,
                                        `time`= '" . $time . "' ,
                                        `end_time`= '" . $end_time . "' ,
                                        `shs`= " . $shs . " ,
                                        `colEAPub`= " . $colEAPub . " ,
                                        `colEAPriv`= " . $colEAPriv . " ,
                                        `colSc`= " . $colSc . " ,
                                        `modified_by`='" . $sessionId . "' ,
                                        `modified_date`='" . $date . "' 
                                WHERE   id = '" . $id . "'";

    $query = $conn->query($sql) or die("Error BSQ017: " . $conn->error);

    return 'Exam Date Updated';
}

function deleteSetExam($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM set_exam WHERE id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error BSQ018: " . $conn->error);

    $sql = "DELETE FROM examination_applicant WHERE exam_id = '" . $id . "'";
    $query = $conn->query($sql) or die("Error BSQ018: " . $conn->error);

    return 'Deleted Successfully';
}

// EA Indicator Table
function getIndicatorEATable($indicatorCategory)
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $sql = "SELECT * FROM applicant_indicator WHERE indicator_applicant = 2 AND indicator_category = '{$indicatorCategory}'";
    $query = $conn->query($sql) or die("Error BSQ019: " . $conn->error);

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            if ($indicatorCategory <= 2 || $indicator_category == 4) {
                // $indicatorLow   = '<div id="editIndicator_0_' . $id . '" onclick="editEAIndicator(' . $id . ', 0)">' . $indicator_low . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_low . '" id="ea_0_' . $id . '" onfocusout="saveEAIndicator('.$indicatorCategory.',' . $id . ', 0)">';
                $indicatorLow   = '<div id="editIndicator_0_' . $id . '">' . $indicator_low . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_low . '" id="ea_0_' . $id . '" onfocusout="saveEAIndicator(' . $indicatorCategory . ',' . $id . ', 0)">';
                $indicatorHigh  = '<div id="editIndicator_2_' . $id . '">' . $indicator_high . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_high . '" id="ea_2_' . $id . '" onfocusout="saveEAIndicator(' . $indicatorCategory . ',' . $id . ', 2)">';
                $indicatorPoint = '<div id="editIndicator_3_' . $id . '">' . $points . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $points . '" id="ea_3_' . $id . '" onfocusout="saveEAIndicator(' . $indicatorCategory . ',' . $id . ', 3)">';

                $data[] = [
                    $counter,
                    $indicatorLow,
                    $indicatorHigh,
                    $indicatorPoint,
                    $indicatorDelete = '<button class="btn btn-danger" id="deleteIndicator_' . $id . '" onclick="indicatorDelete('. $id .')"> Delete </button>'
                ];
            } else {
                $indicatorExact = '<div id="editIndicator_1_' . $id . '">' . $indicator_exact . '</div><input type="text" class="editIndicatorText d-none form-control" value="' . $indicator_exact . '" id="ea_1_' . $id . '" onfocusout="saveEAIndicator(' . $indicatorCategory . ',' . $id . ', 1)">';
                $indicatorPoint = '<div id="editIndicator_3_' . $id . '">' . $points . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $points . '" id="ea_3_' . $id . '" onfocusout="saveEAIndicator(' . $indicatorCategory . ',' . $id . ', 3)">';

                $data[] = [
                    $counter,
                    $indicatorExact,
                    $indicatorPoint,
                    $indicatorDelete = '<button class="btn btn-danger" id="deleteIndicator_' . $id . '" onclick="indicatorDelete('. $id .')"> Delete </button>'
                ];
            }

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

function getIndicatorCount($indicator = 0)
{
    include("dbconnection.php");

    $data = [];

    if ($indicator <> 0) {
        $sql = "SELECT MAX(points) as max_point, indicator_category 
                FROM `applicant_indicator` 
                WHERE indicator_applicant = '{$indicator}'
                GROUP BY indicator_category
                ORDER BY indicator_category";
        $query = $conn->query($sql) or die("Error BSQ020: " . $conn->error);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                extract($row);

                $data[] = [
                    $indicator_category,
                    $max_point,
                ];

            }
        }
        return(json_encode($data));
    }
}

function updateIndicator($id, $type, $value, $category, $applicant = 0)
{
    include("dbconnection.php");

    switch ($type) {
        case 0:
            $columnToChange = 'indicator_low';
            break;
        case 1:
            $columnToChange = 'indicator_exact';
            break;
        case 2:
            $columnToChange = 'indicator_high';
            break;
        case 3:
            $columnToChange = 'points';
            break;
    }

    if ($id <> 0) {
        $sql = "UPDATE `applicant_indicator` SET `{$columnToChange}`= '{$value}' WHERE id = '{$id}'";
        $query = $conn->query($sql) or die("Error BSQ020: " . $conn->error);

        return (($query) ? 'Success' : "");
    } else {
        $sql = "INSERT INTO `applicant_indicator`(`id`, `indicator_applicant`, `indicator_category`, `{$columnToChange}`) 
                    VALUES (0, '{$applicant}', '{$category}', '{$value}')";
        $query = $conn->query($sql) or die("Error BSQ021: " . $conn->error);

        $sql = "SELECT LAST_INSERT_ID() AS lastId";
        $query = $conn->query($sql) or die("Error BSQ022: " . $conn->error);

        while ($row = $query->fetch_assoc()) {
            extract($row);
            return $lastId;
        }
    }
}

function deleteIndicator($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM `applicant_indicator` WHERE id = '{$id}'";
    $query = $conn->query($sql) or die("Error BSQ020: " . $conn->error);

    return (($query) ? 'Success' : "");
}

// SC Indicator Table
function getIndicatorSCTable($indicatorCategory)
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $sql = "SELECT * FROM applicant_indicator WHERE indicator_applicant = 1 AND indicator_category = '{$indicatorCategory}'";
    $query = $conn->query($sql) or die("Error BSQ023: " . $conn->error);

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            if ($indicatorCategory <= 2 || $indicatorCategory == 4 || $indicatorCategory == 5) {
                // $indicatorLow   = '<div id="editIndicator_0_' . $id . '" onclick="editEAIndicator(' . $id . ', 0)">' . $indicator_low . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_low . '" id="ea_0_' . $id . '" onfocusout="saveEAIndicator('.$indicatorCategory.',' . $id . ', 0)">';
                $indicatorLow   = '<div id="editIndicator_0_' . $id . '">' . $indicator_low . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_low . '" id="sc_0_' . $id . '" onfocusout="saveSCIndicator(' . $indicatorCategory . ',' . $id . ', 0)">';
                $indicatorHigh  = '<div id="editIndicator_2_' . $id . '">' . $indicator_high . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $indicator_high . '" id="sc_2_' . $id . '" onfocusout="saveSCIndicator(' . $indicatorCategory . ',' . $id . ', 2)">';
                $indicatorPoint = '<div id="editIndicator_3_' . $id . '">' . $points . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $points . '" id="sc_3_' . $id . '" onfocusout="saveSCIndicator(' . $indicatorCategory . ',' . $id . ', 3)">';

                $data[] = [
                    $counter,
                    $indicatorLow,
                    $indicatorHigh,
                    $indicatorPoint,
                    $indicatorDelete = '<button class="btn btn-danger" id="deleteIndicator_' . $id . '" onclick="indicatorDelete('. $id .')"> Delete </button>'
                ];
            } else {
                $indicatorExact = '<div id="editIndicator_1_' . $id . '">' . $indicator_exact . '</div><input type="text" class="editIndicatorText d-none form-control" value="' . $indicator_exact . '" id="sc_1_' . $id . '" onfocusout="saveSCIndicator(' . $indicatorCategory . ',' . $id . ', 1)">';
                $indicatorPoint = '<div id="editIndicator_3_' . $id . '">' . $points . '</div><input type="number" class="editIndicatorText d-none form-control" value="' . $points . '" id="sc_3_' . $id . '" onfocusout="saveSCIndicator(' . $indicatorCategory . ',' . $id . ', 3)">';

                $data[] = [
                    $counter,
                    $indicatorExact,
                    $indicatorPoint,
                    $indicatorDelete = '<button class="btn btn-danger" id="deleteIndicator_' . $id . '" onclick="indicatorDelete('. $id .')"> Delete </button>'
                ];
            }

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

function addNotificationType($data)
{
    include("dbconnection.php");

    $notifFunc = $data['notifFunc'];
    $notifName = $data['notifName'];
    $notifIcon = $data['notifIcon'];
    $filledCheck = $data['filledCheck'];
    $notifUsers = (is_array($data['notifUsers'])) ? implode(',', $data['notifUsers']) : $data['notifUsers'];

    $sql = "UPDATE system_notification SET used_flag = '1' WHERE id = '$notifFunc'";
    $query = $conn->query($sql);

    $sql = "INSERT INTO notification_type (notif_function, notif_name, notif_icon, dark_flag, notified_users) VALUES ('$notifFunc', '$notifName', '$notifIcon', '$filledCheck', '$notifUsers')";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateNotificationType($data)
{
    include("dbconnection.php");

    $notifName = $data['notifName'];
    $notifIcon = $data['notifIcon'];
    $filledCheck = $data['filledCheck'];
    $notifUsers = (is_array($data['notifUsers'])) ? implode(',', $data['notifUsers']) : $data['notifUsers'];
    $notifId = $data['notifId'];

    $sql = "UPDATE notification_type SET notif_name = '$notifName', notif_icon = '$notifIcon', dark_flag = '$filledCheck', notified_users = '$notifUsers' WHERE id = '$notifId'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function addSchool($data)
{
    include("dbconnection.php");

    $sql = "INSERT INTO school (school_name, school_address, added_by, date_added, school_type, class_type, partner) VALUES ('{$data['schoolName']}', '{$data['schoolAddress']}', '{$data['userId']}', NOW(), '{$data['schoolType']}', '{$data['schoolClass']}', '{$data['partner']}')";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateSchool($data)
{
    include("dbconnection.php");

    $sql = "UPDATE school SET school_name = '{$data['name']}', school_address = '{$data['address']}', school_type = '{$data['type']}', class_type = '{$data['class']}', partner = '{$data['partner']}' WHERE id = '{$data['id']}'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function deleteSchool($id)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM school WHERE id = '$id'";
    $query = $conn->query($sql);

    if ($query and $query->num_rows > 0) {
        $row = $query->fetch_assoc();

        $logs = [
            'table'     => 'delete_school_log',
            'userId'    => $_SESSION['id'],
            'column'    => [
                'schoolId'          => $id,
                'school_name'       => $row['school_name'],
                'school_address'    => $row['school_address'],
                'added_by'          => $row['added_by'],
                'date_added'        => $row['date_added'],
                'school_type'       => $row['school_type']
            ]
        ];

        $insertLogs = insert_logs($logs);

        if ($insertLogs) {
            $sql = "DELETE FROM school WHERE id = '$id'";
            $query = $conn->query($sql);

            return ($query) ? "success" : $conn->error;
        } else {
            return "Error inserting logs. Info: " . $insertLogs;
        }
    } else {
        return "School does not exist. Info: " . $conn->error;
    }
}

function addWebsiteSocials($data)
{
    include("dbconnection.php");

    $exists = check_exist(['table' => 'website_socials', 'column' => 'social_type', 'value' => $data['socType']]);

    $sql = ($exists > 0) ? "UPDATE website_socials SET link = '{$data['socLink']}', added_by = '{$data['userId']}', date_added = NOW() WHERE social_type = '{$data['socType']}'" : "INSERT INTO website_socials (social_type, link, added_by, date_added) VALUES ('{$data['socType']}', '{$data['socLink']}', '{$data['userId']}', NOW())";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function deleteWebsiteSocial($id)
{
    include("dbconnection.php");

    $sql = "DELETE FROM website_socials WHERE id = '$id'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateWebsiteSocials($data)
{
    include("dbconnection.php");

    $exists = check_exist(['table' => 'website_socials', 'column' => 'social_type', 'value' => $data['socType']]);

    $sql = ($exists > 0) ? "UPDATE website_socials SET link = '{$data['socLink']}', added_by = '{$data['userId']}', date_added = NOW() WHERE social_type = '{$data['socType']}'" : "UPDATE website_socials SET link = '{$data['socLink']}', added_by = '{$data['userId']}', date_added = NOW() WHERE id = '{$data['socId']}'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function addWebsiteInfo($data)
{
    include("dbconnection.php");

    $header = $data['header'];
    $descr = $data['descr'];
    $email = $data['email'];
    $address = $data['address'];
    $telephone = $data['telephone'];
    $opening = $data['opening'];

    if (empty_validation($header)) return "Website Header Title is required.";
    if (empty_validation($descr)) return "Description is required.";
    if (empty_validation($email)) return "Email is required.";
    if (empty_validation($address)) return "Address is required.";
    if (empty_validation($telephone)) return "Telephone is required.";
    if (empty_validation($opening)) return "Opening is required.";

    if (!email_validation($email)) return "Invalid email format.";

    $sql = "SELECT * FROM website_info";
    $query = $conn->query($sql);

    if ($query and $query->num_rows > 0) 
    {
        $sql = "UPDATE website_info SET email = '$email', address = '$address', telephone = '$telephone', opening_hours = '$opening', header = '$header', descr = '$descr'";
        $query = $conn->query($sql);

        return ($query) ? "success" : $conn->error;
    } 
    else 
    {
        $sql = "INSERT INTO website_info (header, descr, email, address, telephone, opening_hours) VALUES ('$header', '$descr', '$email', '$address', '$telephone', '$opening')";
        $query = $conn->query($sql);

        return ($query) ? "success" : $conn->error;
    }
}

function notificationModal($link)
{
    include("dbconnection.php");

    $modalBody = "";
    $modalBody .= '<div class="modal-body">';

    if (strpos($link, 'deleteFormId') !== false) // Deletion Request
    {
        $data = explode('&', $link);
        $id = explode('=', $data[1])[1];
        $deleteFormId = explode('=', $data[2])[1];
        $notif = explode('=', $data[3])[1];

        $exist = check_exist_multiple(['table' => 'delete_account_form', 'column' => ['id' => ['=', $deleteFormId], 'userId' => ['=', $id]]], 1);

        if (is_array($exist))
        {
            $userId = $exist[0]['userId'];
            $requestedBy = $exist[0]['requestedBy'];
            $modifiedBy = $exist[0]['modifiedBy'];
            $modifierReason = $exist[0]['modifierReason'];
            $applicantName = getUserNameFromId($userId);
            $requestedByName = getUserNameFromId($requestedBy);
            $modifiedName = ($modifiedBy == 0) ? 'N/A' : getUserNameFromId($modifiedBy);
            $reason = $exist[0]['reason'];
            $dateInserted = date('F d, Y h:i A', strtotime($exist[0]['date_inserted']));
            $dateUpdated = ($exist[0]['date_updated'] == '0000-00-00 00:00:00') ? '' : date('F d, Y h:i A', strtotime($exist[0]['date_updated']));
            $status = get_delete_request_text($exist[0]['status']);

            $modalBody .= '<input type="hidden" id="notifId" value="' . $notif . '">';
            $modalBody .= '<input type="hidden" id="requestedBy" value="' . $requestedBy . '">';

            $modalBody .= '<div class="row mb-2">
                                <div class="col-4">Applicant Name</div>
                                <div class="col-8">' . $applicantName . '</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">Requested By</div>
                                <div class="col-8">' . $requestedByName . '</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">Reason</div>
                                <div class="col-8">' . $reason . '</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">Date Requested</div>
                                <div class="col-8">' . $dateInserted . '</div>
                            </div>';

                            if ($modifiedBy <> 0)
                            {
                                $modalBody .= '<div class="row mb-2">
                                                    <div class="col-4">Modified By</div>
                                                    <div class="col-8">' . $modifiedName . '</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Reason for ' . (($exist[0]['status'] == 1) ? 'Approval' : 'Rejection') . '</div>
                                                    <div class="col-8">' . $modifierReason . '</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Date Reviewed</div>
                                                    <div class="col-8">' . $dateUpdated . '</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Status</div>
                                                    <div class="col-8">' . $status . '</div>
                                                </div>
                                            </div>';
                            }
                            else
                            {
                                $modalBody .= '<div class="row mb-2">
                                                    <div class="col-4">Status</div>
                                                    <div class="col-8">
                                                        <select class="form-select" id="deleteRequestStatus">
                                                            <option value="0" ' . (($exist[0]['status'] == 0) ? 'selected' : '') . '>Pending</option>
                                                            <option value="1" ' . (($exist[0]['status'] == 1) ? 'selected' : '') . '>Approve</option>
                                                            <option value="2" ' . (($exist[0]['status'] == 2) ? 'selected' : '') . '>Reject</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Reason</div>
                                                    <div class="col-8">
                                                        <textarea class="form-control" id="deleteRequestReason" rows="3" name="Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>';

                                $modalBody .= '<div class="modal-footer">
                                                    <button type="button" class="btn btn-success" onclick="updateDeleteRequest(' . $deleteFormId . ', ' . $id . ', ' . $exist[0]['status'] . ')">Update</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>';
                            }
        }
        else
        {
            return "Error: " . $exist;
        }
    }

    return $modalBody;
}

function updateRequest($data)
{
    include("dbconnection.php");

    $id = $_SESSION['id'];
    $formId = $data['formId'];
    $userId = $data['userId'];
    $requestedBy = $data['requestedBy'];
    $notifId = $data['notifId'];
    $deleteRequestReason = $data['deleteRequestReason'];
    $deleteRequestStatus = $data['deleteRequestStatus'];

    $value = [
        'id'            => $formId,
        'notifId'       => $notifId,
        'modifiedBy'    => $id,
        'reason'        => $deleteRequestReason,
        'status'        => $deleteRequestStatus
    ];

    $requestData = get_delete_request($formId); if ($requestData == false) return 'Error: No request found.';
    $reason = $requestData['reason'];

    $request = updateDeleteRequest($value); if ($request != 'success') return $request;

    $applicantName = getUserNameFromId($userId);
    $requesterName = getUserNameFromId($requestedBy);
    $requesterEmail = (array)get_user_data($requestedBy)[2];
    $userEmail = (array)get_user_data($userId)[2];

    $col = ['account_type' => ['=', 0], 'id' => ['!=', $requestedBy]];

    $adminEmail = [
        'table' => 'account',
        'return' => 'email',
        'column' => $col
    ];

    $adEmail = check_exist_multiple($adminEmail, 1);
    if (!is_array($adEmail)) return 'Error: ' . $adEmail;        

    if ($deleteRequestStatus == 1)
    {
        $table = '<table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #dddddd; text-align: center; padding: 8px;" colspan=2>Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Applicant Name</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $applicantName . '</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Reason for Deletion</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $reason . '</td>
                    </tr>
                </tbody>
            </table>';

        $msg = '<p>Hi ' . $applicantName . ',</p>';
        $msg .= '<p>We regret to inform you that your account has been deleted. Please see below for the details.</p><br>';
        $msg .= $table;
        $msg .= '<br><p>If you think this is a mistake, please contact us immediately.</p><br>';
        $msg .= '<p>Thank you! <br></p>';
        $msg .= '<p>Best regards,</p>';
        $msg .= '<p>Youth Development Scholarship</p>';

        $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1') ? "2" : '5';

        $sendEmail = sendEmail($userEmail, $applicantName . ' - Account Deletion Approval', $msg, $emailType, $requesterEmail, $adEmail);
        if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

        echo update_account_status($userId, 4);
    }
    else
    {
        $table = '<table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #dddddd; text-align: center; padding: 8px;" colspan=3>Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Applicant Name</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $applicantName . '</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Reason for Deletion</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $reason . '</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-weight: bold;">Reason for Rejection</td>
                        <td style="border: 1px solid #dddddd; text-align: center; padding: 8px;">' . $deleteRequestReason . '</td>
                    </tr>
                </tbody>
            </table>';

        $msg = '<p>Hi ' . $requesterName . ',</p>';
        $msg .= '<p>We would like to inform you that your request for deletion of account has been rejected. Please see below for the details.</p><br>';
        $msg .= $table;
        $msg .= '<br><p>If you think this is a mistake, please contact us immediately.</p><br>';
        $msg .= '<p>Thank you! <br></p>';
        $msg .= '<p>Best regards,</p>';
        $msg .= '<p>Youth Development Scholarship</p>';

        $emailType = ($_SERVER['HTTP_HOST'] == '127.0.0.1') ? "2" : '5';

        $sendEmail = sendEmail($requesterEmail, $applicantName . ' - Account Deletion Rejection', $msg, $emailType, $adEmail);
        if ($sendEmail != "Success") return 'Error: ' . $sendEmail;

        return 'success';
    }
}

function fetchEvents($date = "", $type = 0)
{
    include("dbconnection.php");

    $data = $return = [];

    $sql = "SELECT * FROM website_coa";
    $query = $conn->query($sql);

    if ($query and $query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $color = ($active == 1) ? '#28a745' : '#dc3545';
            $border = ($active == 1) ? '#28a745' : '#dc3545';

            if ($type == 0)
            {
                $data[] = [
                    'id'                  => $id,
                    'title'               => $title,
                    'start'               => $date_start,
                    'end'                 => $date_end,
                    'allDay'              => true,
                    'desc'                => $description,
                    'image'               => $image,
                    'backgroundColor'     => $color,
                    'borderColor'         => $border,
                    'active'              => $active,
                ];
            }
            else
            {

                if ($date >= $date_start and $date <= $date_end)
                {
                    $return[] = [
                        'id'                  => $id,
                        'title'               => $title,
                        'start'               => $date_start,
                        'end'                 => $date_end,
                        'allDay'              => true,
                        'desc'                => $description,
                        'image'               => $image,
                        'backgroundColor'     => $color,
                        'borderColor'         => $border,
                        'active'              => $active,
                    ];
                }
            }
        }
    }

    return ($type == 0) ? json_encode($data) : json_encode($return);
}

function addEvents($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $eventName = $data['eventName'];
    $eventDesc = $data['eventDesc'];
    $eventImg = $data['eventImg'];
    $dateStart = $data['dateStart'];
    $dateEnd = $data['dateEnd'];
    $active = $data['active'];

    $eImg = upload_file($eventImg, 'assets/img/uploads/events/', '../assets/img/uploads/events/', $options = [
        'type' => ['jpg', 'jpeg', 'png'],
    ]);

    if ($eImg == 'Invalid File Type') return 'Invalid File Type';

    if ($eImg['success'] == false) return 'Error: ' . $eImg['error'];

    $img = $eImg['path'];

    $sql = "INSERT INTO website_coa (title, description, image, date_start, date_end, date_added, added_by, active) VALUES ('$eventName', '$eventDesc', '$img', '$dateStart', '$dateEnd', NOW(), '$userId', $active)";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateEvents($data)
{
    include("dbconnection.php");
    
    $userId = $data['userId'];
    $eventName = $data['eventName'];
    $eventDesc = $data['eventDesc'];
    $eventImg = $data['eventImg'];
    $dateStart = $data['dateStart'];
    $dateEnd = $data['dateEnd'];
    $active = $data['active'];

    $exists = check_exist_multiple(['table' => 'website_coa', 'column' => ['id' => ['=', $data['eventId']]]], 1);
    $oldImg = $exists[0]['image'];

    if ($eventImg != "")
    {
        if ($oldImg != "")
        {
            if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
        }

        $eImg = upload_file($eventImg, 'assets/img/uploads/events/', '../assets/img/uploads/events/', $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);
    
        if ($eImg == 'Invalid File Type') return 'Invalid File Type';
    
        if ($eImg['success'] == false) return 'Error: ' . $eImg['error'];
    
        $img = $eImg['path'];
    }
    else
    {
        $img = $oldImg;
    }

    $sql = "UPDATE website_coa SET title = '$eventName', description = '$eventDesc', image = '$img', date_start = '$dateStart', date_end = '$dateEnd', added_by = '$userId', active = $active WHERE id = '{$data['eventId']}'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function deleteEvents($id)
{
    include("dbconnection.php");

    $exists = check_exist_multiple(['table' => 'website_coa', 'column' => ['id' => ['=', $id]]], 1);
    $oldImg = $exists[0]['image'];

    if ($oldImg != "")
    {
        if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
    }

    $sql = "DELETE FROM website_coa WHERE id = '$id'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function addOfficials($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $officialName = $data['officialName'];
    $jobTitle = $data['jobTitle'];
    $officialImg = $data['officialImg'];
    $descr = $data['descr'];
    $active = $data['active'];
    $socialArr = $data['socialArr'];

    $img = "";

    $oImg = upload_file($officialImg, 'assets/img/uploads/officialImg/', '../assets/img/uploads/officialImg/', $options = [
        'type' => ['jpg', 'jpeg', 'png'],
    ]);

    if ($oImg == 'Invalid File Type') return 'Invalid File Type';

    if ($oImg['success'] == false) return 'Error: ' . $oImg['error'];

    $img = $oImg['path'];

    $sql = "INSERT INTO website_officials SET name = '$officialName', job_title = '$jobTitle', img = '$img', description = '$descr', added_by = '$userId', date_added = NOW(), active = '$active'";
    $query = $conn->query($sql);

    if ($query)
    {
        $lastId = $conn->insert_id;

        if ($socialArr != null)
        {
            $sql = "INSERT INTO official_socials (official_id, socialType, url) VALUES ";

            foreach ($socialArr as $key => $value)
            {
                $socialType = 0;
                if (strpos($value, 'facebook') !== false) $socialType = 0;
                if (strpos($value, 'twitter') !== false) $socialType = 1;
                if (strpos($value, 'instagram') !== false) $socialType = 2;
                if (strpos($value, 'linkedin') !== false) $socialType = 3;

                $sql .= "('$lastId', '$socialType', '$value'),";
            }

            $sql = rtrim($sql, ',');

            $query = $conn->query($sql);

            return ($query) ? "success" : 'Official Socials Error: ' . $conn->error;
        }
    }
    else
    {
        return 'Official Info Error: ' . $conn->error;
    }
}

function updateOfficial($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $id = $data['id'];
    $officialName = $data['officialName'];
    $jobTitle = $data['jobTitle'];
    $descr = $data['descr'];
    $active = $data['active'];
    $officialImg = $data['officialImg'];
    $socialArr = $data['socialArr'];

    $exists = check_exist_multiple(['table' => 'website_officials', 'column' => ['id' => ['=', $id]]], 1);
    $oldImg = $exists[0]['img'];

    if ($officialImg != "")
    {
        if ($oldImg != "")
        {
            if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
        }

        $oImg = upload_file($officialImg, 'assets/img/uploads/officialImg/', '../assets/img/uploads/officialImg/', $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);
    
        if ($oImg == 'Invalid File Type') return 'Invalid File Type';
    
        if ($oImg['success'] == false) return 'Error: ' . $oImg['error'];
    
        $img = $oImg['path'];
    }
    else
    {
        $img = $oldImg;
    }

    $sql = "UPDATE website_officials SET name = '$officialName', job_title = '$jobTitle', img = '$img', description = '$descr', added_by = '$userId', active = '$active' WHERE id = '$id'";
    $query = $conn->query($sql);

    if ($query)
    {
        $sql = "DELETE FROM official_socials WHERE official_id = '$id'";
        $query = $conn->query($sql);

        if ($socialArr != null)
        {
            $sql = "INSERT INTO official_socials (official_id, socialType, url) VALUES ";

            foreach ($socialArr as $key => $value)
            {
                $socialType = 0;
                if (strpos($value, 'facebook') !== false) $socialType = 0;
                if (strpos($value, 'twitter') !== false) $socialType = 1;
                if (strpos($value, 'instagram') !== false) $socialType = 2;
                if (strpos($value, 'linkedin') !== false) $socialType = 3;

                $sql .= "('$id', '$socialType', '$value'),";
            }

            $sql = rtrim($sql, ',');

            $query = $conn->query($sql);

            return ($query) ? "success" : 'Official Socials Error: ' . $conn->error;
        }

        return 'success';
    }
    else
    {
        return 'Official Info Error: ' . $conn->error;
    }
}

function deleteOfficial($id)
{
    include("dbconnection.php");

    $exists = check_exist_multiple(['table' => 'website_officials', 'column' => ['id' => ['=', $id]]], 1);
    $oldImg = $exists[0]['img'];

    if ($oldImg != "")
    {
        if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
    }

    $sql = "DELETE FROM website_officials WHERE id = '$id'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateOtherInfo($data)
{
    include("dbconnection.php");

    $type = $data['type'];
    $vision = $conn->real_escape_string($data['vision']);
    $url = $conn->real_escape_string($data['url']);
    $mission = $conn->real_escape_string($data['mission']);
    $image = $data['image'];
    $imgType = $data['imgType'];

    if ($type == 1)
    {
        $sql = "UPDATE website_other_info SET vision = '$vision', url = '$url', mission = '$mission'";
    }
    else
    {
        
        if ($imgType == 1)
        {
            $updateText = "icon";
            $mainPath = "assets/img/uploads/website_image/icon/";
            $viewPath = "../assets/img/uploads/website_image/icon/";
        }
        else if ($imgType == 2)
        {
            $updateText = "cover";
            $mainPath = "assets/img/uploads/website_image/cover/";
            $viewPath = "../assets/img/uploads/website_image/cover/";
        }
        else
        {
            $updateText = "hero";
            $mainPath = "assets/img/uploads/website_image/hero/";
            $viewPath = "../assets/img/uploads/website_image/hero/";
        }
        
        $exists = check_exist_multiple(['table' => 'website_other_info'], 1);
        $oldImg = $exists[0][$updateText];
        $sql = "UPDATE website_other_info SET ";

        if ($image != "")
        {
            if ($oldImg != "")
            {
                if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
            }

            $oImg = upload_file($image, $mainPath, $viewPath, $options = [
                'type' => ['jpg', 'jpeg', 'png'],
            ]);
        
            if ($oImg == 'Invalid File Type') return 'Invalid File Type';
        
            if ($oImg['success'] == false) return 'Error: ' . $oImg['error'];
        
            $img = $oImg['path'];
        }
        else
        {
            $img = $oldImg;
        }

        $sql .= "$updateText = '$img'";
    }

    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function addAlumni($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $alumniName = $data['alumniName'];
    $alumniTitle = $data['alumniTitle'];
    $alumniDesc = $data['alumniDesc'];
    $alumniImage = $data['alumniImage'];
    $alumniActive = $data['alumniActive'];

    $img = "";

    $aImg = upload_file($alumniImage, 'assets/img/uploads/website_image/testimonials/', '../assets/img/uploads/website_image/testimonials/', $options = [
        'type' => ['jpg', 'jpeg', 'png'],
    ]);

    if ($aImg == 'Invalid File Type') return 'Invalid File Type';

    if ($aImg['success'] == false) return 'Error: ' . $aImg['error'];

    $img = $aImg['path'];

    $sql = "INSERT INTO website_testimonials (alumni_name, image, job_title, testimony, date_added, added_by, active) VALUES ('$alumniName', '$img', '$alumniTitle', '$alumniDesc', NOW(), '$userId', '$alumniActive')";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateAlumni($data)
{
    include("dbconnection.php");

    $userId = $data['userId'];
    $id = $data['id'];
    $alumniName = $data['alumniName'];
    $alumniTitle = $data['alumniTitle'];
    $alumniDesc = $data['alumniDesc'];
    $alumniImage = $data['alumniImage'];
    $alumniActive = $data['alumniActive'];

    $exists = check_exist_multiple(['table' => 'website_testimonials', 'column' => ['id' => ['=', $id]]], 1);
    $oldImg = $exists[0]['image'];

    if ($alumniImage != "")
    {
        if ($oldImg != "")
        {
            if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
        }

        $aImg = upload_file($alumniImage, 'assets/img/uploads/website_image/testimonials/', '../assets/img/uploads/website_image/testimonials/', $options = [
            'type' => ['jpg', 'jpeg', 'png'],
        ]);
    
        if ($aImg == 'Invalid File Type') return 'Invalid File Type';
    
        if ($aImg['success'] == false) return 'Error: ' . $aImg['error'];
    
        $img = $aImg['path'];
    }
    else
    {
        $img = $oldImg;
    }

    $sql = "UPDATE website_testimonials SET alumni_name = '$alumniName', image = '$img', job_title = '$alumniTitle', testimony = '$alumniDesc', added_by = '$userId', active = '$alumniActive' WHERE id = '$id'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function deleteAlumni($id)
{
    include("dbconnection.php");

    $exists = check_exist_multiple(['table' => 'website_testimonials', 'column' => ['id' => ['=', $id]]], 1);
    $oldImg = $exists[0]['image'];

    if ($oldImg != "")
    {
        if (file_exists('../' . $oldImg)) unlink('../' . $oldImg);
    }

    $sql = "DELETE FROM website_testimonials WHERE id = '$id'";
    $query = $conn->query($sql);

    return ($query) ? "success" : $conn->error;
}

function updateScholarText($data)
{
    include("dbconnection.php");

    foreach ($data as $key => $value)
    {
        $sql = "UPDATE website_scholar_text SET scholarText = ";

        if ($key == 'shs')
        {
            $sql .= "'" . $conn->real_escape_string($value) . "' WHERE type = '1'";
        }
        else if ($key == 'cea')
        {
            $sql .= "'" . $conn->real_escape_string($value) . "' WHERE type = '2'";
        }
        else if ($key == 'cfs')
        {
            $sql .= "'" . $conn->real_escape_string($value) . "' WHERE type = '3'";
        }

        $query = $conn->query($sql);

    }

    return ($query) ? "success" : $conn->error;
}
