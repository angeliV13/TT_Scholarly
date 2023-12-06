<?php

include("functionModel.php");

function getFileChecks($check, $file)
{
    if ($check == false) {
        if ($file['name'] != '') {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 2;
    }
}

// function getDefaultAcadYearId()
// {
//     include("dbconnection.php");

//     $sql = "SELECT * FROM acad_year WHERE default_ay = 1";
//     $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

//     if ($query->num_rows <>  0) {
//         while ($row = $query->fetch_assoc()) {
//             extract($row);

//             return $id;
//         }
//     }
// }

// function getDefaultSemesterId()
// {
//     include("dbconnection.php");

//     $sql = "SELECT * FROM semester WHERE default_sem = 1";
//     $query = $conn->query($sql) or die("Error BSQ0015: " . $conn->error);

//     if ($query->num_rows <>  0) {
//         while ($row = $query->fetch_assoc()) {
//             extract($row);

//             return $id;
//         }
//     }
// }

function getRequirementsTable($type)
{
    include("dbconnection.php");

    $requirementData = [];

    $sql = "SELECT id, requirement_name, requirement_code FROM requirements WHERE {$type} = 1 ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error URQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        $requirementData = $query->fetch_all();
    }

    return $requirementData;
}

function getAssessmentBeneTable($dashboard = 0)
{
    session_start();
    include("dbconnection.php");

    $acadYearId = getDefaultAcadYearId();
    $semId      = getDefaultSemesterId();
    $userid     = $_SESSION['id'];

    $reqData    = getRequirementsTable('assessment');
    $data       = [];
    $totalData  = 0;
    $counter    = 1;

    $sql = "SELECT * FROM assessment_file WHERE ay_id = '{$acadYearId}' AND sem_id = '{$semId}' AND account_id = '{$userid}'ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error URQ001: " . $conn->error);

    // Generate if no Table Entries Found
    if ($query->num_rows ==  0) {
        if ($dashboard == 0) {

            $sql = "INSERT INTO `assessment_file`
                        (`id`, `account_id`, `ay_id`, `sem_id`, `requirement`, `file`, `status`, `remarks`, `upload_date`, `modified_date`, `checked_date`) 
                VALUES  ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','1','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','2','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','3','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','4','',0, '', '', '', '')";
            $query = $conn->query($sql) or die("Error URQ002: " . $conn->error);

            $sql = "SELECT * FROM assessment_file WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' AND account_id = '" . $userid . "'ORDER BY id DESC";
            $query = $conn->query($sql) or die("Error URQ003: " . $conn->error);
        } else {
            $json_data = array(
                "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                "recordsTotal"    => intval($totalData),  // total number of records
                "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
                "data"            => $data   // total data array
            );

            return json_encode($json_data);
        }
    }

    while ($row = $query->fetch_assoc()) {
        extract($row);

        if ($counter == 1) {
            if ($status == 0 || $status == 3) {
                $buttonSchoolId =   '<div class="btn-group-vertical d-flex">
                                        <!--BUTTON FOR "NOT APPLICABLE"-->
                                        <input type="checkbox" class="btn-check" id="btn_na_SchoolId" onclick="schoolId()">
                                        <label class="btn btn-outline-dark" for="btn_na_SchoolId">Not Applicable</label>
                                        <div class="btn-group" role="group">
                                        <div id="divUploadSchoolId" class="upload_file file btn btn-primary">Upload
                                            <input id="fileUploadSchoolId" type="file" name="schoolIdFile" accept="application/pdf" onchange="getFileData(this, \'SchoolId\');" />
                                        </div>
                                        <button id="viewUploadSchoolId" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadSchoolIdModal"> View File</button>
                                        <div class="modal fade" id="viewUploadSchoolIdModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">School ID</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed id="previewSchoolId" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                                    </div>';
            } elseif ($status == 4) {
                $buttonSchoolId =   '<div class="btn-group-vertical d-flex">
                                <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                            </div>';
            } else {
                $buttonSchoolId =   '<div class="btn-group-vertical d-flex">
                                        <button id="viewUploadSchoolId" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadSchoolIdModal"> View File</button>
                                        <div class="modal fade" id="viewUploadSchoolIdModal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">School ID</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed id="previewSchoolId" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                                </div>

                                            </div>
                                            </div>
                                        </div>
                                        <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                                    </div>';
            }
            $button = $buttonSchoolId;
        } elseif ($counter == 2) {
            if ($status == 0 || $status == 3) {
                $buttonClearance =  '<div class="btn-group-vertical d-flex">
                                    <!--BUTTON FOR "NOT APPLICABLE"-->
                                    <input type="checkbox" class="btn-check" id="btn_na_Clearance" onclick="schoolClearance()">
                                    <label class="btn btn-outline-dark" for="btn_na_Clearance">Not Applicable</label>
                                    <div class="btn-group" role="group">
                                    <div id="divUploadClearance" class="upload_file file btn btn-primary">Upload
                                        <input id="fileUploadClearance" type="file" name="clearance" accept="application/pdf" onchange="getFileData(this, \'Clearance\');" />
                                    </div>
                                    <button id="viewUploadClearance" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fileUploadClearanceModal"> View File</button>
                                    <div class="modal fade" id="fileUploadClearanceModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">School Clearance</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewClearance" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p id="textUploadClearance" class="small mx-auto">' . $file . '</p>
                                </div>';
            } elseif ($status == 4) {
                $buttonClearance =   '<div class="btn-group-vertical d-flex">
                                <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                            </div>';
            } else {
                $buttonClearance =  '<div class="btn-group-vertical d-flex">
                                    <button id="viewUploadClearance" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#fileUploadClearanceModal"> View File</button>
                                    <div class="modal fade" id="fileUploadClearanceModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">School Clearance</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewClearance" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <p id="textUploadClearance" class="small mx-auto">' . $file . '</p>
                                </div>';
            }
            $button = $buttonClearance;
        } elseif ($counter == 3) {
            if ($status == 0 || $status == 3) {
                $buttonCor =        '<div class="btn-group-vertical d-flex">
                                    <!--BUTTON FOR "NOT APPLICABLE"-->
                                    <input type="checkbox" class="btn-check" id="btn_na_Cor" onclick="cor()">
                                    <label class="btn btn-outline-dark" for="btn_na_Cor">Not Applicable</label>
                                    <div class="btn-group" role="group">
                                    <div id="divUploadCor" class="upload_file file btn btn-primary">Upload
                                        <input id="fileUploadCor" type="file" name="corFile" accept="application/pdf" onchange="getFileData(this, \'Cor\');" />
                                    </div>
                                    <button id="viewUploadCor" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadCorModal"> View File</button>
                                    <div class="modal fade" id="viewUploadCorModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Certificate of Registration</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewCor" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p id="textUploadCor" class="small mx-auto">' . $file . '</p>
                                </div>';
            } elseif ($status == 4) {
                $buttonCor =   '<div class="btn-group-vertical d-flex">
                                <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                            </div>';
            } else {
                $buttonCor =        '<div class="btn-group-vertical d-flex">
                                    <button id="viewUploadCor" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadCorModal"> View File</button>
                                    <div class="modal fade" id="viewUploadCorModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Certificate of Registration</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewCor" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <p id="textUploadCor" class="small mx-auto">' . $file . '</p>
                                </div>';
            }

            $button = $buttonCor;
        } elseif ($counter == 4) {
            if ($status == 0 || $status == 3) {
                $buttonGrade =         '<div class="btn-group-vertical d-flex">
                                    <!--BUTTON FOR "NOT APPLICABLE"-->
                                    <input type="checkbox" class="btn-check" id="btn_na_Grade" onclick="grade()">
                                    <label class="btn btn-outline-dark" for="btn_na_Grade">Not Applicable</label>
                                    <div class="btn-group" role="group">
                                    <div id="divUploadGrade" class="upload_file file btn btn-primary">Upload
                                        <input id="fileUploadGrade" type="file" name="gradeFile" accept="application/pdf" onchange="getFileData(this, \'Grade\');" />
                                    </div>
                                    <button id="viewUploadGrade" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadGradeModal"> View File</button>
                                    <div class="modal fade" id="viewUploadGradeModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Grade</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewGrade" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p id="textUploadGrade" class="small mx-auto">' . $file . '</p>
                                </div>';
            } elseif ($status == 4) {
                $buttonGrade =   '<div class="btn-group-vertical d-flex">
                                <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                            </div>';
            } else {
                $buttonGrade =         '<div class="btn-group-vertical d-flex">
                                    <button id="viewUploadGrade" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadGradeModal"> View File</button>
                                    <div class="modal fade" id="viewUploadGradeModal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Grade</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <embed id="previewGrade" src="uploads/assessment/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <p id="textUploadGrade" class="small mx-auto">' . $file . '</p>
                                </div>';
            }

            $button = $buttonGrade;
        }

        // STATUS PLACE

        if ($dashboard == 0) {

            if ($status == 0) {
                $statusText = 'Not Submitted';
            } elseif ($status == 1) {
                $statusText = 'Submitted';
            } elseif ($status == 2) {
                $statusText = 'Approved';
            } elseif ($status == 3) {
                $statusText = 'Revision';
            } elseif ($status == 4) {
                $statusText = 'Not Applicable';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                $statusText,
                $remarks,
                $button,
            ];
        } else {

            if ($status == 0) {
                $statusText = '<span class="badge bg-warning">Not Submitted</span>';
            } elseif ($status == 1) {
                $statusText = '<span class="badge bg-primary">Submitted</span>';
            } elseif ($status == 2) {
                $statusText = '<span class="badge bg-success">Approved</span>';
            } elseif ($status == 3) {
                $statusText = '<span class="badge bg-danger">Revision</span>';
            } elseif ($status == 4) {
                $statusText = '<span class="badge bg-dark">Not Applicable</span>';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                (($modified_date <> '0000-00-00') ? date("F d, Y", strtotime($modified_date)) : ''),
                // $modified_date,
                $remarks,
                $statusText,
            ];
        }

        $counter++;
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}


