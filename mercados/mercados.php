<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
<!DOCTYPE html>
<html lang="en">
<!--cabezera del html -->

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
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--librerias para usar jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../mercados/mercados.php">Mercado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../almacen/almacen.php">Almacén</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../nucleo/nucleo.php">Núcleo Familiar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Búsquedas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../consultas/consultas.php">Consultas</a>
        </li>
    </ul>

    <div class="container mt-3">
        <div class="row">
            <?php
            if (isset($_GET["codigo"])) {
            ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Editar Mercado
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar un almacen mediante el metodo post-->
                            <form action="update_m.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="codigo">Código de mercado<span style="color: red;">*</span></label>
                                    <input type="number" readonly name="codigo" value=<?= $_GET["codigo"]; ?> id="codigo" class="form-control">
                                </div>
                                <div name="taskOption" class="form-group">
                                    <label for="codigo_nucleo">Código del núcleo familiar</label>
                                    <select name="codigo_nucleo" id="codigo-nucleo" class="form-control">
                                        <option value="" <?php
                                                            if (!$_GET["codigo_nucleo"]) {
                                                                echo "selected";
                                                            }
                                                            ?>>Seleccione una opcion</option>
                                        <?php
                                        require('select_n.php');
                                        if ($resultN) {
                                            foreach ($resultN as $fila) {
                                        ?>
                                                <option value=<?= $fila['codigo']; ?> <?php
                                                                                        if ($_GET["codigo_nucleo"] === $fila["codigo"]) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $fila['codigo']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div name="taskOption" class="form-group">
                                    <label for="lugar_almacenamiento">Número de almacén</label>
                                    <select name="lugar_almacenamiento" id="codigo-almacen" class="form-control">
                                        <option value="" <?php
                                                            if (!$_GET["lugar_almacenamiento"]) {
                                                                echo "selected";
                                                            }
                                                            ?>>Seleccione una opcion</option>
                                        <?php
                                        require('select_a.php');
                                        if ($resultE) {
                                            foreach ($resultE as $fila) {
                                        ?>
                                                <option value=<?= $fila['numero_almacen']; ?> <?php
                                                                                                if ($_GET["lugar_almacenamiento"] === $fila["numero_almacen"]) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                                ?>><?= $fila['numero_almacen']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_de_compra">Fecha de compra<span style="color: red;">*</span></label>
                                    <input type="date" max="<?= (new DateTime("today"))->format('Y-m-d') ?>" name="fecha_de_compra" id="fecha_de_compra" value='<?= $_GET["fecha_de_compra"]; ?>' class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="valor_total">Valor total<span style="color: red;">*</span></label>
                                    <input type="number" min="0" max="99999999999" name="valor_total" value='<?= $_GET["valor_total"]; ?>' id="valor_total" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <a href="mercados.php" class="btn btn-danger">Descartar</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Insertar Mercado
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar una persona mediante el metodo post-->
                            <form action="insert_m.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="cedula">Código del mercado<span style="color: red;">*</span></label>
                                    <input type="number" name="codigo_mercado" id="codigo_mercado" class="form-control" required>
                                </div>
                                <div name="taskOption" class="form-group">
                                    <label for="codigo-nucleo">Código del núcleo familiar</label>
                                    <select name="codigo_nucleo" id="codigo-nucleo" class="form-control">
                                        <option value="" selected>Selecciona una opcion</option>
                                        <?php
                                        require('select_n.php');
                                        if ($resultN) {
                                            foreach ($resultN as $fila) {
                                        ?>
                                                <option value=<?= $fila['codigo']; ?>><?= $fila['codigo']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div name="taskOption" class="form-group">
                                    <label for="codigo-almacen">Número de almacén</label>
                                    <select name="lugar_almacenamiento" id="codigo-almacen" class="form-control">
                                        <option value="" selected>Selecciona una opcion</option>
                                        <?php
                                        require('select_a.php');
                                        if ($resultE) {
                                            foreach ($resultE as $fila) {
                                        ?>
                                                <option value=<?= $fila['numero_almacen']; ?>><?= $fila['numero_almacen']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_de_compra">Fecha de compra<span style="color: red;">*</span></label>
                                    <input type="date" max="<?= (new DateTime("today"))->format('Y-m-d') ?>" name="fecha_de_compra" id="fecha_de_compra" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="valor_total">Valor total<span style="color: red;">*</span></label>
                                    <input type="number" min="0" max="99999999999" name="valor_total" id="valor_total" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Insertar">
                                    <a href="mercados.php" class="btn btn-danger">Reiniciar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <div class="col-6 px-2">

                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código Mercado</th>
                            <th scope="col">Fecha de compra</th>
                            <th scope="col">Valor total</th>
                            <th scope="col">Núcleo comprador</th>
                            <th scope="col">Lugar almacenamiento</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('select_m.php');
                        if ($resultM) {
                            foreach ($resultM as $fila) {
                        ?>
                                <tr>
                                    <td><?= $fila['codigo']; ?></td>
                                    <td><?= $fila['fecha_de_compra']; ?></td>
                                    <td><?= $fila['valor_total']; ?></td>
                                    <td><?= $fila['codigo_nucleo_comprador']; ?></td>
                                    <td><?= $fila['lugar_almacenamiento']; ?></td>
                                    <td>
                                        <form action="delete_m.php" method="POST">
                                            <input type="text" name="d" value=<?= $fila['codigo']; ?> hidden>
                                            <button class="btn btn-danger" title="eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td class="mx-0 pr-2">
                                        <form action="mercados.php" method="GET">

                                            <input type="text" name="codigo" value='<?= $fila['codigo']; ?>' hidden>
                                            <input type="text" name="fecha_de_compra" value='<?= $fila['fecha_de_compra']; ?>' hidden>
                                            <input type="text" name="valor_total" value='<?= $fila['valor_total']; ?>' hidden>
                                            <input type="text" name="codigo_nucleo" value='<?= $fila['codigo_nucleo_comprador']; ?>' hidden>
                                            <input type="text" name="lugar_almacenamiento" value='<?= $fila['lugar_almacenamiento']; ?>' hidden>

                                            <button class="btn btn-primary" title="editar" type="submit"><i class="far fa-edit"></i></button>
                                        </form>
                                    </td>

                                </tr>
                        <?php

                            }
                        }

                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!--controlador de los tipo radio-->
    </div>
</body>

</html>