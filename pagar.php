<?php
session_start();

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';
include 'funciones/funciones.php';

//rescato los datos de la transaccion
$monto_total = $_POST["monto_total"];
$nombre_cliente = $_POST["nombre_cliente"];
$correo_cliente = $_POST["correo_cliente"];
$id_producto = $_POST["id_producto"];
$comuna_delivery = $_POST["comuna"];
$fecha_delivery = $_POST["fecha_delivery"];
$cantidad_producto = $_POST["cantidad"];
$direccion_delivery =  $_POST["direccion_delivery"];
$mensaje = $_POST['mensaje'];

$orden_compra =  "DEG-".obtenerMaxIdComercio_transacciones();


//se registra la compra
registrarCompra($orden_compra,99,$direccion_delivery,$comuna_delivery,$fecha_delivery,$monto_total,$nombre_cliente,$correo_cliente,$mensaje);

//[CONTINUAR CON LOGICA DESPUES] - NO OLVIDAR

//insertarProductosCompra($orden_compra,$id_producto,$cantidad_producto);

//guardo la orden de compra en sesion para luego rescatar los datos de la transaccion en la vista 
//boucher_final.php
$_SESSION["orden_compra"] = $orden_compra;

// Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
$bag =  CertificationBagFactory::integrationWebPayNormal();

$webPay = TransbankServiceFactory::normal($bag); 

// Para transacciones normales, solo puedes añadir una linea de detalle de transacción.
$webPay->addTransactionDetail($monto_total, $orden_compra);

// Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
$response =  $webPay->initTransaction('http://localhost/desayunosestilogourmet/response.php', 'http://localhost/desayunosestilogourmet/boucher_final.php');

/*print_r($response); 
exit;   
*/

//registro los datos de la transaccion de transbank
registrarTransaccionTBK($orden_compra,$response->token,"NULL","NULL",0,1,0,$monto_total,"NULL","NULL","NULL");



//la respuesta me entrega el token y una url donde debe ser redirigido el usuario junto al token
//deberia pasar por input hidden el token a la url entregada en la respuesta

// Utilidad para generar formulario y realizar redirección POST
//GUARDAR EL TOKEN EN BD, POR QUE LUEGO SERA LA UNICA FORMA DE RECUPERAR LOS DATOS DE LA 
//TRANSACCION UNA VEZ CONCRETADO EL PAGO POR TRANSBANK
echo RedirectorHelper::redirectHTML($response->url, $response->token);

?>