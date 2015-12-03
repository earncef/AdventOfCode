<?php
	$input = explode("\n", trim(file_get_contents('input')));
	$count = count($input);
	for ($totalLength = $totalArea = $i = 0; $i < $count && $dim = explode('x', $input[$i]); $i++) {
		sort($dim);
		$totalArea += ($dim[0] * $dim[1] + $dim[1] * $dim[2] + $dim[0] * $dim[2]) * 2 + $dim[0] * $dim[1];
		$totalLength += ($dim[0] + $dim[1]) * 2 + ($dim[0] * $dim[1] * $dim[2]);
	}	
	echo "{$totalArea} {$totalLength}";
	