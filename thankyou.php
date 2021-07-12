<?php 
session_start();
include 'conect.php';
$id_usuario = $_SESSION['USUARIO'];
if(!isset($_SESSION['carrito'])){header("Location: store.php");} 
$arreglo  = $_SESSION['carrito'];
$total= 0;
for($i=0; $i<count($arreglo);$i++){
  $total = $total+($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$sql3 = "SELECT id FROM usuario WHERE nickname = '$id_usuario'"; 

#Para poder realizar la query y se almacena en la variable resultado3
$res3= mysqli_query($conect, $sql3);

#Se alamcena en un array de registros
($fila3=mysqli_fetch_assoc($res3));

$user = $fila3['id'];

$fecha = date('Y-m-d h:m:s');
$conect -> query("insert into ventas(id_usuario,total,fecha) values('$user',$total,'$fecha')")or die($conect->error);
$id_venta = $conect ->insert_id;

for($i=0; $i<count($arreglo);$i++){
  $conect -> query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal) 
    values(
      $id_venta,
      ".$arreglo[$i]['Id'].",
      ".$arreglo[$i]['Cantidad'].",
      ".$arreglo[$i]['Precio'].",
      ".$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']."
      ) ")or die($conect->error);  
}

$conect->query(" insert into direcciones(calle,numero_exterior, numero_interior,estado,colonia,cp, municipio) values
      (
        '".$_POST['calle']."',
        '".$_POST['numero_exterior']."',
        '".$_POST['numero_interior']."',
        '".$_POST['estado']."',
        '".$_POST['colonia']."',
        '".$_POST['cp']."',
        '".$_POST['municipio']."'
      )  
      ")or die($conect->error);
      $direcciones_id = $conect ->insert_id;
  
$conect->query(" insert into direcciones_usuario(direcciones_id, usuario_id) values
      (
        $direcciones_id,
        '$user'
      )  
      ")or die($conect->error);
      
unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Gracias!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="img/check.png" width="500" height="500" alt="">
            <h2 class="display-3 text-black">Muchisimas gracias!</h2>
            <p class="lead mb-5">Su orden fue concretada.</p>
            <a href="store.php">Regresar</a>
          </div>
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