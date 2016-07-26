<?php
include '.db.inc.php';

$tables = DB::tableList();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITN Agent Request CMS</title>
</head>
<body>
<h1>ITN Agent Request CMS</h1>
<ul>
    <?php foreach ($tables as $table): ?>
        <?php $table_display_name = strtoupper(str_replace("_", " ", $table)) ?>
    <li>
        <form action="editTable.php">
            <input type="hidden" name="table_name" value="<?php echo $table ?>">
            <button type="submit"><?php echo $table_display_name ?></button>
        </form>
    </li>
    <?php endforeach; ?>
    <li><a href="viewQuotes.php">View Quotes</a></li>
</ul>
</body>
</html>
