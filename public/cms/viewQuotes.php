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
	<?php include 'cms-header.php';?>
</head>
<body>

<?php include 'nav.php';?>

<div id="banner">
    <div class="container">
        <div class="row">
            <div class="banner-container">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h1>View Quotes</h1>
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
            		<table id="recordData" width="100%">
						<tr id="rowHeader">
							<?php for ($i = 1; $i < count($columns); $i++): ?>
								<td><?php echo strtoupper($columns[$i]) ?></td>
							<?php endfor; ?>
							<td>Get PDF</td>
						</tr>
						<?php foreach ($rows as $row): ?>
							<tr>
								<?php $id = array_shift($row); ?>
								<?php foreach ($row as $key => $value): ?>
									<td><?php echo $value ?></td>
								<?php endforeach ?>
								<td class="pdfFixedWidthCell">
									<form action="getPDF.php">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<button type="submit">Get PDF</button>
										<!-- <input class="button" type="submit" value="Get PDF"> -->
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
            	</div>
            </section>
        </div>
    </div>
</div>

<?php include 'cms-footer.php';?>
</body>
</html>
