<?php
include ".db.inc.php";

$table_name = $_POST['table_name'];
$id = $_POST['id'];

DB::delete($table_name, "id = $id");
header('location: editTable.php?table_name=' . $table_name);