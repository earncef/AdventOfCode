<?php
echo getMinMana(50, 55, 500, 8), ' ', getMinMana(50, 55, 500, 8, true);

function getMinMana($php, $bhp, $mana, $bd, $hard = false) {
    for($min = null, $i = 0; $i < 1000000; $i++) {
        $result = getManaSpent($php, $bhp, $mana, $bd, $hard);
        if ($result !== false && ($result < $min || $min === null)) $min = $result;
    }    
    return $min;
}

function getManaSpent($playerHp, $bossHp, $playerMana, $bossD, $hard = false) {
    for ($spent = $timer3 = $timer4 = $timer5 = $step = 0; $playerHp > 0 && $bossHp > 0; $step++) {
        if ($step % 2 == 0) {
            if ($hard && --$playerHp < 1) return false;
            if ($playerMana < 53) return false;

            $playerD = 0;
            $option = rand(1, 5);
            if ($playerMana < 73) $option = 1;
            if (($timer5 > 0 || $playerMana < 229) && $option == 5) $option = rand(1, 4);
            while (($timer4 > 0 || $playerMana < 173) && $option == 4) $option = rand(1, 5);
            while (($timer4 > 0 || $playerMana < 113) && $option == 3) $option = rand(1, 5);
                        
            if ($option == 1) {
                $playerMana -= 53;
                $spent += 53;
                $bossHp -= 4;
            } elseif ($option == 2) {
                $playerMana -= 73;
                $spent += 73;
                $bossHp -= 2;
                $playerHp += 2;
            } elseif ($option == 3) {
                $playerMana -= 113;
                $spent += 113;
                $timer3 = 6;
            } elseif ($option == 4) {
                $playerMana -= 173;
                $spent += 173;
                $timer4 = 6;                
            } else {
                $playerMana -= 229;
                $spent += 229;
                $timer5 = 5;                                
            }
        } else $playerHp -= $bd;
        
        $bd = $bossD;
        if ($timer3-- > 0) $bd = ($bossD - 7 > 0) ? $bossD - 7: 1;
        if ($timer4-- > 0) $bossHp -= 3;
        if ($timer5-- > 0) $playerMana += 101;
    }
    return ($bossHp < 1) ? $spent : false;
}
