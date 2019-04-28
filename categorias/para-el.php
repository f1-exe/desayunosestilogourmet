<?php
session_start();

include '../funciones/funciones.php';
$cant_prod =  obtenerCantidadParEl();

$cantidad_productos = 0;
if(isset($_SESSION["carrito_compras"])){
    $cantidad_productos =  count($_SESSION["carrito_compras"]);
}else{
    $cantidad_productos = 0;
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
    <title>Para Él - Desayunos estilo gourmet</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/icono.ico ">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- swal include -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
  
</head>

<body>

<!--Bola flotante de carrito de compras -->
<div class="sticky-container">
            <ul class="sticky">
                <li>
                    <a href="../cart.php">
                        <img src="../img/shopping-cart.png" width="50" height="50">
                    </a>
                </li>
                <div id="contador_carro">
                    <span class="badge badge-pill badge-danger">
                        <div id="cantidad_productos">
                            <?php echo $cantidad_productos;?>
                        </div>    
                    </span>
                </div>
            </ul>
        </div>
<!--Bola flotante de carrito de compras -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="../index.php"><img src="../img/core-img/logo_deg.png" alt=""></a>
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
                <a href="../index.php"><img src="../img/core-img/logo_deg.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul id="exampleAccordion">
                    <li><a href="../index.php">Categorías</a></li>
                    <li><a href="para-ella.php">Para Ella</a></li>
                    <li class="active"><a href="para-el.php">Para Él</a></li>
                    <li><a href="cumpleanos.php">Cumpleaños</a></li>
                    <li><a href="nacimientos.php">Nacimientos</a></li>
                    <li>
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">Feliz día</a>
                        <ul class="sidenav-second-level collapse ml-20" id="collapseComponents">
                            <li >
                                <a href="dia-padre.php">Día del padre</a>
                            </li>
                            <li>
                                <a href="dia-madre.php">Día de la madre</a>
                            </li>
                            <li>
                                <a href="san-valentin.php">San valentín</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="armar-pedido.php">Arma tu pedido</a></li>
                    <li><a href="promociones.php">Promociones</a></li>
                </ul>
            </nav>
            <hr>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="../informaciones.php" class="cart-nav"><img src="../img/info-yellow.png" alt=""> Informaciones</a>
            </div> 
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
                <div class="mt-3 ml-20">
                    <h2 class="titulo-cursivo">Categorias/ Para Él</h2>
                    <p>Los mejores productos para regalonearlo a él</p>
                </div>

            <div class="amado-pro-catagory clearfix">
            <?php 

        if($cant_prod > 0) {
            $page = false;

            //examino la pagina a mostrar y el inicio del registro a mostrar
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            }

            if (!$page) {
                $start = 0;
                $page = 1;
            } else {
                $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
            }
            //calculo el total de paginas
            $total_pages = ceil($cant_prod / NUM_ITEMS_BY_PAGE);  

            //query que trae los productos 
            $resp  = listarProductosParaEl($start);

            if($resp->num_rows > 0){    
            
            while($row =  mysqli_fetch_array($resp)){ ?>
                <!-- Single Catagory -->
                
                    <div class="single-products-catagory clearfix">
                            <div class="col-sm-4 py-2">
                                    <div class="card mt-25" style="width: 18rem;">
                                            <img class="card-img-top" src="../img/productos/<?php echo $row["imagen"];?>" alt="Producto Desayuno Estilo Gourmet">
                                            <div class="card-body">
                                                
                                                <h5 class="card-title"><?php echo $row["nombre"];?></h5>
                                                <p class="card-text">
                                                    Precio :<?php echo "$ ".number_format($row['precio'], 0, '', '.');?> <br>
                                                   
                                                </p>
                                                <form name="form_detalle_prod" method="POST" action="../product-details.php">
                                                    <div style="text-align:center">

                                                        <button class="btn btn-detalle btn-sm" id="ver_detalle" name="ver_detalle">Ver detalle</button>
                                                        <input type="hidden" name="id_producto" value="<?php echo $row["id"];?>"/>
                                                        
                                                        <button onclick='modalIndex("<?php echo $row["nombre"];?>", "<?php echo $row["precio"];?>","<?php echo $row["id"];?>","<?php echo $row["imagen"]?>")' type="button" class="btn btn-warning btn-sm" style="color:white;" id="add_carro" name="add_carro">Añadir al carro</button>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                            </div>
                    </div>
              <?php } } ?>      
                   
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    
                    <!-- PAGINADOR --> 
                    <?php 
                        
                        echo '<nav aria-label="navigation" class="mr-18">';
                            echo '<ul class="pagination justify-content-end mt-50">';

                            if ($total_pages > 1) {
                                
                                if ($page != 1) {
                                    echo '<li class="page-item"><a class="page-link" href="para-el.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
                                }

                                if($page > 3 && $page < $total_pages-2){
                                    $inicio = $page-2;
                                    $final = $page+2;
                                }else if($page < 4){
                                    $inicio = 1;
                                    $final = 5;
                                }else if($page >= $total_pages-2){
                                    $inicio = $total_pages-4;
                                    $final = $total_pages;
                                }

                                for ($i=$inicio; $i<= $final ;$i++) {

                                    if($page == $i) {
                                        echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" href="para-el.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                }

                                if ($page != $total_pages) {
                                    echo '<li class="page-item"><a class="page-link" href="para-el.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
                                }
                            }
                            echo '</ul>';
                           echo '</nav>';
                          
                    } ?>
            <!-- PAGINADOR -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix mt-25">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="../index.php"><img src="../img/core-img/logo2.png" alt=""></a>
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
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
    <!--Modal para añadir al carro-->
    <script src="../js/modal_categorias/anadir_carro.js"></script> 

</body>

</html>