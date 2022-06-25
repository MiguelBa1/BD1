<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM mercado where codigo='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: mercados.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>