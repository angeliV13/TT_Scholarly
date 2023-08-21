<?php

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

function getDefaultAcadYearId()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM acad_year WHERE default_ay = 1";
    $query = $conn->query($sql) or die("Error BSQ000: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            return $id;
        }
    }
}

function getDefaultSemesterId()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM semester WHERE default_sem = 1";
    $query = $conn->query($sql) or die("Error BSQ0015: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            return $id;
        }
    }
}

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

function getAssessmentBeneTable()
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
        $sql = "INSERT INTO `assessment_file`
                        (`id`, `account_id`, `ay_id`, `sem_id`, `requirement`, `file`, `status`, `remarks`, `upload_date`, `modified_date`, `checked_date`) 
                VALUES  ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','1','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','2','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','3','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','4','',0, '', '', '', '')";
        $query = $conn->query($sql) or die("Error URQ002: " . $conn->error);

        $sql = "SELECT * FROM assessment_file WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' AND account_id = '" . $userid . "'ORDER BY id DESC";
        $query = $conn->query($sql) or die("Error URQ003: " . $conn->error);
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
            }else{
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
            }else{
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
            }else{
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
            }else{
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



function uploadFile($target_dir, $file, $file_name)
{

    $errors = "";

    $file_size  = $file['size'];
    $file_tmp   = $file['tmp_name'];
    // $file_ext   = strtolower(end(explode('.', $name_of_file)));
    $tmp = explode('.', $file['name']);
    $file_ext = strtolower(end($tmp));


    $extensions = array("pdf");

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
        if(is_array($schoolIdFile)){
            $type       = "schoolid";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value1      = uploadFile($target_dir, $schoolIdFile, $file_name);

            if ($value1 == 'Success') {
                echo updateAssessmentRequirement($ay, $sem, $userid, $file_name, 1, 1);
            } else {
                return ($value1);
            }
        }
    }else{
        echo updateAssessmentRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4);
    }
    if ($clearanceFile <> '0' ) {
        if(is_array($clearanceFile)){
            $type       = "clearance";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value2      = uploadFile($target_dir, $clearanceFile, $file_name);

            if ($value2 == 'Success') {
                echo updateAssessmentRequirement($ay, $sem, $userid, $file_name, 2, 1);
            } else {
                return ($value2);
            }
        }
    }else{
        echo updateAssessmentRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4);
    }
    if ($corFile <> '0') {
        if(is_array($corFile)){
            $type       = "cor";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value3      = uploadFile($target_dir, $corFile, $file_name);

            if ($value3 == 'Success') {
                echo updateAssessmentRequirement($ay, $sem, $userid, $file_name, 3, 1);
            } else {
                return ($value3);
            }
        }
    }else{
        echo updateAssessmentRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4);
    }
    if ($gradeFile <> '0') {
        if(is_array($gradeFile)){
            $type       = "grades";
            $file_name  = $ay . "_" . $sem . "_" . $userid . "_" . $type;
            $value4      = uploadFile($target_dir, $gradeFile, $file_name);

            if ($value4 == 'Success') {
                echo updateAssessmentRequirement($ay, $sem, $userid, $file_name, 4, 1);
            } else {
                return ($value4);
            }
        }
    }else{
        echo updateAssessmentRequirement($ay, $sem, $userid, 'Not Applicable', 1, 4);
    }
    return 'Success';
}

function updateAssessmentRequirement($ay, $sem, $userid, $file, $requirement, $status)
{
    $date = date("Y-m-d");

    include("dbconnection.php");

    $sql = "UPDATE `assessment_file` 
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

function getApplicationTable()
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

    $sql = "SELECT * FROM applicant_file WHERE ay_id = '{$acadYearId}' AND sem_id = '{$semId}' AND account_id = '{$userid}'ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error URQ005: " . $conn->error);

    // Generate if no Table Entries Found
    if ($query->num_rows ==  0) {
        $sql = "INSERT INTO `applicant_file`
                        (`id`, `account_id`, `ay_id`, `sem_id`, `requirement`, `file`, `status`, `remarks`, `upload_date`, `modified_date`, `checked_date`) 
                VALUES  ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','3','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','4','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','5','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','6','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','7','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','8','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','9','',0, '', '', '', ''),
                        ( 0 ,'{$userid}', '{$acadYearId}', '{$semId}','10','',0, '', '', '', '')";
        $query = $conn->query($sql) or die("Error URQ002: " . $conn->error);

        $sql = "SELECT * FROM applicant_file WHERE ay_id = '" . $acadYearId . "' AND sem_id = '" . $semId . "' AND account_id = '" . $userid . "'ORDER BY id DESC";
        $query = $conn->query($sql) or die("Error URQ003: " . $conn->error);
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
            }else{
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
            }else{
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
            }else{
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
            }else{
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
