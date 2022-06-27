<?php
 
// Create connection
// foreach ($_POST as $key => $value) {
// 	echo  $value;
// 	echo "<br>";
// }

require('../configuraciones/conexion.php');

if ($_POST["valor_total"] < 0){
	echo "El valor total debe ser positivo <br>";
	// header("Location: mercados.php");
}
// echo time() > new DateTime($_POST["fecha_de_compra"]);
if (new DateTime($_POST["fecha_de_compra"]) > new DateTime("today")){
	echo "Fecha de compra debe ser anterior a la fecha actual <br>";
	// header("Location: mercados.php");
}
//query

if ($_POST["codigo_nucleo"] == "" && $_POST["lugar_almacenamiento"] == "") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_de_compra]','$_POST[valor_total]', NULL,NULL)";

} elseif ($_POST["lugar_almacenamiento"] == "") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_de_compra]','$_POST[valor_total]','$_POST[codigo_nucleo]', NULL)";

} elseif ($_POST["codigo_nucleo"] == "") {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_de_compra]','$_POST[valor_total]', NULL,'$_POST[lugar_almacenamiento]')";

} else {
	$query = "INSERT INTO mercado(`codigo`, `fecha_de_compra`, `valor_total`, `codigo_nucleo_comprador`, `lugar_almacenamiento`) 
	VALUES('$_POST[codigo_mercado]','$_POST[fecha_de_compra]','$_POST[valor_total]','$_POST[codigo_nucleo]','$_POST[lugar_almacenamiento]')";
}

try {
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	header ("Location: mercados.php");
} catch (\Throwable $th) {
	echo "Ha ocurrido un error al crear el mercado <br>";
	echo '<a href="mercados.php">Regresar</a>';
}
