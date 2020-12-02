<?php
$input = file_get_contents('input');
function compute($seq) {
    for ($i = $c = 0, $result = '', $n = $seq[0],$length = strlen($seq); $i < $length; $i++) {
        if ($n == $seq[$i]) $c++;
        else {
            $result .= $c . $seq[$i-1];
            $c = 1;
            $n = $seq[$i];
        }
    }
    return $result . $c . $seq[$i-1];
}

function lengthCompute($value, $n) {
    for ($i = 0; $i < $n; $i++) $value = compute($value);
    return strlen($value);
}

echo lengthCompute($input, 40), ' ', lengthCompute($input, 50);