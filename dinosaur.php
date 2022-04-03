<?php

require_once 'Util.php';

$d1 = Util::getFileText("dataset1.csv");
echo $d1;

$legs = str_split($d1, ", ");

foreach($legs as $l) {
    echo $l;
}

echo "";