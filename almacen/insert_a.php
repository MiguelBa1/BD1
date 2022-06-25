<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["numero_almacen"];
$cantidad = $_POST["cantidad_mercados_maxima"];
if($_POST["nucleo_administrador"] == 'NULL'){$nucleo = "NULL";}else{$nucleo = $_POST["nucleo_administrador"];}


//query
if($cedula<0){
	echo "numero del almacen debe ser positiva";
}elseif($cantidad < 0){
    echo "cantidad de mercados mmaxima debe ser postiva";
}

else{
	$query="INSERT INTO `almacen`(`numero_almacen`,`nombre`, `cantidad_mercados_maxima`, `nucleo_administrador`)
 	VALUES ('$_POST[numero_almacen]','$_POST[nombre]','$_POST[cantidad_mercados_maxima]', $nucleo) ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: almacen.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear el almacen";
 	}


}

?>