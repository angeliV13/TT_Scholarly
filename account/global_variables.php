<?php

$religionArr = ['0' => 'Roman Catholic', '1' => 'Islam', '2' => 'Iglesia ni Cristo', '3' => 'Born Again', '4' => 'Others', '5' => 'Prefer Not to Say'];
$genderArr = ['0' => 'Male', '1' => 'Female', '2' => 'Nonbinary', '3' => 'Others', '4' => 'Prefer Not to Say'];
$civilArr = ['0' => 'Single', '1' => 'Married', '2' => 'Widowed', '3' => 'Separated', '4' => 'Prefer Not to Say'];
$educAttainment = ['0' => 'Elementary', '1' => 'Junior High School', '2' => 'Senior High School', '3' => 'College', '4' => 'Vocational', '5' => 'Post Graduate'];
$incomeArr = ['0' => 'Less than 5000', '1' => '5001 - 10999', '2' => '11000 - 20999', '3' => 'Greater than 21000'];
$relationshipArr = [];

if (isset($_SESSION))
{
    $strand = get_education_courses(1);
    $course = get_education_courses(0);
}

$college = [];
$seniorHigh = [];
$juniorHigh = [];
$elementary = [];