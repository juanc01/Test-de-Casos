<?php
session_start();
$usuario = $_SESSION['username'];
if(!isset($usuario)){
    header("location: Login.php");

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src='js/script.js'></script>
  <meta charset="utf-8">

<div id="contenedor" style="padding-left: 50px;">
<div id="navegacion">
    <ul style="margin-left: 450px; margin-top: 10px;">
      </ul>        
      <ul style="margin-top: 10px;">
      <a style="text-decoration: none;"href='logout.php'>
      <button style="margin-left: 1100px !important;" type="button" class="btn btn-secondary">Cerrar sesión</button>
      </a>
      </ul>

<div id="contenedorinfo">
  
    <form  method="POST" style="height: 300px; width: 500px">
    <div id="formulario" style="padding-left: 40px;">
    
      <div class="form-group">
        <label for="Txtid">ID</label>
        <input type="text" class="form-control" id="Txtid" aria-describedby="emailHelp" placeholder="ID" name="IdCaso">
      </div>

      <div class="form-group">
        <label for="Txtdireccion">Direccion</label>
        <input type="text" class="form-control" id="Txtdireccion" aria-describedby="emailHelp" placeholder="direccion" name="direccion">
      </div>
      
      <div class="form-group">
        <label for="Txtcaso">Caso</label>
        <input type="text" class="form-control" id="Txtcaso" aria-describedby="emailHelp" placeholder="Caso" name="caso" style="width: 250px; height: 100px" >
      </div>


                
      <div style="padding-left: 80px;">
      <button type="submit" class="btn btn-success" name="Guardar" style="width: 120px;">Guardar</button>
  
      <button type="submit" class="btn btn-success" name="Consultar"  style="width: 120px;">Consultar</button>
      </div>
      <div style="height: 5px;"></div>
      <div style="padding-left: 80px;">
      <button type="submit" class="btn btn-success" name ="Editar" style="width: 245px;">Editar</button>
      </div>
      <div style="height: 5px;"></div>
      <div style="padding-left: 80px;">
      <button type="submit" class="btn btn-danger" name="Eliminar" style="width: 245px;">Eliminar</button>
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
</head>
<body >

<?php
include('conexion.php');
$iduser = $_SESSION['username'];

$resultadoId = mysqli_query($conexion,"SELECT MAX(id_caso) as id_caso FROM casos");

while ($consulta1 = mysqli_fetch_array($resultadoId)) {
    $idc = $consulta1['id_caso'];
    $idc = $idc + 1; 

  $resultadoIdPersona = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre_usuario = '$iduser'");

  while ($consulta2  = mysqli_fetch_array($resultadoIdPersona)) {
      $idu = $consulta2['id_usuario'];
#por aca empece el codigo de auto guardado en los casos
    if(isset($_REQUEST['Guardar'])) {
      $direccion = $_REQUEST['direccion'];
      $caso = $_REQUEST['caso'];

  if(!empty($_REQUEST['caso']) && !empty($_REQUEST['direccion'])){

    $insertar = "INSERT into casos values('$idc','$caso','$direccion','$idu')";
    
    $resultado = mysqli_query($conexion, $insertar) or die("3Error al enviar registro");

    mysqli_close($conexion);
    echo "<script languaje='javascript'>alert('Datos guardados satisfactoriamente.')</script>";
   }else
    echo "<script languaje='javascript'>alert('Campos vacios')</script>";
  }

  if (isset($_REQUEST['Eliminar'])) {
    $id=$_REQUEST['IdCaso'];


    if (!empty($id)) {


      mysqli_query($conexion, "DELETE from casos where id_caso ='$id'") or die ("Error al eliminar datos");



      mysqli_close($conexion);  
      echo "<script languaje='javascript'>alert('Datos eliminados satisfactoriamente.')</script>";
#por aca debo crear la secuancia al eliminar      
      //$idc2 = $idc - 1;
      #echo $idc2;
      #$insertar = "UPDATE casos SET id_caso = '$idc' WHERE id_caso = '$idc2'";
    
      #mysqli_query($conexion, "UPDATE casos SET id_caso = '$idc' WHERE id_caso = '$idc2'")or die ("Error al actualizar datos");

      #mysqli_close($conexion);

    }
  }
  


  if (isset($_REQUEST['Editar'])) {
    $id = $_REQUEST['direccion'];
    $dir = $_REQUEST['caso'];
    


    mysqli_query($conexion, "UPDATE casos  set , direccion_caso='$direccion', texto_caso='$caso' where Id_caso ='$id'") or die ("Error al actualizar datos");

    mysqli_close($conexion);  
    echo "<script languaje='javascript'>alert('Datos actualizados satisfactoriamente.')</script>";
         

  }


  if(isset($_REQUEST['Consultar'])){
    $id = $_REQUEST['IdCaso'];

    $resultadoconcaso = mysqli_query($conexion,"SELECT *FROM casos WHERE id_caso = '$id'");
    while ($consultacaso = mysqli_fetch_array($resultadoconcaso)) {
      
      echo 
      "

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table width=\"50%\" border=\"1px\">
          <tr>
            <td><center>Codidigo</center></td>
            <td><center>Direccion</center></td>
            <td><center>Caso</center></td>
          </tr>
          <tr>
            <td><center>".$consultacaso['id_caso']."</centrado></td>
            <td><center>".$consultacaso['texto_caso']."</centrado></td>
            <td><center>".$consultacaso['direccion_caso']."</centrado></td>
          </tr>
        </table>

      ";


    mysqli_close($conexion);  

    }
  }


  }
}
 





?>