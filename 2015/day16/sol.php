<?php
$input = file_get_contents('input');
preg_match_all('/.* (\d+).* (.+): (\d+).* (.+): (\d+).* (.+): (\d+).*/', $input, $matches, PREG_SET_ORDER);
$known = ['children' => 3, 'cats' => 7, 'samoyeds' => 2, 'pomeranians' => 3, 'akitas' => 0, 'vizslas' => 0, 'goldfish' => 5, 'trees' => 3, 'cars' => 2, 'perfumes' => 1];

function isMatched($aunts, $known, $retro = false) {
    foreach ($aunts as $key => $value) {
        if ($retro) {
            if (in_array($key, ['cats', 'trees']) && $known[$key] >= $value) return false;
            elseif (in_array($key, ['pomeranians', 'goldfish']) && $known[$key] <= $value) return false;
            elseif(!in_array($key, ['cats', 'trees', 'pomeranians', 'goldfish']) && $value != $known[$key]) return false;
       } elseif($value != $known[$key]) return false;
    }
    return true;
}

foreach($matches as $aunt)
    if (isMatched([$aunt[2] => $aunt[3], $aunt[4] => $aunt[5], $aunt[6] => $aunt[7]], $known)) $aunt1 = $aunt[1];
    elseif (isMatched([$aunt[2] => $aunt[3], $aunt[4] => $aunt[5], $aunt[6] => $aunt[7]], $known, true)) $aunt2 = $aunt[1];
echo "$aunt1 $aunt2";