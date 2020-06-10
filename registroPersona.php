
<!DOCTYPE html>
<html>
<head>
	<title>Registro Persona</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/EstiloRcliente.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
  

	<link rel="stylesheet" href="Estilos/index_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src='js/script.js'></script>
  <meta charset="utf-8">
</head>
<body >

<div id="contenedor">
	<div id="navegacion">
    <ul style="margin-left: 450px; margin-top: 10px;">

             
    </ul>
        
        

      


  </div>
	<div id="contenedorinfo">
	
    <form  method="POST">
		<div id="formulario" style="padding-left: 40px;">
			<div class="form-group">
   			
    		 <label for="Txtidentificacion">Identificacion</label> <input type="text" class="form-control" id="Txtidentificacion" aria-describedby="emailHelp" placeholder="Ingrese su identificacion" name="identificacion" >
  		</div>


 		<div class="form-group">
    		<label for="Txtnombre">Nombre y/o apellidos</label>
    		<input type="text" class="form-control" id="Txtnombre" aria-describedby="emailHelp" placeholder="Ingrese su nombre" name="nombres">
  		</div>


  		<div class="form-group">
    		<label for="Txtcorreo">Correo</label>
    		<input type="email" class="form-control" id="Txtcorreo" aria-describedby="emailHelp" placeholder="correo" name="correo" >
  		</div>


  		<div class="form-group">
    		<label for="Txttelefono">Telefono</label>
    		<input type="text" class="form-control" id="Txttelefono" aria-describedby="emailHelp" placeholder="Ingrese su telefono" name="telefono" >
  		</div>

  		<div class="form-group">
    		<label for="Txtusuario">Usuario</label>
    		<input type="text" class="form-control" id="txtusuario" aria-describedby="emailHelp" placeholder="Ingrese un usuario" name="usuario" >
  		</div>

  		<div class="form-group">
    		<label for="Txtclave">Clave</label>
    		<input type="password" class="form-control" id="Txtclave" aria-describedby="emailHelp" placeholder="Ingrese una Clave" name="clave" >
  		</div>

  		  	
  		<div style="padding-left: 80px;">
  		<button type="submit" class="btn btn-success" name="Guardar" style="width: 120px;">Guardar</button>
 	
  		</div>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
  		<br>
		</div>
    </form>
	
</div>



</body>
</html>
<?php
  include('conexion.php');


  
  if (isset($_REQUEST['Guardar'])) {
    $id = $_REQUEST['identificacion'];
    $nombres = $_REQUEST['nombres'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
  

    if (!empty($_REQUEST['identificacion']) && !empty($_REQUEST['nombres'])
      && !empty($telefono = $_REQUEST['telefono'])) {

    $insertar = "INSERT into personas values('$id', '$nombres','$correo','$telefono')";
	$insertarU = "INSERT into usuarios values('$id','$usuario','$clave')";

    $resultado = mysqli_query($conexion, $insertar) or die("Error al enviar registro");
    $resultado2 = mysqli_query($conexion, $insertarU) or die("Error al enviar registro");

    mysqli_close($conexion);
    echo "<script languaje='javascript'>alert('Datos guardados satisfactoriamente.')</script>";
   echo '<script> window.location="Login.php"; </script>';
  
  $id="";
  $nombre="";
  $apellidos="";
  $telefono="";
  $usuario="";
  $clave="";
  }
  else
    echo "<script languaje='javascript'>alert('Campos vacios')</script>";
}
