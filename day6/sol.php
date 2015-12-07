<?php
$input = explode("\n", str_replace(' o', 'o', trim(file_get_contents('input'))));
ini_set('memory_limit', '300M');
$lights = $lights2 = array_fill(0, 1000, array_fill(0, 1000, 0));

foreach ($input as $instruction) {
    $split = explode(' ', $instruction);
    $start = explode(',', $split[1]);
    $end = explode(',', $split[3]);
    for ($i = $start[0]; $i <= $end[0]; $i++) {
        for ($j = $start[1]; $j <= $end[1]; $j++) {
            if ($split[0] == 'toggle') {
                $lights[$i][$j] = ($lights[$i][$j] == 0) ? 1 : 0;
                $lights2[$i][$j] += 2;
            } else if ($split[0] == 'turnon') {
                $lights[$i][$j] = 1;
                $lights2[$i][$j] += 1;
            } else {
                $lights[$i][$j] = 0;
                $lights2[$i][$j] -= ($lights2[$i][$j] > 0) ? 1 : 0;
            }
        }		
    }
}

$totalLights = $totalBrightness = 0;
for ($i = 0; $i < 1000; $i++) {
    $counts = array_count_values($lights[$i]);
    $totalLights += isset($counts[1])? $counts[1] : 0;
    $totalBrightness += array_sum($lights2[$i]);
}

echo "$totalLights $totalBrightness";