<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Cargamos las hojas de estilo de esta página-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/login.css">

    <?php
        session_start();

        if (isset($_SESSION["nick_usuario"])) header("Location: /aprendiendoaprogramar.com");
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
                <li class="elementosMenu"><a href="login.php">Login</a></li>
            </ul>
            <p class="divisionesMenu" id="logoMenu"><a href="index.php">aprendiendoaprogramar.com</a></p>
        </menu>
    </nav>

    <div id="contenedorLogin">
        <form action=".php/loginController.php" method="POST">
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick">
                <label for="Contraseña">Contraseña</label>
                <input type="text" name="pass">
            </div>
            <input type="submit">
        </form>
    </div>
</body>
</html>