<?php
$inputs2 = $inputs = str_replace(['.', '#', "\n"], [0, 1, ''], file_get_contents('input'));
$inputs2[0] = $inputs2[99] = $inputs2[9900] = $inputs2[9999] = 1;

function process($inputs, $grid, $corners = false) {
    for($i = 0, $result = ''; $i < $grid; $i++) for ($j = 0; $j < $grid; $j++) {
        for ($k = $i - 1, $sum = 0; $k < $i + 2; $k++) for ($l = $j - 1; $l < $j + 2; $l++) 
            if ( ! (($k == $i && $l == $j) || $k < 0 || $l < 0 || $k >= $grid || $l >= $grid)) $sum += $inputs[$l + $k * $grid];
        if ($inputs[$j + $i * $grid]) $result .= ($sum == 2 || $sum == 3) ? 1: 0;
        else $result .= ($sum == 3) ? 1 : 0;
    }
    if ($corners) $result[0] = $result[$grid-1] = $result[strlen($inputs)-$grid] = $result[strlen($inputs)-1] = 1;
    return $result;
}

for ($i = 0; $i < 100; $i++) $inputs = process($inputs, 100);
for ($i = 0; $i < 100; $i++) $inputs2 = process($inputs2, 100, true);
echo substr_count($inputs, '1'), ' ', substr_count($inputs2, '1');