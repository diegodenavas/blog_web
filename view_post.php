<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel='stylesheet' href='.css/plantillaReset.css'>
    <link rel='stylesheet' href='.css/general.css'>
    <link rel='stylesheet' href='.css/estilosPaginasGeneral.css'>
    <link rel='stylesheet' href='.css/estilosSeccionesArticulos.css'>

    <!--Cargamos jquery y nuestros scripts-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

    <?php
        require('.php/models/administraContenido.php');
        require_once('.php/models/post.php');
        session_start();
    ?>
</head>

<body>
    <?php
    require('.php/scripts/elementosComunes/nav.php');
    ?>

    <?php
        $miPost = $_GET['post'];

        $recibePost = new AdministraContenido();
        $post = $recibePost->getPosts('SELECT * FROM post WHERE titulo ="'. $miPost .'"');

        echo 
        "<h1 id=tituloPagina>" . $post[0]->getTitulo() . "</h1>
        
        <section>
            <p>" . $post[0]->getContenido() . "</p>
        </section>";    
    ?>

    <aside>
        <h4>Post mas visitados</h4>
        <p>Primeros pasos</p>
        <p>Terminando el index</p>
        <p>Creando contenido</p>
    </aside>
</body>
</html>