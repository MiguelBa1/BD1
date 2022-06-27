<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
try {
    $codigoNucleo = $_POST["codigo_nucleo"];
    $codigoAlmacen = $_POST["lugar_almacenamiento"];
    if ($_POST["codigo_nucleo"] == "") {
        $codigoNucleo = "NULL";
    }
    if ($_POST["lugar_almacenamiento"] == "") {
        $codigoAlmacen = "NULL";
    }
    $query = "UPDATE mercado SET fecha_de_compra='$_POST[fecha_de_compra]', lugar_almacenamiento=$codigoAlmacen, codigo_nucleo_comprador=$codigoNucleo, valor_total = '$_POST[valor_total]' WHERE codigo = '$_POST[codigo]'";
    echo $query;
    $result = mysqli_query($conn, $query) or
        die(mysqli_error($conn));

    if ($result) {
        header("Location: mercados.php");
    }

} catch (\Throwable $th) {
    echo "Ha ocurrido un error al actualizar el mercado <br>";
    echo $th;
}

    mysqli_close($conn);
?>