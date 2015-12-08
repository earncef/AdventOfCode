<?php
$input = str_replace("\n", '', file_get_contents('input'), $count);
$total = strlen($input) - strlen(stripcslashes($input)) + ($count + 1)  * 2;
$total2 = strlen(addcslashes($input, "\"\\")) + ($count + 1)  * 2 - strlen($input);
echo "$total $total2";
