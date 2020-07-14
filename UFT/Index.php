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
  	  	  <form method="post" action="visitantes.php">
  	  	    <br>
  	  	    <h3>Registrate para comenzar tu busqueda</h3>
			<br><br>
	          <div class="form-group">
	      	    <center>
                  <input type="text" class="form-control cedula" name="nomape" id="nomape" placeholder="Nombre y Apellido" required>
                </center>
              </div>
              <div class="form-group">
	      	    <center>
	      	  <input type="text" class="form-control cedula" name="cedula" id="cedula" placeholder="Cedula" required>
                  </select> 
                </center>
              </div>
            <center><input type="submit" name="registrar" id="registrar" value="Ingresar"></center>
            <br>
	        </form>
          <center><a href="loginbt.php">¿Administrador?</a></center>
	      </div>  
      </div>
    </div>
    <br>

    <div id="myslidemenu" class="jqueryslidemenu">
     <form method="post" action="http://www.uft.edu.ve/"><input type="submit" name="retorno" id="retorno" value="Retornar"></form>
      <br style="clear: left" />
    </div>
  </div>

    <div class="container">
      <div class="alert alert-info" role="alert">
	  <center>
        <p><strong>¡Información!</strong> Estimado usuario los datos a ingresar solo seran usados con el objeto mantener un registro de nuestros visitantes.
		<br>Si presiona el boton de retorno este lo llevara de vuelta a la pagina principal.
		</p>
      </center>
	  </div>
    </div>

  </body>
</html>