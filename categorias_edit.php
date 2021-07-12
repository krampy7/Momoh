<?php
include("conect.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de categorias</title>

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
					<li class="active"><a href="admin_categorias.php">Editar categoria</a></li>
					<li><a href="categorias_add.php">Agregar categoria</a></li>
					<li><a href="admin_categorias.php">Regresar</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar categoria</h2>
			<hr />
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($conect,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($conect, "SELECT * FROM categorias WHERE id ='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_categorias.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){

				$id = mysqli_real_escape_string($conect,(strip_tags($_POST["id"],ENT_QUOTES)));//Escanpando caractere
  				$nombre = mysqli_real_escape_string($conect,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 

				$qry="SELECT COUNT(*) as existente FROM categorias WHERE nombre = '$nombre' AND id != '$id'";

				#Escribe la consulta de la base de datos y se almacena en $array
  				$consulta = mysqli_query($conect,$qry);

  				#Se pasa la información a un array
  				$array=mysqli_fetch_array($consulta);

  				if($array['existente'] > 0){
  					$update = NULL;
  					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Esa categoria ya existe.</div>';
  				}

  				else{

	  				$update = mysqli_query($conect, "UPDATE categorias SET nombre='$nombre' WHERE id='$nik'") or die(mysqli_error());	
	  				header("Location: categorias_edit.php?nik=".$nik."&pesan=sukses");
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
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre de categoria" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_categorias.php" class="btn btn-sm btn-danger">Cancelar</a>
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