<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>UFT</title>
  
  
 <?php	
	require 'config.php';
        $nom=$_POST["nomape"];
		$ci=$_POST["cedula"];
	    //$dat=now() ":mdat"=$dat
	 $sql="INSERT INTO visitantes (CI, nomyape) VALUES (:mced, :mnya) ON DUPLICATE KEY UPDATE Dvisit = now()";
	 
	 $resultado=$base->prepare($sql); 
	 
	 $resultado->execute(array(":mced"=>$ci, ":mnya"=>$nom, ));
	 
		$resultado->closeCursor();
		 
		 $base=null;
		 
		 header("location:buscador.php")
		 
	
	
	 
?>

 
 
</head>

<body>

     

</body>

</html>