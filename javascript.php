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
    <?php
        require(".php/scripts/elementosComunes/nav.php");
    ?>

    <h1 id="tituloPagina">aprendiendoaprogramar > javascript</h1>

    <div>
        <section>

            <?php
                require(".php/controllers/sectionsController.php");

                $controlador = new SectionsController();

                $controlador->muestraPost();

                if(isset($_SESSION["nick_usuario"])){
                    if($_SESSION["nick_usuario"] == "admin"){
                        echo
                        "<p id=pestañaNuevoPost><a href='nuevo_post.php'>Nuevo post</a></p>";
                    }
                }
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