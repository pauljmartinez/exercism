<?php

/**
 * Determine if a string is a panagram
 * @param string $str
 * @return boolean
 */
function isPangram($str)
{
    $str = mb_strtolower($str);
    $str = str_split($str);
    // Filter out just the alpha characters
    $str = preg_grep('/[a-z]/', $str);
    $str = array_unique($str);
    sort($str);
    $str = trim(implode('', (array)$str));
    return $str == "abcdefghijklmnopqrstuvwxyz";
}
