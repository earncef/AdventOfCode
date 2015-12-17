<?php
$inputs = file('input', FILE_IGNORE_NEW_LINES);
sort($inputs);

function process(&$inputs, $length, $total, &$count, &$ways, $i = 0, $number = 0) {
    if ($total == 0) return $count++ && $ways[$number] = isset($ways[$number]) ? $ways[$number] + 1 : 1;
    if ($i >= $length || $total < 0) return;
    process($inputs, $length, $total - $inputs[$i], $count, $ways, $i + 1, $number + 1);
    process($inputs, $length, $total, $count, $ways, $i + 1, $number);
}

process($inputs, count($inputs), 150, $count, $ways, 0);
ksort($ways);
echo $count, ' ', current($ways);
