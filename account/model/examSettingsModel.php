<?php


// ---------------------------------------------------
function getExamTotalItems()
{
    include("dbconnection.php");

    $data = [];

    $sql = "SELECT total_item FROM  exam_total_items ORDER BY id ASC";
    $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

    while ($row = $query->fetch_assoc()) {
        extract($row);
        $data[] = $total_item;
    }

    return $data;
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

function addExamItems($category, $examAddQuestion, $examAddChoices, $examAddAnswer)
{

    include("dbconnection.php");
    $examChoices = "";

    $examAddChoices = array_filter($examAddChoices);
    foreach ($examAddChoices as $choices) {
        $examChoices .= $choices . "<br>";
    }

    $sql = "INSERT INTO `examination`(`id`, `category`, `question`, `choices`, `answer`) 
                VALUES (0, '{$category}', '{$examAddQuestion}', '{$examChoices}', '{$examAddAnswer}')";

    $query = $conn->query($sql) or die("Error ESQ005: " . $conn->error);

    return "Success";
}

function startExam()
{
    include("dbconnection.php");
    $questions  = [];
    $examItems  = [];

    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    $examItems  = getExamTotalItems();
    $questions  = json_encode(getRandomQuestions($examItems));
    $examTotal  = array_sum($examItems);

    $sql = "SELECT * FROM `examination_applicant` WHERE ay_id = '{$ay}' AND sem_id = '{$sem}'";
    $query = $conn->query($sql) or die("Error ESQ006: " . $conn->error);

    if ($query->num_rows == 0) {
        $sql = "INSERT INTO `examination_applicant`(`id`, `ay_id`, `sem_id`, `start_exam`, `questions`, `answers`, `points`, `total`, `percentage`) 
                    VALUES ( 0 , '{$ay}', '{$sem}', 1, '{$questions}', '', 0, {$examTotal}, 0)";
        $query = $conn->query($sql) or die("Error ESQ006: " . $conn->error);

        if ($query) {
            return "Success";
        } else {
            return "Error saving your data";
        }
    }
    return "You already took the examination";
}

function getRandomQuestions($examItems)
{
    include("dbconnection.php");
    $category = 0;  #(English, Math, Gen Info, Abstract)

    $data = [];

    foreach ($examItems as $totalItems) {
        $category++;

        $sql = "SELECT id FROM `examination` WHERE category = '{$category}' ORDER BY RAND() LIMIT {$totalItems}";
        $query = $conn->query($sql) or die("Error ESQ007: " . $conn->error);

        if($query->num_rows > 0){
            $data[] = $query->fetch_all();
        }
        
    }
    return $data;
}
