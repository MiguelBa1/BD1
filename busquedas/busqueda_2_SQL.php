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
        $query = "SELECT codigo, numero_celular 
        FROM nucleo_familiar
        WHERE codigo IN (
            SELECT codigo_nucleo_comprador FROM mercado
            GROUP BY codigo_nucleo_comprador
            HAVING COUNT(*) BETWEEN {$_POST["n1"]} AND {$_POST["n2"]}
        );";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
        ?>
            <thead class="thead ">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Número de teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $fila) {
                ?>
                    <tr>
                        <td><?= $fila['codigo']; ?></td>
                        <td><?= $fila['numero_celular']; ?></td>
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