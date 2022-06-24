<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT numero_almacen FROM almacen";
$resultE = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
mysqli_close($conn);

?>
