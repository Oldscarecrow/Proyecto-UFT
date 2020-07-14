<?php
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
  	     
  	  	  <form method="get" action="resultado.php">
  	  	    <br>
  	  	    <h3>Buscador de Resumenes de trabajos de grado</h3>
			<Center>
		<div class="input-group">	
		<span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;" title="busqueda" id="busqueda"></span>
		<input type="text" class="form-control" style="width:750px"  name="buscador" id="buscador" placeholder="Buscar" required>
  <span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
    <select class="form-control cedula" name="tipo" id="tipo">>
                  	<option value="titulo">Titulo</option>
                  	<option value="autor">Autor</option>
                  	<option value="tutor">Tutor</option>
					<option value="cota">Cota</option>
                  </select> 
				  </div>
    
	<input type="submit" name="buscar" id="buscar" value="Buscar">
			
			</Center>
            <br>
	        </form>
  <?php        
	       require 'config.php';		   
			$maxpag=10;
	        $from=($pagact-1)*$maxpag;
			
			
	 $sql="SELECT * FROM trabajos"; 
	 
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
	  
	  
	 $sqllimit="SELECT * FROM trabajos LIMIT $from,$maxpag";
	 
      $resultado=$base->prepare($sqllimit);
	 
	  $resultado->execute(array(""));
		 
	 
echo "
<center>
<table class='resulttable'>
<thead>
<tr>
<th>Cota</th> 
<th>Titulo</th> 
<th>Autor</th> 
<th>Tutor</th> 
<th>Biblioteca</th>
<th>N° de pagina</th>
<th>Idioma</th>
<th>Año</th>
<th>Nota</th>
<th>N° de ejemplar</th>
<th>PDF</th>
</tr></thead>
<tfoot>
<tr>
<td colspan='11'>
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
<td style='text-align:center'>". $registro['cota'] ."</td>
<td style='text-align:justify'>". $registro['titulo'] ."</td>
<td style='text-align:center'>". $registro['autor'] ."</td>
<td style='text-align:center'>". $registro['tutor'] ."</td>
<td style='text-align:center'>". $registro['biblioteca'] ."</td>
<td style='text-align:center'>". $registro['npag'] ."</td>
<td style='text-align:left'>". $registro['idioma'] ."</td>
<td style='text-align:center'>". $registro['annp'] ."</td>
<td style='text-align:center'>". $registro['notas'] ."</td>
<td style='text-align:center'>". $registro['nej'] ."</td>
<td style='text-align:center'><a href='download.php?file=".$registro['imgres']."'>PDF</a></td>
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
     <form method="post" action="http://www.uft.edu.ve/"><input type="submit" name="retorno" id="retorno" value="Retornar"></form>
      <br style="clear: left" />
    </div>
  </div>

    
    
  </body>
</html>