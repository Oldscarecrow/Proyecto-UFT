<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:loginbt.php");	
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>UFT</title>
</head>

<body>

<?php
require 'config.php';
$deleter = $_POST["del"];


$regd="SELECT * FROM trabajos WHERE cota = :mdel";
	 
	 $resultado=$base->prepare($regd);
	 
	  $resultado->execute(array(":mdel"=>$deleter));
	  
	  $reg=$resultado->rowcount();
	  
	  $registro=$resultado->fetch(PDO::FETCH_ASSOC);
	  
	  $imgp=$registro['imgres'];
	  
	  $resultado->closeCursor();

if($reg!=0){
	
     $imgdes=$_SERVER['DOCUMENT_ROOT'].$udfile;
	 unlink($imgdes.$imgp);
	 
	 $sql="DELETE FROM trabajos WHERE cota = :mdel";

	 $resultado=$base->prepare($sql);
	 
	  $resultado->execute(array(":mdel"=>$deleter));
	 
		$resultado->closeCursor();
		 
		 $base=null;
		 
	 	header("location:adlog.php?dsuccess=true");
		
}else{
	
	header("location:adlog.php?dfallo=true");
}
	 
?>

     

</body>

</html>