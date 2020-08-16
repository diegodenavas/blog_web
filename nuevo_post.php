<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo post</title>

    <!--Cargamos las hojas de estilo de esta página-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href=".css/nuevoPost.css">

    <!--Cargamos JQuery y los scripts de ésta página-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/textEditor.js"></script>
    <script src=".js/eliminarDivCookies.js"></script>
    <script src=".js/menuDesplegable.js"></script>

    <?php
        require(".php/models/administraContenido.php");

        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");
        
        if(!isset($_SESSION["rol"]) || (!$_SESSION["rol"] == 2 || !$_SESSION["rol"] == 3)){
            header("Location: /programaycompila.com");
        }
    ?>
    
</head>
<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <h1 id="tituloPost">programaYcompila > nuevo post</h1>

<div>
    <section>
        <form action=".php/controllers/nuevoPostController.php" method="POST" enctype="multipart/form-data">
            <label for="imgPrincipal">Imagen principal</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
            <input type="file" name="imgPrincipal" id="imgPrincipal">
            <label for="titulo">Título</label>
            <input type="text" name="titulo">
            <label for="contenido">Contenido</label>
            <div id="optionText-container">
                <span id="negrita" title="Negrita">N</span>
                <span id="cursiva" title="Cursiva">K</span>
                <span id="subrayado" title="Subrayado">S</span>
                <span id="fuenteGrande" title="Fuente grande">F:G</span>
                <span id="fuenteMuyGrande" title="Fuente muy grande">F:MG</span>

                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <span id='imgIntoPostSpan'><input type="file" name="imgIntoPost[]" multiple class="imgIntoPost" id='imgIntoPostId'></span>
            </div>
            <textarea name="contenido" id="content"></textarea>

            <select name="seccion">
                <option>Blog semanal</option>
                <option>Páginas web</option>
                <option>Aplicaciones web</option>
                <option>Otros proyectos</option>
            </select>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </section>

    <?php
        require(".php/scripts/elementosComunes/aside.php");
    ?>
    </div>
    
    <?php
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>