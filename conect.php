<?php

	#Conexión la base de datos ya creada
	#mysql -u(host) root(user) -p(password)
	$host = "localhost";
	$root="root";
	$pass="";
	$bd="momoh"; #Nombre de la base de datos creada

	#Variable de conexión la cual se le da el valor de las variables ya definidas a partir de una función de sqli
	$conect=mysqli_connect($host,$root,$pass,$bd);

	#Si la conexión fue lograda
	if ($conect) { 
	}
	else{
		#Si la conexión no fue exitosa marca el error
		echo "No se pudo establecer la conexión"; 
	}

?>