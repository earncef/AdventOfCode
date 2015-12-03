<?php
$input = file_get_contents('input');
$compute = create_function('', 'return ' . str_replace(['(', ')'], ['+1', '-1'], $input) . ';');
for($position = 1; $input[0] != ')' && $p = strpos($input, '()') + 1; $position += 2)
    $input = substr_replace($input, '', $p - 1, 2);
echo "{$compute()} {$position}";
