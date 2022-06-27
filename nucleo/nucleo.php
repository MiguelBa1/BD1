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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--librerias para usar jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../mercados/mercados.php">Mercado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../almacen/almacen.php">Almacén</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../nucleo/nucleo.php">Núcleo Familiar</a>
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
                        Editar Núcleo Familiar
                    </div>
                    <div class="card-body">
                        <form action="update_nF.php" , class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo_edit">Codigo<span style="color: red;">*</span></label>
                                <input type="number" name="codigo" id="codigo_edit" class="form-control" readonly
                                    value=<?= $_GET["codigo"]; ?>>
                            </div>
                            <div class="form-group">
                                <label for="numero_celular_edit">Número de celular<span
                                        style="color: red;">*</span></label>
                                <input type="text" name="numero_celular" id="numero_celular_edit" class="form-control"
                                    value=<?= $_GET["numero_celular"]; ?>>
                            </div>
                            <div class="form-group">
                                <label for="dinero_edit">Dinero<span style="color: red;">*</span></label>
                                <input type="number" name="dinero" id="dinero_edit" class="form-control"
                                    value=<?= $_GET["dinero"]; ?>>
                            </div>



                            <?php
                                    if($_GET["fecha_de_matrimonio"] == ""){
                                        ?>
                            <div class="form-group">
                                <label>Casados?<span style="color: red;">*</span></label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="casadosSi" name="casados"
                                        value="Si" required />
                                    <label class="custom-control-label" for="casadosSi">Sí</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="casadosNo" name="casados"
                                        value="No" required />
                                    <label class="custom-control-label" for="casadosNo">No</label>
                                </div>
                            </div>
                            <div id="casadosRow" class="form-group" style="display: none">
                                <div>
                                    <label for="fecha_de_matrimonio">Fecha de matrimonio</label>
                                    <input type="date" name="fecha_de_matrimonio" id="fecha_de_matrimonio"
                                        class="form-control">
                                </div>
                                <div>
                                    <label for="acta_de_matrimonio">Link acta de matrimonio</label>
                                    <input type="text" name="acta_de_matrimonio" id="acta_de_matrimonio"
                                        class="form-control">
                                </div>
                            </div>

                            <script>
                            $('input[name="casados"]').change(function() {
                                if ($('#casadosSi').is(':checked')) {
                                    $('#casadosRow').show(200);
                                } else {
                                    $('#casadosRow').hide(200);
                                }
                            });
                            </script>

                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                                crossorigin="anonymous"></script>


                            <?php
                                    }
                                    ?>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="nucleo.php" class="btn btn-danger">Descartar</a>
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
                        Insertar Núcleo Familiar
                    </div>
                    <div class="card-body">
                        <form action="insert_nF.php" , class="form-group" method="post">
                            <div>
                                <label for="codigo">Código<span style="color: red;">*</span></label>
                                <input type="number" name="codigo" id="codigo" class="form-control" required>
                            </div>
                            <div>
                                <label for="numero_celular">Número de celular<span style="color: red;">*</span></label>
                                <input type="text" name="numero_celular" id="numero_celular" class="form-control"
                                    required>
                            </div>
                            <div>
                                <label for="dinero">Dinero<span style="color: red;">*</span></label>
                                <input type="number" name="dinero" id="dinero" class="form-control" min="0"
                                    max="99999999" required>
                            </div>
                            <div class="form-group">
                                <label>Casados?<span style="color: red;">*</span></label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="casadosSi" name="casados"
                                        value="Si" required />
                                    <label class="custom-control-label" for="casadosSi">Sí</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="casadosNo" name="casados"
                                        value="No" required />
                                    <label class="custom-control-label" for="casadosNo">No</label>
                                </div>
                            </div>
                            <div id="casadosRow" class="form-group" style="display: none">
                                <div>
                                    <label for="fecha_de_matrimonio">Fecha de matrimonio</label>
                                    <input type="date" name="fecha_de_matrimonio" id="fecha_de_matrimonio"
                                        class="form-control">
                                </div>
                                <div>
                                    <label for="acta_de_matrimonio">Link acta de matrimonio</label>
                                    <input type="text" name="acta_de_matrimonio" id="acta_de_matrimonio"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary save-btn" value="Insertar">
                                <a href="nucleo.php" class="btn btn-danger">Reiniciar</a>
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
                            <th scope="col">Código Núcleo</th>
                            <th scope="col">Numero Celular</th>
                            <th scope="col">Dinero</th>
                            <th scope="col">Fecha matrimonio</th>
                            <th scope="col">Acta matrimonio</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('select_nF.php');
                        if ($result) {
                            foreach ($result as $fila) {
                        ?>
                        <tr>
                            <td><?= $fila['codigo']; ?></td>
                            <td><?= $fila['numero_celular']; ?></td>
                            <td><?= $fila['dinero']; ?></td>
                            <td><?= $fila['fecha_de_matrimonio']; ?></td>
                            <td><?= $fila['acta_de_matrimonio']; ?></td>
                            <td>
                                <form action="delete_nF.php" method="POST">
                                    <input type="text" name="d" value=<?= $fila['codigo']; ?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="nucleo.php" method="GET">

                                    <input type="text" name="codigo" value=<?= $fila['codigo']; ?> hidden>
                                    <input type="text" name="numero_celular" value='<?= $fila['numero_celular']; ?>'
                                        hidden>
                                    <input type="text" name="dinero" value='<?= $fila['dinero']; ?>' hidden>
                                    <input type="text" name="fecha_de_matrimonio" hidden
                                        value='<?= $fila['fecha_de_matrimonio']; ?>'>
                                    <input type="text" name="acta_de_matrimonio" hidden
                                        value='<?= $fila['acta_de_matrimonio']; ?>'>

                                    <button class="btn btn-primary" title="editar" type="submit"><i
                                            class="far fa-edit"></i></button>
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
        $("input[type='radio']:visible").each(function(index, input) {
            const val = $('input:radio[name="' + input.name + '"]:checked').val();
            if (val === undefined) {
                $('input:radio[name="' + input.name + '"]').toggleClass("is-invalid", true);
            } else {
                $('input:radio[name="' + input.name + '"]').toggleClass("is-invalid", false);
            }
        });
    });

    $('input[required]').keyup(function() {
        const empty = $(this).val() === "";
        let invalidValue = false;
        if (this.id === 'dinero' && ($(this).val() < 0 || $(this).val() > 99999999)) {
            invalidValue = true;
        }
        $(this).toggleClass("is-invalid", empty || invalidValue);
    });

    $('select[required]').change(function() {
        const empty = $(this).val() === "";
        $(this).toggleClass("is-invalid", empty);
    });

    $("input[type='radio']").on('change', function() {
        const empty = $('input[name="' + this.name + '"]:checked').val() === "";
        $('input[name="' + this.name + '"]').toggleClass("is-invalid", empty);
    });

    $('input[name="casados"]').change(function() {
        if ($('#casadosSi').is(':checked')) {
            $('#casadosRow').show(200);
        } else {
            $('#casadosRow').hide(200);
        }
    });
    </script>
</body>

</html>