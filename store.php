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

  <title>Momoh</title>

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
       &nbsp;
       <!-- Carrito de compras (icono) -->
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                    <a href="cart.php" class="site-cart">
                      <span class="fas fa-shopping-cart"></span>
                      <span class="count">
                        <?php 
                          if(isset($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                          }else{ 
                            echo 0;
                          }
                        ?>
                      </span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle">
                  <span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>
    </h1>

    <?php
      #Verifica con la variable de sesión si existen datos o no, si hay, se pasara a la variable sesión 
      if(isset($_SESSION['USUARIO'])): 
      $sesion = $_SESSION['USUARIO'];
        if($sesion == 'admin'){
          header('Location: admin.php');
        }

      /*Es un query el cual muestra o regresa el id de latabla usuario si el nombre de usuario de la sesión coincide con el nickname de la base*/
      $sql3 = "SELECT id FROM usuario WHERE nickname = '$sesion'"; 

      #Para poder realizar la query y se almacena en la variable resultado3
      $res3= mysqli_query($conect, $sql3);

      #Se alamcena en un array de registros
      ($fila3=mysqli_fetch_assoc($res3));

    ?>
      <!-- Si es que existe una sesión, solo se mostraran los botones de cerrar sesión, modificar y eliminar cuenta-->
      <div>
        <a href="logout.php" class="btn btn-xl btn-dark">Cerrar sesión</a>
        <a href="edit.php" class="btn btn-xl btn-dark">Modificar datos</a>
        <a href="delete.php?id=<?php echo $fila3['id'] ?>" class="btn btn-xl btn-dark">Eliminar cuenta</a>
          
        &nbsp; 
        <!-- Le da la bienvenida al usuario con su nombre a partir de la variable que se declaro anteriormente -->
        Bienvenid@ <?php echo $sesion; ?>
        <br><br>  
      </div>
      <?php else: ?>
      <!-- Si no existe una sesión por lo tanto apareceran los botones de iniciar sesión o registrarse-->
      <section class="content-section bg-primary text-white">
        <div class="container text-center">
          <h2 class="mb-4">¿Ya tienes cuenta? Inicia sesión o registrate</h2>
          <a href="login.php" class="btn btn-xl btn-light mr-4">Iniciar sesión</a>
          <a href="sign.php" class="btn btn-xl btn-dark">Registrarte</a>
        </div>
      </section>
    <!-- Se termina el if debido a que asi se maneja mejor la sintaxis, despues de el if, va el else y una vez completado se cierra con un endif -->
    <?php endif; ?>

      <br>

      <div class="row">

      <?php 
        /*Ya esta completada la conexión a la base de datos, ahora se realiza el query para mostrar el catalogo. Ahora se hace una seleccion de todos los datos de la tabla productos ordenadas por su id en el cual el limite de productos despejados sera 8
        */
        $sql = "SELECT * FROM productos order by id limit 8"; 

        /*Para poder realizar la query, se realiza el query junto con la conexión a la base y se coloca en la variable resultado*/
        $res= mysqli_query($conect, $sql);

        /*Se coloca todos los regiistros en una array de filas y se imprimira lo que esta dentro del while hasta que se recorra toda la base de datos. Esto quiere decir que seleccionara registro por registro y desplegara cada uno de sus datos, producto por producto*/
        while($fila=mysqli_fetch_assoc($res)){
       ?>

      <!-- Es un contenedor de columnas para mostrar los datos -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
          <!-- Imprime la imagen a partir de el link que se encuentra en la base de datos -->
          
          <a href="shop_single.php?id=<?php echo $fila['id']; ?>">
            <img class="card-img-top" src="img/<?php echo$fila['imagen'] ?>" alt="">
          </a>  
          <div class="card-body">
            <h4 class="card-title">
              <!-- Se imprime el nombre de el articulo dependiendo en el registro en el que se encuentre -->
              <p><?php echo $fila['nombre'] ?></p>
              <p>Precio: $<?php echo $fila['precio'] ?></p>
            </h4>
            <p class="card-text"><?php echo $fila['stock'] ?></p>        
            <p class="card-text"><?php echo $fila['descripcion'] ?></p>
          </div>
          <?php 
          $stock_2 = $fila['stock'];
          ?>
          <?php if ($stock_2 == 'No disponible'): ?>
            <a href="#" style="margin-bottom: 0; pointer-events: none; cursor: default;" class="btn btn-xl btn-dark ">No se puede agregar</a>    
          <?php else: ?>
            <a href="cart.php?id=<?php echo $fila['id']; ?>" style="margin-bottom: 0;" class="btn btn-xl btn-dark ">Agregar al carrito</a>
          <?php endif ?>
        </div>
      </div>
      <!-- /.row -->
      <!-- Se termina el while, esto quiere decir que se recorrio cada registro (articulo) -->
      <?php } ?>

      </div>

  </div>
  
  <!-- Es el pie de página, aquí se se hace un contenedor con listas, se genera un botón para llevar al usuario a la determinada, ya sea WhatsApp, Instagram o Facebook. Se uso la etiqueta <i> para colocaar los logos descargados en la carpeta del proyecto -->
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/StudioMomoh">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/studiomomoh/">
            <i class="icon-social-instagram"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <!-- Se envia a la página html de whatsapp.html -->
          <a class="social-link rounded-circle text-white" href="whatsapp.html">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
      <!-- Es el nombre de la pagina junto con el logo de Copyright -->
      <p class="text-muted small mb-0">Copyright &copy; Studio Momoh</p>
    </div>
  </footer>

  <!-- Boton para subir--> 
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>

</body>
</html>
