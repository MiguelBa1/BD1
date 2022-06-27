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

    <!--Barra de navegación-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../mercados/mercados.php">Mercado</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../almacen/almacen.php">Almacén</a>
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
            if (isset($_GET["numero_almacen"])) {
            ?>
                <div class="col-6 px-2">
                    <div class="card">
                        <div class="card-header">
                            Editar Almacén
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar un almacen mediante el metodo post-->
                            <form action="update_a.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="numero_almacen_edit">Número de almacén<span style="color: red;">*</span></label>
                                    <input type="number" readonly name="numero_almacen" value=<?= $_GET["numero_almacen"]; ?> id="numero_almacen_edit" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_edit">Nombre<span style="color: red;">*</span></label>
                                    <input type="text" name="nombre" value='<?= $_GET["nombre"]; ?>' id="nombre_edit" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad_mercados_maxima_edit">Cantidad máxima de mercados<span style="color: red;">*</span></label>
                                    <input type="number" min="1" max="99" name="cantidad_mercados_maxima" value='<?= $_GET["cantidad_mercados_maxima"]; ?>' id="cantidad_mercados_maxima_edit" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nucleo_administrador_edit">Núcleo administrador</label>
                                    <select id="nucleo_administrador_edit" name="nucleo_administrador" class="form-control" value=<?= $_GET["nucleo_administrador"]; ?>>
                                        <option value='<?= $_GET["nucleo_administrador"]; ?>' selected hidden><?= $_GET["nucleo_administrador"]; ?></option>
                                        <option value="NULL">Ninguno</option>
                                        <?php
                                        require('consultar_nF.php');
                                        if ($resultP) {
                                            foreach ($resultP as $fila) {
                                        ?>
                                                <option value=<?= $fila['codigo']; ?>><b>Código Núcleo:</b> <?= $fila['codigo']; ?><b> -
                                                        Celular: </b><?= $fila['numero_celular']; ?></option>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary save-btn" value="Guardar" id="guardarBtn">
                                    <a href="almacen.php" class="btn btn-danger">Descartar</a>
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
                            Insertar Almacén
                        </div>
                        <div class="card-body">
                            <!--formulario para insertar un almacen mediante el metodo post-->
                            <form action="insert_a.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for="numero_almacen">Número de almacén<span style="color: red;">*</span></label>
                                    <input type="number" name="numero_almacen" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre<span style="color: red;">*</span></label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad_mercados_maxima">Cantidad máxima de mercados<span style="color: red;">*</span></label>
                                    <input type="number" min="1" max="99" name="cantidad_mercados_maxima" value='<?= $_GET["cantidad_mercados_maxima"]; ?>' id="cantidad_mercados_maxima_edit" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nucleo_administrador">Núcleo administrador</label>
                                    <select name="nucleo_administrador" class="form-control">
                                        <option value="NULL">Ninguno</option>
                                        <?php
                                        require('consultar_nF.php');
                                        if ($resultP) {
                                            foreach ($resultP as $fila) {
                                        ?>
                                                <option value=<?= $fila['codigo']; ?>><b>Código Núcleo:</b> <?= $fila['codigo']; ?><b> -
                                                        Celular: </b><?= $fila['numero_celular']; ?></option>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary save-btn" value="Insertar" id="insertarBtn">
                                    <a href="almacen.php" class="btn btn-danger">Reiniciar</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <div class="col-6 px-2">

                <table class="table border-rounded w-100 table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Numero Almacen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad maxima mercados</th>
                            <th scope="col">Núcleo administrador</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('select_a.php');
                        if ($result) {
                            foreach ($result as $fila) {
                        ?>
                                <tr>
                                    <td><?= $fila['numero_almacen']; ?></td>
                                    <td><?= $fila['nombre']; ?></td>
                                    <td><?= $fila['cantidad_mercados_maxima']; ?></td>
                                    <td><?= $fila['nucleo_administrador']; ?></td>
                                    <td>

                                        <form action="delete_a.php" method="POST">
                                            <input type="text" value=<?= $fila['numero_almacen']; ?> hidden>
                                            <input type="text" name="d" value=<?= $fila['numero_almacen']; ?> hidden>
                                            <button class="btn btn-danger" title="eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    <td class="mx-0 pr-2">
                                        <form action="almacen.php" method="GET">

                                            <input type="text" name="numero_almacen" value='<?= $fila['numero_almacen']; ?>' hidden>
                                            <input type="text" name="nombre" value='<?= $fila['nombre']; ?>' hidden>
                                            <input type="number" name="cantidad_mercados_maxima" value='<?= $fila['cantidad_mercados_maxima']; ?>' hidden>
                                            <input type="text" name="nucleo_administrador" hidden value=<?= $fila['nucleo_administrador']?>>

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
    </div>
    <script type="text/javascript">
        $('.save-btn').click(function() {
            $('input[required]:visible').each(function(index, input) {
                const empty = $(input).val() === "";
                $(this).toggleClass("is-invalid", empty);
            });
        });

        $('input[required]').keyup(function() {
            const empty = $(this).val() === "";
            $(this).toggleClass("is-invalid", empty);
        });

        $('select[required]').change(function() {
            const empty = $(this).val() === "";
            $(this).toggleClass("is-invalid", empty);
        });
    </script>
</body>

</html>