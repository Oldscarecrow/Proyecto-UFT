<!DOCTYPE html>
<html>

<head>
  <title>UFT</title>
</head>

<body>

<?php
require "config.php";

$sql="SELECT * FROM admins WHERE usuario = :musu AND clave = :mpas";
	 
	 $resultado=$base->prepare($sql);
	 
	 $login=htmlentities(addslashes($_POST["usua"]));
	 $passw=htmlentities(addslashes($_POST["pass"]));
	 
	 $resultado->bindValue(":musu", $login);
	 $resultado->bindValue(":mpas", $passw);
	 
	 $resultado->execute();
	 $res=$resultado->rowcount();
	 
	 if($res!=0){
		
		session_start();
		
		$_SESSION["usuario"]=$_POST["usua"];
		
		header("location:adlog.php");
		 
	 }else{
		 
		 header("location:loginbt.php?fallo=true");
		 
	 }
	 



$resultado->closeCursor();
		 
		 $base=null;

?>

     

</body>

</html>