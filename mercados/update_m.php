<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
try {
    if ($_POST["codigo_nucleo"] == "none" && $_POST["codigo_almacen"] == "none") {
        $query = "UPDATE mercado SET fecha_de_compra='$_POST[fecha_de_compra]', lugar_almacenamiento=NULL, codigo_nucleo_comprador=NULL, valor_total = '$_POST[valor_total]' WHERE codigo = '$_POST[codigo]'";
    } elseif ($_POST["codigo_almacen"] == "none") {
        $query = "UPDATE mercado SET fecha_de_compra='$_POST[fecha_de_compra]', lugar_almacenamiento=NULL, codigo_nucleo_comprador='$_POST[codigo_nucleo]', valor_total = '$_POST[valor_total]' WHERE codigo = '$_POST[codigo]'";
    } elseif ($_POST["codigo_nucleo"] == "none") {
        $query = "UPDATE mercado SET fecha_de_compra='$_POST[fecha_de_compra]', lugar_almacenamiento='$_POST[codigo_almacen]', codigo_nucleo_comprador=NULL, valor_total = '$_POST[valor_total]' WHERE codigo = '$_POST[codigo]'";
    } else {
        $query = "UPDATE mercado SET fecha_de_compra='$_POST[fecha_de_compra]', lugar_almacenamiento='$_POST[codigo_almacen]', codigo_nucleo_comprador='$_POST[codigo_nucleo]', valor_total = '$_POST[valor_total]' WHERE codigo = '$_POST[codigo]'";
    }
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