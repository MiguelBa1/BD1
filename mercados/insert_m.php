<?php
 
// Create connection
// foreach ($_POST as $key => $value) {
// 	echo  $value;
// 	echo "<br>";
// }

require('../configuraciones/conexion.php');

//query

if ($_POST["codigo_nucleo"] == "none" && $_POST["codigo_almacen"] == "none") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_compra]','$_POST[valor_total]', NULL,NULL)";

} elseif ($_POST["codigo_almacen"] == "none") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_compra]','$_POST[valor_total]','$_POST[codigo_nucleo]', NULL)";

} elseif ($_POST["codigo_nucleo"] == "none") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_compra]','$_POST[valor_total]', NULL,'$_POST[codigo_almacen]')";

}
 else {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_compra]','$_POST[valor_total]','$_POST[codigo_nucleo]','$_POST[codigo_almacen]')";
}

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result) {
	header ("Location: mercados.php");
} else {
	echo "Ha ocurrido un error al crear la persona";
}
