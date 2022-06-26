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

    <!--Barra de navegación-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../mercados/mercados.php">Mercados</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../almacen/almacen.php">Almacen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../nucleo/nucleo.php">Nucleo Familiar</a>
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
                if(isset($_GET["numero_almacen"])){
            ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Almacen
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar un almacen mediante el metodo post-->
                        <form action="update_a.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="numero_almacen">Código de almacen</label>
                                <input type="text" readonly name="numero_almacen" value=<?=$_GET["numero_almacen"];?>
                                    id="numero_almacen" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?=$_GET["nombre"];?>' id="name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad máxima de mercados</label>
                                <input type="text" name="cantidad_mercados_maxima"
                                    value='<?=$_GET["cantidad_mercados_maxima"];?>' id="cantidad_mercados_maxima"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Núcleo administrador</label>

                                <select name="nucleo_administrador" id="nucleo_administrador" class="form-control"
                                    value=<?=$_GET["nucleo_administrador"];?>>
                                    <option value="NULL">Ninguno</option>
                                    <?php
                                    require('consultar_nF.php');
                                    if($resultP){
                                        foreach ($resultP as $fila){
                                    ?>
                                    <option value=<?=$fila['codigo'];?>><?=$fila['codigo'];?></option>
                                    <?php
                                        }
                                    }
                        
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="almacen.php" class="btn btn-danger">descartar</a>
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
                        Insertar Almacen
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar un almacen mediante el metodo post-->
                        <form action="insert_a.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo_almacen">Código de almacen</label>
                                <input type="text" name="numero_almacen" id="numero_almacen" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad máxima de mercados</label>
                                <input type="text" name="cantidad_mercados_maxima" id="cantidad_mercados_maxima"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Núcleo administrador</label>

                                <select name="nucleo_administrador" id="nucleo_administrador" class="form-control">
                                    <option value="NULL">Ninguno</option>
                                    <?php
                                    require('consultar_nF.php');
                                    if($resultP){
                                        foreach ($resultP as $fila){
                                    ?>
                                    <option value=<?=$fila['codigo'];?>><?=$fila['codigo'];?></option>
                                    <?php
                                        }
                                    }
                        
                                    ?>

                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
                                <a href="almacen.php" class="btn btn-danger">Reiniciar</a>
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
                            <th scope="col">Numero Almacen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad maxima mercados</th>
                            <th scope="col">Nucleo administrador</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        require('select_a.php');
        if($result){
            foreach ($result as $fila){
        ?>
                        <tr>
                            <td><?=$fila['numero_almacen'];?></td>
                            <td><?=$fila['nombre'];?></td>
                            <td><?=$fila['cantidad_mercados_maxima'];?></td>
                            <td><?=$fila['nucleo_administrador'];?></td>
                            <td>

                                <form action="delete_a.php" method="POST">
                                    <input type="text" value=<?=$fila['numero_almacen'];?> hidden>
                                    <input type="text" name="d" value=<?=$fila['numero_almacen'];?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="almacen.php" method="GET">

                                    <input type="text" name="numero_almacen" value=<?=$fila['numero_almacen'];?> hidden>
                                    <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                    <input type="text" name="cantidad_mercados_maxima" value='<?=$fila['cantidad_mercados_maxima'];?>' hidden>
                                    <input type="text" name="nucleo_administrador" hidden value= '<?=$fila['nucleo_administrador'];?>'>

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