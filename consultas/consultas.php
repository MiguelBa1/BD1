<!DOCTYPE html>
<html lang="en">
<!--cabecera del html -->

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
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir iconos y formas 
         para mas informacion : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
        <li class="nav-item">
            <a class="nav-link" href="../nucleo/nucleo.php">Núcleo Familiar</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Búsquedas</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="../consultas/consultas.php">Consultas</a>
        </li>
    </ul>
    <div class="container">
        <div class="row my-2">
            <div class="col-6">
                <p>Para realizar una consulta, por favor selecciona una de las opciones y a continuación precione el botón de consultar</p>
                <form action="consultasSQL.php" target="_blank" method="POST">
                    <div class="form-group">

                        <div class="form-check py-3">
                            <input class="form-check-input" type="radio" name="consultas" id="consultas1"
                                value="Primera" checked>
                            <label class="form-check-label" for="consultas1">
                            Mostrar número y nombre de los almacenes que son administrados por algún núcleo familiar, la suma de los valores de sus mercados asociados es mayor a 1000, el número de sus mercados almacenados es mayor o igual a 3 y su núcleo administrador no ha comprado mercados
                            </label>
                        </div>
                        <div class="form-check py-3">
                            <input class="form-check-input" type="radio" name="consultas" id="consultas2"
                                value="Segunda">
                            <label class="form-check-label" for="consultas2">
                            Mostrar código y el valor total de los mercados en donde su valor total es mayor al dinero del núcleo que lo compró y el núcleo que lo compró es administrador del almacen que guarda el mercado
                            </label>
                        </div>
                    </div>
                    <div class="input-group ">
                        <button class="btn  btn-primary" title="Buscar" type="submit">
                            <i class="fas fa-search-plus mx-0 my-0"></i>  Consultar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>