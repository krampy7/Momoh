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
	<title>Direcciones</title>

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
			<h1>Direcciones de usuario&nbsp;<a href="admin.php" class="btn btn-xl btn-dark">Regresar al menu de administrador</a></h1><hr/>
			<?php
			?>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>Nombre de usuario</th>
                    <th>Calle</th>
                    <th>Número exterior</th>
					<th>Número interior</th>
					<th>Estado</th>
					<th>Colonia</th>
                    <th>CP</th>
                    <th>Municipio</th>
                    <th></th>
                    <th></th>
				</tr>
				<?php

	$query="SELECT COUNT(*) as total FROM direcciones_usuario";
	$consulta = mysqli_query($conect,$query); #Los datos se almacenan en una variable
	$array=mysqli_fetch_array($consulta); # Esa variable se almacena en un arreglo

	#Si el arreglo es mayor a 0 contiene informacion correcta, es decir, los datos coinciden
	if ($array['total']>0) {
		$sql_1 = "SELECT u.nickname, d.calle, d.numero_exterior, d.numero_interior, d.estado, d.colonia, d.cp, d.municipio, du.direcciones_id, du.usuario_id
					FROM  direcciones_usuario AS du, usuario AS u, direcciones AS d
					WHERE u.id = du.usuario_id AND d.id = du.direcciones_id; "; 
        $sql= mysqli_query($conect, $sql_1);
		while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['nickname'].'</td>
							<td>'.$row['calle'].'</td>
							<td>'.$row['numero_exterior'].'</td>
                            <td>'.$row['numero_interior'].'</td>
                            <td>'.$row['estado'].'</td>
							<td>'.$row['colonia'].'</td>
                            <td>'.$row['cp'].'</td>
                            <td>'.$row['municipio'].'</td>
							<td>';
						echo '
							</td>
							<td>
								<a href="direcciones_edit.php?nik='.$row['direcciones_id'].'& idu='.$row['usuario_id'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
