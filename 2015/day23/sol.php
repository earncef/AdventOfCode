<?php
$input = file('input');
echo process($input), ' ', process($input, 1);

function process($input, $a = 0) {
    for($i = 0, $c = count($input), $b = 0; $i < $c; $i++) {
        $instr = substr($input[$i], 0, 3);
        $split = explode(',', substr($input[$i], 4));
        $r = trim($split[0]);
        $val = isset($split[1]) ? trim($split[1]) : null;

        if ($instr == 'hlf') $$r /= 2;
        elseif ($instr == 'tpl') $$r *= 3;
        elseif ($instr == 'inc') $$r++;
        elseif ($instr == 'jmp') $i += $r - 1;
        elseif ($instr == 'jie' && $$r % 2 == 0) $i += $val - 1;
        elseif ($instr == 'jio' && $$r == 1) $i += $val - 1;
    }
    return $b;
}

