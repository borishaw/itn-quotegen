<?php
include '.db.inc.php';

//First 2 elements are id and table name, DO NOT change the order
$id = array_shift($_POST);
$table_name = array_shift($_POST);


try {
    DB::update($table_name, $_POST, "id = $id");
    header('location: editTable.php?table_name=' . $table_name);
} catch (Exception $e){
    print "Error: " . $e->getMessage() . "Please go back and try again";
}

