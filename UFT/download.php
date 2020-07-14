<?php // block any attempt to the filesystem
	if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
	$filename = $_GET['file'];
	} else {
	$filename = NULL;
	}
	
	
	
	require 'config.php';
	$base=null;
	
	if (!$filename) {
	 
	echo 'Sorry, the file you are requesting is unavailable.';
	} else {
	 
	$path = $_SERVER['DOCUMENT_ROOT'].$udfile.$filename;

	if (file_exists($path) && is_readable($path)) {
 
	$size = filesize($path);
	header('Content-Type: application/octet-stream');
	header('Content-Length: '.$size);
	header('Content-Disposition: attachment; filename='.$filename);
	header('Content-Transfer-Encoding: binary');
	 
	$file = @ fopen($path, 'rb');
	if ($file) {
	 
	fpassthru($file);
	exit;
	} else {
	echo 'Sorry, the file you are requesting is unavailable.';
	}
	} else {
	echo 'Sorry, the file you are requesting is unavailable.3';
	}
	}
	?>