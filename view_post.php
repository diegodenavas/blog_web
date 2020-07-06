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

    <!--Cargamos jquery y nuestros scripts-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src=".js/eliminarDivCookies.js"></script>

    <?php
        require('.php/models/administraContenido.php');
        require_once('.php/models/post.php');
        require_once('.php/models/conexionBDD.php');
        include(".php/models/visita.php");
        require_once(".php/models/administraContenido.php");
        session_start();

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
    require('.php/scripts/elementosComunes/nav.php');
    require(".php/scripts/elementosComunes/aceptarCookies.php");
    ?>

    <?php
        echo 
        "<h1 id=tituloPagina>" . $post[0]->getTitulo() . "</h1>";

            if(isset($_SESSION["nick_usuario"])){
                if($_SESSION["nick_usuario"] == "admin"){
                echo
                "<div id='optionsAdminContainer'>
                <a href='.php/controllers/borraPost.php?name=". $post[0]->getTitulo() ."'><p>Borrar</p></a>
                </div>";
                }
            }
        echo
        "<section>
            <p>" . $post[0]->getContenido() . "</p>
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