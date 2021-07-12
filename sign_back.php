<?php  

  #Se hace una conexión a la base de datos debido a que se usara en un futuro para confirmar si existe un usuario con ese nombre 
  require 'conect.php';

  #Los datos se transfieren a una nueva variable 
  $inputNickname=$_POST['inputNickname'];
  $inputPassword=$_POST['inputPassword'];
  $inputName=$_POST['inputName'];
  $inputDate=$_POST['inputDate'];
  $inputEmail=$_POST['inputEmail'];

  #Se realiza una query en la base de datos y se almacena en una variable
  #La query dicta que cuenta los registros con los cuales los nickname tienen en comun con el nickname de la base de datos y se le llamara a esta accion existente.
  $query="SELECT COUNT(*) as existente FROM usuario WHERE nickname = '$inputNickname'";

  #El query se metio a una variable a partir de una funcion de sql la cual posee de parametros la conexión y el query creado
  $ejecutar = mysqli_query($conect,$query);
  
  #A partir de una función se pasa la variable del query (cantidad de rows en un array)
  $array=mysqli_fetch_array($ejecutar);

  #Si es mayor a 0 ya existe ese ususario y se envia a la pagina de error
  if ($array['existente']>0) { 
    header ("location: oops_sign.php");
  }

  #No existe ese usuario y se insertan los valores dados a la base de datos
  else{ 
    $query2="INSERT INTO usuario (id, nickname, password, nombre, fecha, email) VALUES(NULL, '".$inputNickname."', '".$inputPassword."', '".$inputName."', '".$inputDate."','".$inputEmail."')";

    #Para que se ejecute el query debe realizarse la función junto con la condición
    mysqli_query($conect,$query2);
          
    #Se manda a la pagina de exito_sign la cual afirma al usuario que el registro se creo de manera eitosa.
    header ("location: exito_sign.html");

  }

?>

      
