<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM nucleo_familiar where codigo='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: nucleo.php");
    
     
 }else{
     echo "Ha ocurrido un error al eliminar el nucleo familiar";
 }
 
mysqli_close($conn);



?>