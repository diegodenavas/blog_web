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
    <?php
        require(".php/scripts/elementosComunes/nav.php");
    ?>

    <div id="contenedorLogin" class="contenedorFormulario">
        <form action="/aprendiendoaprogramar.com/.php/controllers/loginController.php" method="POST">
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="pass">
            </div>
            <input type="submit">
            <p id="mensajeRegistro">¿Aun no tienes cuenta? <br><br><a href="registro.php">Registrate</a><p>
        </form>
    </div>
</body>
</html>