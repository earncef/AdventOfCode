<?php
$input = explode("\n", str_replace([' to ', ' = '], ':', file_get_contents('input')));
$validPaths = [];
foreach ($input as $path) {
    $params = explode(':', $path);
    $validPaths[$params[0]][$params[1]] = $validPaths[$params[1]][$params[0]] = $params[2];
}
$locations = array_keys($validPaths);

paths($validPaths, $locations, $paths);
$minPathLength = $maxPathLength = 0;
foreach($paths as $path => $val) {
    $parts = explode(":", $path);
    $partCount = count($parts) - 1;
    $length = 0;
    for ($i = 1; $i < $partCount; $i++) {
        if (isset($validPaths[$parts[$i]][$parts[$i+1]])) $length += $validPaths[$parts[$i]][$parts[$i+1]];
        elseif (isset($validPaths[$parts[$i+1]][$parts[$i]])) $length += $validPaths[$parts[$i+1]][$parts[$i]];
    }
    
    if ($minPathLength == 0 || $length < $minPathLength) $minPathLength = $length;
    if ($length > $maxPathLength) $maxPathLength = $length;
}

function paths(&$validPaths, &$locations, &$paths, $path = '') {
    foreach($locations as $location) {
        if (isset($paths[$path])) unset($paths[$path]);
        $newPath = "$path:$location";
        $parts = explode(':', $newPath);
        $size = count($parts) ;
        if ($size > 2 && !isset($validPaths[$parts[$size-2]][$parts[$size-1]])) continue;
        $paths[$newPath] = 0;
        $newLocations = array_diff($locations, $parts);
        if (count($newLocations)) paths($validPaths, $newLocations, $paths, $newPath);
    }
}

echo "$minPathLength $maxPathLength";