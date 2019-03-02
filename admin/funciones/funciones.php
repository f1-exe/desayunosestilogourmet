<?php 

include '../conexion/BDconexion.php';

//Se valida si el usuario se encuentra registrado en la BD
function validaUsuario($nombre){
  global $conn;
  $name = "";
  $query = "SELECT nombre FROM usuario WHERE nombre = '".$nombre."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp))
  {
    $name = $row[0];
  }

  if($name === $nombre){
    return true;
  }else{
    return false;
  }
}

//Se valida clave del usuario al momento de loguearse
function validaClave($nombre, $clave){
  global $conn;
  $pass="";
  $query = "SELECT clave FROM usuario WHERE nombre = '".$nombre."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp))
  {
    $pass = $row[0];
  }

  if($clave === $pass){
    return true;
  }else{
    return false;
  }
}

?>