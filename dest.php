<?php

require 'vendor/autoload.php';

use League\Csv\Reader;

$csv = Reader::createFromPath("dest.csv");

$cities = $csv->fetchAll();

$city_zone = [];

foreach ($cities as $row){
    $city_zone[trim($row[0])] = $row[1];
}

var_dump($city_zone);