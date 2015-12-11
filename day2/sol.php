<?php
$input = explode("\n", trim(file_get_contents('input')));
$count = count($input);
for ($length = $area = $i = 0; $i < $count && $dim = explode('x', $input[$i]); $i++) {
    sort($dim);
    $area += ($dim[0] * $dim[1] + $dim[1] * $dim[2] + $dim[0] * $dim[2]) * 2 + $dim[0] * $dim[1];
    $length += ($dim[0] + $dim[1]) * 2 + ($dim[0] * $dim[1] * $dim[2]);
}
echo "{$area} {$length}";
