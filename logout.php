<?php

	#Funciones necesarias para cerrar sesion en php

	#Inicia o reanuda la sesion la sesion
	session_start();

	#Libera todas la variables de sesión
	session_unset();

	#Destruye toda la informacion de sesion 
	session_destroy();

	header('Location: store.php');
?>
