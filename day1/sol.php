<?php
$input = str_replace('(', '1', str_replace(')', '0', file_get_contents('input'), $count1), $count2);
for ($s = $p = 0; $s != -1;$p++) $s += $input[$p] ? 1: -1;
echo $count2-$count1, ' ', $p;
