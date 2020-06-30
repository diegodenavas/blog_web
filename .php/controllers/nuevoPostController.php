<?php
    require("../models/post.php");
    require("../models/conexionBDD.php");

    session_start();

    if(validaFotoPrincipal($_FILES["imgPrincipal"]["type"], $_FILES["imgPrincipal"]["size"])){

        $titulo = $_POST["titulo"];
        $contenido = $_POST["contenido"];
        $seccion = $_POST["seccion"];

        //Ruta de la carpeta destino en servidor
        $imgName = $_FILES["imgPrincipal"]["name"];
        $imgName_temp = $_FILES["imgPrincipal"]["tmp_name"];
        $ruta = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "imagenes_posts" . DIRECTORY_SEPARATOR . $imgName;

        $post = new Post($imgName, $titulo, $contenido, $seccion, $_SESSION["nick_usuario"]);

        //Movemos la imagen del directorio temporal al directorio escogido
        if( move_uploaded_file($imgName_temp, $ruta)) {
            echo "Fichero guardado con éxito";
        }
        else{
            echo "Fichero no guardado";
            return;
        }

        $conexionPost = new ConexionBDD();

        $statement = $conexionPost->ejecutarConsulta("INSERT INTO post(imagenPrincipal, titulo, contenido, seccion, id_usuario, fecha) VALUES(?, ?, ?, ?, (SELECT id FROM usuario WHERE nick=?), curdate())");

        if($statement->execute(array($post->getUrlImagen(), $post->getTitulo(), $post->getContenido(), $post->getSeccion(), $post->getUsuario() ))){
            echo "post insertado en la bdd";
            header("Location: /aprendiendoaprogramar.com/view_post.php?" . "post=".$post->getTitulo());
        }

    }else{
        echo "Ha habido un error al validar la foto de portada<br>";
    }


    function validaFotoPrincipal(String $format, int $size){
        $formatosValidos = array("image/.jpg", "image/jpeg", "image/png");

        if(in_array($format, $formatosValidos) && $size <= 500000){
            return true;
        }
    }
    
?>
