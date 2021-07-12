<?php
include("conect.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de usuarios</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>
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
					<li class="active"><a href="admin_productos.php">Editar producto</a></li>
					<li><a href="productos_add.php">Agregar producto</a></li>
					<li><a href="admin_productos.php">Regresar</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar productos</h2>
			<hr />
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($conect,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($conect, "SELECT * FROM productos WHERE id ='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_productos.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){

				$id = $_POST["id"];
				$nombre = $_POST["nombre"];

				$qry="SELECT COUNT(*) as existente FROM productos WHERE nombre = '$nombre' AND id != '$id'";

				#Escribe la consulta de la base de datos y se almacena en $array
  				$consulta = mysqli_query($conect,$qry);

  				#Se pasa la información a un array
  				$array=mysqli_fetch_array($consulta);

  				if($array['existente'] > 0){
  					$update = NULL;
  					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ese producto ya existe.</div>';
  				}

  				else{
  					
  					$imagen_aux = $_POST['imagen'];
  					
  					if($imagen_aux == ""){
  						$imagen_aux =  $row ['imagen'];
  					}
  					else{
  					}

  					$imagen = mysqli_real_escape_string($conect,(strip_tags($imagen_aux,ENT_QUOTES)));//Escanpando caractere
  					$descripcion	 = mysqli_real_escape_string($conect,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
					$precio	 = mysqli_real_escape_string($conect,(strip_tags($_POST["precio"],ENT_QUOTES)));//Escanpando caracteres 
					$stock		 = mysqli_real_escape_string($conect,(strip_tags($_POST["stock"],ENT_QUOTES)));//Escanpando caracteres
					$id_categoria		 = mysqli_real_escape_string($conect,(strip_tags($_POST["id_categoria"],ENT_QUOTES)));//Escanpando caracteres

	  				$update = mysqli_query($conect, "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', stock='$stock', precio='$precio', id_categoria='$id_categoria' WHERE id='$nik'") or die(mysqli_error());	
	  				header("Location: productos_edit.php?nik=".$nik."&pesan=sukses");
  				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<div class="col-sm-4">
						<input type="text" name="id" value="<?php echo $row ['id']; ?>" class="form-control" placeholder="Id" required style="display: none;" readonly required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre de producto" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-3">
						<textarea name="descripcion" class="form-control" placeholder="Descripción" required=""><?php echo $row ['descripcion']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Precio</label>
					<div class="col-sm-4">
						<input type="number" name="precio" value="<?php echo $row ['precio']; ?>" class="form-control" placeholder="Precio" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Imagen</label>
					<div class="col-sm-4">
						<img class="card-img-top" src="img/<?php echo$row['imagen'] ?>" width="100" height="100" alt=""> 
						<input type="file" value="<?php echo $row ['imagen']; ?>" name="imagen" class="form-control" placeholder="Imagen">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Stock</label>
					<div class="col-sm-3">
						<select name="stock" class="form-control" required="">
							<option value="Disponible" <?php if ($row ['stock']== 'Disponible'){echo "selected";} ?>>Disponible</option>
							<option value="No disponible" <?php if ($row ['stock']== 'No disponible'){echo "selected";} ?>>No disponible</option>
						</select> 
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Categoria</label>
					<div class="col-sm-3">
						<input type="number" name="id_categoria" value="<?php echo $row ['id_categoria']; ?>" class="form-control" placeholder="id_categoria" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
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