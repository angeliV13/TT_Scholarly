<?php

include("functionModel.php");
include("actionTableHandlerModel.php");
// include("uploadRequirementsModel.php");
include("../global_variables.php");

function accountListingTable($acc_id, $acc_type, $view_type = 1) //View Type = 1 is View of Applicants and Beneficiaries
{
    include("dbconnection.php");

    $session_type = $acc_type;
    $session_id   = $acc_id;

    $sql =  "SELECT * FROM account acc 
            JOIN user_info user ON acc.id = user.account_id ";

    $sql .= ($view_type == 0) ? " WHERE acc.account_type = 0 OR acc.account_type = 1 " : " WHERE acc.account_type = 2 OR acc.account_type = 3 ";
    $sql .= "ORDER BY acc.account_type ASC";

    
    $query = $conn->query($sql);

    $data = [];
    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {

            extract($row);

            $id = $row['id'];
            $user_name = $row['user_name'];
            $email = $row['email'];
            $account_type = $row['account_type'];
            $access_level = $row['access_level'];
            $account_status = ($row['account_status'] == 1) ? "Active" : "Inactive";

            $type = $level = $actions = "";
            $nestedData = [];

            if ($account_type == 0) {
                $type = "Super Admin";
            } else if ($account_type == 1) {
                $type = "Admin";
            } else if ($account_type == 2) {
                $type = "Beneficiaries";
            } else if ($account_type == 3) {
                $type = "Applicants";
            }

            if ($access_level == 0) {
                $level = "No Super Admin Access";
            } else if ($access_level == 1) {
                $level = "Super Admin w/ limited Access";
            } else if ($access_level == 2) {
                $level = "Super Admin w/ Full Access";
            }

            // For Super Admin

            if ($session_type == 0) {
                if ($account_type < 2) {
                    $actions = '<div class="row d-grid">
                                    <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $id . '">Edit Credentials</button>
                                    <button class="btn-sm btn btn-danger">Delete Account</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $id . '" aria-describedby="accountName_' . $id . '" name="accountName_' . $id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $id . '" aria-describedby="accountUserName_' . $id . '" name="accountUserName_' . $id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $id . '" aria-describedby="accountEmail_' . $id . '" name="accountEmail_' . $id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex"> 
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="0" id="accountSuperAdmin_' . $id . '" '. (($account_type == 0) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountSuperAdmin_' . $id . '">
                                                                    Super Admin
                                                                </label>
                                                            </div> 
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountAdmin_' . $id . '" '. (($account_type == 1) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                            <div class="d-flex ms-4 mt-1 small">
                                                                <input class="form-check-input" type="checkbox" value="" id="accountAdminAccess_' . $id . '" '. (($access_level == 1) ? 'checked' : '') .'>
                                                                <label class="mx-2 form-check-label" for="accountAdminAccess_' . $id . '">
                                                                    Super Admin Access
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="1" id="accountActive_' . $id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="0" id="accountInactive_' . $id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                }
                if ($account_id == $session_id){
                    $actions = '<div class="row d-grid">
                                    <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $id . '">Edit Credentials</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $id . '" aria-describedby="accountName_' . $id . '" name="accountName_' . $id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $id . '" aria-describedby="accountUserName_' . $id . '" name="accountUserName_' . $id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $id . '" aria-describedby="accountEmail_' . $id . '" name="accountEmail_' . $id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex"> 
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="0" id="accountSuperAdmin_' . $id . '" '. (($account_type == 0) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountSuperAdmin_' . $id . '">
                                                                    Super Admin
                                                                </label>
                                                            </div> 
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountAdmin_' . $id . '" '. (($account_type == 1) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                            <div class="d-flex ms-4 mt-1 small">
                                                                <input class="form-check-input" type="checkbox" value="" id="accountAdminAccess_' . $id . '" '. (($access_level == 1) ? 'checked' : '') .'>
                                                                <label class="mx-2 form-check-label" for="accountAdminAccess_' . $id . '">
                                                                    Super Admin Access
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="1" id="accountActive_' . $id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="0" id="accountInactive_' . $id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                }
            } else if ($session_type == 1) {
                if ($account_type == 0) {
                    $actions = '<div class="row badge bg-secondary">
                                    <span class="">No Edit Access</span>
                                </div>';
                } else if ($account_type == 1 && $access_level == 1) {
                    $actions = '<div class="d-grid">
                                    <button class="btn-sm btn btn-secondary" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $id . '">Edit Credentials</button>
                                    <button class="btn-sm btn btn-danger">Delete Account</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $id . '" aria-describedby="accountName_' . $id . '" name="accountName_' . $id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $id . '" aria-describedby="accountUserName_' . $id . '" name="accountUserName_' . $id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $id . '" aria-describedby="accountEmail_' . $id . '" name="accountEmail_' . $id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountAdmin_' . $id . '" checked>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editAccount_' . $id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="1" id="accountActive_' . $id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive_' . $id . '">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="0" id="accountInactive_' . $id . '"'. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive_' . $id . '">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                } else {
                    $actions = '<div class="d-grid">
                                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $id . '">Edit Credentials</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $id . '" aria-describedby="accountName_' . $id . '" name="accountName_' . $id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $id . '" aria-describedby="accountUserName_' . $id . '" name="accountUserName_' . $id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $id . '" aria-describedby="accountEmail_' . $id . '" name="accountEmail_' . $id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountAdmin_' . $id . '" checked>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="1" id="accountActive_' . $id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive_' . $id . '">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="0" id="accountInactive_' . $id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive_' . $id . '">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                }
            }

            if ($account_type > 1) {
                $actions = '<div class="d-grid">
                                <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $id . '">Edit Credentials</button>
                                <button class="btn-sm btn btn-danger">Delete</button>
                            </div>
                            <div class="modal fade" id="account_edit_modal_' . $id . '" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form id="editAccount_' . $id . '">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountName_' . $id . '" class="form-label col-4">First Name</label>
                                                    <input type="text" class="form-control col" id="accountName_' . $id . '" aria-describedby="accountName_' . $id . '" name="accountName_' . $id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountUserName_' . $id . '" class="form-label col-4">Username</label>
                                                    <input type="text" class="form-control col" id="accountUserName_' . $id . '" aria-describedby="accountUserName_' . $id . '" name="accountUserName_' . $id . '" value="'.$user_name.'" disabled>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountEmail_' . $id . '" class="form-label col-4">Email</label>
                                                    <input type="email" class="form-control col" id="accountEmail_' . $id . '" aria-describedby="accountEmail_' . $id . '" name="accountEmail_' . $id . '"  value="'.$email.'"required>
                                                </div>
                                                <div class="row d-flex align-items-center mb-3">
                                                    <label for="accountAccessLevel" class="form-label col-4">Access Level</label>
                                                    <div class="col">
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountBeneficiary_' . $id . '" '. (($account_type == 2) ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountBeneficiary_' . $id . '">
                                                                Beneficiary
                                                            </label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountType_' . $id . '" value="1" id="accountApplicant_' . $id . '" '. (($account_type == 3) ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountApplicant_' . $id . '">
                                                                Applicant
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="editStatus_' . $id . '" class="form-label col-4">Account Status</label>
                                                    <div class="col">
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="1" id="accountActive_' . $id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountActive_' . $id . '">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountStatus_' . $id . '" value="0" id="accountInactive_' . $id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountInactive_' . $id . '">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">Edit Account</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
            }

            $nestedData[] = static_count();
            $nestedData[] = getUserNameFromId($id);
            $nestedData[] = $user_name;
            $nestedData[] = $email;
            $nestedData[] = $type;
            $nestedData[] = $level;
            $nestedData[] = $account_status;
            $nestedData[] = $actions;

            $data[] = $nestedData;

            $totalData++;
        }
    } else {
        $data[] = [];
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function examQuestionsTable()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM examination";
    $query = $conn->query($sql);

    $data = [];
    $categ = "";
    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            extract($row);

            switch ($category) {
                case 1:
                    $categ = "English";
                    break;
                case 2:
                    $categ = "Mathematics";
                    break;
                case 3:
                    $categ = "General Info";
                    break;
                case 4:
                    $categ = "Abstract";
                    break;
            }
            $count = static_count();

            $data[] = [
                $count,
                $categ,
                $question,
                $choices,
                $answer,
                "BUTTON",
            ];

            $totalData++;
        }
    } else {
        $data[] = [];
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function notificationTable()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM notification_type";
    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $notifiedUsers = "";
            $notifFunc = $row['notif_function'];
            $notifName = $row['notif_name'];
            $darkFlag = ($row['dark_flag'] == 1) ? "Yes" : "No";
            $icon = ($darkFlag == "Yes") ? $row['notif_icon'] . "-fill" : $row['notif_icon'];
            $notifIcon = "<i class='" . $icon . "' style='font-size:1.5rem;'></i>";
            $notif = (strpos($row['notified_users'], ",")) ? explode(",", $row['notified_users']) : $row['notified_users'];
            $button = "<button type='button' class='editNotif btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editNotifModal' data-id='" . $row['id'] . "' data-name='" . $row['notif_name'] . "' data-icon='" . $row['notif_icon'] . "' data-dark='" . $row['dark_flag'] . "' data-func='" . get_notif_func($row['notif_function']) . " ' data-users='" . $row['notified_users'] . "'>Edit</button>";


            if (is_array($notif)) 
            {
                foreach ($notif as $user) 
                {
                    $notifiedUsers .= getAccountType($user)[0] . "<br>";
                }
            } 
            else 
            {
                $notifiedUsers = getAccountType($notif)[0];
            }

            $data[] = [
                static_count(),
                get_notif_func($notifFunc),
                $notifName,
                $notifIcon,
                $darkFlag,
                $notifiedUsers,
                $button,
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function schoolTable()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM school ORDER BY school_type ASC";
    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $name = "";
            $id = $row['id'];
            $schoolName = $row['school_name'];
            $schoolAddress = $row['school_address'];
            $addedBy = get_user_info($row['added_by']);
            $dateAdded = date("F d, Y h:i A", strtotime($row['date_added']));
            $schoolType = get_school_type($row['school_type']);
            $schoolClass = $row['class_type'] == 0 ? "Public" : "Private";

            $name = $addedBy['first_name'] . " " . $addedBy['last_name'];

            $data[] = [
                static_count(),
                $schoolName,
                $schoolAddress,
                $schoolType,
                $schoolClass,
                // "<pre>" . print_r($addedBy, true) . "</pre>",
                $name,
                $dateAdded,
                "<button type='button' class='editSchool btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#update_school' data-id='" . $id . "' data-name='" . $schoolName . "' data-address='" . $schoolAddress . "' data-type='" . $row['school_type'] . "' data-class='" . $row['class_type'] . "'>Edit</button>
                <button type='button' class='deleteSchool btn btn-sm btn-danger' data-id='" . $id . "' data-name='" . $schoolName . "'>Delete</button>",
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function userTables($stat = "", $acc_status = "", $acc_type = "")
{
    // stat = scholarship_application status
    // acc_status = account account_status
    // acc_type = account account_type

    include("dbconnection.php");

    $schoolClassArr = ['0' => 'Public', '1' => 'Private'];
    $schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
    $scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assitance', '3' => 'SHS Educational Assistance'];

    $sql = "SELECT * FROM account acc 
            JOIN user_info inf ON acc.id = inf.account_id";

    $sql .= ($acc_type == "") ? " WHERE acc.account_type = '3'" : " WHERE acc.account_type = '$acc_type'";
    $sql .= ($acc_status == "") ? " AND acc.account_status = '1'" : " AND acc.account_status = '$acc_status'";

    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);

            $education  = get_user_education($account_id, 1);
            $scholarType = check_status($account_id);

            if ($stat != "")
            {
                if (!isset($scholarType['status'])) continue;
                if ($scholarType['status'] != $stat) continue;
            } 

            $none = ($acc_status == 4) ? "d-none" : "";

            $button = ' <div class="btn-group-vertical d-flex justify-content-between align-items-center">
                            <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="removeApplicant" type="button" class="deleteApplicant btn btn-danger '.$none.'" data-id="' . $account_id . '" data-status="Applicant">Remove Applicant</button>
                        </div>';

            $course     = (isset($education[1]['course']) ? get_education_courses('', $education[1]['course']) : '');
            $schoolDetails = (isset($education[1]['school']) ? get_school_name($education[1]['school']) :  '');

            $data[] = [
                static_count(),
                $last_name . ', ' . $first_name, //Name
                (isset($schoolDetails['school_name']))                  ? ($schoolDetails['school_name']) : '', //School Name
                (isset($schoolDetails['class_type']))    ? $schoolClassArr[$schoolDetails['class_type']] : '', //School Type
                (isset($scholarType['scholarType'])                 ? $scholarTypeArr[$scholarType['scholarType']] : ''), //Scholarship Type
                (isset($schoolDetails['school_type']))              ? $schoolLevelArr[$schoolDetails['school_type']] : '', //Educational Level
                (isset($education[1]['course']))                    ? $course[$education[1]['course']] : '', //Course
                (isset($education[1]['year_level'])                 ? ($education[1]['year_level']) : ''), // Year Level
                $contact_number, //Contact Number
                $barangay, //Barangay
                $button, // Buttons
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function websiteSocials()
{
    include("dbconnection.php");

    $sql = "SELECT * FROM website_socials ORDER BY social_type ASC";
    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            $socialName = $name = "";
            $id = $row['id'];
            $socialType = $row['social_type'];
            $link = $row['link'];
            $addedBy = get_user_info($row['added_by']);
            $dateAdded = date("F d, Y h:i A", strtotime($row['date_added']));
            $socialName = get_social_type($socialType);
            $name = $addedBy['first_name'] . " " . $addedBy['last_name'];

            $data[] = [
                static_count(),
                $socialName,
                $link,
                $name,
                $dateAdded,
                "<button type='button' class='editSocial btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editSocialModal' data-id='" . $id . "' data-name='" . $socialName . "' data-type='" . $socialType . "' data-link='" . $link . "'>Edit</button>
                <button type='button' class='deleteSocial btn btn-sm btn-danger' data-id='" . $id . "' data-name='" . $socialName . " Social Link'>Delete</button>",
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function graduatesTable()
{
    include("dbconnection.php");

    $schoolClassArr = ['0' => 'Public', '1' => 'Private'];
    $schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
    $scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assitance', '3' => 'SHS Educational Assistance'];

    $sql = "SELECT * FROM account acc 
            JOIN user_info inf ON acc.id = inf.account_id 
            WHERE acc.account_type = '3' AND acc.account_status = '1'";
    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);

            $education  = get_user_education($account_id, 1);
            $button = ' <div class="btn-group-vertical d-flex justify-content-between align-items-center">
                            <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="removeApplicant" type="button" class="btn btn-danger" data-id="' . $account_id . '">Remove Applicant</button>
                        </div>';
            $scholarType = check_status($account_id);

            $course     = (isset($education[1]['course']) ? get_education_courses('', $education[1]['course']) : '');
            $schoolDetails = (isset($education[1]['school']) ? get_school_name($education[1]['school']) :  '');

            $data[] = [
                static_count(),
                $last_name . ', ' . $first_name, //Name
                1,
                1,
                1,
                1,
                1,
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    );

    echo json_encode($json_data);
}

function viewNotificationTable()
{
    $notifications = show_notification(1);
    
    $totalData = $totalFiltered = 0;

    if ($notifications['data'] != null) 
    {
        foreach ($notifications['data'] as $notif) 
        {
            $data[] = [
                static_count(),
                $notif['notif_name'],
                htmlspecialchars_decode($notif['notif_body']),
                date("F d, Y h:i A", strtotime($notif['notif_date'])),
                ($notif['status'] == 1) ? "Read" : "Unread",
                "<a href='" . $notif['notif_link'] . "' class='btn btn-sm btn9-primary'>View</a>",
            ];

            $totalData++;
        }
    }

    $json_data = array(
        "draw" => 1,
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data ?? []
    );

    echo json_encode($json_data);
}