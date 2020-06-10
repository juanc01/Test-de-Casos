<?php
session_start();
require 'conexion.php';
$user = $_POST['usuario'];
$clave = $_POST['clave'];


$query = "SELECT COUNT(*) as contar FROM usuarios where nombre_usuario = '$user' and clave_usuario = '$clave' ";
$bdconect = mysqli_query($conexion,$query);
$parametros = mysqli_fetch_array($bdconect);
if($parametros['contar']>0){
   $_SESSION['username'] = $user;
  header("location: principal.php");
}else {
    echo "<h1>datos incorrectos</h1> <br> ";
    echo "<a href='Login.php'>Volver</a>";
}


?>