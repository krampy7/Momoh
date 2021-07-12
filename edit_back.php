<?php 

  #Se realiza la conexión a la base de datos 
  include 'conect.php';

  #Los datos obtenidos en Editar.php por el metodo GET se almacenan en variables
  $id=$_POST['inputId'];
  $nickname=$_POST['inputNickname'];
  $password=$_POST['inputPassword'];
  $name=$_POST['inputName'];
  $date=$_POST['inputDate'];
  $email=$_POST['inputEmail'];

  /*Cuenta los registros que existen de la tabla usuario donde el nickname sea igual a el nickname que agrego y su id sea diferente de un valor a 1, esta logica se basa en el hecho de, si el usaurio agrega el mismo nombre pero su id es el mismo lo puede modificar, debido a que es el mismo nombre del usuario*/
  $qry="SELECT COUNT(*) as existente FROM usuario WHERE nickname = '$nickname' AND id != '$id'";

  #Escribe la consulta de la base de datos y se almacena en $array
  $consulta = mysqli_query($conect,$qry);

  #Se pasa la información a un array
  $array=mysqli_fetch_array($consulta);

  /*Si el array del query es mayor a cero, ese username no puede ser usadoy se manda a una pagina de error*/
  if ($array['existente']>0) {
    header('location: oops_edit.php');
  }

  /*El else nos dicta que no existe un usuario que se llame asi, es decir que se puede hacer la query de update y pasar los datos obtenidos en el POST se pasan a la base de datos*/
  else{
      $qry="UPDATE usuario SET nickname = '".$nickname."', password = '".$password."', nombre = '".$name."',fecha = '".$user."', fecha = '".$date."' WHERE id = '".$id."'";

      #Una vez hecho lo anterior se ejecuta el query y se almacena en una variable llamada consulta
      $consulta = mysqli_query($conect,$qry);

      #La consulta se almacena como un array
      $array=mysqli_fetch_array($consulta);

      #Nos manda a la pagina exito para poder iniciar nueva sesión
      header ("location: exito_edit.html");
  }
?>
