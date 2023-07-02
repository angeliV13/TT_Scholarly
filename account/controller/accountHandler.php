<?php

require("../model/accountHandlerModel.php");

if (isset($_POST['action'])) 
{
    $action = $_POST['action'];

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
            'email'             => isset($_POST['email']) ? $_POST['email'] : '',
            'password'          => isset($_POST['password']) ? $_POST['password'] : '',
        ];

        $result = registerAccount($data);

        if ($result == 'Success') 
        {
            echo 'Success';
        } 
        else 
        {
            echo 'Error RC001: ' . $result;
        }
    }
}
