<?php

$array = [
    "NAME" => [],
    "LEG_LENGTH" => [],
    "DIET" => [],
    "STRIDE_LENGTH" => [],
    "STANCE" => [],
];

$d1 = array_map("str_getcsv", file("dataset1.csv"));
array_splice($d1, 0, 1);
print_r($d1);

$d2 = array_map("str_getcsv", file("dataset2.csv"));
array_splice($d2, 0, 1);
print_r($d2);

for($i = 0, $iMax = count($array); $i < $iMax; $i++) {
    $array["LEG_LENGTH"][] = $d1["LEG_LENGTH"];
    $array["DIET"][] = $d1["DIET"];

    if($d1["NAME"] === $d2["NAME"]) {
        $array["NAME"] = $d2["NAME"];
        $array["STRIDE_LENGTH"] = $d2["STRIDE_LENGTH"];
        $array["STANCE"] = $d2["STANCE"];
    }
}

print_r($array);