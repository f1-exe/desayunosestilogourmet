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
        <h1 class="mt-5">Transacción Finalizada</h1>
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
              <tr><td>Orden Compra</td><td>DEG-00001</td></tr>
              <tr><td>Cod Autorizacion</td><td>67567282813</td></tr>
              <tr><td>Estado Transacción</td><td><img src="img/transaccion_success.png" width="30" height="30"></td></tr>
              <tr><td>Fecha Transacción</td><td><?php echo date("Y-m-d");?></td></tr>
              <tr><td>Nombre</td><td>Miguel marquez</td></tr>
              <tr><td>Correo</td><td>mikemreyes.mm@gmail.com</td></tr>
              <tr><td>Monto</td><td>$20.000</td></tr>
              <tr><td>Comuna delivery</td><td>Conchalí</td></tr>
              <tr><td>Fecha delivery</td><td><?php echo date("Y-m-d");?> </td></tr>
              <tr><td>Producto</td><td>Café</td></tr>
            </tbody>
          </table>
          <button class="btn  btn-primary" onclick="window.location.href='index.php'">Volver a Desayunos estilo gourmet</button>
         </div>
      </div>
    </div>
  </div>
  <br>
  <br>

</body>

</html>
