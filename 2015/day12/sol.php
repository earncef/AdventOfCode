<?php
$input = file_get_contents('input');
echo getSum($input), ' ', getSum(json_encode(process(json_decode($input))));

function getSum($json) {
    preg_match_all('/-?\d+/', $json, $matches);
    return array_sum($matches[0]);
}

function process($input) {
    foreach ($input as &$item) {
        if (is_object($input) && is_string($item) && $item == "red") return null;
        if(is_object($item) || is_array($item)) $item = process($item, is_object($item));
    }
    return $input;
}

