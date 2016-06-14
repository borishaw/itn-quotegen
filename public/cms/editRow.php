<?php
include "db.inc.php";

$id = $_REQUEST['id'];
$table_name = $_REQUEST['table_name'];

$row = DB::query("SELECT * FROM $table_name WHERE id = $id");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
</html>
