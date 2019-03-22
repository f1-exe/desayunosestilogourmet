<?php 

$comuna = $_POST["cbo_delivery"];
$fecha_delivery = $_POST["fecha_delivery"];
$monto_total = $_POST["monto_total"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title  -->
        <title>Finalizar compra - Desayunos Estilo Gourmet</title>

        <!-- Favicon  -->
        <link rel="icon" href="img/core-img/icono.ico">

        <!-- Core Style CSS -->
        <link rel="stylesheet" href="css/core-style.css">
        <link rel="stylesheet" href="css/style.css">
        <!--Estilo del date Picker-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">

    </head>

    <body>

        <!-- ##### Main Content Wrapper Start ##### -->
        <div class="main-content-wrapper d-flex clearfix">

            <!-- Mobile Nav (max width 767px)-->
            <div class="mobile-nav">
                <!-- Navbar Brand -->
                <div class="amado-navbar-brand">
                    <a href="index.php"><img src="img/core-img/logo_deg.png" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <!-- Header Area Start -->
            <header class="header-area clearfix">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php"><img src="img/core-img/logo_deg.png" alt=""></a>
                </div>
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul id="exampleAccordion">
                        <li class="active"><a href="index.php">Categorías</a></li>
                        <li><a href="categorias/para-ella.php">Para Ella</a></li>
                        <li><a href="categorias/para-el.php">Para Él</a></li>
                        <li><a href="categorias/cumpleanos.php">Cumpleaños</a></li>
                        <li>
                            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">Feliz día</a>
                            <ul class="sidenav-second-level collapse" id="collapseComponents">
                                <li>
                                    <a href="categorias/dia-padre.php">Día del padre</a>
                                </li>
                                <li>
                                    <a href="categorias/dia-madre.php">Día de la madre</a>
                                </li>
                                <li>
                                    <a href="categorias/san-valentin.php">San valentín</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="categorias/armar-pedido.php">Arma tu pedido</a></li>
                        <li><a href="categorias/promociones.php">Promociones</a></li>
                    </ul>
                </nav>

                <hr>
                <!-- Cart Menu -->
                <div class="cart-fav-search mb-100">
                    <a href="informaciones.php" class="cart-nav"><img src="img/info-yellow.png" alt=""> Informaciones</a>
                </div>
            </header>
            <!-- Header Area End -->

            <div class="cart-table-area section-padding-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="cart-title mt-50">
                                <h2>Finalizar compra</h2>
                                <p>Para finalizar el proceso de compra, por favor ingrese la siguiente información
                                    <br>A continuación será redirigido al portal de pago WebPay.</p>
                            </div>
                            <form action="pagar.php" method="post" id="form_finalizar" name="form_finalizar">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre Completo">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="correo_cliente" name="correo_cliente" placeholder="Correo ej: micorreo@midominio.cl">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <a href="#" onclick="document.getElementById('form_finalizar').submit();" class="btn amado-btn w-100">Ir a pagar</a>
                                    </div>
                                    <!--info del carro-->
                                    <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $monto_total;?>">
                                </div>
                        </div>

                        <!--caja--->
                        <div class="col-12 col-lg-4">
                            <div class="cart-summary">
                                <h5>Detalle de su compra</h5>
                                <ul class="summary-table">
                                    <li><span>Producto:</span> <span><?php echo 'Café';?></span></li>
                                    <li><span>Delivery:</span> <span><?php echo $comuna;?></span></li>
                                    <li><span>Fecha Delivery:</span><?php echo $fecha_delivery;?><span></span></li>
                                    <li><span>Cantidad:</span> <span><?php echo '1';?></span></li>
                                    <li><span>Monto Total:</span> <span><?php echo $monto_total;?></span></li>
                                </ul>
                                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo '1';?>">
                                <input type="hidden" name="comuna" id="comuna" value="<?php echo $comuna;?>">
                                <input type="hidden" name="fecha_delivery" id="fecha_delivery" value="<?php echo $fecha_delivery;?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo '1';?>">
                                <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $monto_total;?>">
                                


                                <div class="cart-btn">
                                    <a href="#" onclick="document.getElementById('form_finalizar').submit();" class="btn amado-btn w-100">Ir a pagar</a>
                                </div>
                            </div>
                        </div>
                        <!--caja-->
                       </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- ##### Main Content Wrapper End ##### -->

        <!-- ##### Footer Area Start ##### -->
        <footer class="footer_area clearfix mt-25">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Single Widget Area -->
                    <div class="col-12 col-lg-4">
                        <div class="single_widget_area">
                            <!-- Logo -->
                            <div class="footer-logo mr-50">
                                <a href="index.php"><img src="img/core-img/logo2.png" alt=""></a>
                            </div>
                            <!-- Copywrite Text -->
                            <p class="copywrite">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>

                            <!-- Social Button -->
                            <a id="href-footer" target="_blank" href="https://www.instagram.com/estilo_gourmet_/?hl=es-la"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a id="href-footer" target="_blank" style="margin-left: 50px;" href="https://www.facebook.com/Regaladesayunosconestilo"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <!-- Social Button -->

                        </div>
                    </div>
                    <!-- Single Widget Area -->
                    <div class="col-12 col-lg-8">
                        <div class="single_widget_area">
                            <!-- Footer Menu -->
                            <div class="footer_menu">
                                <nav class="navbar navbar-expand-lg justify-content-end">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                    <div class="collapse navbar-collapse" id="footerNavContent">
                                        <div class="info-cliente">
                                            <p>
                                                Atención al cliente
                                                <br> Lunes a viernes 9:00 a 18:00 hrs - Sábados 9:00 a 12:00 hrs.
                                                <br>
                                                <i class="fa fa-phone" aria-hidden="true">
                                                    <a id="href-footer" href="tel:+56930981530"> +56 9 3098 1530</a>
                                                </i>
                                                <br>
                                                <i class="fa fa-envelope" aria-hidden="true">
                                                    <a id="href-footer" href="mailto:contacto@deg.cl" target="_top">contacto@deg.cl</a>
                                                </i>
                                            </p>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### Footer Area End ##### -->

        <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugins js -->
        <script src="js/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
    </body>

    </html>