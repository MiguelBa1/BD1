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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../mercados/mercados.php">Mercados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../almacen/almacen.php">Almacen</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../nucleo/nucleo.php">Nucleo Familiar</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Busquedas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Consultas</a>
        </li>
    </ul>

    <div class="container mt-3">
        <div class="row">
            <?php
                if(isset($_GET["codigo"])){
            ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Núcleo Familiar
                    </div>
                    <div class="card-body">
                        <form action="update_nF.php" , class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" id="codigo" class="form-control" readonly
                                    value=<?=$_GET["codigo"];?>>
                            </div>
                            <div class="form-group">
                                <label for="numero_celular">Número de celular</label>
                                <input type="text" name="numero_celular" id="numero_celular" class="form-control"
                                    value=<?=$_GET["numero_celular"];?>>
                            </div>
                            <div class="form-group">
                                <label for="dinero">Dinero</label>
                                <input type="text" name="dinero" id="dinero" class="form-control"
                                    value=<?=$_GET["dinero"];?>>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="nucleo.php" class="btn btn-danger">Descartar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
        else{
                ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar Núcleo Familiar
                    </div>
                    <div class="card-body">
                        <form action="insert_nF.php" , class="form-group" method="post">
                            <div>
                                <label for="codigo">Codigo</label>
                                <input type="text" name="codigo" id="codigo" class="form-control">
                            </div>
                            <div>
                                <label for="numero_celular">Número de celular</label>
                                <input type="text" name="numero_celular" id="numero_celular" class="form-control">
                            </div>
                            <div>
                                <label for="dinero">Dinero</label>
                                <input type="text" name="dinero" id="dinero" class="form-control">
                            </div>
                            <div name="taskOption" class="form-group">
                                <label for="exampleFormControlSelect2">Casados?</label>
                                <select class="form-control" onchange="cambioTipo(this)" name="tipo"
                                    id="exampleFormControlSelect2">
                                    <option value="Y">Si</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div id="casados" class="form-group">
                                <div>
                                    <label for="">Fecha de matrimonio</label>
                                    <input type="date" name="fecha_de_matrimonio" id="fecha_de_matrimonio"
                                        class="form-control">
                                </div>
                                <div>
                                    <label for="">Link acta de matrimonio</label>
                                    <input type="text" name="acta_de_matrimonio" id="acta_de_matrimonio"
                                        class="form-control">
                                </div>
                            </div>

                            <script>
                            function cambioTipo(select) {
                                if (select.value === "Y") {

                                    $("#casados").show();
                                }
                                if (select.value === "N") {
                                    $("#casados").hide();
                                }
                            }
                            </script>

                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                                crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                                crossorigin="anonymous"></script>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
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
                            <th scope="col">Codigo Nucleo</th>
                            <th scope="col">Numero Celular</th>
                            <th scope="col">dinero</th>
                            <th scope="col">Fecha matrimonio</th>
                            <th scope="col">Acta matrimonio</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('select_nF.php');
                            if($result){
                                foreach($result as $fila){
                                    ?>
                        <tr>
                            <td><?=$fila['codigo'];?></td>
                            <td><?=$fila['numero_celular'];?></td>
                            <td><?=$fila['dinero'];?></td>
                            <td><?=$fila['fecha_de_matrimonio'];?></td>
                            <td><?=$fila['acta_de_matrimonio'];?></td>
                            <td>
                                <form action="delete_nF.php" method="POST">
                                    <input type="text" name="d" value=<?=$fila['codigo'];?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="nucleo.php" method="GET">

                                    <input type="text" name="codigo" value=<?=$fila['codigo'];?> hidden>
                                    <input type="text" name="numero_celular" value='<?=$fila['numero_celular'];?>'
                                        hidden>
                                    <input type="text" name="dinero" value='<?=$fila['dinero'];?>' hidden>
                                    <input type="text" name="fecha_de_matrimonio" hidden
                                        value='<?=$fila['fecha_de_matrimonio'];?>'>
                                    <input type="text" name="acta_de_matrimonio" hidden
                                        value='<?=$fila['acta_de_matrimonio'];?>'>

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

</body>

</html>