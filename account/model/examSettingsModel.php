<?php


// ---------------------------------------------------
function getExamTotalItems($examItemId = 0)
{
    include("dbconnection.php");

    $data = [];

    if ($examItemId == 0) {
        $sql = "SELECT total_item FROM  exam_total_items ORDER BY id ASC";
        $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

        while ($row = $query->fetch_assoc()) {
            extract($row);
            $data[] = $total_item;
        }

        return $data;
    } else {
        $sql = "SELECT total_item FROM  exam_total_items WHERE id = '{$examItemId}'";
        $query = $conn->query($sql) or die("Error ESQ000: " . $conn->error);

        while ($row = $query->fetch_assoc()) {
            extract($row);
        }
        return $total_item;
    }
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

//Adding Examination Question
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

//Changing Examination Question
function editExamItems($id, $category, $examAddQuestion, $examAddChoices, $examAddAnswer)
{

    include("dbconnection.php");
    $examChoices = "";

    $examAddChoices = array_filter($examAddChoices);
    foreach ($examAddChoices as $choices) {
        $examChoices .= $choices . "<br>";
    }

    $sql = "UPDATE `examination` 
            SET `category`  = '{$category}',
                `question`  = '{$examAddQuestion}',
                `choices`   = '{$examChoices}',
                `answer`    = '{$examAddAnswer}'
            WHERE id = '{$id}'";

    $query = $conn->query($sql) or die("Error ESQ005: " . $conn->error);

    return "Success";
}

//Deleting Examination Question
function deleteExamItems($id)
{

    include("dbconnection.php");
    
    $sql = "DELETE FROM `examination` WHERE id = '{$id}'";

    $query = $conn->query($sql) or die("Error ESQ005: " . $conn->error);

    return "Success";
}

// Inserting the Examination
function startExam($userId, $lastId)
{
    include("dbconnection.php");
    // session_start();

    $answers        = "";
    $questions      = [];
    $answersArray   = [];
    $examItems      = [];

    $ay             = getDefaultAcadYearId();
    $sem            = getDefaultSemesterId();
    // $userId         = $_SESSION['id'];
    $examItems      = getExamTotalItems();
    $questions      = json_encode(getRandomQuestions($examItems));
    $answersArray   = json_decode($questions);
    $examTotal      = array_sum($examItems);
    $examExists     = checkExamExist($ay, $sem, $userId);

    foreach ($answersArray as $key => $answerItem) {
        $answersArray[$key][1] = "";
    }

    $answers        = json_encode($answersArray);

    if ($examExists->num_rows == 0) {
        $sql = "INSERT INTO `examination_applicant`(`id`, `user_id`, `ay_id`, `sem_id`, `exam_id`, `start_exam`, `questions`, `answers`, `points`, `total`, `percentage`) 
                    VALUES ( 0 , '{$userId}', '{$ay}', '{$sem}', '{$lastId}', 1, '{$questions}', '{$answers}', 0, {$examTotal}, 0)";
        $query = $conn->query($sql) or die("Error ESQ006: " . $conn->error);

        if ($query) {
            return "Success";
        } else {
            return "Error saving your data";
        }
    }
    return "You already took the examination";
}

// Getting Random Questions according to the category 
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

// Checks if Exam already Exists
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

    // If exam is found, get the items
    if ($examExists->num_rows > 0) {
        while ($row = $examExists->fetch_assoc()) {
            extract($row);
        }
        if($start_exam == 2){
            return 'You already took the examination';
        }
        $questionArray =  getQuestions(json_decode($questions), json_decode($answers));
        return examCreateDiv($questionArray);
    } else {
        return 'Access Unauthorized';
    }
}

function getQuestions($questionArray = [], $answersArray = [])
{
    include("dbconnection.php");

    $data = [];
    $choicesArray = [];

    foreach ($questionArray as $key => $questionCategory) {
        $sql = "SELECT question, choices FROM `examination` WHERE id = '{$questionCategory[1]}'";
        $query = $conn->query($sql) or die("Error ESQ009: " . $conn->error);

        while ($row = $query->fetch_assoc()) {
            extract($row);
            $choicesArray = explode("<br>", $choices);
            array_pop($choicesArray);   //Removes the last array element which is blank
            shuffle($choicesArray);     //Shuffles Items in Choices

            $data[] = [
                $questionCategory[0],   //Exam Category
                $questionCategory[1],   //Question Id
                $question,              //Question String
                $choicesArray,          //Choices String
                $answersArray[$key][1], //Answer
            ];
        }
    }

    return ($data);
}

