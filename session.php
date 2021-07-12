<?php

	#Esta plantilla o pagina de código es para el inicio de sesión

	#Función para iniciar sesión
	session_start();  

	#Se pasan los datos (Nombre de usaurio) dados por el usuario a una variable
	$usuario=$_POST['USUARIO'];

	#Da bienvenida al usuario junto con su nombre
	echo "Bienvenido ".$usuario;

	#Variable de sesión
	$_SESSION['USUARIO']=$_usuario;

?>