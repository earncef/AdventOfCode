<?php
$fi = 2947; $fj = 3029;
for ($i = 1, $count = 0, $code = 20151125; $i; $i++) 
	for ($j = 0, $c = $i; $j <= $i; $j++, $c--) {
		$code = ($code * 252533) % 33554393;
		if ($c + 1 == $fi && $j + 1 == $fj) break 2;
	}
echo $code;
