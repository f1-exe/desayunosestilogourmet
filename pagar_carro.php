<?php 

$monto_total = $_POST["monto_total"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Finalizar compra - Desayunos Estilo Gourmet</title>
        <link rel="icon" href="img/core-img/icono.ico">
        <link rel="stylesheet" href="css/animate.css">
        <!-- Bootstrap CDN CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- swal include -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
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
        
            /* CSS DEL TOOLTIP*/    
            #tooltip {
            position: relative;
            display: inline-block;
            }

            #tooltip #tooltiptext {
            visibility: hidden;
            width: 220px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
            }

            #tooltip #tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
            }

            #tooltip:hover #tooltiptext {
            visibility: visible;
            opacity: 1;
            }
        /* CSS DEL TOOLTIP*/
    
        </style>
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                        <img src="img/core-img/logo_deg.png" class="avatar mt-3"> 
                </div>
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">
                        Finalizar compra
                    </h1>
                    <p>Para finalizar el proceso de compra, por favor ingrese la siguiente información
                            <br>A continuación será redirigido al portal de pago WebPay.</p>
                   
                            <form action="pagar.php" method="POST" id="form_finalizar" name="form_finalizar">
                            <div class="form-group row justify-content-center">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo</label>
                                <div class="col-sm-6">
                                <input  type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre completo">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="ej: micorreo@midominio.cl">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="cbo_delivery" class="col-sm-2 col-form-label">Comuna del delivery</label>
                                <div class="col-sm-6">
                                    <select name="comuna" id="comuna" class="form-control">
                                        
                                        <option value="0">Seleccione comuna</option>
                                        <?php $i=1; while($i<=30){ ?>
                                            <option value="<?php echo $i;?>">Comuna <?php echo $i;?></option>
                                        <?php $i++; } ?>   
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="cbo_delivery" class="col-sm-2 col-form-label">Dirección del delivery</label>
                                <div class="col-sm-6">
                                <input  type="text" class="form-control" name="direccion_delivery" id="direccion_delivery" placeholder="Nombre Calle 2334, Departamento , Nombre calle referencia, Comuna">    
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                    <div id="tooltip" class="col-sm-2 col-form-label">
                                       Fecha delivery(*)
                                        <span id="tooltiptext">El delivery está disponible 48hrs después del dia de la compra.</span>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <?php /*fecha minima en php para el input date*/ $date = new DateTime('+2 day'); ?>                                  
                                        <input type="date" class="form-control" name="fecha_delivery" id="fecha_delivery" min="<?php echo $date->format('Y-m-d');?>">
                                    </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                    <label for="cbo_delivery" class="col-sm-2 col-form-label">Añade una nota para tu amigo(a)</label>
                                    <div class="col-sm-6">
                                        <textarea name="mensaje" id="mensaje" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Querido(a) amigo(a) espero que disfrutes este desayuno que envié con cariño para ti."></textarea>
                                    </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="btn_enviar"> Continuar a webPay</button>
                                </div>
                            </div>
                            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo '1';?>">
                            <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $monto_total;?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="1">
                        </form>   
                </div>
            </div>
        </div>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pagar_carro.js"></script>    
    </body>
    </html>