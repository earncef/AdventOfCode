<?php
$input = file_get_contents('input');
$compute = create_function('', 'return ' . str_replace("\n",'.',$input) . ';');
$total = strlen(str_replace("\n", '', $input)) - strlen($compute());
$total2 = strlen(str_replace("\n", '""', addslashes($input))) + 2 - strlen(str_replace("\n", '', $input));
echo "$total $total2";
