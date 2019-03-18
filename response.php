<?php
session_start();

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';

// Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
$bag =  CertificationBagFactory::integrationWebPayNormal();

$webPay = TransbankServiceFactory::normal($bag); 

//toma el token y consulta a transbank por la transaccion y devuelve un array con todos los datos de la transaccion
//response code = 0  transaccion aprobada
$result =  $webPay->getTransactionResult();

/*echo  '<pre>';
print_r($result);
exit;*/


//guardamos este dato solo como prueba para luego recuperarlo en finalizar.php
//deberiamos llevarnos el token para hacer la validacion de forma correcta
$_SESSION['response_code'] =  $result->detailOutput->responseCode;

if($result->detailOutput->responseCode == 0 ){
    //echo 'la transaccion fue aprobada';
    //guardar datos de la trasaccion en la bd
    //MUY IMPORTANTE GUARDAR EL TOKEN PARA LUEGO EN FINALIZAR.PHP RESCATARLO DESDE UNA CONSULTA Y OBTENER TODOS
    //LOS DATOS DE LA TRANSACCION 
}else{
    //guradar datos de la transaccion en la bd como rechazado 
}

//se le informa a webpay el resultadpo de la transaccion
//ua vez ejecutada esta linea ya no se puede volver a recargar la misma pagina
//una vez informado ya no se puede deshacer
//aqui se acepta la plata, si no se acepta dentro del tiempo 30 segundos el token expira 
//y transbank declara la transaccion como reversada apesar de que haya sido 
//aprobada tal vez en primera instancia
$webPay->acknowledgeTransaction();

// Redirecciona al cliente a Webpay para recibir el Voucher
echo  RedirectorHelper::redirectBackNormal($result->urlRedirection);


?>