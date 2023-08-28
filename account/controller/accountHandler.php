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
            'scholarType'       => isset($_POST['scholarType']) ? $_POST['scholarType'] : '',
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
            'citizenship'       => isset($_POST['citizenship']) ? $_POST['citizenship'] : 0,
            'years'             => isset($_POST['years']) ? $_POST['years'] : 0,
            'language'          => isset($_POST['language']) ? $_POST['language'] : 'NA',
            'username'          => isset($_POST['username']) ? $_POST['username'] : '',
            'email'             => isset($_POST['email']) ? $_POST['email'] : '',
            'password'          => isset($_POST['password']) ? $_POST['password'] : '',
            'fbName'            => isset($_POST['fbName']) ? $_POST['fbName'] : '',
            'fbUrl'             => isset($_POST['fbUrl']) ? $_POST['fbUrl'] : '',
            'fbImg'             => isset($_FILES['fbImg']) ? $_FILES['fbImg'] : NULL,
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
    else if ($action == 7) // Forgot Password and Verify Email
    {
        echo forgot_password(isset($_POST['email']) ? $_POST['email'] : '', isset($_POST['type']) ? $_POST['type'] : '');
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
    else if ($action == 11) // Update Contact Information (Benef and Applicant)
    {
        $data = [
            'contactNo'         => isset($_POST['contactNo']) ? $_POST['contactNo'] : '',
            'email'             => isset($_POST['email']) ? $_POST['email'] : '',
            'userId'            => isset($_POST['userId']) ? $_POST['userId'] : '',
        ];

        echo updateContactInfo($data);
    }
    else if ($action == 12) // get school address
    {
        echo getAccountInfo(isset($_POST['schoolId']) ? $_POST['schoolId'] : '');
    }
    else if ($action == 13) // Submit Application
    {
        echo submitApplication(isset($_POST['userId']) ? $_POST['userId'] : '');
    }
    else if ($action == 14) // Update Educational Background
    {
        $data = [
            'college'           => isset($_POST['college']) ? $_POST['college'] : [],
            'shs'               => isset($_POST['shs']) ? $_POST['shs'] : [],
            'jhs'               => isset($_POST['jhs']) ? $_POST['jhs'] : [],
            'elem'              => isset($_POST['elem']) ? $_POST['elem'] : [],
            'other_info'        => isset($_POST['other_info']) ? $_POST['other_info'] : [],
            'userId'            => isset($_POST['userId']) ? $_POST['userId'] : '',
        ];

        echo updateEducationalInfo($data);
    }
    else if ($action == 15) // Update Family Information
    {
        $data = [
            'guardianArr'       => isset($_POST['guardianArr']) ? $_POST['guardianArr'] : [],
            'spouseArr'         => isset($_POST['spouseArr']) ? $_POST['spouseArr'] : [],
            'fatherArr'         => isset($_POST['fatherArr']) ? $_POST['fatherArr'] : [],
            'motherArr'         => isset($_POST['motherArr']) ? $_POST['motherArr'] : [],
            'siblings'          => isset($_POST['siblings']) ? $_POST['siblings'] : [],
            'otherInfoArr'      => isset($_POST['otherInfoArr']) ? $_POST['otherInfoArr'] : [],
            'userId'            => isset($_POST['userId']) ? $_POST['userId'] : '',
        ];

        echo updateFamilyInfo($data);
    }
    else if ($action == 16) // Update General Info
    {
        $data = [
            'userId'            => isset($_POST['userId']) ? $_POST['userId'] : '',
            'working_flag'      => isset($_POST['working_flag']) ? $_POST['working_flag'] : '',
            'ofw_flag'          => isset($_POST['ofw_flag']) ? $_POST['ofw_flag'] : '',
            'other_ofw'         => isset($_POST['other_ofw']) ? $_POST['other_ofw'] : '',
            'pwd_flag'          => isset($_POST['pwd_flag']) ? $_POST['pwd_flag'] : '',
            'other_pwd'         => isset($_POST['other_pwd']) ? $_POST['other_pwd'] : '',
            'status_flag'       => isset($_POST['status_flag']) ? $_POST['status_flag'] : '',
            'self_pwd_flag'     => isset($_POST['self_pwd_flag']) ? $_POST['self_pwd_flag'] : '',
        ];

        echo updateAddInfo($data);
    }
    else if ($action == 17) // Update PFP
    {
        $data = [
            'image'             => isset($_FILES['image']) ? $_FILES['image'] : '',
            'userId'            => isset($_POST['userId']) ? $_POST['userId'] : '',
        ];

        echo changePFP($data);
    }
    else if ($action == 18) // Update Application
    {
        $data = [
            'decision'          => isset($_POST['decision']) ? $_POST['decision'] : '',
            'applicantId'       => isset($_POST['applicantId']) ? $_POST['applicantId'] : '',
            'date'              => isset($_POST['date']) ? $_POST['date'] : '',
            'startTime'         => isset($_POST['startTime']) ? $_POST['startTime'] : '',
            'endTime'           => isset($_POST['endTime']) ? $_POST['endTime'] : '',
        ];

        echo set_applicant_status($data);
    }
    else if ($action == 19) // Delete Applicant
    {
        echo deleteUser(isset($_POST['id']) ? $_POST['id'] : '');
    }
}





