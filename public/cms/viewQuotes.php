<?php
require_once '.db.inc.php';
$columns = DB::columnList("quotes");
$rows = DB::query("SELECT * FROM quotes");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>View Quotes</title>
</head>
<body>
<table>
	<tr>
		<?php for ($i = 1; $i < count($columns); $i++): ?>
			<td><b><?php echo strtoupper($columns[$i]) ?></b></td>
		<?php endfor; ?>
		<td><b>Get PDF</b></td>
	</tr>
	<?php foreach ($rows as $row): ?>
		<tr>
			<?php $id = array_shift($row); ?>
			<?php foreach ($row as $key => $value): ?>
				<td><?php echo $value ?></td>
			<?php endforeach ?>
			<td>
				<form action="getPDF.php">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="submit" value="Get PDF">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>
