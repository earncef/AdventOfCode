<?php
$input = explode("\n", str_replace(['AND', 'OR', 'NOT', 'LSHIFT', 'RSHIFT', ' '], ['&', '|', '~', '<<', '>>', ''], file_get_contents('input')));

function process($input, $result = []) {
    while ($instruction = array_shift($input)) {
        $split = explode('->', $instruction);
        if (isset($result[$split[1]])) continue;
        $vars = explode('%', str_replace(['&', '|', '~', '<<', '>>'], '%', $split[0]));
        foreach ($vars as $var) {
            if (!$var || is_numeric($var)) continue;
            if (!isset($result[$var])) {
                $input[] = $instruction;
                continue(2);
            }
            $split[0] = str_replace($var, $result[$var], $split[0]);
        }
        $compute = create_function('', 'return ' . $split[0] . ';');
        $result[$split[1]] = $compute();
    }
    return $result['a'];
}

$a = process($input);
$newA = process($input, ['b' => $a]);
echo "$a $newA";