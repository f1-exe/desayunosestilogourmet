<?php
session_start();

$now = time();

if(isset($_SESSION["expire"]) || empty($_SESSION["expire"]) == false){
  if ($now > $_SESSION['expire']) {
    session_unset();
    session_destroy();
    header("location: index.php");
  }
}

include 'funciones/funciones.php';

$listarCategorias = listarCategorias();

$usuario = "";

if(isset($_SESSION["session_usuario"]) || empty($_SESSION["session_usuario"]) == false){
  $usuario = $_SESSION["session_usuario"];
}

?>
<!doctype html>
<html class="no-js h-100" lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio Panel de administración</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- swal include -->
    <link href="css/animate.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    <!-- logout script -->
    <script src="js/login/logout.js"></script>
    
  </head>
  <body class="h-100">
    <input id="session" type="hidden" value="<?php echo $usuario;?>">
    <script>
     // validaSesion();

         $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
               var input = $(this),
                   numFiles = input.get(0).files ? input.get(0).files.length : 1,
                   label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
               input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
               $(':file').on('fileselect', function(event, numFiles, label) {

                  var input = $(this).parents('.input-group').find(':text'),
                      log = numFiles > 1 ? numFiles + ' Archivos Seleccionados' : label;

                  if( input.length ) {
                     input.val(log);
                  } else {
                     if( log ) alert(log);
                  }
               });
            });
         });
    </script>
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Panel de Administración</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <!--<form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>-->
          <div class="nav-wrapper">
            <ul class="nav flex-column" id="exampleAccordion">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <i class="material-icons">home</i>
                  <span>Inicio</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                  <i class="material-icons">vertical_split</i>
                  <span>Productos</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                  <li class="nav-item">
                    <a class="nav-link " href="listarProductos.php">
                      <i class="material-icons">list</i>
                      <span>Listar</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="agregarProducto.php">
                      <i class="material-icons">add</i>
                      <span>Agregar</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="transacciones.php">
                  <i class="material-icons">credit_card</i>
                  <span>Transacciones</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="stock.php">
                  <i class="material-icons">shopping_cart</i>
                  <span>Stock</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <!--<div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">--> </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatar.png" alt="User Avatar">
                    <span class="d-none d-md-inline-block">Administrador</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    
                    <a class="dropdown-item text-danger" href="#" onclick="logout()">
                      <i class="material-icons text-danger">&#xE879;</i> Cerrar Sesión </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Panel de Administración</span>
                <h3 class="page-title">Productos / Agregar Producto</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <div class="col-sm-12 col-md-12" style="text-align: left;">
              <br><strong class="text-muted d-block mb-2">Complete el formulario para crear un producto</strong><br>
              <div class="col-sm-8 col-md-12 col-lg-8">
                <form id="formAgregar">
                  <div class="form-row">
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8" id="entrada">
                      <input id="nombre" type="text" class="form-control" placeholder="Nombre del Producto">
                    </div>
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8" id="entrada">
                      <input id="precio" type="text" class="form-control" placeholder="Precio">
                    </div>
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8" id="entrada">
                      <input id="stock" type="text" class="form-control" placeholder="Stock" >
                    </div>
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8" id="entrada">
                      <select id="inputState" class="form-control">
                        <option value="0" selected>Seleccione una Categoria</option>
                        <?php while($row = mysqli_fetch_array($listarCategorias)){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['nombre']); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="input-group" id="archivo">
                        <label class="input-group-btn">
                          <span class="btn btn-primary"><i class="fa fa-cloud-upload icon-left"></i> Examinar &hellip; <input type="file" style="display: none;" multiple>
                          </span>
                        </label>
                        <input type="text" class="form-control" value="caca" readonly>
                      </div>
                    <div class="form-group custom-file col-md-10 col-12 col-lg-10 col-xl-8">
                      
                      <!--<input type="file" class="form-control custom-file-input" id="customFileLang" lang="es" accept="image/*">
                      <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>-->
                    </div>
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8" id="entrada">
                      <textarea id="detalle" class="form-control" placeholder="Detalles" rows="14"></textarea>
                    </div>
                    <div class="form-group col-md-10 col-12 col-lg-10 col-xl-8">
                      <button id="agregar" name="agregar" class="btn btn-primary submit">Crear Producto</button>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>


          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listarProductos.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transacciones.php">Transacciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="stock.php">Stock</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
              <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
            </span>
          </footer>
        </main>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/producto/agregar.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
  </body>
</html>