<?php
/*
require '../vendor/autoload.php';

DB::$user = 'root';
DB::$password = 'root';
DB::$dbName = 'itn_quote_gen';


$zone1 = [
	"zone" => 1,
	"min" => 33,
	"rates" => [
		[
			"min" => 51,
			"max" => 100,
			"rate" => 0.46
		],
		[
			"min" => 101,
			"max" => 255,
			"rate" => 0.25
		],
		[
			"min" => 256,
			"max" => 454,
			"rate" => 0.22
		],
		[
			"min" => 455,
			"max" => 899,
			"rate" => 0.15
		],
		[
			"min" => 900,
			"max" => 1399,
			"rate" => 0.1
		],
		[
			"min" => 1400,
			"max" => 2299,
			"rate" => 0.09
		],
		[
			"min" => 2300,
			"max" => 2800,
			"rate" => 0.06
		]
	]
];

$zone2 = [
	"zone" => 2,
	"min" => 37,
	"rates" => [
		[
			"min" => 51,
			"max" => 100,
			"rate" => 0.55
		],
		[
			"min" => 101,
			"max" => 255,
			"rate" => 0.28
		],
		[
			"min" => 256,
			"max" => 454,
			"rate" => 0.24
		],
		[
			"min" => 455,
			"max" => 899,
			"rate" => 0.18
		],
		[
			"min" => 900,
			"max" => 1399,
			"rate" => 0.12
		],
		[
			"min" => 1400,
			"max" => 2299,
			"rate" => 0.10
		],
		[
			"min" => 2300,
			"max" => 2800,
			"rate" => 0.07
		]
	]
];

$zone3 = [
	"zone" => 3,
	"min" => 45,
	"rates" => [
		[
			"min" => 51,
			"max" => 100,
			"rate" => 0.66
		],
		[
			"min" => 101,
			"max" => 255,
			"rate" => 0.37
		],
		[
			"min" => 256,
			"max" => 454,
			"rate" => 0.38
		],
		[
			"min" => 455,
			"max" => 899,
			"rate" => 0.31
		],
		[
			"min" => 900,
			"max" => 1399,
			"rate" => 0.20
		],
		[
			"min" => 1400,
			"max" => 2299,
			"rate" => 0.15
		],
		[
			"min" => 2300,
			"max" => 2800,
			"rate" => 0.10
		]
	]
];

$zone4 = [
	"zone" => 4,
	"min" => 75,
	"rates" => [
		[
			"min" => 136,
			"max" => 454,
			"rate" => 0.23
		],
		[
			"min" => 455,
			"max" => 907,
			"rate" => 0.20
		],
		[
			"min" => 908,
			"max" => 2267,
			"rate" => 0.18,
		],
		[
			"min" => 2268,
			"max" => 4535,
			"rate" => 0.15
		]
	]
];

$zone5 = [
	"zone" => 5,
	"min" => 81,
	"rates" => [
		[
			"min" => 136,
			"max" => 454,
			"rate" => 0.29
		],
		[
			"min" => 455,
			"max" => 907,
			"rate" => 0.26
		],
		[
			"min" => 908,
			"max" => 2267,
			"rate" => 0.21,
		],
		[
			"min" => 2268,
			"max" => 4535,
			"rate" => 0.16
		]
	]
];

$zone6 = [
	"zone" => 6,
	"min" => 92,
	"rates" => [
		[
			"min" => 136,
			"max" => 454,
			"rate" => 0.34
		],
		[
			"min" => 455,
			"max" => 907,
			"rate" => 0.28
		],
		[
			"min" => 908,
			"max" => 2267,
			"rate" => 0.23,
		],
		[
			"min" => 2268,
			"max" => 4535,
			"rate" => 0.19
		]
	]
];

$zone7 = [
	"zone" => 7,
	"min" => 105,
	"rates" => [
		[
			"min" => 136,
			"max" => 454,
			"rate" => 0.40
		],
		[
			"min" => 455,
			"max" => 907,
			"rate" => 0.31
		],
		[
			"min" => 908,
			"max" => 2267,
			"rate" => 0.27,
		],
		[
			"min" => 2268,
			"max" => 4535,
			"rate" => 0.23
		]
	]
];

$zones = [$zone1, $zone2, $zone3, $zone4, $zone5, $zone6, $zone7];

foreach ($zones as $zone) {
	$zone_number = $zone['zone'];
	$minimum_rate = $zone['min'];
	$rates = $zone['rates'];
	foreach ($rates as $rate) {
		DB::insertUpdate('air_lcl_rate_zone_' . $zone_number, $rate);
	}
}*/