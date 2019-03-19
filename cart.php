<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
    <!--Estilo del date Picker-->
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    
    

    <style>
        #delivery_span{
            display: none;
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

   

    <script>

        function valores(){

            //validacion de terminos  condiciones
            var terms_conds = $('#terms').prop('checked');

            //cambiar por swal luego
            if(!terms_conds){
                alert('Para comprar debes aceptar los términos y condiciones');
                return false;
            }

            var precio_1 =  parseInt(document.getElementById("precio_1").value);
            var precio_2 =  parseInt(document.getElementById("precio_2").value);
            var precio_3 =  parseInt(document.getElementById("precio_3").value);

           

            console.log("precios 1-->"+precio_1+"precios 2-->"+precio_2+"precios 3-->"+precio_3);

           

            sum =  precio_1 + precio_2 + precio_3;

            console.log('total _--->'+sum);



            return sum;


        }

        function subtotalmenos(){
            var operacion = 0;
            var precio_1 =  parseInt(document.getElementById("precio_1").value);
            

            var  qty =  parseInt(document.getElementById("qty").value);
            document.getElementById("qty").value = qty-1;

            //asi se rescata el valor dentro de un div
            var val_actual = parseInt(document.getElementById('subtotal').innerHTML);      

            console.log('valor del div --->'+val_actual);

             operacion =  val_actual - precio_1;

             console.log("operacion --->" + operacion);

             document.getElementById("subtotal").innerHTML = operacion;
             document.getElementById("total").innerHTML = operacion;

        }

        function subtotalmas(){

            var sub_operacion = 0;
            var total = 0;
            var precio_1 =  parseInt(document.getElementById("precio_1").value);
            
            console.log("precio 1 ---->"+precio_1);

            var  qty = parseInt(document.getElementById("qty").value);
            document.getElementById("qty").value = qty + 1;

            console.log("qty -->"+qty);

            sub_operacion = precio_1 * qty;

            console.log("sub_operacion --->" + sub_operacion);

            total =  valores() + sub_operacion;

            console.log("total --->" + total);


            document.getElementById("subtotal").innerHTML = total;
            document.getElementById("total").innerHTML = total;
            
            return total;


        }



        function delivery_si(){
            var val_con_delivery = 0;
            var delivery =  document.getElementById("delivery").value;

            var val_actual =  parseInt(document.getElementById("subtotal").innerHTML);

            console.log('delivery valor -->' + delivery);
            
            if(delivery ==   0){

                val_con_delivery =  val_actual + 5000;
            }

            console.log('valor con delivery --->' + val_con_delivery);

           //se muestra el valor adicional por delivery
           $("#delivery_span").show(1000);

           document.getElementById("total").innerHTML = val_con_delivery;
          
        }

        function delivery_no(){
            var val_sin_delivery = 0;
            var delivery =  document.getElementById("delivery").value;

            console.log('delivery valor -->' + delivery);

            var val_actual =  parseInt(document.getElementById("subtotal").innerHTML);

            if(delivery == 1){
                val_sin_delivery =  val_actual - 5000;
            }
            
            if(delivery ==   0){

                val_sin_delivery =  val_actual;
            }

            console.log('valor sin  delivery --->' + val_sin_delivery);

            //se oculta el valor adicional por delivery
            $("#delivery_span").hide(1000);

            document.getElementById("total").innerHTML = val_sin_delivery;

        }
      


    </script>

</head>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
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
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
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
                            <h2>Carro de compras</h2>
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
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/cart1.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>White Modern Chair</h5>
                                        </td>
                                        <td class="price">
                                            <span>$13.000</span>
                                            <input type="hidden" name="precio_1" id="precio_1" value="13000">
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Cant</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" id="cant_menos_1" onclick="subtotalmenos()"><i class="fa fa-minus" aria-hidden="true" style="color: red;"></i></span>
                                                    <input type="number" class="qty-text" id="qty" step="1" name="quantity" id="quantity" value="1">
                                                    <span class="qty-plus" id="cant_mas_1" onclick="subtotalmas()"><i class="fa fa-plus" aria-hidden="true" style="color:green"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/cart2.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>$10.000</span>
                                            <input type="hidden" name="precio_2" id="precio_2" value="10000">
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Cant</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" max="300" name="quantity" id="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/cart3.jpg" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>$10.000</span>
                                            <input type="hidden" name="precio_3" id="precio_3" value="10000">
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Cant</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty3" step="1" min="1" max="300" name="quantity"  id="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Total del carro</h5>
                            <ul class="summary-table">
                                <li>
                                    <span>subtotal:</span>
                                    <span>
                                        <div id="subtotal"></div>
                                    </span>
                                </li>
                                <li>
                                    <span>delivery:</span> 
                                    <span>
                                       <input onclick="delivery_si()" type="radio" name="delivery" id="delivery" value="0">Sí
                                       <input onclick="delivery_no()" type="radio" name="delivery" id="delivery" value="1">No
                                    </span>
                                </li>
                                <div id="delivery_span">
                                    <li>
                                        <span>Comuna:</span>
                                        <select name="cbo_delivery" id="cbo_delivery" class="selectpicker">
                                            <option value="0">Seleccione Comuna</option>
                                            <?php $i=1; while($i<=4){ ?>
                                                <option value="<?php echo 'comuna_'.$i; ?>">
                                                    <?php echo 'Comuna - '.$i; ?>
                                                </option>
                                            <?php $i++; } ?>    
                                        </select>
                                    </li>
                                    <li>
                                        <div id="tooltip">
                                            <span>Fecha(*):</span>
                                            <span id="tooltiptext">El delivery está disponible 48hrs después del dia de la compra.</span>
                                        </div>                                    
                                        <div class="input-group date" id="form_date" data-date-format="dd/mm/yyyy">
                                                <input class="form-control" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </li>
                                    <li>
                                        <span>Valor delivery:</span>
                                        <span>+ $5.000</span>
                                    </li>
                                </div>
                                <li>
                                     <span>total:</span>
                                     <span>
                                        <div id="total"></div> 
                                     </span>
                                </li>
                                <li>
                                    <input type="checkbox" name="terms" id="terms" >
                                    <span>Acepto los <a href="terminos.cl" target="_blank">términos y condiciones</a></span>
                                </li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="#" onclick="valores()" class="btn amado-btn w-100">Ir a comprar</a>
                            </div>
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
                            <div class="d-flex justify-content-between">
                       
                                <a id="href-footer" href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a id="href-footer" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a id="href-footer" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a id="href-footer" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
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
                                                Lunes a viernes 9:00 a 20:00 hrs - 
                                                Sábados 9:00 a 12:00 hrs.<br>
                                                <i class="fa fa-phone" aria-hidden="true">
                                                    <a id="href-footer" href="tel:+56912345678"> +56 9 1234 5678</a>
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
    <!-- DatePicker Bootstrap js -->
    <script src="js/bootstrap-datetimepicker.js"></script>
    <!--Date Picker en español-->
    <script src="js/bootstrap-datetimepicker.es.js"></script>

    <script type="text/javascript">
      //$("#mydate").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", new Date());
      $('#form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
        icons: { 
             date: "fa fa-calendar",
             up: "fa fa-arrow-up",
             down: "fa fa-arrow-down"
        },
        startDate: '+3d'
    });
    </script>

</body>

</html>