<?php
$input = explode("\n", trim(file_get_contents('input')));

function isNice($string) {
    str_replace(['ab', 'cd', 'pq', 'xy'], '', $string, $badCount);
    if ($badCount) return false;
    str_replace(['a', 'e', 'i', 'o', 'u'], '', $string, $vowelCount);
    if ($vowelCount < 3) return false;
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++)
        if ($i < $length - 1  && $string[$i] == $string[$i + 1]) return true;
    return false;
}

function isNice2($string) {
    $pairs = [];
    $end = strlen($string) - 1;
    $repeatingLetter = $repeatingPair = false;
    for ($i = 0; $i < $end; $i++) {
        $pair = $string[$i] . $string[$i+1];
        if (isset($pairs[$pair])) $repeatingPair = true;
        else $pairs[$pair] = 1;
        if ($i < $end - 1 && $string[$i] == $string[$i + 2]) {
            $repeatingLetter = true;
            if ($string[$i] == $string[$i + 1]) $i++;
        } 
    }
    if ($repeatingLetter && $repeatingPair) return true;
    return false;
}

$niceCount = $niceCount2 = 0;
foreach ($input as $string) {
    if (isNice($string)) $niceCount++;
    if (isNice2($string)) $niceCount2++;
}

echo "$niceCount $niceCount2";
