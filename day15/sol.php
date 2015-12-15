<?php
$input = file_get_contents('input');
preg_match_all('/.* (-?\d+).* (-?\d+).* (-?\d+).* (-?\d+).* (-?\d+).*/', $input, $matches, PREG_SET_ORDER);

function r($base, $i, $inc) {
    return (($res = $base + $i * $inc) > 0) ? $res : 0;
}

function process($matches, $n, &$results = [], $calTot = null, $cap = 0, $dur = 0, $fla = 0, $tex = 0, $cal = 0) {
    if ($n < 1) return;
    $a = array_pop($matches);
    if (!count($matches)) 
        if (null == $calTot || $calTot == $cal + $n * $a[5])
            return $results[] = r($cap,$a[1],$n) * r($dur,$a[2],$n) * r($fla,$a[3],$n) * r($tex,$a[4],$n);
        else return;
    for ($i = 1; $i <= $n; $i++) 
        process($matches, $n-$i, $results, $calTot, $cap+$i*$a[1], $dur+$i*$a[2], $fla+$i*$a[3], $tex+$i*$a[4], $cal+$i*$a[5]);
}

process($matches, 100, $results);
process($matches, 100, $results2, 500);
echo max($results), ' ', max($results2);