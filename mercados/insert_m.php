<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query

$query="INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
VALUES('$_POST[codigo_mercado]','$_POST[fecha_compra]','$_POST[valor_total]','$_POST[codigo_nucleo]','$_POST[codigo_almacen]')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result) {
	echo "REGISTRO EXITOSO";
	// header ("Location: mercados.php");
} else {
	echo "Ha ocurrido un error al crear la persona";
}
