<?php
require '../vendor/autoload.php';

DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'itn_quote_gen';

$rate = DB::query("SELECT sold from fcl_price_table WHERE city='Beijing'");

$zone_query = DB::query("SELECT zone FROM air_lcl_city_zone_table WHERE city='Timmins'");

$zone = 1;
$minimum_rate = (int) DB::query("SELECT rate FROM air_lcl_minimum_rate_table WHERE zone=$zone")[0]['rate'];

$rate_table = DB::query("SELECT * FROM air_lcl_rate_zone_$zone");
$max_weight_array = []; //Store all max value here
foreach ($rate_table as $rate_row){
	array_push($max_weight_array, $rate_row['max']);
}
array_push($max_weight_array, 150);
sort($max_weight_array);
$zone_index = array_search(150, $max_weight_array);
$chargeable_rate = $rate_table[$zone_index]['rate'];
var_dump(max([1, 3, '5345']));

