<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="SELECT * FROM nucleo_familiar";
$resultP = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);



?>