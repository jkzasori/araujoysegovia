<?php
require_once("../Controllers/producto.php");
require_once("../Models/producto.php");
require_once("../Models/categoria.php");
        $crud = new Producto();
       // $crud -> Update_Crud();
        
       ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba Técnica</title>
	<!-- Meta tags-->
	<meta name="description" content="Sistema de Calificación para peliculas">
	<meta name="keywords" content="CINE, cine, calificación de películas, sistema de películas, test">
	<meta name="author" content="José Támara">
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<!-- CSS -->
   <link rel="stylesheet" type="text/css" href="fonts/icon.css?v=0.11">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- data table style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    <!-- Our CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="row header bg-primary text-center ">
	<div class="line col-12 Shadow">
		<div class="title ">
			<span class="SCP"> <a href="/pruebatecnica" class="link">PRUEBA TÉCNICA</a> </span>
		</div>
		<div class="sub-title text-right">
			TEST - Araujo y Segovia
		</div>
	</div>
</div>
<div class="container content-box">
	<div class="row text-center">
		<div class="col-12 col-md-6 SignUp Shadow">
			<h2>EDITAR PRODUCTO</h2>
			<h3><a href="http://localhost/pruebatecnica" class="p-1" style="border:2px solid white; color: black;font-weight: bold;"> HOME </a></h3>
			  <!-- Trigger the modal with a button -->
		  
		</div>
		<div class="col-12 LogIn col-md-6 Shadow">
			<h2>¡EN HORA BUENA POR USAR NUESTRO SISTEMA!</h2>
		</div>	
	</div>
	
 </div>
 <div class="container" style="margin-top: 20px;">
 	<?php
 		$crud-> editarProducto();
		$crud -> producto_id();
	?>
 </div>
	<script type="text/javascript" src="js/validate.js"></script>
</body>
</html>