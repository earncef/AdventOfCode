<?php
$input = str_replace('lose ', '-', file_get_contents('input'));
preg_match_all('/([A-Za-z]+) [^\-\d]*?(-?\d+).*? ([A-Za-z]+)\./', $input, $matches);
$people = array_unique($matches[1]);
foreach ($matches[0] as $i => $match) $happiness[$matches[1][$i]][$matches[3][$i]] = $matches[2][$i];
foreach($people as $p) foreach($people as $n) 
	if ($p != $n) $rHappiness[$p][$n] = $happiness[$p][$n] + $happiness[$n][$p];

seatings($rHappiness, $people, $seatings, $seatingsInclMe);
function seatings(&$rHappiness, &$people, &$seatings, &$seatingsInclMe, $seating = '') {
    foreach($people as $p) {
        $newSeating = "$seating:$p";
        $parts = explode(':', $newSeating);
        if (count($parts) < 2) continue;
        $newPeople = array_diff($people, $parts);
        if (count($newPeople)) seatings($rHappiness, $newPeople, $seatings, $seatingsInclMe, $newSeating);
        else {
			for ($i = 1, $len = 0, $pc = count($parts) - 1; $i < $pc; $i++) $len += $rHappiness[$parts[$i]][$parts[$i+1]];
        	$seatings[$newSeating] = $len;
            $seatingsInclMe[$newSeating] = $len + $rHappiness[$parts[1]][$parts[$pc]];
        }
    }
}

echo max($seatings), ' ', max($seatingsInclMe);