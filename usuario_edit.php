<?php
include("conect.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : http://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
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
					<li class="active"><a href="admin_usuario.php">Editar usuario</a></li>
					<li><a href="admin_usuario.php">Regresar</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar usuario</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($conect,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($conect, "SELECT * FROM usuario WHERE id ='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_usuario.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){

				$id = $_POST["id"];
				$nickname = $_POST["nickname"];

				$qry="SELECT COUNT(*) as existente FROM usuario WHERE nickname = '$nickname' AND id != '$id'";

				#Escribe la consulta de la base de datos y se almacena en $array
  				$consulta = mysqli_query($conect,$qry);

  				#Se pasa la información a un array
  				$array=mysqli_fetch_array($consulta);

  				if($array['existente'] > 0){
  					$update = NULL;
  					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ese usaurio ya existe.</div>';
  				}

  				else{
	  				$password	 = mysqli_real_escape_string($conect,(strip_tags($_POST["password"],ENT_QUOTES)));//Escanpando caracteres 
					$nombre	 = mysqli_real_escape_string($conect,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
					$fecha	     = mysqli_real_escape_string($conect,(strip_tags($_POST["fecha"],ENT_QUOTES)));//Escanpando caracteres 
					$email		 = mysqli_real_escape_string($conect,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres

	  				$update = mysqli_query($conect, "UPDATE usuario SET nickname='$nickname', password='$password', nombre='$nombre', fecha='$fecha', email='$email' WHERE id='$nik'") or die(mysqli_error());	
	  				header("Location: usuario_edit.php?nik=".$nik."&pesan=sukses");
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
					<label class="col-sm-3 control-label">Nombre de usuario</label>
					<div class="col-sm-4">
						<input type="text" name="nickname" value="<?php echo $row ['nickname']; ?>" class="form-control" placeholder="Nombre de usuario" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contraseña</label>
					<div class="col-sm-4">
						<input type="password" name="password" value="<?php echo $row ['password']; ?>" class="form-control" placeholder="Contraseña" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de nacimiento</label>
					<div class="col-sm-3">
						<input type="date" name="fecha" value="<?php echo $row ['fecha']; ?>" class="form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_usuario.php" class="btn btn-sm btn-danger">Cancelar</a>
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