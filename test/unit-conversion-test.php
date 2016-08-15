<?php
require '../vendor/autoload.php';

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

//$length = new Length(1, 'in');
//echo $length->toUnit('cm') . '<br/>';
//
//$mass = new Mass(1, 'lb');
//echo $mass->toUnit('kg');

function to_metric ($pieces_info_imperial){
	$pieces_info_metric = [];
	foreach ($pieces_info_imperial as $piece){
		$piece_info = [];
		foreach ($piece as $key => $value){
			switch ($key){
				case "weight":
					$mass = new Mass($value, "lb");
					$value_metric = $mass->toUnit("kg");
					$piece_info[$key] = $value_metric;
					break;
				default:
					$length = new Length($value, "in");
					$value_metric = $length->toUnit("cm");
					$piece_info[$key] = $value_metric;
			}
		}
		array_push($pieces_info_metric, $piece_info);
	}
	return $pieces_info_metric;
}

$test_pieces_info =
	[
		[
			"length" => 3,
			"width" => 3,
			"height" => 3,
			"weight" => 4.54
		],
		[
			"length" => 6,
			"width" => 6,
			"height" => 6,
			"weight" => 9
		]
	];

var_dump(to_metric($test_pieces_info));