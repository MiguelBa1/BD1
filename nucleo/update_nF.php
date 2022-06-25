<?php
 
// Create connection
require('../configuraciones/conexion.php');




$query="UPDATE nucleo_familiar SET  numero_celular = '$_POST[numero_celular]', dinero ='$_POST[dinero]' WHERE codigo = '$_POST[codigo]'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result) {
	header ("Location: nucleo.php");
} else {
	echo "Ha ocurrido un error al actualizar el nucleo familiar";
}
?>