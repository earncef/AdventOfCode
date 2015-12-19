<?php
$input = file_get_contents('input');
preg_match_all('/(.+) => (.+)/', $input, $replacements, PREG_SET_ORDER);
preg_match('/^[^\>]+$/m', $input, $text);
$med = trim(current($text));

foreach($replacements as $r) 
    for($len = strlen($r[1]), $pos = 0;($pos = strpos($med, $r[1], $pos)) !== false; $pos += $len)
        $result[substr_replace($med, $r[2], $pos, $len)] = 0;

function process($replacements, $med, $current, &$results, $step = 0) {
    foreach($replacements as $r)
        if (($pos = strpos($med, $r[2])) !== false && $cur = substr_replace($med, $r[1], $pos, strlen($r[2]))) {
            if ($cur == $current) return $results[$step + 1] = 0;
            if (strlen($cur) < 1) continue;
            return process($replacements, $cur, $current, $results, $step + 1);
        }
}

process($replacements, $med, 'e', $results);
echo count($result), ' ', min(array_keys($results));