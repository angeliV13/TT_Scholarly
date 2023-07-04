<?php

function generateRandomString($length = 5) // generates a random string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getDateTimeDiff($date1, $date2, $type = "minutes") // function that returns the difference between two dates
{
    $diff = abs(strtotime($date2) - strtotime($date1));

    switch($type)
    {
        case "hours":
            return floor($diff / (60 * 60));
        case "minutes":
            return floor($diff / 60);
        case "seconds":
            return $diff;
    }
}