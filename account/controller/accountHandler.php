<?php

require("../model/accountHandlerModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    if ($action == 1) // Login
    {
        if ($_POST['user_name'] <> '' && $_POST['password'] <> '' && $_POST['type'] <> '') 
        {
            $lv_return = userLogin($_POST['user_name'], $_POST['password'], $_POST['type']);

            echo $lv_return;
        } 
        else 
        {
            echo 'Error LC001: No Data Found';
        }
    }
    else if ($action == 2) // Register
    {
        $data = [
            'firstName'         => isset($_POST['firstName']) ? $_POST['firstName'] : '',
            'middleName'        => isset($_POST['middleName']) ? $_POST['middleName'] : '',
            'lastName'          => isset($_POST['lastName']) ? $_POST['lastName'] : '',
            'suffix'            => isset($_POST['suffix']) ? $_POST['suffix'] : '',
            'birthdate'         => isset($_POST['birthDate']) ? $_POST['birthDate'] : '',
            'birthPlace'        => isset($_POST['birthPlace']) ? $_POST['birthPlace'] : '',
            'religion'          => isset($_POST['religion']) ? $_POST['religion'] : 0,
            'gender'            => isset($_POST['gender']) ? $_POST['gender'] : 0,
            'civilStatus'       => isset($_POST['civilStatus']) ? $_POST['civilStatus'] : 0,
            'contactNo'         => isset($_POST['contactNo']) ? $_POST['contactNo'] : 0,
            'address'           => isset($_POST['address']) ? $_POST['address'] : '',
            'region'            => isset($_POST['region']) ? $_POST['region'] : '',
            'province'          => isset($_POST['provice']) ? $_POST['provice'] : '',
            'city'              => isset($_POST['city']) ? $_POST['city'] : '',
            'barangay'          => isset($_POST['barangay']) ? $_POST['barangay'] : '',
            'zipCode'           => isset($_POST['zipCode']) ? $_POST['zipCode'] : '',
            'username'          => isset($_POST['username']) ? $_POST['username'] : '',
            'email'             => isset($_POST['email']) ? $_POST['email'] : '',
            'password'          => isset($_POST['password']) ? $_POST['password'] : '',
        ];

        echo registerAccount($data);
    }
    else if ($action == 3) // Email Confirmation
    {
        $data = [
            'code'      => isset($_REQUEST['code']) ? $_REQUEST['code'] : '',
            'email'     => isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
        ];

        echo email_confirmation($data);
    }
    else if ($action == 4) // Resend Email
    {
        echo resend_email(isset($_POST['email']) ? $_POST['email'] : '');
    }
    else if ($action == 5) // Sign Out
    {
        echo user_sign_out();
    }
    else if ($action == 6) // Delete Account for failed verification
    {
        echo delete_account(isset($_POST['email']) ? $_POST['email'] : '');
    }
    else if ($action == 7) // Forgot Password
    {
        echo forgot_password(isset($_POST['email']) ? $_POST['email'] : '');
    }
    else if ($action == 8) // Password Reset
    {
        $data = [
            'code'              => isset($_REQUEST['code']) ? $_REQUEST['code'] : '',
            'email'             => isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
            'newPassword'       => isset($_REQUEST['newPassword']) ? $_REQUEST['newPassword'] : '',
        ];

        echo password_reset($data);
    }
    else if ($action == 9) // Change Password
    {
        echo change_password(
            isset($_POST['currentPassword']) ? $_POST['currentPassword'] : '',
            isset($_POST['newPassword']) ? $_POST['newPassword'] : ''
        );
    }
    else if ($action == 10) // Edit Profile
    {
        $data = [
            'firstName'        => isset($_POST['firstName']) ? $_POST['firstName'] : '',
            'middleName'       => isset($_POST['middleName']) ? $_POST['middleName'] : '',
            'lastName'         => isset($_POST['lastName']) ? $_POST['lastName'] : '',
            'addressLine'      => isset($_POST['addressLine']) ? $_POST['addressLine'] : '',
            'barangay'         => isset($_POST['barangay']) ? $_POST['barangay'] : '',
            'municipality'     => isset($_POST['municipality']) ? $_POST['municipality'] : '',
            'province'         => isset($_POST['province']) ? $_POST['province'] : '',
            'zipCode'          => isset($_POST['zipCode']) ? $_POST['zipCode'] : '',
            'contactNo'        => isset($_POST['contactNo']) ? $_POST['contactNo'] : '',
            'email'            => isset($_POST['email']) ? $_POST['email'] : '',
            'removeText'       => isset($_POST['removeText']) ? $_POST['removeText'] : '',
            'file'             => isset($_FILES['file']) ? $_FILES['file'] : '',
        ];
        
        // print_r($data);

        echo update_profile($data);
    }
}
