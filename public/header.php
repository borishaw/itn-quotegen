<?php
//Basic HTTP Authentication
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header("WWW-Authenticate: Basic realm=\"Private Area\"");
	header("HTTP/1.0 401 Unauthorized");
	print "Sorry - you need valid credentials to be granted access!\n";
	exit;
} else {
	if (($_SERVER['PHP_AUTH_USER'] == 'jane') && ($_SERVER['PHP_AUTH_PW'] == 'smith')) {

	}
	else {
		header("WWW-Authenticate: Basic realm=\"Private Area\"");
		header("HTTP/1.0 401 Unauthorized");
		print "Sorry - you need valid credentials to be granted access!\n";
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>ITN Quote Generator</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.3.2/ui-bootstrap.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.3.2/ui-bootstrap-tpls.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-validation/1.4.1/angular-validation.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-validation/1.4.1/angular-validation-rule.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/geography.js"></script>
	<script src="js/controller.js"></script>

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>