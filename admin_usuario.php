<?php
  #Se inicia la sesión 
  session_start();

  #Se realiza la conexión a la base de datos
  include 'conect.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminar o editar usuarios</title>


	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

 	 <!-- Bootstrap Core CSS -->
  	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  	<!-- Custom Fonts -->
  	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  	<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

 	 <!-- Custom CSS -->
 	 <link href="css/stylish-portfolio.min.css" rel="stylesheet">

  	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<div class="container">
		<div class="content">
			<h1>Usuarios&nbsp;<a href="admin.php" class="btn btn-xl btn-dark">Regresar al menu de administrador</a></h1><hr/>
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($conect,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($conect, "SELECT * FROM usuario WHERE id='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($conect, "DELETE FROM usuario WHERE id='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se puede eliminar el usuario debido a que el envio de su producto sigue en proceso.</div>';
					}
				}
			}
			?>

			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>Id</th>
					<th>Nombre de usuario</th>
					<th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
					<th>Email</th>
					<th></th>
                    <th></th>
				</tr>
				<?php

	$query="SELECT COUNT(*) as total FROM usuario";
	$consulta = mysqli_query($conect,$query); #Los datos se almacenan en una variable
	$array=mysqli_fetch_array($consulta); # Esa variable se almacena en un arreglo

	#Si el arreglo es mayor a 0 contiene informacion correcta, es decir, los datos coinciden
	if ($array['total']>0) {
		$sql_1 = "SELECT * FROM usuario WHERE nickname NOT IN ('admin') ORDER BY id "; 
        $sql= mysqli_query($conect, $sql_1);
		while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['nickname'].'</td>
							<td>'.$row['password'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['fecha'].'</td>
							<td>'.$row['email'].'</td>
							<td>';
						echo '
							</td>
							<td>
								<a href="usuario_edit.php?nik='.$row['id'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="admin_usuario.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nickname'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
					}
	}
	else{
		echo '<tr><td colspan="8">No hay datos...</td></tr>';
	}					
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; Momoh </p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
