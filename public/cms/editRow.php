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
    <?php include 'cms-header.php';?>
</head>
<body>

<?php include 'nav.php';?>

<div id="banner">
    <div class="container">
        <div class="row">
            <div class="banner-container">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h1>Edit Row</h1>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <ol class="breadcrumb">
                        <li><a href="index.php">CMS Home Page</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cms-table">
    <div class="container">
        <div class="row">
            <section>
                <div class="col-md-12">
                    <div id="form">
                        <form action="updateRow.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                            <ul class="field-group">
                                <?php foreach ($row as $key => $value): ?>
                                    <li>
                                        <label for="<?php echo $key ?>"><?php echo strtoupper($key) ?>:</label>
                                        <input type="text" id="<?php echo $key ?>" name="<?php echo $key ?>" value="<?php echo $value ?>">
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include 'cms-footer.php' ?>
</body>
</html>
