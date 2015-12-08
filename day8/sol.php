<?php
$input = file_get_contents('input');
$rawLength = strlen(str_replace("\n", '', $input));
$compute = create_function('', 'return ' . str_replace("\n",'.',$input) . ';');
$total = $rawLength - strlen($compute());
$total2 = strlen(str_replace("\n", '""', addslashes($input))) + 2 - $rawLength;
echo "$total $total2";
