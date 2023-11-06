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
                    $actions = '<div class="d-grid">
                                    <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $account_id . '">Edit Credentials</button>
                                    <button class="btn-sm btn btn-danger mt-2" onclick=" deleteAccount(' . $account_id . ', \'' . getUserNameFromId($id) . '\');">Delete Account</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $account_id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $account_id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $account_id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $account_id . '" aria-describedby="accountName_' . $account_id . '" name="accountName_' . $account_id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $account_id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $account_id . '" aria-describedby="accountUserName_' . $account_id . '" name="accountUserName_' . $account_id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $account_id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $account_id . '" aria-describedby="accountEmail_' . $account_id . '" name="accountEmail_' . $account_id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $account_id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex"> 
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="0" id="accountSuperAdmin_' . $account_id . '" '. (($account_type == 0) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountSuperAdmin_' . $account_id . '">
                                                                    Super Admin
                                                                </label>
                                                            </div> 
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="1" id="accountAdmin_' . $account_id . '" '. (($account_type == 1) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $account_id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                            <div class="d-flex ms-4 mt-1 small">
                                                                <input class="form-check-input" type="checkbox" value="" id="accountAdminAccess_' . $account_id . '" '. (($access_level == 1) ? 'checked' : '') .'>
                                                                <label class="mx-2 form-check-label" for="accountAdminAccess_' . $account_id . '">
                                                                    Super Admin Access
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $account_id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="1" id="accountActive_' . $account_id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="0" id="accountInactive_' . $account_id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="updateAccount(' . $account_id . ')" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                }
                if ($account_id == $session_id){
                    $actions = '<div class="d-grid">
                                    <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $account_id . '">Edit Credentials</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $account_id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $account_id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $account_id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $account_id . '" aria-describedby="accountName_' . $account_id . '" name="accountName_' . $account_id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $account_id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $account_id . '" aria-describedby="accountUserName_' . $account_id . '" name="accountUserName_' . $account_id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $account_id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $account_id . '" aria-describedby="accountEmail_' . $account_id . '" name="accountEmail_' . $account_id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $account_id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex"> 
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="0" id="accountSuperAdmin_' . $account_id . '" '. (($account_type == 0) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountSuperAdmin_' . $account_id . '">
                                                                    Super Admin
                                                                </label>
                                                            </div> 
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="1" id="accountAdmin_' . $account_id . '" '. (($account_type == 1) ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $account_id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                            <div class="d-flex ms-4 mt-1 small">
                                                                <input class="form-check-input" type="checkbox" value="" id="accountAdminAccess_' . $account_id . '" '. (($access_level == 1) ? 'checked' : '') .'>
                                                                <label class="mx-2 form-check-label" for="accountAdminAccess_' . $account_id . '">
                                                                    Super Admin Access
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $account_id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="1" id="accountActive_' . $account_id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="0" id="accountInactive_' . $account_id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="updateAccount(' . $account_id . ')" class="btn btn-warning">Edit Account</button>
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
                                    <button class="btn-sm btn btn-secondary" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $account_id . '">Edit Credentials</button>
                                    <button class="btn-sm btn btn-danger mt-2" onclick=" deleteAccount(' . $account_id . ', \'' . getUserNameFromId($id) . '\');">Delete Account</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $account_id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $account_id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $account_id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $account_id . '" aria-describedby="accountName_' . $account_id . '" name="accountName_' . $account_id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $account_id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $account_id . '" aria-describedby="accountUserName_' . $account_id . '" name="accountUserName_' . $account_id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $account_id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $account_id . '" aria-describedby="accountEmail_' . $account_id . '" name="accountEmail_' . $account_id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $account_id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="1" id="accountAdmin_' . $account_id . '" checked>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $account_id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editAccount_' . $account_id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="1" id="accountActive_' . $account_id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive_' . $account_id . '">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="0" id="accountInactive_' . $account_id . '"'. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive_' . $account_id . '">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="updateAccount(' . $account_id . ')" class="btn btn-warning">Edit Account</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                } else {
                    $actions = '<div class="d-grid">
                                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $account_id . '">Edit Credentials</button>
                                </div>
                                <div class="modal fade" id="account_edit_modal_' . $account_id . '" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <form id="editAccount_' . $account_id . '">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountName_' . $account_id . '" class="form-label col-4">First Name</label>
                                                        <input type="text" class="form-control col" id="accountName_' . $account_id . '" aria-describedby="accountName_' . $account_id . '" name="accountName_' . $account_id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountUserName_' . $account_id . '" class="form-label col-4">Username</label>
                                                        <input type="text" class="form-control col" id="accountUserName_' . $account_id . '" aria-describedby="accountUserName_' . $account_id . '" name="accountUserName_' . $account_id . '" value="'.$user_name.'" disabled>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="accountEmail_' . $account_id . '" class="form-label col-4">Email</label>
                                                        <input type="email" class="form-control col" id="accountEmail_' . $account_id . '" aria-describedby="accountEmail_' . $account_id . '" name="accountEmail_' . $account_id . '"  value="'.$email.'"required>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-3">
                                                        <label for="accountAccessLevel_' . $account_id . '" class="form-label col-4">Access Level</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="1" id="accountAdmin_' . $account_id . '" checked>
                                                                <label class="mx-2 form-check-label" for="accountAdmin_' . $account_id . '">
                                                                    Admin
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex align-items-center mb-2">
                                                        <label for="editStatus_' . $account_id . '" class="form-label col-4">Account Status</label>
                                                        <div class="col">
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="1" id="accountActive_' . $account_id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountActive_' . $account_id . '">
                                                                    Active
                                                                </label>
                                                            </div>
                                                            <div class="d-flex">
                                                                <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="0" id="accountInactive_' . $account_id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                                <label class="mx-2 form-check-label" for="accountInactive_' . $account_id . '">
                                                                    Inactive
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="updateAccount(' . $account_id . ')" class="btn btn-warning">Edit Account</button>
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
                                <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#account_edit_modal_' . $account_id . '">Edit Credentials</button>
                                <button class="btn-sm btn btn-danger mt-2" onclick=" deleteAccount(' . $account_id . ', \'' . getUserNameFromId($id) . '\');">Delete Account</button>
                            </div>
                            <div class="modal fade" id="account_edit_modal_' . $account_id . '" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form id="editAccount_' . $account_id . '">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountName_' . $account_id . '" class="form-label col-4">First Name</label>
                                                    <input type="text" class="form-control col" id="accountName_' . $account_id . '" aria-describedby="accountName_' . $account_id . '" name="accountName_' . $account_id . '" value="'.getUserNameFromId($account_id).'" disabled>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountUserName_' . $account_id . '" class="form-label col-4">Username</label>
                                                    <input type="text" class="form-control col" id="accountUserName_' . $account_id . '" aria-describedby="accountUserName_' . $account_id . '" name="accountUserName_' . $account_id . '" value="'.$user_name.'" disabled>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="accountEmail_' . $account_id . '" class="form-label col-4">Email</label>
                                                    <input type="email" class="form-control col" id="accountEmail_' . $account_id . '" aria-describedby="accountEmail_' . $account_id . '" name="accountEmail_' . $account_id . '"  value="'.$email.'"required>
                                                </div>
                                                <div class="row d-flex align-items-center mb-3">
                                                    <label for="accountAccessLevel" class="form-label col-4">Access Level</label>
                                                    <div class="col">
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="2" id="accountBeneficiary_' . $account_id . '" '. (($account_type == 2) ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountBeneficiary_' . $account_id . '">
                                                                Beneficiary
                                                            </label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountType_' . $account_id . '" value="3" id="accountApplicant_' . $account_id . '" '. (($account_type == 3) ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountApplicant_' . $account_id . '">
                                                                Applicant
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center mb-2">
                                                    <label for="editStatus_' . $account_id . '" class="form-label col-4">Account Status</label>
                                                    <div class="col">
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="1" id="accountActive_' . $account_id . '" '. (($account_status == 'Active') ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountActive_' . $account_id . '">
                                                                Active
                                                            </label>
                                                        </div>
                                                        <div class="d-flex">
                                                            <input class="form-check-input" type="radio" name="accountStatus_' . $account_id . '" value="0" id="accountInactive_' . $account_id . '" '. (($account_status == 'Inactive') ? 'checked' : '' ).'>
                                                            <label class="mx-2 form-check-label" for="accountInactive_' . $account_id . '">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="updateAccount(' . $account_id . ')" class="btn btn-warning">Edit Account</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>';
            }

            $nestedData[] = static_count();
            // $nestedData[] = getUserNameFromId($id);
            $nestedData[] = $last_name;
            $nestedData[] = $first_name;
            $nestedData[] = $middle_name;
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

            $button =  '<div class="d-grid">
                            <button class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_question_modal_' . $id . '" onclick="answerSelection(' . $id . ')">Edit Exam</button>
                            <button class="btn-sm btn btn-danger" onclick="deleteQuestion(' . $id . ')">Delete</button>
                        </div>
                        <div class="modal fade" id="edit_question_modal_' . $id . '" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Exam Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex align-items-center mb-2">
                                            <div class="col-sm-3">
                                                <p>Category</p>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radioEditCategory' . $id . '" id="radioEditEnglish' . $id . '" value="1" '.(($category == 1) ? 'checked' : '').'>
                                                    <label class="form-check-label" for="radioEditEnglish' . $id . '">
                                                        English
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radioEditCategory' . $id . '" id="radioEditMath' . $id . '" value="2" '.(($category == 2) ? 'checked' : '').'>
                                                    <label class="form-check-label" for="radioEditMath' . $id . '">
                                                        Mathematics
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radioEditCategory' . $id . '" id="radioEditGenInfo' . $id . '" value="3" '.(($category == 3) ? 'checked' : '').'>
                                                    <label class="form-check-label" for="radioEditGenInfo' . $id . '">
                                                        General Information
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radioEditCategory' . $id . '" id="radioEditAbstract' . $id . '" value="4" '.(($category == 4) ? 'checked' : '').'>
                                                    <label class="form-check-label" for="radioEditAbstract' . $id . '">
                                                        Abstract Reasoning
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEditQuestion' . $id . '" class="form-label col-3">Question</label>
                                            <textarea class="form-control col" rows="2" id="examEditQuestion' . $id . '" aria-describedby="examEditQuestion" name="examEditQuestion">'. $question .'</textarea>
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEditChoices' . $id . '" class="form-label col-3">Choices</label>
                                            <textarea class="form-control col" rows="3" id="examEditChoices' . $id . '" aria-describedby="examEditChoices" name="examEditChoices" onkeyup="answerSelection('. $id .')">'. str_replace('<br>', '&#10;', $choices) .'</textarea>
                                        </div>
                                        <div class="row d-flex align-items-center mb-2">
                                            <label for="examEditAnswer' . $id . '" class="form-label col-3">Answer</label>
                                            <select class="form-select col" id="examEditAnswer' . $id . '" aria-label="Default select example">
                                            <option value="1">'. $answer .'</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" onclick="editQuestion(' . $id . ')">Edit Question</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>';

            $data[] = [
                $count,
                $categ,
                $question,
                $choices,
                $answer,
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
            $schoolClass = get_school_class($row['class_type']);

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
                "<button type='button' class='editSchool btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#update_school' data-id='" . $id . "' data-name='" . $schoolName . "' data-address='" . $schoolAddress . "' data-type='" . $row['school_type'] . "' data-class='" . $row['class_type'] . "' data-partner='" . $row['partner'] . "' >Edit</button>
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
    include("../global_variables.php");

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $schoolClassArr = ['0' => 'Public', '1' => 'Private', '3' => '', '4' => ''];
    $schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
    $scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assitance', '3' => 'SHS Educational Assistance'];

    $sql = "SELECT * FROM account acc 
            JOIN user_info inf ON acc.id = inf.account_id
            JOIN scholarship_application sa ON acc.id = sa.userId
            WHERE sa.ay_id = '$acadYear' AND sa.sem_id = '$defaultYear'";

    $sql .= ($acc_type == "") ? " AND acc.account_type = '3'" : " AND acc.account_type = '$acc_type'";
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
            $school = $course = $schoolDetails = "";

            if($acc_type == 2){
                $button = ' <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="removeApplicant" type="button" class="deleteApplicant btn btn-danger '.$none.'" data-id="' . $account_id . '" data-status="Applicant">Remove Beneficiary</button>';
            }elseif($acc_type == 3)
                $button = ' <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="removeApplicant" type="button" class="deleteApplicant btn btn-danger '.$none.'" data-id="' . $account_id . '" data-status="Applicant">Remove Applicant</button>';
            }

            if (isset($education['course']))
            {
                if (is_numeric($education['course']))
                {
                    $course = get_education_courses('', $education['course']);
                }
                else
                {
                    $course = "";
                }
            }

            if (isset($education['school']))
            {
                if (is_numeric($education['school']))
                {
                    $schoolDetails = get_school_name($education['school']);
                }
                else
                {
                    $school = $education['school'];
                }
            }

            $data[] = [
                static_count(),
                $eac_number,
                '',
                $last_name,
                $first_name,
                $middle_name,
                $suffix,
                get_age($birth_date),
                $genderArr[$gender],
                (isset($schoolDetails['school_name']))                                  ? ($schoolDetails['school_name']) : $school, //School Name
                (isset($schoolDetails['class_type']))                                   ? $schoolClassArr[$schoolDetails['class_type']] : '', //School Type
                (isset($scholarType['scholarType'])                                     ? $scholarTypeArr[$scholarType['scholarType']] : ''), //Scholarship Type
                (isset($schoolDetails['school_type']))                                  ? $schoolLevelArr[$schoolDetails['school_type']] : '', //Educational Level
                $course, //Course
                (isset($education['year_level'])                                        ? ($education['year_level']) : ''), // Year Level
                $contact_number, //Contact Number
                $barangay, //Barangay
                $exam_start_date,
                $exam_end_date,
                $interview_start_date,
                $interview_end_date,
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
    // echo $sql;
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

function graduatesTable() //CHECKING CK
{
    include("dbconnection.php");

    $schoolClassArr = ['0' => 'Public', '1' => 'Private'];
    $schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
    $scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assitance', '3' => 'SHS Educational Assistance'];

    $sql = "SELECT * FROM account acc 
            LEFT JOIN user_info inf ON acc.id = inf.account_id 
            LEFT JOIN gen_info gen ON acc.id = user_id
            WHERE acc.account_type IN (2,3)
            AND acc.account_status = '2'";
    $query = $conn->query($sql);

    $data = [];

    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0) 
    {
        while ($row = $query->fetch_assoc()) 
        {
            extract($row);

            $school = $course = $schoolDetails = $scholarStatus = "";
            $scholarType = check_status($account_id);
            if (isset($scholarType['scholarType'])) $scholarStatus = $scholarType['status'];

            $education  = get_user_education($account_id, 1);
            $button = ' <div class="btn-group-vertical d-flex justify-content-between align-items-center">
                            <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="undoGraduate" type="button" class="undoGraduate btn btn-info" data-id="' . $account_id . ' data-status="' . $scholarStatus . '">Undo Graduate</button>
                        </div>';


            if (isset($education['course']))
            {
                if (is_numeric($education['course']))
                {
                    $course = get_education_courses('', $education['course']);
                }
                else
                {
                    $course = "";
                }
            }

            if (isset($education['school']))
            {
                if (is_numeric($education['school']))
                {
                    $schoolDetails = get_school_name($education['school']);
                }
                else
                {
                    $school = $education['school'];
                }
            }

            $data[] = [
                static_count(),
                $last_name . ", " . $first_name . " " . $middle_name,
                $email,                         //Email
                (isset($schoolDetails['school_name']))                                      ? ($schoolDetails['school_name']) : $school, //School Name,
                (isset($schoolDetails['school_type']))                                      ? $schoolLevelArr[$schoolDetails['school_type']] : '', //Educational Level,
                $course, //Course,
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

function graduatingTable() // CHECKING CK
{
    include("dbconnection.php");

    $schoolClassArr = ['0' => 'Public', '1' => 'Private'];
    $schoolLevelArr = ['0' => 'College', '1' => 'Senior High School', '2' => 'High School', '3' => 'Elementary'];
    $scholarTypeArr  = ['1' => 'College Scholarship', '2' => 'College Educational Assitance', '3' => 'SHS Educational Assistance'];

    $defaultYear = getDefaultSemesterId();
    $acadYear = getDefaultAcadYearId();

    $sql = "SELECT * FROM account acc 
            JOIN user_info inf ON acc.id = inf.account_id 
            JOIN gen_info gen ON acc.id = user_id
            WHERE acc.account_type IN (2,3) 
            AND acc.account_status = '1'
            AND gen.graduating_flag = '0'
            AND gen.ay_id = '$acadYear'
            AND gen.sem_id = '$defaultYear'";
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
                            <button id="viewInfo' . $account_id . '" type="button" class="viewInfoClass btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#viewInfoModal' . $account_id . '" data-id="' . $account_id . '">Check Information</button>
                            <button id="updateToGraduate" type="button" class="updateToGraduate btn btn-success mb-2" data-id="' . $account_id . '" data-status="User">Already Graduated</button>
                            <button id="removeApplicant" type="button" class="btn btn-danger" data-id="' . $account_id . '">Remove Beneficiary</button>
                        </div>';
            $scholarType = check_status($account_id);

            $school = $course = $schoolDetails = "";

            if (isset($education['course']))
            {
                if (is_numeric($education['course']))
                {
                    $course = get_education_courses('', $education['course']);
                }
                else
                {
                    $course = "";
                }
            }

            if (isset($education['school']))
            {
                if (is_numeric($education['school']))
                {
                    $schoolDetails = get_school_name($education['school']);
                }
                else
                {
                    $school = $education[1]['school'];
                }
            }

            $data[] = [
                static_count(),
                $last_name,
                $first_name,
                $middle_name,
                $email,                         //Email
                (isset($schoolDetails['school_name']))                                      ? ($schoolDetails['school_name']) : $school, //School Name,
                (isset($schoolDetails['school_type']))                                      ? $schoolLevelArr[$schoolDetails['school_type']] : '', //Educational Level,
                $course, //Course,
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

function viewNotificationTable()
{
    $notifications = show_notification(1);
    
    $totalData = $totalFiltered = 0;

    if ($notifications['data'] != null) 
    {
        foreach ($notifications['data'] as $notif) 
        {
            $buttonClass = notif_view_type($notif['notif_link']);

            $button = ($buttonClass == 0) ? '<button type="button" class="viewNotifData btn btn-primary" data-bs-toggle="modal" data-bs-target="#view_notif" data-link="' . $notif['notif_link'] . '">View</button>' : "<a href='" . $notif['notif_link'] . "' class='btn btn-primary'>View</a>";

            $data[] = [
                static_count(),
                $notif['notif_name'],
                htmlspecialchars_decode($notif['notif_body']),
                date("F d, Y h:i A", strtotime($notif['notif_date'])),
                ($notif['status'] == 1) ? "Read" : "Unread",
                $button,
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

function viewOfficials()
{
    $officials = website_officials(1);

    $totalData = $totalFiltered = 0;

    $link = $button = "";

    if ($officials != null)
    {
        foreach ($officials AS $key => $ofc)
        {
            $socMedias = $activeText = "";
            $id = $ofc['id'];
            $name = $ofc['name'];
            $img = $ofc['image'];
            $jobTitle = $ofc['job_title'];
            $desc = $ofc['description'];
            $dateAdded = date("F d, Y h:i A", strtotime($ofc['date_added']));
            $addedBy = ($ofc['added_by'] != 0) ? getUserNameFromId($ofc['added_by']) : "N/A";
            $active = $ofc['active'];
            $activeText = ($active == 1) ? "Active" : "Inactive";
            $socials = get_official_socials($id);

            if ($socials != null)
            {
                $socMedias .= "<div class='d-flex justify-content-center'>";

                foreach ($socials AS $soc)
                {
                    $socMedias .= '<a href="' . $soc['link'] . '" target="_blank" class="btn btn-sm btn-primary" style="margin-right: 5px;"><i class="' . $soc['socType'] . '"></i></a>';
                }

                $socMedias .= "</div>";
            }

            $button = '<button type="button" class="viewOfficial btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editOfficial" data-id="' . $id . '" data-name="' . $name . '" data-job="' . $jobTitle . '" data-desc="' . $desc . '" data-img="' . $img . '" data-active="' . $active . '" data-soc=\'' . json_encode($socials) . '\'>Edit</button>
                        <button type="button" class="deleteOfficial btn btn-sm btn-danger" data-id="' . $id . '" data-name="' . $name . '">Delete</button>';

            $data[] = [
                static_count(),
                $name,
                $jobTitle,
                $desc,
                $socMedias,
                $dateAdded,
                $addedBy,
                $activeText,
                $button,
            ];
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

function viewTestimony()
{
    $testimony = get_website_testimonials();

    $totalData = $totalFiltered = 0;

    if ($testimony != null)
    {
        foreach ($testimony AS $key => $test)
        {
            $id = $test['id'];
            $name = $test['name'];
            $img = $test['image'];
            $desc = $test['description'];
            $jobTitle = $test['job_title'];
            $dateAdded = date("F d, Y h:i A", strtotime($test['date_added']));
            $addedBy = ($test['added_by'] != 0) ? getUserNameFromId($test['added_by']) : "N/A";
            $active = $test['active'];
            $activeText = ($active == 1) ? "Active" : "Inactive";

            $button = '<button type="button" class="viewTestimony btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTestimony" data-id="' . $id . '" data-name="' . $name . '" data-desc="' . $desc . '" data-img="' . $img . '" data-active="' . $active . '" data-job="' . $jobTitle . '">Edit</button>
                        <button type="button" class="deleteTestimony btn btn-sm btn-danger" data-id="' . $id . '" data-name="' . $name . '">Delete</button>';

            $data[] = [
                static_count(),
                $name,
                $jobTitle,
                $desc,
                $dateAdded,
                $addedBy,
                $activeText,
                $button,
            ];
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