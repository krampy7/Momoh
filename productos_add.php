<?php
include("conect.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar usuario</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Inicio</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav ">
					<li class="active"><a href="admin_productos.php">Agregar producto</a></li>
					<li><a href="admin_productos.php">Regresar</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Agregar producto</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$nombre = $_POST['nombre'];
				

				$qry="SELECT COUNT(*) as existente FROM productos WHERE nombre = '$nombre'";

				#Escribe la conectsulta de la base de datos y se almacena en $array
  				$consulta = mysqli_query($conect,$qry);
  				#Se pasa la información a un array
  				$array=mysqli_fetch_array($consulta);
  				if($array['existente'] > 0){
  					$update = NULL;
  					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ese producto ya existe.</div>';
  				}
  				else{
  					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$imagen = $_POST['imagen'];
					$stock = $_POST['stock'];
					$categoria = $_POST['categoria'];

					$insert = mysqli_query($conect, "INSERT INTO productos(nombre, descripcion, precio, imagen, stock, id_categoria)VALUES('$nombre', '$descripcion', '$precio', '$imagen', '$stock', '$categoria')") or die(mysqli_error());
  				}
  				if(isset($insert)){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre de producto" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-3">
						<textarea name="descripcion" class="form-control" placeholder="Descripción" required=""></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Precio</label>
					<div class="col-sm-4">
						<input type="number" name="precio" class="form-control" placeholder="Precio" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Imagen</label>
					<div class="col-sm-4">
						<input type="file" name="imagen" class="form-control" placeholder="Imagen">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Stock</label>
					<div class="col-sm-3">
						<select name="stock" class="form-control" required="">
							<option value="Disponible">Disponible</option>
							<option value="No disponible">No disponible</option>
						</select> 
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Categoria</label>
					<div class="col-sm-3">
						<input type="number" name="categoria" class="form-control" placeholder="Num. de Categoria" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_productos.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>
