<?php

function email_validation($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pattern_validation($pattern, $string)
{
    return preg_match($pattern, $string);
}

function empty_validation($string)
{
    return empty($string);
}