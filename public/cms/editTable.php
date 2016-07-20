<?php
include '.db.inc.php';

$table_name = $_GET['table_name'];
$table_display_name = strtoupper(str_replace("_", " ", $table_name));

$columns = DB::columnList($table_name);
$rows = DB::query("SELECT * FROM $table_name");

$dollar_sign_columns = ['rate', 'net', 'sold' , 'margin'];
$kilogram_columns = ['min', 'max'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit: <?php echo $table_display_name ?></title>
</head>
<body>
<h1>Edit: <?php echo $table_display_name ?></h1>

<fieldset>
    <legend>Add New Record</legend>
    <form action="insertRow.php" method="post">
        <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
        <ul>
            <?php for ($i = 1; $i < count($columns); $i++): ?>
                <li>
                    <label for="<?php echo $columns[$i] ?>"><?php echo strtoupper($columns[$i]) ?>:</label>
                    <input type="text" id="<?php echo $columns[$i] ?>" name="<?php echo $columns[$i] ?>">
                </li>
            <?php endfor; ?>
        </ul>
        <button type="submit">Insert</button>
    </form>
</fieldset>
<p><i><b>Tips:</b>You can use Ctrl + F (Command + F) to look for rows</i></p>

<table>
    <tr>
        <td>
            <form action="editAllRows.php" method="get">
                <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                <button type="submit">Edit All Rows</button>
            </form>
        </td>
    </tr>
    <tr>
        <?php for ($i = 1; $i < count($columns); $i++): ?>
            <td><b><?php echo strtoupper($columns[$i]) ?></b></td>
        <?php endfor; ?>
        <td><b>Edit</b></td>
        <td><b>Delete</b></td>
    </tr>
    <?php foreach ($rows as $row): ?>
        <tr>
            <?php $id = array_shift($row); ?>
            <?php foreach ($row as $key => $value): ?>
                <td><?php
                    if (in_array($key , $dollar_sign_columns)){
                        echo "$" . $value;
                    } else if (in_array($key, $kilogram_columns)) {
                        echo $value . " <i>kg</i>";
                    } else {
                        echo $value;
                    }
                    ?></td>
            <?php endforeach ?>
            <td>
                <form method="post" action="editRow.php">
                    <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form method="post" action="deleteRow.php">
                    <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" onclick="return confirm('Confirm to delete?');">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p><a href="index.php">Go Back to CMS Home Page</a></p>
</body>
</html>
