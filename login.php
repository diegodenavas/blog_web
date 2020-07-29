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

    <!--Cargamos JQuery y los scripts de ésta página-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/eliminarDivCookies.js"></script>
    <script src=".js/login.js"></script>
    <script src=".js/menuDesplegable.js"></script>

    <?php
        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");

        if (isset($_SESSION["nick_usuario"])) header("Location: /aprendiendoaprogramar.com");
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <div id="contenedorLogin" class="contenedorFormulario">
        <form action="/aprendiendoaprogramar.com/.php/controllers/loginController.php" method="POST" id="login">
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick" class="loginInput">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="pass" class="loginInput">
                <?php
                    if(isset($_COOKIE["cookiesAceptadas"])){
                        if($_COOKIE["cookiesAceptadas"] == 'aceptadas'){
                            echo
                            "<input type='checkbox' name='recordarDatos'>
                            <label for='recordar'>Recordar en este equipo</label>";
                        }
                    }
                ?>
            </div>
            <input type="submit">
            <p id="mensajeRegistro">¿Aun no tienes cuenta? <br><br><a href="registro.php">Registrate</a><p>
        </form>
    </div>

    <?php
        require(".php/scripts/elementosComunes/footer.php");
    ?>
</body>
</html>