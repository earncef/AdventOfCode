<?php
$input = file_get_contents('input');
preg_match_all('/([A-Za-z]+) [^\d]*?(\d+)[^\d]*?(\d+)[^\d]*?(\d+)/', $input, $matches);

function nthSecondPos($speeds, $times, $breaks, $n) {
    foreach ($speeds as $j => $speed) {
        for ($i = 0, $k = $n, $pos[$j] = 0; $k > 0; $i++) {
            if ($i % 2 == 0) {
                $pos[$j] += ($k > $times[$j]) ? $speeds[$j] * $times[$j]: $speeds[$j] * $k;
                $k -= $times[$j];
            } else $k -= $breaks[$j];
        }
    }
    return $pos;
}

$pos = nthSecondPos($matches[2], $matches[3], $matches[4], 2503);
for ($i = 1, $points = []; $i <= 2503; $i++) {
    $tPos = nthSecondPos($matches[2], $matches[3], $matches[4], $i);
    $keys = array_keys($tPos, max($tPos));
    foreach ($keys as $k) $points[$k] = isset($points[$k]) ? $points[$k] + 1 : 1;
}

echo max($pos), ' ', max($points);