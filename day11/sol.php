<?php
$pass = file_get_contents('input');
function isValid($pass) {
    for ($i = $p = 0, $l = -1, $c = false, $length = strlen($pass); $i < $length; $i++) {
        if ($pass[$i] == 'i' || $pass[$i] == '0' || $pass[$i] == 'l') return false;
        if ($i > 1 && ord($pass[$i-2]) + 1 == ord($pass[$i-1]) && ord($pass[$i-1]) + 1 == ord($pass[$i])) $c = true;
        if ($i > 0 && $pass[$i-1] == $pass[$i] && $i - 1  != $l) {
            $p++;
            $l = $i;
        }
    }
    if ($c && $p > 1) return true;
    return false;
}

function nextPass($pass) {
    for ($i = strlen($pass) - 1; $i >= 0; $i--) {
        $pass[$i] = chr(ord($pass[$i]) + 1);
        if ($pass[$i] == '{') $pass[$i] = 'a';
        else break;
    }
    return $pass;
}

function nextValidPass($pass) {
    do {
        $pass = nextPass($pass);
    } while (!isValid($pass));
    return $pass;
}

echo nextValidPass($pass), ' ', nextValidPass(nextValidPass($pass));
