<?php
session_start();

if (isset($_SESSION["nick_usuario"])) header("Location: /");

require(".php/scripts/elementosComunes/cookieRecordarSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/imagenes/favicom-350X350.png">
    <title>programaYcompila.es</title>

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
        if (isset($_SESSION["nick_usuario"])) header("Location: /");
    ?>

</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <div id="contenedorLogin" class="contenedorFormulario">
        <form action=".php/controllers/loginController.php" method="POST" id="login" style='display: block'>
            <div id="contenedorTextos">
                <label for="Usuario">Usuario</label>
                <input type="text" name="nick" class="loginInput" id="user">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="pass" class="loginInput" id="pass">
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
            <input type="button" id="botonEnviar" value="Enviar">
            <!--<p id="mensajeRegistro">¿Aun no tienes cuenta? <br><br><a href="registro.php">Registrate</a><p>-->
            <p id='msgError' style='font-family: serif; font-size:0.8em; margin-top: 10px; color:red; width: 100%' >El usuario o la contraseña son incorrectos</p>
        </form>
    </div>

    <?php
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>