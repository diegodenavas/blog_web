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
    <script src=".js/textEditor.js"></script>
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

        if(!isset($_COOKIE[$tituloPost]) && !isset($_GET['edit'])){

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
        
        $contenidoSinBr = str_replace("<br />", "", $post[0]->getContenido());

        echo
        "<section>
            <p id='cuerpoPost'>" . $post[0]->getContenido() . "</p>

            <form action='.php/controllers/actualizaPost.php' method='POST' enctype='multipart/form-data' id='editorOculto'>
                <input type='hidden' name='tituloAntiguo'/ value='" . $post[0]->getTitulo() . "'>
                <label for='imgPrincipal'>Imagen principal</label>
                <input type='hidden' name='MAX_FILE_SIZE' value='2000000'/>
                <input type='file' name='imgPrincipal' id='imgPrincipal'>
                <label for='titulo'>Título</label>
                <input type='text' name='titulo' value='" . $post[0]->getTitulo() . "'>
                <label for='contenido'>Contenido</label>
                <div>
                    <span id='negrita'>N</span>
                    <span id='cursiva'>K</span>
                    <span id='subrayado'>S</span>
                    <input type='hidden' name='MAX_FILE_SIZE' value='2000000' />
                    <span><input type='file' name='imgIntoPost' multiple id='imgIntoPost'></span>
                </div>
                <textarea name='contenido' id='content'>" . $contenidoSinBr . "</textarea>

                <select name='seccion'>
                    <option>JavaScript</option>
                    <option>MySQL</option>
                    <option>PHP</option>
                    <option>Java</option>
                </select>
                <br>
                <input type='submit' value='Enviar'>
            </form>

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