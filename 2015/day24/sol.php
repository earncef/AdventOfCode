<?php
$input = file('input');
echo process($input), ' ', process($input, 4);

function process($input, $compartments = 3) {
    for ($i = 0, $minFg = 0, $minQe = 0, $perGroup = array_sum($input) / $compartments; $i < 100;) {
        for ($inp = $input, $group = array_fill(1, $compartments, []); $val = array_pop($inp);) {
            $try = [];
            do {
                $g = rand(1, $compartments);
                $try[$g] = 0;
                $cs = array_sum($group[$g]);
                if ($cs > $perGroup) continue 3;
            } while ($cs >= $perGroup - $val && count($try) < $compartments);
            $group[$g][] = $val;
        }   
        
        foreach($group as $grp) if (array_sum($grp) != $perGroup) continue 2;
        if ($minFg == 0 || count($group[1]) <= $minFg) {
            $i++;
            $minFg = count($group[1]);
            $qe = array_product($group[1]);
            if ($minQe == 0 || $qe < $minQe) $minQe = $qe;
        }
    }
    
    return $minQe;
}