function examCreateDiv($questionArray)
{

    $allItem    = count($questionArray);

    $counter    = 1;    // Overall Counter
    $btnPrv     = 0;    // Flag for Previous Button
    $item       = "";
    $header     = "";
    $categoryTmp = "";
    $totalItems = 0;    // Total Items per Header
    $itemCtr    = 1;    // Item per Header
    $data       = [];
    $categories = ['N/A', 'English', 'Mathematics', 'General Information', 'Abstract Reasoning'];

    foreach ($questionArray as $questionItem) {
        $radBtn     = "";
        $totalItems  = getExamTotalItems($questionItem[0]);
        foreach ($questionItem[3] as $choice_key => $choices) {
            if ($questionItem[4] == $choices) {
                $radBtn .= '
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="choice_' . $counter . '" id="choice_' . $counter . '_' . $choice_key . '" value="' . $choices . '" checked>
                        <label class="form-check-label" for="choice_' . $counter . '_' . $choice_key . '">
                            ' . $choices . '
                        </label>
                    </div>
                ';
            } else {
                $radBtn .= '
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="choice_' . $counter . '" id="choice_' . $counter . '_' . $choice_key . '" value="' . $choices . '">
                        <label class="form-check-label" for="choice_' . $counter . '_' . $choice_key . '">
                            ' . $choices . '
                        </label>
                    </div>
                ';
            }
        }
        
        // First Question
        if ($counter == 1) {

            // $item = '<div id="question_' . $counter . '" class="align-items-center">';

            // Header for the First Time
            $header = '
                <div id="question_' . $counter . '" class="align-items-center text-center bg-dark">
                    <h5 class="card-title text-light ">' . $categories[$questionItem[0]] . '</h5>
                    <input type="number" class="d-none" id="totalItem_' . $questionItem[0] . '" name="totalItems" value="' . $totalItems . '" readonly>
                </div>
            ';

            $categoryTmp = $categories[$questionItem[0]];

        // Following Questions
        } else {                    
            if ($counter == $allItem) {
                $btn = '
                <!-- Next Submit-->
                <div class="py-3">
                    <button class="btn btn-warning px-3">Previous</button>
                    <button class="btn btn-primary px-4">Submit</button>
                </div>
                ';
            } else {
                $btn = '
                <!-- Next Previous-->
                <div class="py-3">
                    <button class="btn btn-warning px-3">Previous</button>
                    <button class="btn btn-primary px-4">Next</button>
                </div>
                ';
            }

            // Header
            if ($categoryTmp != $categories[$questionItem[0]]) {
                $header = '
                    <div id="question_' . $counter . '" class="align-items-center text-center bg-dark">
                        <h5 class="card-title text-light ">' . $categories[$questionItem[0]] . '</h5>
                        <input type="number" class="d-none" id="totalItem_' . $questionItem[0] . '" name="totalItems" value="' . $totalItems . '" readonly>
                    </div>
                ';
                $categoryTmp = $categories[$questionItem[0]];
            } else {
                $header = "";
            }

            // $item = '<div id="question_' . $counter . '" class="align-items-center">';
        }

        // Exam Grouping
        $item = '<div id="question_' . $counter . '" class="align-items-center question_group_'. $questionItem[0] .' '. (($btnPrv == 1) ? 'd-none' : '' ).'">';

        // Buttons
        if($itemCtr == $totalItems){
            if($btnPrv == 1){
                if($counter == $allItem){
                    $btn = '
                        <!-- Previous Next-->
                        <div class="py-3">
                            <button class="btn btn-warning px-3" onclick="btnAction(1, '. $questionItem[0] .')">Previous</button>
                            <button id="submitExam" class="btn btn-success" onclick="btnAction(3, '. $questionItem[0] .')" type="button" >Submit Examination</button>
                        </div>
                    ';
                }else{
                    $btn = '
                        <!-- Next Previous-->
                        <div class="py-3">
                            <button class="btn btn-warning px-3" onclick="btnAction(1, '. $questionItem[0] .')">Previous</button>
                            <button class="btn btn-primary px-4" onclick="btnAction(2, '. $questionItem[0] .')">Next</button>
                        </div>
                    ';
                }
            }else{
                if($counter == $allItem){
                    $btn = '
                        <!-- Next Submit-->
                        <div class="py-3">
                            <button id="submitExam" class="btn btn-success" onclick="btnAction(3, '. $questionItem[0] .')" type="button" >Submit Examination</button>
                        </div>
                    ';
                }else{
                    $btn = '
                        <!-- Next -->
                        <div class="py-3">
                            <button class="btn btn-primary px-4" onclick="btnAction(2, '. $questionItem[0] .')">Next</button>
                        </div>
                    ';
                }
            }
            
            $btnPrv = 1;
            $itemCtr = 1;
        }else{
            $btn = '';
            $itemCtr += 1;
        }

        $item .= '
            <!-- <div id="question_' . $counter . '" class="align-items-center text-center bg-dark"> -->
                ' . $header . '
                <div class="container">
                    <div id="question_main_' . $counter . '">
                        <div id="question_title_' . $counter . '" class="pt-4">
                        <h5 class="fw-bold"><span class="me-2">(' . $counter . ')</span>
                            ' . $questionItem[2] . '
                        </h5>
                        </div>
                        <div id="choices_' . $counter . '" class="ms-5 pb-4">
                        ' . $radBtn . '
                        </div>
                         ' . $btn . '
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

function saveExam($questionArrayValue, $questionAnswer)
{
    include("dbconnection.php");
    session_start();

    $ay             = getDefaultAcadYearId();
    $sem            = getDefaultSemesterId();
    $userId         = $_SESSION['id'];

    $answers         = "";
    $answersArray   = [];

    $examExists = checkExamExist($ay, $sem, $userId);

    // If exam is found, get the items
    if ($examExists->num_rows > 0) {
        while ($row = $examExists->fetch_assoc()) {
            extract($row);
        }
        $answersArray =  json_decode($answers);

        $answersArray[$questionArrayValue][1] = $questionAnswer;
        $answers         = json_encode($answersArray);

        $sql = "UPDATE `examination_applicant` SET `answers`= '{$answers}' WHERE `user_id`   = '{$userId}'
                                                                            AND  `ay_id`     = '{$ay}'
                                                                            AND  `sem_id`    = '{$sem}'";
        $query = $conn->query($sql) or die("Error ESQ010: " . $conn->error);

        return 'Success';
    } else {
        return 'No Exam Found';
    }
}

function submitExam()
{
    include("dbconnection.php");
    session_start();

    $ay             = getDefaultAcadYearId();
    $sem            = getDefaultSemesterId();
    $userId         = $_SESSION['id'];

    $examFinalScore = examFinalScore($ay, $sem, $userId);
    $examAverage    = examFinalScore($ay, $sem, $userId, $examFinalScore);

    $sql = "UPDATE `examination_applicant`  SET     `start_exam`= '2',
                                                    `points`    = '{$examFinalScore}',
                                                    `percentage`= '{$examAverage}' 
                                            WHERE   `user_id`   = '{$userId}'
                                            AND     `ay_id`     = '{$ay}'
                                            AND     `sem_id`    = '{$sem}'";
    $query = $conn->query($sql) or die("Error ESQ011: " . $conn->error);

    if ($query) {
        return 'Success';
    }
}

function examFinalScore($ay, $sem, $userId, $correctItems = 0)
{
    include("dbconnection.php");

    $questionsArray = [];
    $answersArray   = [];
    $correctAverage = 0;

    $examExists = checkExamExist($ay, $sem, $userId);

    // If exam is found, get the items
    if ($examExists->num_rows > 0) {
        while ($row = $examExists->fetch_assoc()) {
            extract($row);
        }
        if ($correctItems == 0) {
            $questionsArray = json_decode($questions);
            $answersArray   = json_decode($answers);

            $totalItems     = count($questionsArray);
            foreach ($questionsArray as $key => $questions) {
                if (getCorrectAnswer($questions[1]) == $answersArray[$key][1]) {
                    $correctAverage++;
                }
            }
        } else{
            $correctAverage = $correctItems / $total * 100;
        }
    }
    return $correctAverage;
}

function getCorrectAnswer($questionId)
{
    include("dbconnection.php");

    $sql = "SELECT answer FROM `examination` WHERE id = '{$questionId}'";
    $query = $conn->query($sql) or die("Error ESQ0012: " . $conn->error);

    while ($row = $query->fetch_assoc()) {
        extract($row);
    }
    return $answer;
}

function setExamDate(){
    include("dbconnection.php");
    session_start();
    date_default_timezone_set('Asia/Manila');

    $ay             = getDefaultAcadYearId();
    $sem            = getDefaultSemesterId();
    $userId         = $_SESSION['id'];
    $dateNow        = date('Y-m-d H:i:s');

    $sql = "UPDATE `examination_applicant`  SET     `exam_start_date`= '{$dateNow}'
                                            WHERE   `user_id`   = '{$userId}'
                                            AND     `ay_id`     = '{$ay}'
                                            AND     `sem_id`    = '{$sem}'";
    $query = $conn->query($sql) or die("Error ESQ011: " . $conn->error);

    if ($query) {
        return 'Success';
    }
}