<?php
/*require '../vendor/autoload.php';

DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'itn_quote_gen';

use League\Csv\Reader;

$csv = Reader::createFromPath('air_lcl_city_zone_table.csv');
$result = $csv->fetchAll();

foreach ($result as $row){
    $city = $row[0];
    $zone = $row[1];
    try {
        DB::insertUpdate("air_lcl_city_zone_table", [
            "city" => $city,
            "zone" => $zone
        ]);
    } catch (Exception $e){
        print $e->getMessage();
    }
}*/