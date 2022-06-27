<?php

// Create connection
require('../configuraciones/conexion.php');

$numeroAlmacen = $_POST["numero_almacen"];
$cantidad = $_POST["cantidad_mercados_maxima"];
if ($_POST["nucleo_administrador"] == '') {
    $nucleo = "NULL";
} else {
    $nucleo = $_POST["nucleo_administrador"];
}

//query
if ($numeroAlmacen < 0) {
    echo "numero del almacen debe ser positiva";
} elseif ($cantidad < 0) {
    echo "cantidad de mercados maxima debe ser postiva";
} else {
    $query = "INSERT INTO `almacen`(`numero_almacen`,`nombre`, `cantidad_mercados_maxima`, `nucleo_administrador`)
 	VALUES ('$_POST[numero_almacen]','$_POST[nombre]','$_POST[cantidad_mercados_maxima]', $nucleo) ";
    try {
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($result) {
            header("Location: almacen.php");
        } else {
            echo "Ha ocurrido un error al crear el almacen";
        }
    } catch (\Throwable $th) {
        echo "Ha ocurrido un error en la creacion <br>";
        echo $th;
    }
}
