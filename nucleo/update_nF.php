<?php

// Create connection
require('../configuraciones/conexion.php');


if ($_POST["casadosEdit"] === "Si" and ($_POST["fecha_de_matrimonio"] === "" or $_POST["acta_de_matrimonio"] === "")) {
    echo "Por favor ingrese una fecha de matrimonio y un acta de matrimonio";
} else {
    if ($_POST["casadosEdit"] === "No") {
        $query = "UPDATE nucleo_familiar SET  numero_celular = '$_POST[numero_celular]', dinero ='$_POST[dinero]', fecha_de_matrimonio =NULL, acta_de_matrimonio =NULL WHERE codigo = '$_POST[codigo]'";
    } else {
        $query = "UPDATE nucleo_familiar SET  numero_celular = '$_POST[numero_celular]', dinero ='$_POST[dinero]', fecha_de_matrimonio ='$_POST[fecha_de_matrimonio]', acta_de_matrimonio ='$_POST[acta_de_matrimonio]' WHERE codigo = '$_POST[codigo]'";
    }


    try {
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            header("Location: nucleo.php");
        }
    } catch (\Throwable $th) {
        echo "Ha ocurrido un error al actualizar el nucleo familiar";
        echo $th;
    }
}
