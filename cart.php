<?php
session_start();
//var_dump($_POST); 
$total = 0;

$conn = mysqli_connect("localhost", "root","", "dev_desayunosgourmet");

if(isset($_SESSION['carrito_compras'])){
    if(isset($_POST['id_producto'])){
            $arreglo=$_SESSION['carrito_compras'];
            $encontro=false;
            $numero=0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_POST['id_producto']){
                    $encontro=true;
                    $numero=$i;
                }
            }
            if($encontro==true){
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito_compras']=$arreglo;
            }else{
                $nombre="";
                $precio=0;
                $imagen="";
                $re=mysqli_query($conn,"select * from producto where id=".$_POST['id_producto']);
                while ($f=mysqli_fetch_array($re)) {
                    $nombre=$f['nombre'];
                    $precio=$f['precio'];
                    $imagen=$f['imagen'];
                    }
                    $datosNuevos=array('Id'=>$_POST['id_producto'],
                                    'Nombre'=>$nombre,
                                    'Precio'=>$precio,
                                    'Imagen'=>$imagen,
                                    'Cantidad'=>1);

                    array_push($arreglo, $datosNuevos);
                    $_SESSION['carrito_compras']=$arreglo;

                }
    }
}else{
    if(isset($_POST['id_producto'])){
        $nombre="";
        $precio=0;
        $imagen="";
        $QUERY = "select * from producto where id=".$_POST['id_producto']."";
        $re=mysqli_query($conn,$QUERY);
        while ($f=mysqli_fetch_array($re)) {
            $nombre=$f['nombre'];
            $precio=$f['precio'];
            $imagen=$f['imagen'];
        }
        $arreglo[]=array('Id'=>$_POST['id_producto'],
                        'Nombre'=>$nombre,
                        'Precio'=>$precio,
                        'Imagen'=>$imagen,
                        'Cantidad'=>1);
        $_SESSION['carrito_compras']=$arreglo;
    }
}


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
    <title>Carrito - Desayunos Estilo Gourmet</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icono.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">

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
                    <li><a href="categorias/nacimientos.php">Nacimientos</a></li>
                    <li>
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">Feliz día</a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li >
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
            <!-- Button Group
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> 
            -->
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
                            <h2>Carrito de compras</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Valor</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody class="table-content">

                                <?php

                                    if(isset($_SESSION['carrito_compras'])){ 
                                        $datos=$_SESSION['carrito_compras'];
                                        for($i=0; $i < count($datos); $i++) { 
                                            
                                            $total += $datos[$i]["Precio"];
                                ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/productos/<?php echo $datos[$i]['Imagen'];?>" alt="Producto del carrito"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo utf8_encode($datos[$i]['Nombre']);?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo "$ ".number_format($datos[$i]["Precio"], 0, '', '.');?></span>
                                            <input type="hidden" name="precio_1" id="precio_1" value="13000">
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Cant</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" id="cant_menos_1"><i class="fa fa-minus" aria-hidden="true" style="color: red;"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" name="quantity" id="quantity" value="1">
                                                    <span class="qty-plus" id="cant_mas_1"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i></span>
                                                </div>
                                                
                                            </div>
                                            <button data-id="<?php echo $datos[$i]["Id"];?>" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger btn-sm btn-eliminar-carro">Eliminar</button>
                                        </td>
                                       
                                    </tr>
                                    <?php } }else{ ?>
                                      <tr>
                                          <td>
                                               <div>Aún no ha agregado nada a su carrito :c<div>
                                          </td>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <form action="completar_datos.php" method="POST" name="form_carro" id="form_carro">
                                <h5>Total del carro</h5>
                                <ul class="summary-table">
                                    <li>
                                        <span>subtotal:</span>
                                        <span>
                                            <span>
                                                <?php echo "$ ".number_format($total, 0, '', '.');?>
                                                <input type="hidden" name="monto_total" id="monto_total" value="<?php echo $total; ?>">
                                            </span>
                                        </span>
                                    </li>
                                    <li>
                                        <input type="checkbox" name="terms" id="terms" >
                                        <span>Acepto los <a href="documentos/terminos_condiciones_DEG.pdf" target="_blank">términos y condiciones</a></span>
                                    </li>
                                </ul>
                                <div class="cart-btn">
                                    <a href="#" onclick="document.getElementById('form_carro').submit();" class="btn amado-btn w-100">Siguiente paso</a>
                                </div>
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
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                    
                          
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
                                                Atención al cliente <br>
                                                Lunes a viernes 9:00 a 18:00 hrs - 
                                                Sábados 9:00 a 12:00 hrs.<br>
                                                <i class="fa fa-phone" aria-hidden="true">
                                                    <a id="href-footer" href="tel:+56930981530"> +56 9 3098 1530</a>
                                                </i>
                                                <br>
                                                <i class="fa fa-envelope" aria-hidden="true">
                                                    <a id="href-footer" href="mailto:ventas@desayunosestilogourmet.cl" target="_top">ventas@desayunosestilogourmet.cl</a>
                                                </i>
												<br>
												<i class="fa fa-envelope" aria-hidden="true">
                                                    <a id="href-footer" href="mailto:soporte@desayunosestilogourmet.cl" target="_top">soporte@desayunosestilogourmet.cl</a>
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

    <script>
        $(document).ready(function() {
           
        });
        
        //funcion para eliminar producto del carro
        $('.btn').click(function(){

            var id_producto = $(this).attr('data-id');
            $(this).parentsUntil('.table-content').remove();
            $.post("eliminar_producto.php",{
                Id:id_producto
            },function(response){

                if(response == '0'){
                    window.location.href="cart.php";
                }

            });

        });

    </script>
</body>

</html>