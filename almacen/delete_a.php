<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM almacen where numero_almacen='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: almacen.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar el almacen";
 }
 
mysqli_close($conn);



?>