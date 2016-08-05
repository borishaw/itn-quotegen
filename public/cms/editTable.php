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
    <?php include 'cms-header.php';?>
</head>
<body>

<?php include 'nav.php';?>

<div id="banner">
    <div class="container">
        <div class="row">
            <div class="banner-container">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h1>Edit: <?php echo $table_display_name ?></h1>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <ol class="breadcrumb">
                        <li><a href="index.php">CMS Home Page</a></li>
                        <li class="active"><?php echo $table_display_name ?></a></li>
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
                <div class="col-md-7">

                    <div id="form">
                        <fieldset class="reset">
                            <legend>Add New Zone</legend>
                            <form action="insertRow.php" method="post">
                                <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                                <ul class="field-group">
                                    <?php for ($i = 1; $i < count($columns); $i++): ?>
                                        <li>
                                            <label for="<?php echo $columns[$i] ?>"><?php echo strtoupper($columns[$i]) ?>:</label>
                                            <input type="text" id="<?php echo $columns[$i] ?>" name="<?php echo $columns[$i] ?>">
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                                <button type="submit">Add</button>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <div class="col-md-5">
                    <?php include 'cms-aside.php' ?>
                </div>
            </section>
        </div>

        <div class="row stopper">
            <section>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped">
                            <tr>
                                <td colspan="5">
                                    <table id="recordData" cellpadding="0" cellspacing="0" border="0" colspan="5" width="100%">
                                        <tbody>
                                            <tr id="rowHeader">
                                                <?php for ($i = 1; $i < count($columns); $i++): ?>
                                                    <td><?php echo strtoupper($columns[$i]) ?></td>
                                                <?php endfor; ?>
                                                <td>Edit <a href="editAllRows.php?table_name=<?php echo $table_name ?>">(Edit All Rows)</a></td>
                                                <td>Delete</td>
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
                                                    <td class="editFixedWidthCell">
                                                        <form method="post" action="editRow.php">
                                                            <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                                            <button type="submit">Edit Record</button>
                                                        </form>
                                                    </td>
                                                    <td class="deleteFixedWidthCell">
                                                        <form method="post" action="deleteRow.php">
                                                            <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                                            <button class="buttonSecondary" type="submit" onclick="return confirm('Confirm to delete?');">Delete Record</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include 'cms-footer.php';?>
</body>
</html>
