<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href=".css/estilosSeccionesArticulos.css">

    <!--Cargamos jquery y nuestros scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/iconos.js"></script>
    <script src=".js/eliminarDivCookies.js"></script>
    
    <?php
        require(".php/controllers/sectionsController.php");
        session_start();
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <h1 id="tituloPagina">aprendiendoaprogramar > <?php echo $_GET["section"] ?></h1>

    
        <section>
            
            <?php
                $controlador = new SectionsController();

                $controlador->muestraPost("SELECT * FROM post WHERE seccion ='" . $_GET['section'] . "'");

                if(isset($_SESSION["nick_usuario"])){
                    if($_SESSION["nick_usuario"] == "admin"){
                        echo
                        "<a id=pestañaNuevoPost href='nuevo_post.php'><p id=pestañaNuevoPostParrafo>Nuevo post</p></a>";
                    }
                }
            ?>

        </section>
        
        <?php
            require(".php/scripts/elementosComunes/aside.php");
        ?>
    

    <?php
        require(".php/scripts/elementosComunes/footer.php");
    ?>
</body>
</html>