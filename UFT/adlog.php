<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:loginbt.php");	
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Busqueda de investigación</title> <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ok.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="slidemenu.css" />
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
  	  	  <form method="post" action="upload.php" enctype="multipart/form-data">
  	  	    <br>
  	  	    <h3>Formulario de Registro de trabajos de grado</h3>
			<Center>
			
	<div>
	<br>
	<textarea class="form-control" style="width:600px"  name="titu" id="titu" placeholder="Titulo" required></textarea><br>
	</div>	
	<div class="input-group">
		
		<input type="text" class="form-control" style="width:175px"  name="aut" id="aut" placeholder="Autor" required>
		<input type="text" class="form-control" style="width:175px"  name="tut" id="tut" placeholder="Tutor" required>
		<input type="text" class="form-control" style="width:100px"  name="npa" id="npa" placeholder="Nº de Pag" required>
		<input type="text" class="form-control" style="width:150px"  name="bib" id="bib" placeholder="Biblioteca" required>
    </div><br>
	<div class="input-group">
		<input type="text" class="form-control" style="width:120px"  name="cot" id="cot" placeholder="Cota" required>
		<input type="text" class="form-control" style="width:120px"  name="nej" id="nej" placeholder="Nº de Ejemplar" required>
		<input type="text" class="form-control" style="width:120px"  name="not" id="not" placeholder="Nota" maxlength="3" required>
		<input type="text" class="form-control" style="width:120px"  name="ann" id="ann" placeholder="Año" maxlength="4" required>
		<input type="text" class="form-control" style="width:120px"  name="idi" id="idi" placeholder="Idioma" required>
    </div><br>
	<input type="file" name="img" id="img" size="20" required>
	<input type="submit" name="registrar" id="registrar" value="Registrar" onclick="return confirm('¿Esta seguro de que no existe ningun error en los campos del registro que desea insertar?');"  required>
			<br>
			</Center>
	        </form>
	        <br>
      </div>
	  
	  	  	  <?php
	  if(isset($_GET["usize"]) && $_GET["usize"] == 'true'){
		   Echo "<div class='alert alert-warning' role='alert'>
	  <center>
        <p><strong>El documento adjunto sobrepasa los 5MB.</strong></p>
      </center>
	  </div>";
      }
	  if(isset($_GET["uform"]) && $_GET["uform"] == 'true'){
		  Echo "<div class='alert alert-warning' role='alert'>
	  <center>
        <p><strong>El documento adjunto no es de formato PDF.</strong></p>
      </center>
	  </div>";
 }
 if(isset($_GET["udup"]) && $_GET["udup"] == 'true'){
		  Echo "<div class='alert alert-warning' role='alert'>
	  <center>
        <p><strong>Ya existe la Cota del registro que desea insertar.</strong></p>
      </center>
	  </div>";
	  }
	  if(isset($_GET["usuccess"]) && $_GET["usuccess"] == 'true'){

	  Echo "<div class='alert alert-success' role='alert'>
	  <center>
        <p><strong>El registro se ha creado exitosamente.</strong></p>
      </center>
	  </div>"; }
?>
	  
	  <div class="alert alert-info" role="alert">
	  <center>
        <p><strong>¡Información!</strong> Se les recuerda que el archivo que se subira a la base de datos no debe tener espacios en blanco.<br> El archivo adjunto debe ser de formato PDF y ser de menos de 5MB
		</p>
      </center>
	  </div>
	   <div class="centro row">
  	  	 <form method="post" action="deleteR2.php">
  	  	    <br>
  	  	    <h3>Formulario de eliminacion de trabajos de grado</h3>
			<Center>
	
		<input type="text" class="form-control" style="width:250px"  name="del" id="del" placeholder="cota" required>
	    <input type="submit" name="borrar" id="borrar" value="Eliminar" onclick="return confirm('¿Esta seguro de que este es el registro que desea eliminar?');">
			
			</Center>
            <br>
	        </form>
	        <br>
      </div>
	  
	  	  <?php
	  
	   if(isset($_GET["dfallo"]) && $_GET["dfallo"] == 'true'){
		  Echo "<div class='alert alert-warning' role='alert'>
	  <center>
        <p><strong>El registro que desea eliminiar no existe verifique que el registro que ingreso es el correcto.</strong></p>
      </center>
	  </div>"; 
      }
	  if(isset($_GET["dsuccess"]) && $_GET["dsuccess"] == 'true'){
		  
	   Echo "<div class='alert alert-success' role='alert'>
	  <center>
        <p><strong>El registro se ha eliminado exitosamente.</strong></p>
      </center>
	  </div>"; }
	  
	  ?>
	  
	  <div class="alert alert-info" role="alert">
	  <center>
        <p><strong>¡Cuidado!</strong> Se les recuerda que una vez borrado el registro no podra ser recuperado.
		</p>
      </center>
	  </div>
	  <div class="centro row">
  	  	 <form method="post" action="lista.php">
  	  	    <br>
  	  	    <h3>Lista de visitantes a la herramienta de trabajos de grado</h3>
			<Center>
	
	    <input type="submit" name="lista" id="lista" value="Lista">
			
			</Center>
            <br>
	        </form>
	        <br>
      </div>
    </div>
	
	
    <div id="myslidemenu" class="jqueryslidemenu">
     <form method="post" action="Logout.php"><input type="submit" name="logout" id="Logout" value="Logout"></form>
      <br style="clear: left" />
    </div>
 
  
  
    
  </body>
</html>