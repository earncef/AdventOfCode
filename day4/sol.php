<?php
$input = file_get_contents('input');
function process($input, $prefix) {
    for ($i = 1, $md5 = '', $l = strlen($prefix); substr($md5, 0, $l) !== $prefix; $i++)
        $md5 = md5($input . $i);
    return --$i;
}
echo process($input, '00000'), ' ', process($input, '000000');