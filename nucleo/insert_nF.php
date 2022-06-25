<?php
 
// Create connection
require('../configuraciones/conexion.php');

if($_POST["fecha_de_matrimonio"] == 'NULL'){$fecha = "NULL";}else{$fecha = $_POST["fecha_de_matrimonio"];}
if($_POST["acta_de_matrimonio"] == 'NULL'){$acta = "NULL";}else{$acta = $_POST["acta_de_matrimonio"];}


//query

$query="INSERT INTO nucleo_familiar(`codigo`,`numero_celular`,`dinero`,`fecha_de_matrimonio`, `acta_de_matrimonio`)
 VALUES('$_POST[codigo]','$_POST[numero_celular]','$_POST[dinero]',$fecha, $acta)";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result) {
	header ("Location: nucleo.php");
} else {
	echo "Ha ocurrido un error al crear la persona";
}
?>