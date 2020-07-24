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
    <script src=".js/menuDesplegable.js"></script>
    
    <?php
        require(".php/controllers/sectionsController.php");
        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <h1 id="tituloPagina" class="tituloPagCompleto">programadiario ></h1><h1 class="tituloPagCompleto"><?php echo $_GET["section"] ?></h1>

    
        <section>
            
            <?php
                $controlador = new SectionsController();

                $seccion = $_GET['section'];

                $controlador->muestraPost("SELECT * FROM post WHERE seccion = '$seccion'", $seccion);

                if(isset($_SESSION["rol"])){
                    if($_SESSION["rol"] == 2 || $_SESSION["rol"] == 3 || $_SESSION["rol"] == 4){
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