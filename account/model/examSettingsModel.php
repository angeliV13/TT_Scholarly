<?php
// ---------------------------------------------------
function getExamTotalItems()
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT total_item FROM  exam_total_items ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_assoc())
    {
        extract($row);
        $data[] = $total_item;
    }

    return json_encode($data);
}
// ---------------------------------------------------
function changeExamTotalItems($english, $math, $genInfo, $abstract)
{
    include("dbconnection.php");

    $sql = "UPDATE exam_total_items SET total_item = '{$english}' WHERE id = 1";
    $query = $conn->query($sql) or die("Error ESQ001: " . $conn->error);

    $sql = "UPDATE exam_total_items SET total_item = '{$math}' WHERE id = 2";
    $query = $conn->query($sql) or die("Error ESQ002: " . $conn->error);

    $sql = "UPDATE exam_total_items SET total_item = '{$genInfo}' WHERE id = 3";
    $query = $conn->query($sql) or die("Error ESQ003: " . $conn->error);

    $sql = "UPDATE exam_total_items SET total_item = '{$abstract}' WHERE id = 4";
    $query = $conn->query($sql) or die("Error ESQ004: " . $conn->error);

    return "Change Success";
}
// ---------------------------------------------------
