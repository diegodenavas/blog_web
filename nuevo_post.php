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

    <?php
        session_start();

        if($_SESSION["nick_usuario"] != "admin"){
            header("Location: /aprendiendoaprogramar.com");
        }
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
            </ul>
            <p class="divisionesMenu" id="logoMenu"><a href="index.php">aprendiendoaprogramar.com</a></p>
        </menu>
    </nav>

    <h1 id="tituloPagina">aprendiendoaprogramar > nuevo post</h1>

    <section>
        <form action=".php/nuevoPostController.php" method="POST">
            <label for="titulo">Título</label>
            <input type="text" name="titulo">
            <label for="contenido">Contenido</label>
            <textarea name="contenido"></textarea>
            <select name="seccion">
                <option>Javascript</option>
                <option>MySQL</option>
                <option>PHP</option>
                <option>Java</option>
            </select>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </section>

    <aside>

    </aside>

    
</body>
</html>