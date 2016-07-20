<?php
include '.db.inc.php';

//Table name is the first element of the $_POST array
$table_name = array_shift($_POST);

try {
    DB::insert($table_name, $_POST);
    header('location: editTable.php?table_name=' . $table_name);
} catch (Exception $e){
    print "Error: " . $e->getMessage() . " Please head back and try again";
}