<?php 
session_start();
include 'funciones/funciones.php';

$orden_compra = $_SESSION['orden_compra'];
$row = selectDatosCompraAndTBK($orden_compra);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Compra realizada - Desayunos estilo gourmet</title>
  <link rel="icon" href="img/core-img/icono.ico">

  <!-- Bootstrap CDN CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .avatar {
      height: 150px;
      width: 150px;
      background-repeat: no-repeat;
      background-position: 50%;
      /*border-radius: 50%;*/
      background-size: 100% auto;
      display: inline-block;
    }
  </style>
</head>

<body>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div>
          <img src="img/core-img/logo_deg.png" class="avatar mt-3"> 
        </div> 
        <?php if($row['tbk_codigo_transaccion'] == 0){ ?> 
        <h1 class="mt-5">
             <label style="color:green">Transacción Finalizada correctamente</label>
        </h1>
        <p>Gracias por comprar con nosotros</p>
         <div>
         <table class="table">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Información</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>Orden Compra</td><td><?php echo $row['orden_compra'];?></td></tr>
              <tr><td>Cod Autorizacion</td><td><?php echo $row['tbk_codigo_autorizacion'];?></td></tr>
              <tr>
                <td>Estado Transacción</td>
                <td><img src="img/transaccion_success.png" width="30" height="30"></td></tr>
              <tr><td>Fecha Transacción</td><td><?php echo $row['fecha_registro']; ?></td></tr>
              <tr><td>Nombre</td><td><?php echo $row['nombre_usuario'];?></td></tr>
              <tr><td>Correo</td><td><?php echo $row['correo_usuario'];?></td></tr>
              <tr><td>Monto</td><td><?php echo $row['monto_compra'];?></td></tr>
              <tr><td>Comuna delivery</td><td><?php echo $row['id_comuna_delivery']; ?></td></tr>
              <tr><td>Fecha delivery</td><td><?php echo $row['fecha_delivery']; ?> </td></tr>
            </tbody>
          </table>
          <button class="btn  btn-primary" onclick="window.location.href='index.php'">Volver a Desayunos estilo gourmet</button>
         </div>
        <?php }else{ ?>
          <div>
          <h1 class="mt-5">
             <label style="color:red">Transacción Finalizada con error</label>
        </h1>
         <div>
         <table class="table">
            <thead>
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Información</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>Orden Compra</td><td><?php echo $row['orden_compra'];?></td></tr>
              <tr>
                <td>Estado Transacción</td>
                <td><img src="img/transaccion_failure.png" width="30" height="30"></td></tr>
              <tr><td>Fecha Transacción</td><td><?php echo $row['fecha_registro']; ?></td></tr>
              <tr><td>Monto</td><td><?php echo $row['monto_compra'];?></td></tr>
            </tbody>
          </table>
          <button class="btn  btn-primary" onclick="window.location.href='index.php'">Volver a Desayunos estilo gourmet</button> 
          </div>
        <?php } ?>  
      </div>
    </div>
  </div>
  <br>
  <br>

</body>

</html>
