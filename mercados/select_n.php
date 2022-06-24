<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT codigo FROM nucleo_familiar";
$resultN = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
mysqli_close($conn);

?>
