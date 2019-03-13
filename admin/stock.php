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
$listaProductos = listarProductos();

$usuario = "";

if(isset($_SESSION["session_usuario"]) || empty($_SESSION["session_usuario"]) == false){
  $usuario = $_SESSION["session_usuario"];
}
?>
<!doctype html>
<html class="no-js h-100" lang="en">
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
    <link rel="stylesheet" href="css/categorias.css">
    <!-- Ordenar columans tablas CSS -->
    <link rel="stylesheet" href="css/tabla.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- swal include -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    <!-- logout script -->
    <script src="js/login/logout.js"></script>
  </head>
  <body class="h-100">
    <input id="session" type="hidden" value="<?php echo $usuario;?>">
    <script>
      validaSesion();
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
                  <li class="nav-item">
                    <a class="nav-link " href="editarProducto.php">
                      <i class="material-icons">edit</i>
                      <span>Editar</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="eliminarProducto.php">
                      <i class="material-icons">delete</i>
                      <span>Eliminar</span>
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
                <h3 class="page-title">Stock de Productos</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <div class="table-responsive">
                      <table class="table table-striped mb-0" width="100%" cellspacing="0">
                        <thead class="bg-light">
                          <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0">Nombre</th>
                            <th scope="col" class="border-0">Categoria</th>
                            <th scope="col" class="border-0">Precio</th>
                            <th scope="col" class="border-0">Stock</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($row = mysqli_fetch_array($listaProductos)){ 
                            if($row['stock'] < 5){
                          ?>
                            <tr class="table-danger">
                          <?php }else{ ?>
                            <tr>
                          <?php } ?>
                              <td><?php echo $row['idP']; ?></td>
                              <td><?php echo $row['nombreP']; ?></td>

                              <?php if($row['idC'] == 1){?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-primary"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 2){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-secondary"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 3){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-success"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 4){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-danger"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 5){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-warning"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 6){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-info"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 7){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-violet"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 8){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-dark"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php }elseif($row['idC'] == 9){ ?>
                                <td><a href="#" class="card-post__category badge badge-pill badge-orange"><?php echo utf8_encode($row['nombreC']); ?></a></td>
                              <?php } ?>

                              <td><?php echo "$ ".number_format($row['precio'], 0, '', '.'); ?></td>
                              <td><?php echo $row['stock'];?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="js/tabla.js"></script>
  </body>
</html>