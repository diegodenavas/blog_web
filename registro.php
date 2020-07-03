<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!--Cargamos las hojas de estilo de esta página-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/login.css">

    <!--Cargamos JQuery y los scripts de ésta página-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/comprobarPass.js"></script>


    <?php
        session_start();

        if (isset($_SESSION["nick_usuario"])) header("Location: /aprendiendoaprogramar.com");
    ?>

</head>
<body>
    <?php
        require(".php/scripts/elementosComunes/nav.php");
    ?>

    <div id="contenedorRegistro" >
        <form action="/aprendiendoaprogramar.com/.php/controllers/registroController.php" method="POST" accept-charset="utf-8">
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="pass" id="pass">
                <label for="RepiteContraseña">Repite la contraseña</label>
                <input type="password" name="repeatPass" id="replypass">
                <label for="Nombre">Nombre</label>
                <input type="text" name="name">
                <label for="Apellido1">Primer apellido</label>
                <input type="text" name="surname1">
                <label for="Apellido2">Segundo apellido</label>
                <input type="text" name="surname2">
                <label for="Edad">Fecha de nacimiento</label>
                <input type="date" name="age">
                <label for="Correo">Correo electrónico</label>
                <input type="text" name="email">
            </div>
            <input type="submit">
        </form>
    </div>

    <?php
        require(".php/scripts/elementosComunes/footer.php");
    ?>
</body>
</html>