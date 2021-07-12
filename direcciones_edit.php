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
					<li class="active"><a href="admin_direcciones_usuario.php">Editar direcciones</a></li>
					<li><a href="admin_direcciones_usuario.php">Regresar</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Editar direcciones</h2>
			<hr />
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$idu = $_GET["idu"];
			$nik = mysqli_real_escape_string($conect,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($conect, "SELECT * FROM direcciones WHERE id ='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_direcciones_usuario.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){

  				$id = mysqli_real_escape_string($conect,(strip_tags($$_POST["id"],ENT_QUOTES)));//Escanpando caractere
  				$calle = mysqli_real_escape_string($conect,(strip_tags($_POST["calle"],ENT_QUOTES)));//Escanpando caracteres 
				$numero_exterior = mysqli_real_escape_string($conect,(strip_tags($_POST["numero_exterior"],ENT_QUOTES)));//Escanpando caracteres 
				$numero_interior = mysqli_real_escape_string($conect,(strip_tags($_POST["numero_interior"],ENT_QUOTES)));//Escanpando caracteres
				$estado	= mysqli_real_escape_string($conect,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres
				$colonia	= mysqli_real_escape_string($conect,(strip_tags($_POST["colonia"],ENT_QUOTES)));//Escanpando caracteres
				$cp	= mysqli_real_escape_string($conect,(strip_tags($_POST["cp"],ENT_QUOTES)));//Escanpando caracteres
				$municipio = mysqli_real_escape_string($conect,(strip_tags($_POST["municipio"],ENT_QUOTES)));//Escanpando caracteres


				$qry="SELECT COUNT(*) as existente FROM direcciones WHERE calle = '$calle' AND id != '$id' AND numero_exterior = '$numero_exterior' AND numero_interior = '$numero_interior' AND estado = '$estado' AND colonia = '$colonia' AND cp = '$cp' AND municipio = '$municipio'";

				#Escribe la consulta de la base de datos y se almacena en $array
  				$consulta = mysqli_query($conect,$qry);

  				#Se pasa la información a un array
  				$array=mysqli_fetch_array($consulta);

  				if($array['existente'] > 0){
  					$update = NULL;

  					$update = mysqli_query($conect, "UPDATE direcciones_usuario SET direcciones_id ='$nik' WHERE usuario_id ='$idu'") or die(mysqli_error());	
	  				header("Location: direcciones_edit.php?nik=".$nik."&pesan=sukses&idu=".$idu."");
  				}
  				else{
  					
	  				$update = mysqli_query($conect, "UPDATE direcciones SET calle='$calle', numero_exterior='$numero_exterior', numero_interior='$numero_interior', estado='$estado', colonia='$colonia', cp='$cp', municipio='$municipio' WHERE id='$nik'") or die(mysqli_error());	
	  				header("Location: direcciones_edit.php?nik=".$nik."&pesan=sukses&idu=".$idu."");
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
					<label class="col-sm-3 control-label">Calle</label>
					<div class="col-sm-4">
						<input type="text" name="calle" value="<?php echo $row ['calle']; ?>" class="form-control" placeholder="Nombre de la calle" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Número exterior</label>
					<div class="col-sm-4">
						<input type="number" name="numero_exterior" value="<?php echo $row ['numero_exterior']; ?>" class="form-control" placeholder="Número exterior" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Número exterior</label>
					<div class="col-sm-4">
						<input type="number" name="numero_interior" value="<?php echo $row ['numero_interior']; ?>" class="form-control" placeholder="Número interior">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="estado" class="form-control" required="">
							<option value="CDMX" <?php if ($row ['estado']== 'CDMX'){echo "selected";} ?>>Ciudad de México</option>
							<option value="AGS"<?php if ($row ['estado']== 'AGS'){echo "selected";} ?>>Aguascalientes</option>
							<option value="BCN"<?php if ($row ['estado']== 'BCN'){echo "selected";} ?>>Baja California</option>
							<option value="BCS"<?php if ($row ['estado']== 'BCS'){echo "selected";} ?>>Baja California Sur</option>
							<option value="CAM"<?php if ($row ['estado']== 'CAM'){echo "selected";} ?>>Campeche</option>
							<option value="CHP"<?php if ($row ['estado']== 'CHP'){echo "selected";} ?>>Chiapas</option>
							<option value="CHI"<?php if ($row ['estado']== 'CHI'){echo "selected";} ?>>Chihuahua</option>
							<option value="COA"<?php if ($row ['estado']== 'COA'){echo "selected";} ?>>Coahuila</option>
							<option value="COL"<?php if ($row ['estado']== 'COL'){echo "selected";} ?>>Colima</option>
							<option value="DUR"<?php if ($row ['estado']== 'DUR'){echo "selected";} ?>>Durango</option>
							<option value="GTO"<?php if ($row ['estado']== 'GTO'){echo "selected";} ?>>Guanajuato</option>
							<option value="GRO"<?php if ($row ['estado']== 'GRO'){echo "selected";} ?>>Guerrero</option>
							<option value="HGO"<?php if ($row ['estado']== 'HGO'){echo "selected";} ?>>Hidalgo</option>
							<option value="JAL"<?php if ($row ['estado']== 'JAL'){echo "selected";} ?>>Jalisco</option>
							<option value="MIC"<?php if ($row ['estado']== 'MIC'){echo "selected";} ?>>Michoac&aacute;n</option>
							<option value="MOR"<?php if ($row ['estado']== 'MOR'){echo "selected";} ?>>Morelos</option>
							<option value="NAY"<?php if ($row ['estado']== 'NAY'){echo "selected";} ?>>Nayarit</option>
							<option value="NLE"<?php if ($row ['estado']== 'NLE'){echo "selected";} ?>>Nuevo Le&oacute;n</option>
							<option value="OAX"<?php if ($row ['estado']== 'OAX'){echo "selected";} ?>>Oaxaca</option>
							<option value="PUE"<?php if ($row ['estado']== 'PUE'){echo "selected";} ?>>Puebla</option>
							<option value="QRO"<?php if ($row ['estado']== 'QRO'){echo "selected";} ?>>Quer&eacute;taro</option>
							<option value="ROO"<?php if ($row ['estado']== 'ROO'){echo "selected";} ?>>Quintana Roo</option>
							<option value="SLP"<?php if ($row ['estado']== 'SLP'){echo "selected";} ?>>San Luis Potos&iacute;</option>
							<option value="SIN"<?php if ($row ['estado']== 'SIN'){echo "selected";} ?>>Sinaloa</option>
							<option value="SON"<?php if ($row ['estado']== 'SON'){echo "selected";} ?>>Sonora</option>
							<option value="TAB"<?php if ($row ['estado']== 'TAB'){echo "selected";} ?>>Tabasco</option>
							<option value="TAM"<?php if ($row ['estado']== 'TAM'){echo "selected";} ?>>Tamaulipas</option>
							<option value="TLX"<?php if ($row ['estado']== 'TLX'){echo "selected";} ?>>Tlaxcala</option>
							<option value="VER"<?php if ($row ['estado']== 'VER'){echo "selected";} ?>>Veracruz</option>
							<option value="YUC"<?php if ($row ['estado']== 'YUC'){echo "selected";} ?>>Yucat&aacute;n</option>
							<option value="ZAC"<?php if ($row ['estado']== 'ZAC'){echo "selected";} ?>>Zacatecas</option>
						</select> 
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Colonia</label>
					<div class="col-sm-4">
						<input type="text" name="colonia" value="<?php echo $row ['colonia']; ?>" class="form-control" placeholder="Nombre de la ccolonia" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Código postal</label>
					<div class="col-sm-3">
						<input type="number" name="cp" value="<?php echo $row ['cp']; ?>" class="form-control" placeholder="Código postal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Municipio</label>
					<div class="col-sm-4">
						<input type="text" name="municipio" value="<?php echo $row ['municipio']; ?>" class="form-control" placeholder="Municipio" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_direcciones_usuario.php" class="btn btn-sm btn-danger">Cancelar</a>
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