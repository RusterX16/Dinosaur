<?php

$size = 9;
$array = [];

$data1 = array_map("str_getcsv", file("dataset1.csv"));
array_splice($data1, 0, 1);

$data2 = array_map("str_getcsv", file("dataset2.csv"));
array_splice($data2, 0, 1);

for($i = 0, $loopsMax = count($data1); $i < $loopsMax; $i++) {
    for($j = 0, $jMax = count($data2); $j < $jMax; $j++) {
        if($data1[$i][0] === $data2[$j][0] || $data1[$j][0] === $data2[$i][0]) {
            $data1[$i][] = $data2[$i][1];
            $data1[$i][] = $data2[$i][2];
            break;
        }
        $data1[$i] = $data2[$i];
    }
}
print_r($data1);

/*for($i = 0; $i < $size; $i++) {
    $array[] = [$d1[$i][0]];
}*/

/*
for($j = 0, $jMax = count(max($d1, $d2)); $j < $jMax; $j++) {
    $array[] = $d1[$j];
}

for($i = 0, $iMax = count(max($d1, $d2)); $i < $jMax; $i++) {
    for($j = 0, $jMax = count(max($d1, $d2)); $j < $jMax; $j++) {
        if($d1[$i][0] === $d2[$j][0] || $d2[$j][0] === $d2[$i][0]) {
            $array[$i][] = $d2[$j][1];
            $array[$i][] = $d2[$j][2];
            break;
        }
    }
}

print_r($array);

$out = "";
foreach($array as $item) {
    if($item[3] === "bipedal") {
        $out .= $item[0];
    }
}

//print_r($out);*/