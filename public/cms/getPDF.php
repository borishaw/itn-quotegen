<?php
require '.db.inc.php';

$id = $_GET['id'];
$file_name = "$id.pdf";

$file_path = "../../pdf/$file_name";
header('Content-type: application/pdf');
header("Content-Disposition: inline; filename = $file_name");
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($file_path));
header('Accept-Ranges: bytes');

@readfile($file_path);