<?php

print count($_POST);

include ".db.inc.php";

foreach ($_POST as $value){
	print_r($value . "<br/>");
}

$table_name = array_shift($_POST);
$columns = DB::columnList($table_name);
$row_array = array_chunk($_POST, count($columns) - 1, true);
$new_row_array = [];

function cut_string_using_last($character, $string, $side, $keep_character = true)
{
	$offset = ($keep_character ? 1 : 0);
	$whole_length = strlen($string);
	$right_length = (strlen(strrchr($string, $character)) - 1);
	$left_length = ($whole_length - $right_length - 1);
	switch ($side) {
		case 'left':
			$piece = substr($string, 0, ($left_length + $offset));
			break;
		case 'right':
			$start = (0 - ($right_length + $offset));
			$piece = substr($string, $start);
			break;
		default:
			$piece = false;
			break;
	}
	return ($piece);
}

//Sort out $_POST data
foreach ($row_array as $entry) {
	$new_entry = [];
	$all_keys = array_keys($entry);
	$id = cut_string_using_last("_", $all_keys[0], "right", false);
	$new_entry['id'] = $id;
	foreach ($entry as $key => $value) {
		$new_key = cut_string_using_last("_", $key, "left", false);
		$new_entry[$new_key] = $value;
	}
	array_push($new_row_array, $new_entry);
}


try {
	foreach ($new_row_array as $entry) {
		$id = array_shift($entry);
		DB::update($table_name, $entry, "id = $id");
	}
	header('location: editTable.php?table_name=' . $table_name);
} catch (Exception $e){
	print $e->getMessage();
}