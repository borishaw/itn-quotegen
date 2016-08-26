<?php
include '.db.inc.php';

$tables = DB::tableList();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ITN Agent Request CMS</title>
	<?php include 'cms-header.php'; ?>
</head>
<body>

<?php include 'nav.php'; ?>

<div id="banner">
	<div class="container">
		<div class="row">
			<div class="banner-container">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<h1>ITN Agent Request CMS</h1>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7">
					<p>Note: Please fill in the information below. If your shipment is quotable, you will get a quote in
						PDF. Otherwise, we will perform a manual quote and get back to you.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="cms">
	<div class="container">
		<div class="row">
			<section>
				<div class="col-md-4">
					<div class="separator-title">
                        <span>
                            <h6>All Requests</h6>
                        </span>
					</div>
					<ul>
						<?php foreach ($tables as $table): ?>
							<?php if ($table != "quotes"): ?>
								<?php $table_display_name = strtoupper(str_replace("_", " ", $table)) ?>
								<li>
									<a href="editTable.php?table_name=<?php echo $table ?>"><?php echo $table_display_name ?></a>
								</li>
							<?php endif ?>
						<?php endforeach; ?>
						<li><a class="button" href="viewQuotes.php">View Quotes</a></li>
					</ul>
				</div>
				<div class="col-md-5 col-md-offset-3">
					<?php include 'cms-aside.php'; ?>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include 'cms-footer.php'; ?>
</body>
</html>
