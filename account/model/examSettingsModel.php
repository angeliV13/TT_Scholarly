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
    session_start();

    $questions  = [];
    $examItems  = [];

    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    $userId     = $_SESSION['id'];
    $examItems  = getExamTotalItems();
    $questions  = json_encode(getRandomQuestions($examItems));
    $examTotal  = array_sum($examItems);
    $examExists = checkExamExist($ay, $sem, $userId);

    if ($examExists->num_rows == 0) {
        $sql = "INSERT INTO `examination_applicant`(`id`, `user_id`, `ay_id`, `sem_id`, `start_exam`, `questions`, `answers`, `points`, `total`, `percentage`) 
                    VALUES ( 0 , '{$userId}', '{$ay}', '{$sem}', 1, '{$questions}', '', 0, {$examTotal}, 0)";
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

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                extract($row);

                $data[] = [
                    $category,
                    $id,
                ];
            }
        }
    }
    return $data;
}

function checkExamExist($ay, $sem, $userId)
{
    include("dbconnection.php");

    $sql = "SELECT * FROM `examination_applicant` WHERE user_id = '{$userId}' AND ay_id = '{$ay}' AND sem_id = '{$sem}'";
    $query = $conn->query($sql) or die("Error ESQ008: " . $conn->error);

    return $query;
}

function getExam()
{
    include("dbconnection.php");
    session_start();

    $questionsArray  = [];

    $ay         = getDefaultAcadYearId();
    $sem        = getDefaultSemesterId();
    $userId     = $_SESSION['id'];
    $examExists = checkExamExist($ay, $sem, $userId);

    if ($examExists->num_rows > 0) {
        while ($row = $examExists->fetch_assoc()) {
            extract($row);
        }
        $questionArray =  getQuestions(json_decode($questions));
        return examCreateDiv($questionArray);
    } else {
        return 'Access Unauthorized';
    }
}

function getQuestions($questionArray = [])
{
    include("dbconnection.php");

    $data = [];
    $choicesArray = [];

    foreach ($questionArray as $questionCategory) {
        $sql = "SELECT question, choices FROM `examination` WHERE id = '{$questionCategory[1]}'";
        $query = $conn->query($sql) or die("Error ESQ009: " . $conn->error);

        while ($row = $query->fetch_assoc()) {
            extract($row);
            $choicesArray = explode("<br>", $choices);
            array_pop($choicesArray); //Removes the last array element which is blank

            $data[] = [
                $questionCategory[0],
                $questionCategory[1],
                $question,
                $choicesArray,
            ];
        }
        
    }
    return ($data);
}

function examCreateDiv($questionArray){
    
    $allItem    = count($questionArray);

    $counter    = 1;
    $item       = "";
    $header     = "";
    $categoryTmp= "";
    $data       = [];
    $categories = ['N/A', 'English', 'Mathematics', 'General Information', 'Abstract Reasoning'];

    foreach($questionArray as $questionItem){
        $radBtn = "";
        foreach($questionItem[3] as $choices){
            $radBtn .= '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="choice_'.$counter.'" id="choice_'.$counter.'_'.$choices.'" value="'.$choices.'">
                    <label class="form-check-label" for="choice_'.$counter.'_'.$choices.'">
                        '.$choices.'
                    </label>
                </div>
            ';
        }
        if($counter == 1){
            $btn = '
                <!-- Next -->
                <div class="py-3">
                    <button class="btn btn-primary px-4">Next</button>
                </div>
            ';

            $item = '<div id="question_'.$counter.'" class="align-items-center">';
            
            $header = '
                <div id="question_'.$counter.'" class="align-items-center text-center bg-dark">
                    <h5 class="card-title text-light ">'.$categories[$questionItem[0]].'</h5>
                </div>
            ';

            $categoryTmp = $categories[$questionItem[0]];
        }else{
            if($counter == $allItem){
                $btn = '
                <!-- Next Previous-->
                <div class="py-3">
                    <button class="btn btn-warning px-3">Previous</button>
                    <button class="btn btn-primary px-4">Submit</button>
                </div>
                ';
            }else{
                $btn = '
                <!-- Next Previous-->
                <div class="py-3">
                    <button class="btn btn-warning px-3">Previous</button>
                    <button class="btn btn-primary px-4">Next</button>
                </div>
                ';
                
            }

            if($categoryTmp != $categories[$questionItem[0]]){
                $header = '
                    <div id="question_'.$counter.'" class="align-items-center text-center bg-dark">
                        <h5 class="card-title text-light ">'.$categories[$questionItem[0]].'</h5>
                    </div>
                ';
                $categoryTmp = $categories[$questionItem[0]];
            }else{
                $header = "";
            }
            
            $item = '<div id="question_'.$counter.'" class="align-items-center">';
        }

        $item .= '
            <!-- <div id="question_'.$counter.'" class="align-items-center text-center bg-dark"> -->
                '.$header.'
                <div class="container">
                    <div id="question_main_'.$counter.'">
                        <div id="question_title_'.$counter.'" class="pt-4">
                        <h5 class="fw-bold"><span class="me-2">('.$counter.')</span>
                            '.$questionItem[2].'
                        </h5>
                        </div>
                        <div id="choices_'.$counter.'" class="ms-5 pb-4">
                        '.$radBtn.'
                        </div>
                        '."" #$btn
                        .'
                    </div>
                </div>
            </div>
            </div>
        ';

        $data[] = [
            $item,
        ];

        $counter++;
    }

    return json_encode($data);
}
