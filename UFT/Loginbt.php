<!DOCTYPE html>
<html>
  <head>
    <title>Busqueda de investigación</title>
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
  	  <!--<img src="logo.jpg" width="80" height="80">
  	  <br><br>-->
  	  <div class="col-md-12">
  	    <div class="centro row"> 
  	  	  <form method="post" action="verlogbt.php">
  	  	    <br>
  	  	    <h3>Introduce tus datos</h3>
	          <div class="form-group">
	      	    <center>
                  <input type="text" class="form-control cedula" name="usua" id="usua" placeholder="Usuario" required>
                </center>
              </div>
              <div class="form-group">
	      	    <center>
	      	      <input type="password" class="form-control cedula" name="pass" id="pass" placeholder="Contraseña" required>
                  </select> 
                </center>
              </div>
            <center><input type="submit" name="registrar" id="registrar" value="Ingresar"></center>
            <br>
	        </form>
          <center><a href="index.php">¿No eres Administrador?</a></center>
	      </div>  
      </div>
	  
    </div>
    <br>

    <div id="myslidemenu" class="jqueryslidemenu">
     <form method="post" action="http://www.uft.edu.ve/"><input type="submit" name="retorno" id="retorno" value="Retornar"></form>
      <br style="clear: left" />
    </div>
  </div>
     <?php
	  if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true'){
		   Echo "<div class='alert alert-warning' role='alert'>
	  <center>
        <p><strong>Usuario o Contraseña invalida.</strong></p>
      </center>
	  </div>";
      }
	  ?>

    <div class="container">
      <div class="alert alert-info" role="alert">
	  <center>
        <p><strong>¡Información!</strong> Estimado usuario si usted no es de permiso de la administracion se le pide por favor volver a la pagina principal.
		</p>
      </center>
	  </div>
    </div>

 
    
  </body>
</html>