function uploadFile($target_dir, $file, $file_name, $extension_array = array("pdf"))
{

    $errors = "";

    $file_size  = $file['size'];
    $file_tmp   = $file['tmp_name'];
    // $file_ext   = strtolower(end(explode('.', $name_of_file)));
    $tmp = explode('.', $file['name']);
    $file_ext = strtolower(end($tmp));

    $extensions = $extension_array;

    if (in_array($file_ext, $extensions) === false) {
        $errors = "extension not allowed, please choose a pdf file format.";
    }

    if ($file_size > 5242880) {
        $errors = 'File size must be maximum of 5 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target_dir . $file_name . '.' . $file_ext);
        return "Success";
    } else {
        return ($errors);
    }
}

function submitAssessment($target_dir, $schoolIdFile, $clearanceFile, $corFile, $gradeFile)
{
    session_start();

    $ay     = getDefaultAcadYearId();
    $sem    = getDefaultSemesterId();
    $userid = $_SESSION['id'];

    if ($schoolIdFile <> '0') {
        if (is_array($schoolIdFile)) {
            $type       = "schoolid";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value1      = uploadFile($target_dir, $schoolIdFile, $file_name);

            if ($value1 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 1, 1, 'assessment_file');
            } else {
                return ($value1);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4, 'assessment_file');
    }
    if ($clearanceFile <> '0') {
        if (is_array($clearanceFile)) {
            $type       = "clearance";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value2      = uploadFile($target_dir, $clearanceFile, $file_name);

            if ($value2 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 2, 1, 'assessment_file');
            } else {
                return ($value2);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4, 'assessment_file');
    }
    if ($corFile <> '0') {
        if (is_array($corFile)) {
            $type       = "cor";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value3      = uploadFile($target_dir, $corFile, $file_name);

            if ($value3 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 3, 1, 'assessment_file');
            } else {
                return ($value3);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4, 'assessment_file');
    }
    if ($gradeFile <> '0') {
        if (is_array($gradeFile)) {
            $type       = "grades";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value4      = uploadFile($target_dir, $gradeFile, $file_name);

            if ($value4 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 4, 1, 'assessment_file');
            } else {
                return ($value4);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4, 'assessment_file');
    }

    return (update_applicant_status($userid, 2) == true ? 'Success' : 'Error');
}

