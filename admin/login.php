<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login panel de administración Desayuno Gourmet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css/loader.css">
<!--===============================================================================================-->
</head>
<body>
<div class="loader" id="loader"></div>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/breakfast.jpg');">
			<div class="wrap-login100 p-t-70 p-b-30">
				<div class="contenedor_formulario">
					<form class="login100-form validate-form" method="POST" action="">
						<div class="login100-form-avatar">
							<img src="images/avatar.png" alt="AVATAR">
						</div>

						<span class="login100-form-title p-t-20 p-b-45">
							Panel de administración
						</span>

						<div class="wrap-input100 validate-input m-b-10">
							<input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10">
							<input class="input100" type="password" name="clave" id="clave" placeholder="Contraseña">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>

						<div class="container-login100-form-btn p-t-10">
							<button class="login100-form-btn" id="btn_login">
								Login
							</button>
						</div>

						<div class="text-center w-full p-t-25 p-b-5">
							<a href="#" class="txt1">
								Olvidaste tu Usuario / Contraseña?
							</a>
						</div>
					</form>
			  </div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
	<script src="js/login/login.js"></script>
<!--===============================================================================================-->	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    

</body>
</html>