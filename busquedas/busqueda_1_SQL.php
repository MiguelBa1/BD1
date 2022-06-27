<!DOCTYPE html>
<html lang="en">

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>Inicio</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
        para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir iconos y formas 
         para mas informacion : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <table class="table border-rounded">
        <?php
        require('../configuraciones/conexion.php');
        $query = "SELECT numero_almacen, cantidad_mercados_maxima 
        FROM almacen 
        WHERE numero_almacen IN (SELECT lugar_almacenamiento 
                                 FROM mercado 
                                 WHERE fecha_de_compra BETWEEN DATE('{$_POST["f1"]}') AND DATE('{$_POST["f2"]}') 
                                 GROUP BY lugar_almacenamiento
                                 HAVING COUNT(*) = {$_POST["n"]}
                                );";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
        ?>
            <thead class="thead ">
                <tr>
                    <th scope="col">Número del Almacén</th>
                    <th scope="col">Número máximo de mercados</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $fila) {
                ?>
                    <tr>
                        <td><?= $fila['numero_almacen']; ?></td>
                        <td><?= $fila['cantidad_mercados_maxima']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        <?php

        }

        ?>
    </table>
</body>