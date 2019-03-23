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

//metodo para registrar compra 
function registrarCompra($orden_compra,$estado,$id_producto,$cantidad_productos,$id_comuna_delivery,$fecha_delivery,$monto_compra,$nombre_usuario,$correo_usuario,$mensaje){
 global $conn;
 $query = "INSERT INTO comercio_transacciones(id,orden_compra, estado, id_producto, cantidad_productos, id_comuna_delivery, fecha_delivery, monto_compra, nombre_usuario, correo_usuario, mensaje) 
           VALUES (null,'".$orden_compra."',".$estado.",".$id_producto.",".$cantidad_productos.",".$id_comuna_delivery.",'".$fecha_delivery."',".$monto_compra.",'".$nombre_usuario."','".$correo_usuario."','".$mensaje."')";
 $resp = mysqli_query($conn,$query);

 if($resp){
    //echo "SI";
    return true;
  }else{
    //echo "NO".mysqli_error($conn);
    return false;
  }
 
}

//metodo para registrar transaccion transbank
function registrarTransaccionTBK($orden_compra,$tbk_token_transaccion,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$monto_compra,$tbk_url_retorno,$tbk_vci){
  global $conn;
  $query = "INSERT INTO tbk_transacciones(id, orden_compra, tbk_token_transaccion, numero_tarjeta, fecha_expiracion_tarjeta, tbk_codigo_autorizacion, tbk_codigo_transaccion, codigo_comercio, monto_compra,tbk_url_retorno,tbk_vci) 
            VALUES (null,'".$orden_compra."','".$tbk_token_transaccion."','".$numero_tarjeta."','".$fecha_expiracion_tarjeta."',".$tbk_codigo_autorizacion.",".$tbk_codigo_transaccion.",".$codigo_comercio.",".$monto_compra.",'".$tbk_url_retorno."','".$tbk_vci."')";

  $resp = mysqli_query($conn,$query);

  if($resp){
    //echo "SI";
    return true;
  }else{
    //echo "NO".mysqli_error($conn);
    return false;
  }

}

//metodo para obtner el max id para concatenarlo la orden de compra
function obtenerMaxIdComercio_transacciones(){
  global $conn;
  $query = "SELECT max(id) as id FROM comercio_transacciones";
  $resp =  mysqli_query($conn,$query);
  $id =  mysqli_fetch_array($resp);
    
  if($id['id'] ==  NULL){
    return 1;
  }else{
    return $id['id']+1;
  }
  
}

//metodo para actualizar la informacion de la tabla tbk_transacciones segun orden de compra
function actualizarTbk_transacciones($codigo_tipo_pago,$numero_tarjeta,$fecha_expiracion_tarjeta,$tbk_codigo_autorizacion,$tbk_codigo_transaccion,$codigo_comercio,$tbk_url_retorno,$tbk_vci,$orden_compra){
  global $conn;
  $query = "UPDATE tbk_transacciones SET codigo_tipo_pago = '".$codigo_tipo_pago."', numero_tarjeta = '".$numero_tarjeta."',
                                          fecha_expiracion_tarjeta = '".$fecha_expiracion_tarjeta."',tbk_codigo_autorizacion = ".$tbk_codigo_autorizacion.",
                                          tbk_codigo_transaccion = ".$tbk_codigo_transaccion." ,codigo_comercio = ".$codigo_comercio.",
                                          tbk_url_retorno = '".$tbk_url_retorno."',
                                          tbk_vci = '".$tbk_vci."' WHERE orden_compra = '".$orden_compra."'";
  $resp = mysqli_query($conn,$query);


  if($resp){
    return true;
  }else{
    return false;
  }
}

//funcion para actualizar el estado de la compra a aprobado
//estado = 0  significa aprovado
//estado = 99 no aprobado
function actualizarEstadoCompra($estado,$orden_compra){
  global $conn;
  $query =  "UPDATE comercio_transacciones SET estado = 0 WHERE orden_compra =  '".$orden_compra."'";
  $resp =  mysqli_query($conn,$query);
  if($resp){
    return true;
  }else{
    return false;
  }

}

//metodo para traer los datos de la transaccion y la compra segun orden de compra
function selectDatosCompraAndTBK($orden_compra){
  global $conn;
  $query =  "SELECT c.fecha_delivery,c.nombre_usuario,c.correo_usuario,c.id_comuna_delivery,c.monto_compra, tbk.tbk_codigo_autorizacion,tbk.tbk_codigo_transaccion,tbk.tbk_fecha_transaccion,tbk.orden_compra
             FROM comercio_transacciones c 
             JOIN tbk_transacciones tbk on tbk.orden_compra = c.orden_compra
             WHERE tbk.orden_compra =  '".$orden_compra."'";
  $resp =  mysqli_query($conn,$query);
  $row =  mysqli_fetch_array($resp);

  return $row;
}

