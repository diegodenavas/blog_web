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

    <?php
        require(".php/models/administraContenido.php");

        session_start();

        if($_SESSION["nick_usuario"] != "admin"){
            header("Location: /aprendiendoaprogramar.com");
        }
    ?>
    
</head>
<body>
    <?php
        require(".php/scripts/elementosComunes/nav.php");
    ?>

    <h1 id="tituloPagina">aprendiendoaprogramar > nuevo post</h1>

<div>
    <section>
        <form action=".php/controllers/nuevoPostController.php" method="POST" enctype="multipart/form-data">
            <label for="imgPrincipal">Imagen principal</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
            <input type="file" name="imgPrincipal" id="imgPrincipal">
            <label for="titulo">Título</label>
            <input type="text" name="titulo">
            <label for="contenido">Contenido</label>
            <div>
                <span id="negrita">N</span>
                <span id="cursiva">K</span>
                <span id="subrayado">S</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <span><input type="file" name="imgIntoPost" id="imgIntoPost"></span>
            </div>
            <textarea name="contenido" id="content"></textarea>
            <select name="seccion">
                <option>JavaScript</option>
                <option>MySQL</option>
                <option>PHP</option>
                <option>Java</option>
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
    ?>
</body>
</html>