<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:loginbt.php");	
}
if(!isset($_GET["page"])){
	$pagact=1;
	$n=1;
	$m=5;
}elseif($_GET["page"]<=3){
	$pagact=$_GET["page"];
	$n=1;
	$m=5;
	}else{
		
	$pagact=$_GET["page"];	
    $n=$_GET["page"]-2;
	$m=$_GET["page"]+2;
}
		
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buscador de investigación</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ok.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="slidemenu.css" />
	<link rel="stylesheet" type="text/css" href="Tablastyle.css" />
    <link rel="icon" type="image/png" href="logo.jpg">
	<style>
	
</style>
  </head>
  <body background="background.jpg">


  
  
  
  
    <div class="container-fluid" style=" margin-top: -10px;">
  	  <div class="row" >
        <header>
  	      <h4 class="tit"> <img src="logo.jpg" width="25" height="25">  Busqueda de investigación</h4>
		  
		</header>
  	  </div>
  	  <div class="centro row"> 
  	     
  	  	  <form method="get" action="adlog.php">
  	  	    <br>
  	  	    <h3>Lista de Visitantes</h3>
    <center>
	        <input type="submit" name="Retornar" id="Retornar" value="Regresar">
			
			</Center>
            <br>
	        </form>
  <?php        
	       require 'config.php';		   
			$maxpag=10;
	        $from=($pagact-1)*$maxpag;
			
			
	 $sql="SELECT * FROM visitantes"; 
	 
	 $resultado=$base->prepare($sql);
	 
	  $resultado->execute(array(""));
	  
	  $regtot=$resultado->rowcount();
	  $pagtot=ceil($regtot/$maxpag);
	  
	    if(($pagtot-2)<=$pagact){
			$m=$pagtot;
			$n=$pagact-2;
		}
	     if($pagtot<=$pagact or $pagtot<=5){
		$n=1;	 
		 }
	  
	  $resultado->closeCursor();
	  
	  
	 $sqllimit="SELECT * FROM visitantes LIMIT $from,$maxpag";
	 
      $resultado=$base->prepare($sqllimit);
	 
	  $resultado->execute(array(""));
		 
	 
echo "
<center>
<table class='resulttable'>
<thead>
<tr>
<th>C.I.</th> 
<th>Nombre y Apellido</th> 
<th>Hora de visita</th> 
</tr></thead>
<tfoot>
<tr>
<td colspan='3'>
<div class='links'>
<li>".$regtot."  Registros encontrados para un total de ".$pagtot."  paginas. Usted esta en la pagina:".$pagact.".
<a href='?page=1'>&laquo;</a>"; 

for($i=$n; $i<=$m; $i++){
echo "<a href='?page=".$i."'>".$i."</a>";
}
echo"<a href='?page=".$pagtot."'>&raquo;</a></div>
</li>
</td>
</tr>
</tfoot>";		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

echo "<tbody>
<tr>
<td style='text-align:center'>". $registro['CI'] ."</td>
<td style='text-align:center'>". $registro['Nomyape'] ."</td>
<td style='text-align:center'>". date('g:i A-d/m/Y',strtotime($registro['Dvisit'])) ."</td>
</tr>";
	
			
		}
		echo"</tbody></table></center>";
		$resultado->closeCursor();
		 
		$base=null;
?>		 
	 	
	  <br>
      </div>
    </div>
    <br>

    <div id="myslidemenu" class="jqueryslidemenu">
     <form method="post" action="Logout.php"><input type="submit" name="logout" id="logout" value="Logout"></form>
      <br style="clear: left" />
    </div>
  </div>

    
    
  </body>
</html>