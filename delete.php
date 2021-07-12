<?php 

	#Se realiza la conexión a la base de datos
	include 'conect.php';

	#Por medio del metodo GET se obtuvo anteriormente el id el cual se le dio el id de la base de datos. Ese id se pasara a una nueva variable
	$id=$_GET['id'];

	#Se escribe el query en donde se elimina el row en el cual se compara el id dado ('$id') con el de id_ususario
	$qry4="DELETE FROM usuario WHERE id = '$id'";

	#La query se almacena en la consulta con los parametros de conexión y query. SE EJECUTA LA CONSULTA (QUERY)
	$consulta4 = mysqli_query($conect,$qry4);

	#El resultado de la query se muesta como una matriz (PASO NECESARIO)
	$array4=mysqli_fetch_array($consulta4);

	#Se manda a la pagina logout para cerrar la sesión una vez eliminada
	header ("location: logout.php");
?>