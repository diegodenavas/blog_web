<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>programaYcompila.com</title>

    <!--Cargamos less
    <link rel="stylesheet/less" type="text/css" href="styles.less">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
    -->

    <!--Cargamos las hojas de estilo de esta página-->
    <link rel="stylesheet" href=".css/plantillaReset.css">
    <link rel="stylesheet" href=".css/general.css">
    <link rel="stylesheet" href=".css/index.css">
    <link rel="stylesheet" href=".css/estilosPaginasGeneral.css">
    <link rel="stylesheet" href=".css/estilosSeccionesArticulos.css">

    <!--Cargamos JQuery y los scripts de ésta página-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=".js/index.js"></script>
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

    <header id="cabecera">
        <div>
            <h1>Blog de aprendizaje a la programación</h1>
            <h2>Te cuento mi dia a dia y como estoy aprendiendo desarrollo web de 
                forma autodidacta en tiempo real</h2>
            <p>Acompáñame en esta aventura en la que navegaremos por los lenguajes 
                de programación mas utilizados en la actualidad, nos introduciremos 
                en las profundidades de las bases de datos relacionales y exploraremos 
                las inmensidades de los sistemas de control de versiones</p>
            <p><strong>¡Sumergete en este viaje!</strong></p>
            <img id="flechaAbajo" src="imagenes/flecha_abajo.png" alt="desplazarse hacia abajo">
        </div>
    </header>

    <section>

        <?php
            $controlador = new SectionsController();

            $controlador->muestraPost("SELECT p.id, p.imagenPrincipal, p.titulo, p.resumen, p.contenido, p.seccion, u.nick, p.fecha FROM post p INNER JOIN usuario u on p.id_usuario = u.id ", "*");

            if(isset($_SESSION["nick_usuario"])){
                if($_SESSION["nick_usuario"] == "admin"){
                    echo
                    "<a id=pestañaNuevoPost href='nuevo_post.php'><p id=pestañaNuevoPostParrafo>Nuevo post</p></a>";
                }
            }    
        ?>

    </section>

    <?php
        require(".php/scripts/elementosComunes/aside.php");
        require(".php/scripts/elementosComunes/footer.php");
        require(".php/scripts/elementosComunes/footerMobile.php");
    ?>
</body>
</html>