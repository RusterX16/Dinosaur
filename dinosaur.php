<?php

$array = [];

$d1 = array_map("str_getcsv", file("dataset1.csv"));
array_splice($d1, 0, 1);

$d2 = array_map("str_getcsv", file("dataset2.csv"));
array_splice($d2, 0, 1);

for($j = 0, $jMax = count(max($d1, $d2)); $j < $jMax; $j++) {
    $array[] = $d1[$j];
}

for($i = 0, $iMax = count(max($d1, $d2)); $i < $jMax; $i++) {
    for($j = 0, $jMax = count(max($d1, $d2)); $j < $jMax; $j++) {
        if($d2[$i][0] === $d1[$j][0]) {
            $array[$i][] = $d2[$j][1];
            $array[$i][] = $d2[$j][2];
        }
    }
}

print_r($array);