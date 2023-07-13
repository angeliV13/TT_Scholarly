<?php

function getAcadYearTable()
{
    include("dbconnection.php");

    $totalData = 0;
    $data = [];
    $counter = 1;

    $sql = "SELECT * FROM acad_year ORDER BY id DESC LIMIT 5";
    $query = $conn->query($sql) or die("Error BQ001: " . $conn->error);

    if ($query->num_rows <>  0) {
        while ($row = $query->fetch_assoc())
        {
            extract($row);

            $data[] = [
                $counter,
                $ay,
                $modified_by . '<br><span class="small">' . $modified_date . '</span>',
                '<div class="btn-group d-flex align-content-center">
                    <a href="#" class="col-6 btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ay_default_modal">Make Default</a>
                    <a href="#" class="col-6 btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ay_delete_modal">Delete</a>
                </div>',
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

    $query = $conn->query($sql) or die("Error BQ002: " . $conn->error);

    if ($query->num_rows == 0) {
        $sql = "INSERT INTO acad_year (`id`, `ay`, `from_ay`, `to_ay`, `modified_by`, `modified_date`) VALUES ('0', '" . $ay . "', '" . $from_ay . "', '" . $to_ay . "', '" . $_SESSION['id'] . "', '" . date('Y-m-d H:i:s') . "')";

        $query = $conn->query($sql) or die("Error BQ002: " . $conn->error);

        return 'Insert Success';
    } else {
        return 'Academic Year already exists';
    }
}
