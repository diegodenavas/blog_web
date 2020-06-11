<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href=".css/estilosSeccionesArticulos.css">

    <!--Cargamos jquery y nuestros scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
        session_start();
    ?>

</head>

<body>
    <nav>
        <menu>
            <ul class="divisionesMenu">
                <li class="elementosMenu"><a href="javascript.php">JavaScript</a></li>
                <li class="elementosMenu"><a href="">PHP</a></li>
                <li class="elementosMenu"><a href="">MySQL</a></li>
                <li class="elementosMenu"><a href="">Java</a></li>
                <?php
                    if(!isset($_SESSION["nick_usuario"])) echo "<li class='elementosMenu'><a href='login.php'>Login</a></li>";
                    else echo "Bienvenido " . $_SESSION["nick_usuario"];
                ?>
            </ul>
            <p class="divisionesMenu" id="logoMenu"><a href="index.php">aprendiendoaprogramar.com</a></p>
        </menu>
    </nav>

    <h1 id="tituloPagina">aprendiendoaprogramar > javascript</h1>

    <div>
        <section>

            <?php
                require(".php/sectionsController.php");

                $controlador = new SectionsController();

                $controlador->muestraPost("SELECT * FROM post");
            ?>

        </section>
        
        <aside>
            <h4>Post mas visitados</h4>
            <p>Primeros pasos</p>
            <p>Terminando el index</p>
            <p>Creando contenido</p>
        </aside>
    </div>
</body>
</html>