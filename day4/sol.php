<?php
$input = file_get_contents('input');
for ($i = 1, $md5 = ''; substr($md5, 0, 5) !== '00000'; $i++)
    $md5 = md5($input . $i);
for ($j = 1, $md5 = ''; substr($md5, 0, 6) !== '000000'; $j++)
    $md5 = md5($input . $j);
echo $i-1, ' ', $j-1;