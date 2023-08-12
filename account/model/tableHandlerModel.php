<?php

include("functionModel.php");

function accountListingTable($acc_type)
{
    include("dbconnection.php");

    $session_type = $acc_type;

    $sql = "SELECT * FROM account ORDER BY account_type ASC";
    $query = $conn->query($sql);

    $data = [];
    $totalData = $totalFiltered = 0;

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {

            $id = $row['id'];
            $user_name = $row['user_name'];
            $email = $row['email'];
            $account_type = $row['account_type'];
            $access_level = $row['access_level'];
            $account_status = ($row['account_status'] == 1) ? "Active" : "Inactive";

            $type = $level = $actions = "";
            $nestedData = [];

            if ($account_type == 0)
            {
                $type = "Super Admin";
            }
            else if ($account_type == 1)
            {
                $type = "Admin";
            }
            else if ($account_type == 2)
            {
                $type = "Beneficiaries";
            }
            else if ($account_type == 3)
            {
                $type = "Applicants";
            }

            if ($access_level == 0)
            {
                $level = "No Super Admin Access";
            }
            else if ($access_level == 1)
            {
                $level = "Super Admin w/ limited Access";
            }
            else if ($access_level == 2)
            {
                $level = "Super Admin w/ Full Access";
            }

            // For Super Admin

            if ($session_type == 0)
            {
                if ($account_type < 2)
                {
                    $actions = '<div class="row"> <!--style="height:100px;width:200px" > -->
                                    <button class="btn-sm btn btn-warning" data-toggle="modal">Edit Credentials</button>
                                    <button class="btn-sm btn btn-info" data-toggle="modal">Access Options</button>
                                </div>';
                }
            }
            else if ($session_type == 1)
            {
                if ($account_type == 0)
                {
                    $actions = '<span class="badge bg-secondary">You have no permission to edit this account</span>';
                }
                else if ($account_type == 1)
                {
                    $actions = '<button class="btn-sm btn btn-warning" data-toggle="modal">Edit Credentials</button>
                                <button class="btn-sm btn btn-info" data-toggle="modal">Access Options</button>';
                }
            }

            if ($account_type > 1)
            {
                    $actions = '<button class="btn-sm btn btn-warning" data-toggle="modal">View Profile</button>
                                <button class="btn-sm btn btn-info" data-toggle="modal">View Requirements</button>';

                    $actions .= '<span class="badge bg-danger w-75 mt-2">For Interview</span>';
            }

            $nestedData[] = static_count();
            $nestedData[] = $user_name;
            $nestedData[] = $email;
            $nestedData[] = $type;
            $nestedData[] = $level;
            $nestedData[] = $account_status;
            $nestedData[] = $actions;

            $data[] = $nestedData;

            $totalData++;
        }
    }
    else
    {
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

    if ($query->num_rows > 0)
    {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            switch($category){
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
    }
    else
    {
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

