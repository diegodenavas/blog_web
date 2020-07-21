<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel='stylesheet' href='.css/plantillaReset.css'>
    <link rel='stylesheet' href='.css/general.css'>
    <link rel='stylesheet' href='.css/estilosPaginasGeneral.css'>
    <link rel='stylesheet' href='.css/estilosSeccionesArticulos.css'>
    <link rel='stylesheet' href='.css/viewPost.css'>
    <link rel="stylesheet" href=".css/nuevoPost.css">

    <!--Cargamos jquery y nuestros scripts-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src=".js/iconos.js"></script>
    <script src=".js/eliminarDivCookies.js"></script>
    <script src=".js/editarPost.js"></script>
    <script src=".js/menuDesplegable.js"></script>

    <?php
        require('.php/models/administraContenido.php');
        require_once('.php/models/post.php');
        require_once('.php/models/conexionBDD.php');
        include(".php/models/visita.php");
        require_once(".php/models/administraContenido.php");
        session_start();

        require(".php/scripts/elementosComunes/cookieRecordarSesion.php");

        $miPost = $_GET['post'];

        $recibePost = new AdministraContenido();
        $post = $recibePost->getPosts('SELECT * FROM post WHERE titulo ="'. $miPost .'"');

        $tituloPost = str_replace(' ', '', $miPost);

        if(!isset($_COOKIE[$tituloPost])){

                $visita = new Visita();

                $visita->addVisita($miPost);
            
                setcookie($tituloPost, "visitado", time()+14400);
        }
    ?>
    
</head>

<body>
    <?php
        require(".php/scripts/elementosComunes/navMobile.php");
        require('.php/scripts/elementosComunes/nav.php');
        require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <?php
        echo 
        "<h1 id='tituloPost'>" . $post[0]->getTitulo() . "</h1>";

            if(isset($_SESSION["nick_usuario"])){
                if(($_SESSION["rol"] == 3 || $_SESSION["rol"] == 4) || ($_SESSION["rol"] == 2 && $post[0]->getUsuario() == $_SESSION["id"])){
                echo
                "<div id='optionsAdminContainer'>
                <a href='#'><img src='imagenes/editar.png' class='iconosAdministracionPost' id='editar'></a>
                <a href='.php/controllers/borraPost.php?name=". $post[0]->getTitulo() ."'><img src='imagenes/icono_papelera_cerrada.png' class='iconosAdministracionPost' id='iconoPapelera'></a>
                </div>";
                }
            }
        echo
        "<section>
            <p id='cuerpoPost'>" . $post[0]->getContenido() . "</p>
        </section>";    
    ?>

    <?php
        require(".php/scripts/elementosComunes/aside.php");
    ?>

    <?php
        require(".php/scripts/elementosComunes/footer.php");
    ?>
</body>
</html>