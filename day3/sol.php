<?php
	$input = file_get_contents('input');
	$length = strlen($input);
	$setPosition = function(&$x, &$y, &$houses, $c) {
		$x = ($c == '>') ? ++$x : (($c == '<') ? --$x : $x);
		$y = ($c == '^') ? ++$y : (($c == 'v') ? --$y : $y);
		$houses["{$x}x{$y}"] = 1;
	};
	for ($i = $x = $y = $rx = $ry = $sx = $sy = 0, $houses = $rHouses = $sHouses = ['0x0' => 1]; $i < $length && $c = $input[$i]; $i++) {
		$setPosition($x, $y, $houses, $c);
		if ($i % 2 == 0) {
			$setPosition($sx, $sy, $sHouses, $c);
		} else {
			$setPosition($rx, $ry, $rHouses, $c);
		}
	}	
	echo count($houses), ' ', count(array_merge($sHouses, $rHouses));
	