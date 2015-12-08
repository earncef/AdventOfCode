<?php
$input = explode("\n", file_get_contents('input'));
$total = $total2 = 0;
foreach($input as $line) {
    $compute = create_function('', 'return ' . $line . ';');
    $new = '"' . addslashes($line) . '"';
    $total += strlen($line) - strlen($compute());
    $total2 += strlen($new) - strlen($line);
}
echo "$total $total2";