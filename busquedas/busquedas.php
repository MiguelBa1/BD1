<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
<!DOCTYPE html>
<html lang="en">
<!--cabecera del html -->

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

        <li class="nav-pills">
            <a class="nav-link active" href="../busquedas/busquedas.php">Búsquedas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../consultas/consultas.php">Consultas</a>
        </li>
    </ul>
    <div class="container">
        <div class="row my-2">
            <div class="col-6 p-1">
                <div class="card p-3">
                    <form action="busqueda_1_SQL.php" target="_blank" method="POST">
                        <h4>Búsqueda 1</h4>
                        <u>Variables</u>
                        <p>Dos fechas <b>f1</b> y <b>f2</b> (día, mes y año), <b>f2</b> ≥ <b>f1</b> y un número entero <b>n</b>,
                            <b>n</b> ≥ <b>0</b>.
                        </p>
                        <u>Enunciado original:</u>
                        <p>Se debe mostrar la cédula y el celular de todos los clientes que han
                            revisado exactamente <b>n</b> proyectos en dicho rango de fechas [<b>f1</b>, <b>f2</b>].
                        </p>
                        <u>Transformado a nuestro caso:</u>
                        <p>Se debe mostrar el número del almacén y el número máximo de mercados de todos los almacenes que han
                            almacenado exactamente <b>n</b> mercados comprados en dicho rango de fechas [<b>f1</b>, <b>f2</b>].
                        </p>
                        <div class="form-group">
                            <label for="f1">Fecha inicio <b>(f1)</b><span style="color: red;">*</span></label>
                            <input type="date" name="f1" id="f1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="f2">Fecha fin <b>(f2)</b><span style="color: red;">*</span></label>
                            <input type="date" name="f2" id="f2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="n">Número de mercados <b>(n)</b><span style="color: red;">*</span></label>
                            <input type="number" name="n" id="n" class="form-control" min="0" required>
                        </div>
                        <div class="form-group justify-content-center">
                        <button class="btn btn-primary btn-block" title="Buscar" type="submit">
                                Buscar<i class="fas fa-search-plus mx-2 my-0"></i></button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-6 p-1">
                <div class="card p-3">
                    <form action="busqueda_2_SQL.php" target="_blank" method="POST">
                        <h4>Búsqueda 2</h4>
                        <u>Variables</u>
                        <p>Dos números enteros <b>n1</b> y <b>n2</b>, <b>n1</b> ≥ <b>0</b>, <b>n2</b> > <b>n1</b>.</p>
                        <u>Enunciado original:</u>
                        <p>Se debe mostrar el nit y el
                            nombre de todas las empresas que han revisado entre <b>n1</b> y <b>n2</b> proyectos
                            (intervalo cerrado [<b>n1</b>, <b>n2</b>]).
                        </p>
                        <u>Transformado a nuestro caso:</u>
                        <p>Se debe mostrar el código y el
                            número de teléfono de todos los núcleos familiares que han comprado entre <b>n1</b> y <b>n2</b> mercados
                            (intervalo cerrado [<b>n1</b>, <b>n2</b>]).
                        </p>
                        <div class="form-group">
                            <label for="n1">Número de mercados mínimo <b>(n1)</b><span style="color: red;">*</span></label>
                            <input type="number" name="n1" id="n1" class="form-control" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="n2">Número de mercados máximo <b>(n2)</b><span style="color: red;">*</span></label>
                            <input type="number" name="n2" id="n2" class="form-control" min="0" required>
                        </div>
                        <div class="form-group justify-content-center">
                        <button class="btn btn-primary btn-block" title="Buscar" type="submit">
                                Buscar<i class="fas fa-search-plus mx-2 my-0"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>