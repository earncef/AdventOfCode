<?php
$input = file_get_contents('input');

function findHouse($required, $maxHouses = null) {
    $presents = $house = 0;
    while ($presents < $required) {
        $house++;
        $presents = numPresents($house, $maxHouses);
    }
    return $house;
}

function numPresents($house, $maxHouses = null) {
    for ($i = 2, $ret = 1, $c = sqrt($house); $i <= $c && ! ($maxHouses !== null && --$maxHouses < 1); $i++) {
        if ($house % $i == 0) if (($ret += $i) && $i != $house / $i) $ret += $house / $i;                    
    }
    if ($maxHouses !== null) return ($ret + $house) * 11;
    return ($ret + $house) * 10;
}


echo findHouse($input), ' ', findHouse($input, 50);