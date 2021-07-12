<?php 
	require 'conect.php'; //Se pide conexión a la base de datos debido a que se usara 
	session_start(); //Se inicia sesión 

	#Se pasan los valores dados en inicio de sesion en respectivas variables
	$usuario=$_POST['inputNickname'];
	$pass=$_POST['inputPassword'];

	
	#Se realiza la query para contar los usuarios que coincidan con el nickname y el password sean contados y se alamcene en un array
	$query="SELECT COUNT(*) as total FROM usuario WHERE nickname ='$usuario' and password = '$pass'";
	$consulta = mysqli_query($conect,$query); #Los datos se almacenan en una variable
	$array=mysqli_fetch_array($consulta); # Esa variable se almacena en un arreglo

	#Si el arreglo es mayor a 0 contiene informacion correcta, es decir, los datos coinciden
	if ($array['total']>0) {
		#Se almacena el nombre de usuario en la variable de sesión de usuario
		$_SESSION['USUARIO']=$usuario; 
				if($usuario == "admin"){
					header("location: admin.php"); 	
				}
				else{
					#Se manda a la pagina home
					header("location: store.php"); 
				}
	}
	 
	#Si no hay nada en el arreglo, no existe ese usuario o la información dada es erronea y se manda a la pagina de error
	else{ 
		header('location: oops_login.php');
	      	}

?>

