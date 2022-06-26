<!DOCTYPE html>
<html lang="en">

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>inicio</title>
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
        if ($_POST["consultas"] === "Primera") {
            $query = "SELECT numero_almacen, nombre FROM almacen 
            WHERE numero_almacen IN 
                        (SELECT lugar_almacenamiento
                            FROM mercado
                            GROUP BY lugar_almacenamiento
                            HAVING COUNT(*) >= 3 AND SUM(valor_total) > 1000
                        )
                         AND nucleo_administrador NOT IN (SELECT codigo_nucleo_comprador FROM mercado WHERE codigo_nucleo_comprador IS NOT NULL)
                        AND nucleo_administrador IS NOT NULL";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if ($result) {
        ?>
                <thead class="thead ">
                    <tr>
                        <th scope="col">Numero de Almacen</th>
                        <th scope="col">Nombre del almacen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $fila) {
                    ?>
                    <tr>
                        <td><?= $fila['numero_almacen']; ?></td>
                        <td><?= $fila['nombre']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            <?php

            }
        } elseif ($_POST["consultas"] === "Segunda") {
            $query = "SELECT codigo, valor_total
                            FROM mercado m
                            WHERE valor_total > (SELECT dinero
                                            FROM nucleo_familiar n
                                            WHERE n.codigo = m.codigo_nucleo_comprador) AND codigo_nucleo_comprador = (SELECT nucleo_administrador
                                                                                                FROM almacen a
                                                                                                WHERE a.numero_almacen = m.lugar_almacenamiento);   
                            ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if ($result) {
            ?>
                <thead class="thead ">
                    <tr>
                        <th scope="col">Codigo del mercado</th>
                        <th scope="col">Valor total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $fila) {
                    ?>
                    <tr>
                        <td><?= $fila['codigo']; ?></td>
                        <td><?= $fila['valor_total']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        <?php

            }
        }
        ?>
    </table>
</body>