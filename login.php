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
        include(".php/models/Usuario.php");
        session_start();

        if (isset($_SESSION["nick_usuario"])) header("Location: /aprendiendoaprogramar.com");
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/nav.php");
    ?>

    <div id="contenedorLogin">
        <form action="/aprendiendoaprogramar.com/.php/controllers/loginController.php" method="POST">
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