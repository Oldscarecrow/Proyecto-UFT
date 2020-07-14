<?php
$host_name = "localhost";
$database = "libgrado"; 
$username = "root";
$password = "";
$udfile = "/uft/imgserv/";

// udfile esta concatenada con un $_SERVER['DOCUMENT_ROOT']
try {
$base = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
$base->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>
