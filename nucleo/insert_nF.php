<?php
 
// Create connection
require('../configuraciones/conexion.php');

if($_POST["casados"] === "Si" and ($_POST["fecha_de_matrimonio"] === "" or $_POST["acta_de_matrimonio"] === "")){
	echo "Por favor ingrese una fecha de matrimonio y un acta de matrimonio";
}else{
if($_POST["casados"] === "No"){
	$query="INSERT INTO nucleo_familiar(`codigo`,`numero_celular`,`dinero`,`fecha_de_matrimonio`, `acta_de_matrimonio`)
	VALUES('$_POST[codigo]','$_POST[numero_celular]','$_POST[dinero]',NULL, NULL)";
}
else{
$query="INSERT INTO nucleo_familiar(`codigo`,`numero_celular`,`dinero`,`fecha_de_matrimonio`, `acta_de_matrimonio`)
 VALUES('$_POST[codigo]','$_POST[numero_celular]','$_POST[dinero]','$_POST[fecha_de_matrimonio]', '$_POST[acta_de_matrimonio]')";
}
try {
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result) {
		header("Location: nucleo.php");
	} 
} catch (\Throwable $th) {
	echo "Ha ocurrido un error al crear la persona";
	echo $th;
}
}
?>