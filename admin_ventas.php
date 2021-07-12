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
	<title>Visualizar ventas</title>

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
			<h1>Ventas&nbsp;<a href="admin.php" class="btn btn-xl btn-dark">Regresar al menu de administrador</a></h1><hr/>
			
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>Id</th>
					<th>Id de usuario</th>
					<th>Total</th>
                    <th>Fecha</th>
					<th></th>
                    <th></th>
				</tr>
				<?php

	$query="SELECT COUNT(*) as total FROM productos";
	$consulta = mysqli_query($conect,$query); #Los datos se almacenan en una variable
	$array=mysqli_fetch_array($consulta); # Esa variable se almacena en un arreglo

	#Si el arreglo es mayor a 0 contiene informacion correcta, es decir, los datos coinciden
	if ($array['total']>0) {
		$sql_1 = "SELECT * FROM ventas order by id"; 
        $sql= mysqli_query($conect, $sql_1);
		while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['id_usuario'].'</td>
							<td>'.$row['total'].'</td>
                            <td>'.$row['fecha'].'</td>
							<td>';
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
