<?php
include ".db.inc.php";

$id = $_REQUEST['id'];
$table_name = $_REQUEST['table_name'];

$row = DB::queryFirstRow("SELECT * FROM $table_name WHERE id = $id");
$id = array_shift($row);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit: Row</title>
</head>
<body>
<h1>Edit: Row</h1>
<form action="updateRow.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
    <ul>
        <?php foreach ($row as $key => $value): ?>
            <li>
                <label for="<?php echo $key ?>"><?php echo strtoupper($key) ?>:</label>
                <input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" value="<?php echo $value ?>">
            </li>
        <?php endforeach; ?>
    </ul>
    <button type="submit">Update</button>
</form>

</body>
</html>
