<?php
/*require '../vendor/autoload.php';

DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'itn_quote_gen';

use League\Csv\Reader;

$csv = Reader::createFromPath('fcl_price_table.csv');
$result = $csv->fetchAll();


foreach ($result as $row) {
    $city = $row[0];
    $province = $row[1];
    $country = $row[2];
    $net = $row[3];
    $zone = $row[4];
    $margin = $row[5];
    $sold = $row[6];
    $per = $row[7];
    try {
        DB::insertUpdate('fcl_price_table', [
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'net' => $net,
            'zone' => $zone,
            'margin' => $margin,
            'sold' => $sold,
            'per' => $per
        ]);
    } catch (Exception $e) {
        print $e->getMessage();
    }
}*/