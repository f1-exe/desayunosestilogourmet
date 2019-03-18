<?php
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';

echo 'pagar';
// Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
$bag =  CertificationBagFactory::integrationWebPayNormal();

$webPay = TransbankServiceFactory::normal($bag); 

// Para transacciones normales, solo puedes añadir una linea de detalle de transacción.
$webPay->addTransactionDetail(1000, 'prueba1');

// Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
$response =  $webPay->initTransaction('https://localhost/Proyectos/desayunosestilogourmet/response.php', 'https://localhost/Proyectos/desayunosestilogourmet/finalizar.php');

//print_r($response); 

//la respuesta me entrega el token y una url donde debe ser redirigido el usuario junto al token
//deberia pasar por input hidden el token a la url entregada en la respuesta

// Utilidad para generar formulario y realizar redirección POST
//GUARDAR EL TOKEN EN BD, POR QUE LUEGO SERA LA UNICA FORMA DE RECUPERAR LOS DATOS DE LA 
//TRANSACCION UNA VEZ CONCRETADO EL PAGO POR TRANSBANK
echo RedirectorHelper::redirectHTML($response->url, $response->token);

?>