<?php 
session_start();
if(!isset($_SESSION['carrito'])){
  header('Location: store.php');
}
$arreglo = $_SESSION['carrito'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Confirmación de pedido</title>
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
    <form action="thankyou.php" method="post">
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border p-4 rounded" role="alert">
              </div>
            </div>
          </div>
          <div class="row">
          
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Detalles de envio</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="calle" class="text-black">Calle <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="calle" name="calle" placeholder="" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="numero_exterior" class="text-black">Número Exterior<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="numero_exterior" name="numero_exterior" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="numero_interior" class="text-black">Número interior<span class="text-danger"></span></label>
                    <input type="number" class="form-control" id="numero_interior" name="numero_interior">
                  </div>
                </div>

                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="estado" class="text-black">Estado <span class="text-danger">*</span></label>
                      <select id="estado" class="form-control" name="estado" required="">
                     <option value="CDMX">Ciudad de México</option>
                      <option value="AGS">Aguascalientes</option>
                      <option value="BCN">Baja California</option>
                      <option value="BCS">Baja California Sur</option>
                      <option value="CAM">Campeche</option>
                      <option value="CHP">Chiapas</option>
                      <option value="CHI">Chihuahua</option>
                      <option value="COA">Coahuila</option>
                      <option value="COL">Colima</option>
                      <option value="DUR">Durango</option>
                      <option value="GTO">Guanajuato</option>
                      <option value="GRO">Guerrero</option>
                      <option value="HGO">Hidalgo</option>
                      <option value="JAL">Jalisco</option>
                      <option value="MIC">Michoac&aacute;n</option>
                      <option value="MOR">Morelos</option>
                      <option value="NAY">Nayarit</option>
                      <option value="NLE">Nuevo Le&oacute;n</option>
                      <option value="OAX">Oaxaca</option>
                      <option value="PUE">Puebla</option>
                      <option value="QRO">Quer&eacute;taro</option>
                      <option value="ROO">Quintana Roo</option>
                      <option value="SLP">San Luis Potos&iacute;</option>
                      <option value="SIN">Sinaloa</option>
                      <option value="SON">Sonora</option>
                      <option value="TAB">Tabasco</option>
                      <option value="TAM">Tamaulipas</option>
                      <option value="TLX">Tlaxcala</option>
                      <option value="VER">Veracruz</option>
                      <option value="YUC">Yucat&aacute;n</option>
                      <option value="ZAC">Zacatecas</option>  
                  </select>
                  </div>

                  <div class="col-md-6">
                    <label for="colonia" class="text-black">Colonia<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="colonia" name="colonia" placeholder="" required="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="cp" class="text-black">CP<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="cp" name="cp" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="municipio" class="text-black">Municipio <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="municipio" name="municipio" required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Su orden</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Producto(s)</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                      <?php
                        $total = 0; 
                        for($i=0;$i<count($arreglo);$i++){
                          $total =$total+ ($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
                        
                      ?>
                        <tr>
                          <td>$<?php echo $arreglo[$i]['Nombre'];?> </td>
                          <td>$<?php echo  number_format($arreglo[$i]['Precio'], 2, '.', '');?></td>
                        </tr>
                    
                        <?php 
                          }
                        ?>
                        <tr>
                          <td>Order Total</td>
                          <td>$<?php echo number_format($total, 2, '.', '');?></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia bancaria</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">Puede realizar una transferencia electronia o de manera fisica en cualquier banco.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Tarjeta de debito/credito</a></h3>

                      <div class="collapse" id="collapsecheque">
                        <div class="py-2">
                          <p class="mb-0">Contamos con MSI a partir de 2,000$.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                          <p class="mb-0">¡Usa Paypal y aprovecha los grandes descuentos!</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.php">Pedir orden</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </form>           
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