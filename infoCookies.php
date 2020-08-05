<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Cargamos las hojas de estilo de esta página-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href=".css/estilosSeccionesArticulos.css">
    <link rel="stylesheet" href=".css/infoCookies.css">

    <!--Cargamos JQuery y los scripts de ésta página-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/eliminarDivCookies.js"></script>
    <script src=".js/menuDesplegable.js"></script>

    <script>
        $('document').ready(function(){
            console.log(window.innerWidth);
        });
    </script>

    <?php
        require(".php/controllers/sectionsController.php");
        require_once(".php/models/usuario.php");

        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");
    ?>

</head>
<body>

    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require(".php/scripts/elementosComunes/nav.php");
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <h1 id="tituloPagina" class="tituloPagCompleto">Politica de Cookies</h1>

    <section>
        <p>En cumplimiento con lo dispuesto en el artículo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de 
        la Información y de Comercio Electrónico, esta página web le informa, en esta sección, sobre la política de recogida y tratamiento de cookies.</p>

        <p class='tituloCookies'>¿Qué son las cookies?</p>

        <p>Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las cookies permiten a una página web, 
        entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un usuario o de su equipo y, dependiendo de la 
        información que contengan y de la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario.</p>

        <ul>
            <li type='disc'><b>Cookies técnicas:</b> Son aquellas imprescindibles para que funcione la página web.</li>

            <li type='disc'><b>Otras cookies:</b> Son todas las que no son imprescindibles para el funcionamiento de la página web pero se utilizan para el seguimiento, la 
            personalización, la publicidad o el análisis.</li>
        </ul>

        <p class='tituloCookies'>¿Qué tipos de cookies utiliza esta página web?</p>

        <ul>
            <li type='disc'><b>Cookies técnicas:</b> En este blog se utilizan cookies de sesión, cookies para recordar la sesión en el navegador durante un periodo de tiempo, 
            y cookies que registran las visitas de cada post para mostrar los post mas visitados</li>

            <li type='disc'><b>Cookies de análisis:</b> Este blog utiliza las cookies que implementa Google Analytics para poder realizar un seguimiento y 
            revisar estadísticas del flujo de usuarios del blog, así como el desglose de análisis de uso cómo localizaciones de conexión a la web más frecuentes, tipos de 
            dispositivos más usados, y demás herramientas para mejorar la calidad y adaptabilidad a los usuarios</li>

        </ul>

        <p class='tituloCookies'>Cómo desactivar las Cookies</p>

        <p>Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador.
        <br>
        A continuación puede acceder a la configuración de los navegadores webs más frecuentes para aceptar, instalar o desactivar las cookies:</p>

        <ul>
            <li type='disc'><a href='https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias' target="_blank">Firefox</a></li>
            <li type='disc'><a href='https://support.apple.com/es-es/HT201265' target="_blank">Safari</a></li>
            <li type='disc'><a href='https://support.google.com/chrome/answer/95647?hl=es' target="_blank">Google Chrome</a></li>
        </ul>

        <p class='tituloCookies'>Cookies de Terceros</p>

        <p>Esta página web utiliza servicios de terceros para recopilar información con fines estadísticos y de uso de la web.</p>

        <ul>
            <li type='disc'>Google Analytics</li>
        </ul>

    </section>

    <?php
        require(".php/scripts/elementosComunes/aside.php");
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>