<?php
    require("../models/post.php");
    require("../models/conexionBDD.php");

    session_start();

    //Validamos y subimos la foto de portada
    if(isset($_FILES["imgPrincipal"])){

        if(validaFoto($_FILES["imgPrincipal"]["type"], $_FILES["imgPrincipal"]["size"])){

            $titulo = $_POST["titulo"];
            $contenido = $_POST["contenido"];
            $seccion = $_POST["seccion"];

            //Ruta de la carpeta destino en servidor para imgPrincipal
            $imgPrincipalName = $_FILES["imgPrincipal"]["name"];
            $imgPrincipalName_temp = $_FILES["imgPrincipal"]["tmp_name"];
            $rutaImgPrincipal = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "imagenes_posts" . DIRECTORY_SEPARATOR . $imgPrincipalName;

            $post = new Post($imgPrincipalName, $titulo, $contenido, $seccion, $_SESSION["nick_usuario"]);

            //Movemos la imagen del directorio temporal de la imgPrincipal al directorio escogido
            if( move_uploaded_file($imgPrincipalName_temp, $rutaImgPrincipal)) {
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

    }else{
        echo "Hay que subir una foto de portada";
    }


    //Validamos y subimos las fotos del contenido.
    if(isset($_FILES["imgIntoPost"]) && isset($_FILES["imgIntoPost"])){

        if(validaFoto($_FILES["imgIntoPost"]["type"], $_FILES["imgPrincipal"]["size"])){

            //Ruta de la carpeta destino en servidor para imgContenido
            do{
                $imgContenidoName = $_FILES["imgIntoPost"]["name"];
                $imgContenidoName_temp = $_FILES["imgIntoPost"]["tmp_name"];
                $rutaImgContenido = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "imagenes_posts" . DIRECTORY_SEPARATOR . $imgContenidoName;
            }while(!isset($_FILES["imgIntoPost"]["name"]));

            //Movemos la imagen del directorio temporal de la imgContenido al directorio escogido
            if(isset($imgPrincipalName)){

                if( move_uploaded_file($imgContenidoName_temp, $rutaImgContenido)) {
                    echo "Fichero guardado con éxito";
                }
                else{
                    echo "Fichero no guardado";
                    return;
                }
            
            }

        }else{
            echo "Ha habido un error al validar una foto del contenido";
        }

    }

    


    function validaFoto(String $format, int $size){
        $formatosValidos = array("image/.jpg", "image/jpeg", "image/png");

        if(in_array($format, $formatosValidos) && $size <= 500000){
            return true;
        }
    }
    
?>