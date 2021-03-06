<?php

include 'conexion/BDconexion.php';



//reCaptcha
function getCaptcha($secreKey){

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=6Le3VIkUAAAAAO60G-COdGNRLA6fPFq_sRSKKtOA&response={$secreKey}";
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  $file_contents = curl_exec($ch);
  curl_close($ch);
  $json =  json_decode($file_contents);
  return $json;
}


//Se valida si el usuario se encuentra registrado en la BD
function validaUsuario($usuario){
  global $conn;
  $usu = "";
  $query = "SELECT usuario FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $usu = $row[0];
  }

  if($usu === $usuario){
    return true;
  }else{
    return false;
  }

}


//Se valida clave del usuario al momento de loguearse
function validaClave($usuario, $clave){
  global $conn;
  $pass="";
  $query = "SELECT clave FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $pass = $row[0];
  }

  if($clave === $pass){
    return true;
  }else{
    return false;
  }

}


function obtieneNombre($usuario){
  global $conn;
  $nombre="";
  $query = "SELECT nombre FROM usuario WHERE usuario = '".$usuario."'";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $nombre = $row[0];
  }
    return $nombre;
}



function registrarUsuario($nombre, $usuario, $clave, $tipo_usuario, $foto, $cargo){
  global $conn;
  $query = "INSERT INTO usuario (nombre, usuario, clave, tipo, foto, cargo) VALUES ('".$nombre."','".$usuario."','".$clave."',".$tipo_usuario.",'".$foto."',".$cargo.")";
  $resp = mysqli_query($conn, $query);

  if($resp){
    echo "SI";
    return true;
  }else{
    echo "NO".mysqli_error($conn);
    return false;
  }

}


//metodo para contar notificaciones
function notificaciones(){
  global $conn;
  $noti = '';
  $query = "SELECT COUNT(*) FROM contacto WHERE gestion = 0";
  $resp = mysqli_query($conn, $query);

  while($row = mysqli_fetch_row($resp)){
    $noti = $row[0];
  }
    return $noti;
}

