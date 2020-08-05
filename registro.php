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
    <script src=".js/eliminarDivCookies.js"></script>
    <script src=".js/menuDesplegable.js"></script>

    <?php
        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");

        if (isset($_SESSION["nick_usuario"])) header("Location: /programaycompila.com");
    ?>

</head>
<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <div id="contenedorRegistro" >
        <form action="/programaycompila.com/.php/controllers/registroController.php" method="POST" accept-charset="utf-8" id="registro">
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick" class="loginInput">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="pass" id="pass" class="loginInput">
                <label for="RepiteContraseña">Repite la contraseña</label>
                <input type="password" name="repeatPass" id="replypass" class="loginInput">
                <label for="Nombre">Nombre</label>
                <input type="text" name="name" class="loginInput">
                <label for="Apellido1">Primer apellido</label>
                <input type="text" name="surname1" class="loginInput">
                <label for="Apellido2">Segundo apellido</label>
                <input type="text" name="surname2" class="loginInput">
                <label for="Edad">Fecha de nacimiento</label>
                <input type="date" name="age" class="loginInput">
                <label for="Correo">Correo electrónico</label>
                <input type="text" name="email" class="loginInput">
            </div>
            <input type="submit" class="loginInput">
        </form>
    </div>

    <?php
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>