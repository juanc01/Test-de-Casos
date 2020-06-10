<?php
	session_start();
	include 'conexion.php';
	if(isset($_SESSION['nombre_usuario'])){
	echo '<script> window.location="principal.php"; </script>';
	}	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/EstiloLog.css">
	<link rel="stylesheet" type="text/css" href="Estilos/bootstrap.min.css">
</head>
<body>
	<div id="ContenedorPrincipal">
		<div id="ContendorLogin">
			<div id="Espacio"></div>
			<div id="EspacioLogin1"></div>
			<div id="Login">
				<div id="TituloLogin"> 
					<h3 style="padding-top:30px; padding-left: 30px;">Iniciar sesión</h3></div>

					<div id="Con1"></div>
					<div id="Con2">

<form action="validarLogin.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de usuario</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Ingrese el nombre de usuario" name="usuario">
  </div>

  	<div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la contraseña" name="clave">
  </div>

 <div id="Con4">
 	<div id="Con5">
 		<label style="padding-top: 10px;"><a href="registroPersona.php">Registrarse</a></label>
 		</div>

 
  <button type="submit" class="btn btn-primary" name="login" style="float: right !important;">Iniciar sesión</button>

  </div>

</form>

					</div>
					<div id="Con3"></div>

				<!-- -->

			</div>
			


	</div>
	





</body>
</html>