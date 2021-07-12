<?php

  #Se inicia la sesión 
  session_start();

  #Se realiza la conexión a la base de datos
  include 'conect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">

  <!-- Barra de navegación -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top">Tienda Online</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="index.html">Momoh</a>
      </li>
    </ul>
  </nav>

  <!-- Contenedor -->
  <div class="container">
      
    <h1 class="my-4">Momoh
      <small>Store</small>
    </h1>
	
	<section class="content-section bg-primary text-white">
    	<div class="container text-center">
        	<h2 class="mb-4">Bienvenido administrador!</h2>
  			<br>
  			<h2 class="mb-4">¿Que datos desea ver o editar?</h2>
          <a href="admin_categorias.php" class="btn btn-xl btn-dark">Categorías</a>
          <a href="admin_direcciones_usuario.php" class="btn btn-xl btn-dark">Direcciones de usuarios</a>
          <a href="admin_productos.php" class="btn btn-xl btn-dark">Productos</a>
          <a href="admin_ventas.php" class="btn btn-xl btn-dark">Ventas</a>
          <a href="admin_usuario.php" class="btn btn-xl btn-dark">Usuarios</a>
          <a href="logout.php" class="btn btn-xl btn-light mr-4">Salir</a>
      </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>

</body>
</html>
