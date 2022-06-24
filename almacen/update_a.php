<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE almacen SET nombre='$_POST[nombre]', cantidad_mercados_maxima='$_POST[cantidad_mercados_maxima]', nucleo_administrador = '$_POST[nucleo_administrador]' WHERE numero_almacen = '$_POST[numero_almacen]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: personas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>