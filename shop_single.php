<?php

  #Se inicia la sesión 
  session_start();

  #Se realiza la conexión a la base de datos
  include 'conect.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">

    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <?php 

  $id_prod = $_GET['id'];

  $sql = "SELECT * FROM productos WHERE id = '$id_prod'"; 

  /*Para poder realizar la query, se realiza el query junto con la conexión a la base y se coloca en la variable resultado*/
  $res= mysqli_query($conect, $sql);

  /*Se coloca todos los regiistros en una array de filas y se imprimira lo que esta dentro del while hasta que se recorra toda la base de datos. Esto quiere decir que seleccionara registro por registro y desplegara cada uno de sus datos, producto por producto*/
  $fila=mysqli_fetch_assoc($res);

   ?>

  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img class="card-img-top" src="img/<?php echo$fila['imagen'] ?>" alt="" width="400" height="400" alt="">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila['nombre'] ?></h2>
            <p><?php echo $fila['descripcion'] ?></p>
            <p><?php echo $fila['stock'] ?></p>
            <p><strong class="text-primary h4"><?php echo $fila['precio'] ?>$</strong></p>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <?php 
            $stock_2 = $fila['stock'];
            ?>
            <?php if ($stock_2 == 'No disponible'): ?>
              <a href="#" style="margin-bottom: 0; pointer-events: none; cursor: default;" class="buy-now btn btn-sm btn-primary">No se puede agregar</a>    
            <?php else: ?>
              <a href="cart.php?id=<?php echo $fila['id']; ?>" style="margin-bottom: 0;" class="buy-now btn btn-sm btn-primary">Agregar al carrito</a>
            <?php endif ?>

          </div>
        </div>
      </div>
    </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>