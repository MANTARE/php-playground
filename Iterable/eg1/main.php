<?php

$count = 0;
$csv_records = [];
$fp = fopen('../test.csv', 'r');
while (($file_data = fgetcsv($fp)) != false) {
    // don't need the sample from China
    if ($file_data[3] === 'China') {
        continue;
    }
    // don't need the sample after 2022
    if ($file_data[2] > 2021) {
        continue;
    }
    $csv_records[] = $file_data;
    if (count($csv_records) > 0) {
        break;
    }
}

var_dump($csv_records);
