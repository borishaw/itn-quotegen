<?php
include '.db.inc.php';

$table_name = $_REQUEST['table_name'];
$columns = DB::columnList($table_name);
$rows = DB::query("SELECT * FROM $table_name");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit All Rows</title>
</head>
<body>
<form action="updateAllRows.php" method="post">
	<input type="hidden" name="table_name" value="<?php echo $table_name ?>">
	<table>
		<tr>
			<?php for ($i = 1; $i < count($columns); $i++): ?>
				<td><b><?php echo strtoupper($columns[$i]) ?></b></td>
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
</body>
</html>