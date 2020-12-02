<?php
$input = file_get_contents('input');
echo findHouse($input), ' ', findHouse($input, 50);

function findHouse($required, $maxHouses = null) {
    for ($presents = $house = 0; $presents < $required; $house++)
        $presents = numPresents($house, $maxHouses);
    return --$house;
}

function numPresents($house, $maxHouses = null) {
    for ($i = 2, $ret = 1, $c = sqrt($house); $i <= $c && ! ($maxHouses !== null && --$maxHouses < 1); $i++)
        if ($house % $i == 0) if (($ret += $i) && $i != $house / $i) $ret += $house / $i;                    
    return ($maxHouses !== null) ? ($ret + $house) * 11 : ($ret + $house) * 10;
}


