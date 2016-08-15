<?php
include '.db.inc.php';

$table_name = $_REQUEST['table_name'];
$columns = DB::columnList($table_name);
$rows = DB::query("SELECT * FROM $table_name");
$table_display_name = strtoupper(str_replace("_", " ", $table_name));
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit All Rows</title>
	<?php include 'cms-header.php';?>
</head>
<body>

<?php include 'nav.php';?>

<div id="banner">
    <div class="container">
        <div class="row">
            <div class="banner-container">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h1>Edit All <?php echo $table_display_name ?> Rows</h1>
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
                <div class="col-md-12">
                	<div id="form">
	                	<form action="updateAllRows.php" method="post">
							<input type="hidden" name="table_name" value="<?php echo $table_name ?>">
							<table id="editAllRows">
								<tr id="rowHeader">
									<?php for ($i = 1; $i < count($columns); $i++): ?>
										<td><?php echo strtoupper($columns[$i]) ?></td>
									<?php endfor; ?>
								</tr>
								<?php foreach ($rows as $row): ?>
									<tr>
										<?php $id = array_shift($row); ?>
										<?php foreach ($row as $key => $value): ?>
											<td>
												<input name="<?php echo $key . '_' . $id ?>" type="text" value="<?php echo $value ?>">
											</td>
										<?php endforeach ?>
									</tr>
								<?php endforeach; ?>
							</table>
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