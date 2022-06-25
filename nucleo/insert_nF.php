<?php
 
// Create connection
require('../configuraciones/conexion.php');



if($_POST["tipo"] === "N"){
	$query="INSERT INTO nucleo_familiar(`codigo`,`numero_celular`,`dinero`,`fecha_de_matrimonio`, `acta_de_matrimonio`)
	VALUES('$_POST[codigo]','$_POST[numero_celular]','$_POST[dinero]',NULL, NULL)";
}
else{
$query="INSERT INTO nucleo_familiar(`codigo`,`numero_celular`,`dinero`,`fecha_de_matrimonio`, `acta_de_matrimonio`)
 VALUES('$_POST[codigo]','$_POST[numero_celular]','$_POST[dinero]','$_POST[fecha_de_matrimonio]', '$_POST[acta_de_matrimonio]')";
}
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result) {
	header ("Location: nucleo.php");
} else {
	echo "Ha ocurrido un error al crear la persona";
}
?>