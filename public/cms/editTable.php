<?php
include 'db.inc.php';

$table_name = $_REQUEST['table_name'];
$table_display_name = $_REQUEST['table_display_name'];

$columns = DB::columnList($table_name);
$rows = DB::query("SELECT * FROM $table_name");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit: <?php echo $table_display_name ?></title>
</head>
<body>
<h1>Edit: <?php echo $table_display_name ?></h1>
<table>
    <tr>
        <?php for($i = 1; $i < count($columns); $i++): ?>
            <td><?php echo strtoupper($columns[$i]) ?></td>
        <?php endfor; ?>
        <td><b>Edit</b></td>
    </tr>
    <?php foreach ($rows as $row):?>
        <tr>
            <?php $id = array_shift($row); ?>
            <?php foreach ($row as $row_value): ?>
                <td><?php echo $row_value ?></td>
            <?php endforeach; ?>
            <td>
                <form method="post" action="editRow.php">
                    <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit">Edit</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