function updateRequirement($ay, $sem, $userid, $file, $requirement, $status, $target)
{
    $date = date("Y-m-d");

    include("dbconnection.php");

    $sql = "UPDATE `{$target}` 
                SET `file`          = '{$file}'     ,
                    `status`        = '{$status}'   ,
                    `upload_date`   = '{$date}'     ,
                    `modified_date` = '{$date}'     
            WHERE   `account_id`    = '{$userid}'
            AND     `ay_id`         = '{$ay}'
            AND     `sem_id`        = '{$sem}'
            AND     `requirement`   = '{$requirement}'";

    $query = $conn->query($sql) or die("Error URQ004: " . $conn->error);
}

// function getFileEntries($acadYearId, $semId, $userid, $file, $fetch = 0){
//     include("dbconnection.php");

//     $sql = "SELECT * FROM {$file} WHERE ay_id = '{$acadYearId}' AND sem_id = '{$semId}' AND account_id = '{$userid}' ORDER BY id ASC";
//     $query = $conn->query($sql) or die("Error URQ005: " . $conn->error);

//     if($fetch == 0){
//         return $query;
//     }elseif($fetch == 1){
//         return $query->fetch_all(MYSQLI_ASSOC);
//     }

// }

function getApplicationTable($dashboard = 0)
{
    session_start();
    include("dbconnection.php");

    $acadYearId = getDefaultAcadYearId();
    $semId      = getDefaultSemesterId();
    $userid     = $_SESSION['id'];

    $reqData    = getRequirementsTable('application');
    $data       = [];
    $totalData  = 0;
    $counter    = 1;

    $entries    = getFileEntries($acadYearId, $semId, $userid, 'applicant_file');

    // Generate if no Table Entries Found
    if ($entries->num_rows ==  0) {

        if ($dashboard == 0) {
            $sql = "INSERT INTO `applicant_file`
                            (`id`, `account_id`, `ay_id`, `sem_id`, `requirement`, `file`, `status`, `remarks`, `upload_date`, `modified_date`, `checked_date`) 
                    VALUES  ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','3','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','4','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','5','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','6','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','7','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','8','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','9','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','10','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','11','',0, '', '0000-00-00', '0000-00-00', '0000-00-00'),
                            ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','12','',0, '', '0000-00-00', '0000-00-00', '0000-00-00')";
            $query = $conn->query($sql) or die("Error URQ006: " . $conn->error);

            $entries    = getFileEntries($acadYearId, $semId, $userid, 'applicant_file');
        } else {
            $json_data = array(
                "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                "recordsTotal"    => intval($totalData),  // total number of records
                "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
                "data"            => $data   // total data array
            );

            return json_encode($json_data);
        }
    }

    while ($row = $entries->fetch_assoc()) {
        extract($row);

        if ($status == 0 || $status == 3) {
            $button =  getUploadButton($row, 'application');
        } elseif ($status == 4) {
            $button =   '<div class="btn-group-vertical d-flex">
                            <p id="textUploadSchoolId' . $requirement . '" class="small mx-auto">' . $file . '</p>
                        </div>';
        } else {
            $button =   '<div class="btn-group-vertical d-flex">
                            <button id="viewUploadSchoolId" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadSchoolIdModal'. $requirement .'"> View File</button>
                            <div class="modal fade" id="viewUploadSchoolIdModal'. $requirement .'" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">'. getRequirementDesc($requirement) .'</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <object data="uploads/application/' . $file . '.pdf" type="application/pdf" frameborder="0" width="100%" height="600px"
                                            <embed id="previewSchoolId' . $requirement . '" src="uploads/application/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                        </object>
                                    </div>

                                </div>
                                </div>
                            </div>
                            <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                        </div>';
        }

        // STATUS PLACE

        if ($dashboard == 0) {

            if ($status == 0) {
                $statusText = 'Not Submitted';
            } elseif ($status == 1) {
                $statusText = 'Submitted';
            } elseif ($status == 2) {
                $statusText = 'Approved';
            } elseif ($status == 3) {
                $statusText = 'Revision';
            } elseif ($status == 4) {
                $statusText = 'Not Applicable';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                $statusText,
                $remarks,
                $button,
            ];
        } else {

            if ($status == 0) {
                $statusText = '<span class="badge bg-warning">Not Submitted</span>';
            } elseif ($status == 1) {
                $statusText = '<span class="badge bg-primary">Submitted</span>';
            } elseif ($status == 2) {
                $statusText = '<span class="badge bg-success">Approved</span>';
            } elseif ($status == 3) {
                $statusText = '<span class="badge bg-danger">Revision</span>';
            } elseif ($status == 4) {
                $statusText = '<span class="badge bg-dark">Not Applicable</span>';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                (($modified_date <> '0000-00-00') ? date("F d, Y", strtotime($modified_date)) : ''),
                // $modified_date,
                $remarks,
                $statusText,
            ];
        }


        $counter++;
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}

function getUploadButton($row, $category = 'assessment')
{
    extract($row);

    $src = ($file != '') ? "uploads/" . $category . "/" . $file . ".pdf" : '';

    $button = '<div class="btn-group-vertical d-flex">
                    <!--BUTTON FOR "NOT APPLICABLE"-->
                    <input type="checkbox" class="btn-check" id="btn_na_' . $requirement . '" onclick="buttonNotApplicable(' . $requirement . ')">
                    <label class="btn btn-outline-dark" for="btn_na_' . $requirement . '">Not Applicable</label>
                    <div class="btn-group" role="group">
                        <div id="divUpload' . $requirement . '" class="upload_file file btn btn-primary">Upload
                            <input id="fileUpload' . $requirement . '" type="file" name="schoolIdFile" accept="application/pdf" onchange="getFileData(this, \'' . $requirement . '\');" />
                        </div>
                        <button id="viewUpload' . $requirement . '" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUpload' . $requirement . 'Modal"> View File</button>
                        <div class="modal fade" id="viewUpload' . $requirement . 'Modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">School ID</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed id="preview' . $requirement . '" src="' . $src . '" frameborder="0" width="100%" height="400px">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="textUpload' . $requirement . '" class="small mx-auto">' . $file . '</p>
                </div>';

    return $button;
}

function submitApplication($target_dir, $corFile, $gradesFile, $cobFile, $cgmcFile, $idpicFile, $mapFile, $brgyclearanceFile, $parvoteidFile, $appvoteidFile, $itrFile)
{
    session_start();

    $typeCount  = 3;
    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    $userid     = $_SESSION['id'];
    $typeArray  = array("", "schoolid", "clearance", "cor", "grades", "cob", "cgmc", "idpic", "map", "brgyclearance", "parvoteid", "appvoteid", "itr", "indigency");


    if ($corFile <> '0') {
        if (is_array($corFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value1      = uploadFile($target_dir, $corFile, $file_name);

            if ($value1 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value1);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($gradesFile <> '0') {
        if (is_array($gradesFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value2     = uploadFile($target_dir, $gradesFile, $file_name);

            if ($value2 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value2);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($cobFile <> '0') {
        if (is_array($cobFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value3      = uploadFile($target_dir, $cobFile, $file_name);

            if ($value3 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value3);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($cgmcFile <> '0') {
        if (is_array($cgmcFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value4      = uploadFile($target_dir, $cgmcFile, $file_name);

            if ($value4 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value4);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($idpicFile <> '0') {
        if (is_array($idpicFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value5      = uploadFile($target_dir, $idpicFile, $file_name);

            if ($value5 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value5);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($mapFile <> '0') {
        if (is_array($mapFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value6      = uploadFile($target_dir, $mapFile, $file_name);

            if ($value6 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value6);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($brgyclearanceFile <> '0') {
        if (is_array($brgyclearanceFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value7      = uploadFile($target_dir, $brgyclearanceFile, $file_name);

            if ($value7 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value7);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($parvoteidFile <> '0') {
        if (is_array($parvoteidFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value8      = uploadFile($target_dir, $parvoteidFile, $file_name);

            if ($value8 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value8);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($appvoteidFile <> '0') {
        if (is_array($appvoteidFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value9      = uploadFile($target_dir, $appvoteidFile, $file_name);

            if ($value9 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value9);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    $typeCount += 1;

    if ($itrFile <> '0') {
        if (is_array($itrFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value10    = uploadFile($target_dir, $itrFile, $file_name);

            if ($value10 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, $typeCount, 1, 'applicant_file');
            } else {
                return ($value10);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', $typeCount, 4, 'applicant_file');
    }

    // $typeCount += 1;

    // if ($indigencyFile <> '0') {
    //     if(is_array($indigencyFile)){
    //         $type       = $typeArray[$typeCount];
    //         $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
    //         $value11    = uploadFile($target_dir, $indigencyFile, $file_name);

    //         if ($value11 == 'Success') {
    //             echo updateRequirement($ay, $sem, $userid, $file_name, 3, 1, 'applicant_file');
    //         } else {
    //             return ($value11);
    //         }
    //     }
    // }else{
    //     echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 3, 4, 'applicant_file');
    // }

    update_status(5, $userid);


    return 'Success';
}

function getRenewalTable($dashboard = 0)
{
    session_start();
    include("dbconnection.php");

    $acadYearId = getDefaultAcadYearId();
    $semId      = getDefaultSemesterId();
    $userid     = $_SESSION['id'];

    $reqData    = getRequirementsTable('renewal');
    $data       = [];
    $totalData  = 0;
    $counter    = 1;

    $sql = "SELECT * FROM renewal_file WHERE ay_id = '{$acadYearId}' AND sem_id = '{$semId}' AND account_id = '{$userid}'ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error URQ008: " . $conn->error);

    // Generate if no Table Entries Found
    if ($query->num_rows ==  0) {
        if ($dashboard == 0) {
            $sql = "INSERT INTO `renewal_file`
                        (`id`, `account_id`, `ay_id`, `sem_id`, `requirement`, `file`, `status`, `remarks`, `upload_date`, `modified_date`, `checked_date`) 
                VALUES  ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','1','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','3','',0, '', '', '', '')";
            $query = $conn->query($sql) or die("Error URQ009: " . $conn->error);

            $sql = "SELECT * FROM renewal_file WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' AND account_id = '" . $userid . "'ORDER BY id DESC";
            $query = $conn->query($sql) or die("Error URQ010: " . $conn->error);
        } else {
            $json_data = array(
                "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                "recordsTotal"    => intval($totalData),  // total number of records
                "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
                "data"            => $data   // total data array
            );

            return json_encode($json_data);
        }
    }

    while ($row = $query->fetch_assoc()) {
        extract($row);

        if ($status == 0 || $status == 3) {
            $button =  getUploadButton($row, 'renewal');
        } elseif ($status == 4) {
            $button =   '<div class="btn-group-vertical d-flex">
                            <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                        </div>';
        } else {
            $button =   '<div class="btn-group-vertical d-flex">
                            <button id="viewUploadSchoolId" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewUploadSchoolIdModal"> View File</button>
                            <div class="modal fade" id="viewUploadSchoolIdModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">School ID</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed id="previewSchoolId" src="uploads/application/' . $file . '.pdf" frameborder="0" width="100%" height="400px">
                                    </div>

                                </div>
                                </div>
                            </div>
                            <p id="textUploadSchoolId" class="small mx-auto">' . $file . '</p>
                        </div>';
        }

        // STATUS PLACE

        if ($dashboard == 0) {

            if ($status == 0) {
                $statusText = 'Not Submitted';
            } elseif ($status == 1) {
                $statusText = 'Submitted';
            } elseif ($status == 2) {
                $statusText = 'Approved';
            } elseif ($status == 3) {
                $statusText = 'Revision';
            } elseif ($status == 4) {
                $statusText = 'Not Applicable';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                $statusText,
                $remarks,
                $button,
            ];
        } else {

            if ($status == 0) {
                $statusText = '<span class="badge bg-warning">Not Submitted</span>';
            } elseif ($status == 1) {
                $statusText = '<span class="badge bg-primary">Submitted</span>';
            } elseif ($status == 2) {
                $statusText = '<span class="badge bg-success">Approved</span>';
            } elseif ($status == 3) {
                $statusText = '<span class="badge bg-danger">Revision</span>';
            } elseif ($status == 4) {
                $statusText = '<span class="badge bg-dark">Not Applicable</span>';
            }

            $data[] = [
                $counter,
                $reqData[$counter - 1][1],
                (($modified_date <> '0000-00-00') ? date("F d, Y", strtotime($modified_date)) : ''),
                // $modified_date,
                $remarks,
                $statusText,
            ];
        }

        $counter++;
    }

    $json_data = array(
        "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
        "recordsTotal"    => intval($totalData),  // total number of records
        "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
        "data"            => $data   // total data array
    );

    echo json_encode($json_data);  // send data as json format
}

function submitRenewal($target_dir, $schoolIdFile, $corFile)
{
    session_start();

    $typeCount  = 1;
    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    $userid     = $_SESSION['id'];
    $typeArray  = array("", "schoolid", "clearance", "cor", "grades", "cob", "cgmc", "idpic", "map", "brgyclearance", "parvoteid", "appvoteid", "itr", "indigency");


    if ($schoolIdFile <> '0') {
        if (is_array($schoolIdFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value1      = uploadFile($target_dir, $schoolIdFile, $file_name);

            if ($value1 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 1, 1, 'renewal_file');
            } else {
                return ($value1);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4, 'renewal_file');
    }

    $typeCount += 2;

    if ($corFile <> '0') {
        if (is_array($corFile)) {
            $type       = $typeArray[$typeCount];
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value1      = uploadFile($target_dir, $corFile, $file_name);

            if ($value1 == 'Success') {
                echo updateRequirement($ay, $sem, $userid, $file_name, 3, 1, 'renewal_file');
            } else {
                return ($value1);
            }
        }
    } else {
        echo updateRequirement($ay, $sem, $userid, 'Not Applicable', 3, 4, 'renewal_file');
    }


    return 'Success';
}

function setRequirements($userid, $id, $status, $state, $remarks){

    include("dbconnection.php");
    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    

    switch($state){
        case 'app':
            // (update_applicant_status($userid, $act) == true ? 'Success' : 'Error');
            $entries    = getFileEntries($ay, $sem, $userid, 'applicant_file', 0, 1);
            $val        = updateRequirementStatus($id, $status, 'applicant_file', $remarks);
            break;
        case 'ass':
            $entries    = getFileEntries($ay, $sem, $userid, 'assessment_file', 0, 1);
            $val        = updateRequirementStatus($id, $status, 'assessment_file', $remarks);
            break;
        case 'ren':
            $entries    = getFileEntries($ay, $sem, $userid, 'renewal_file', 0, 1);
            $val        = updateRequirementStatus($id, $status, 'renewal_file', $remarks);
            break;
    }
    return $val;
    if($entries->num_rows <> 0) {
        return (update_applicant_status($userid, 1) == true ? 'Success' : 'Error');
    }
    return 'Success';

}

function updateRequirementStatus($id, $status, $target, $remarks = "")
{
    $date = date("Y-m-d");

    include("dbconnection.php");

    $sql = "UPDATE  `{$target}` 
            SET     `status`    = '{$status}',  
                    `remarks`   = '{$remarks}'
            WHERE   `id`        = '{$id}'";

    $query = $conn->query($sql) or die("Error URQ004: " . $conn->error);
    return($sql);
    
    return ($query) ? "Success" : "Error Updating";
}
