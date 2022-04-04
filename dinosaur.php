<?php

$size = 9;
$array = [];

$data1 = array_map("str_getcsv", file("dataset1.csv"));
array_splice($data1, 0, 1);

$data2 = array_map("str_getcsv", file("dataset2.csv"));
array_splice($data2, 0, 1);

for($i = 0; $i < $size; $i++) {
    $array[$i][0] = $data1[$i][0];
    $array[$i][1] = $data1[$i][1];
    $array[$i][2] = $data1[$i][2];

    for($j = 0; $j < $size; $j++) {
        if($array[$i][0] === $data2[$j][0]) {
            $array[$i][3] = $data2[$j][1];
            $array[$i][4] = $data2[$j][2];
            break;
        }
        $array[$i][3] = null;
        $array[$i][4] = null;
    }
}
$array[7][0] = $data2[4][0];
$array[7][1] = null;
$array[7][2] = null;
$array[7][3] = $data2[4][1];
$array[7][4] = $data2[4][2];
array_pop($array);

$out = "";
$g = 9.8;
$max = 0;

foreach($array as $item) {
    if(is_null($item[3]) || is_null($item[1])) {
        continue;
    }
    $speed = (($item[3] / $item[1]) - 1) * sqrt($item[1] * $g);

    foreach($array as $i) {
        if($item[4] !== "bipedal") {
            continue;
        }
        if($speed > $max) {
            $out .= $item[0] . "\n";
            $max = $speed;
            break;
        }
    }
}
print_r($out);