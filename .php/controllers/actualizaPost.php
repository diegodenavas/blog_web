<?php
    require("../models/conexionBDD.php");
    require("../models/post.php");

    $tituloAntiguo = $_POST["tituloAntiguo"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $seccion = $_POST["seccion"];

    //Ruta de la carpeta destino en servidor
    $imgName = $_FILES["imgPrincipal"]["name"];
    $imgName_temp = $_FILES["imgPrincipal"]["tmp_name"];
    $ruta = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "imagenes_posts" . DIRECTORY_SEPARATOR . $imgName;

    $conexion = new ConexionBDD();


    //Validamos y subimos las fotos del contenido.
    for ($i=0; $i < count($_FILES["imgIntoPost"]["name"]); $i++) { 

        if($_FILES["imgIntoPost"]["size"][$i] == 0) break;

        if(isset($_FILES["imgIntoPost"]["name"][$i])){

            if(validaFoto($_FILES["imgIntoPost"]["type"][$i], $_FILES["imgIntoPost"]["size"][$i])){

                //Ruta de la carpeta destino en servidor para imgContenido
                $imgContenidoName = $_FILES["imgIntoPost"]["name"][$i];
                $imgContenidoName_temp = $_FILES["imgIntoPost"]["tmp_name"][$i];
                $rutaImgContenido = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "imagenes_posts" . DIRECTORY_SEPARATOR . $imgContenidoName;
                
                //Movemos la imagen del directorio temporal de la imgContenido al directorio escogido
                    if( move_uploaded_file($imgContenidoName_temp, $rutaImgContenido)) {
                        echo "Fichero guardado con éxito";
                    }
                    else{
                        echo "Fichero no guardado";
                        return;
                    }

            }else{
                echo "Ha habido un error al validar una foto del contenido";
                return;
            }

        }

    }


    if($imgName != ""){
        //Movemos la imagen principal del directorio temporal al directorio escogido
        if( move_uploaded_file($imgName_temp, $ruta)) {
            echo "Fichero guardado con éxito";
        }
        else{
            echo "Fichero no guardado";
            var_dump($imgName);
            return;
        }

        $statement = $conexion->ejecutarConsulta("UPDATE post SET imagenPrincipal = ?, titulo = ?, contenido = ?, seccion = ? WHERE titulo = ?");

        if($statement->execute(array($imgName, $titulo, $contenido, $seccion, $tituloAntiguo ))){
            echo "post insertado en la bdd";
            header("Location: /aprendiendoaprogramar.com/view_post.php?" . "post=".$titulo."&edit='1'"); //Ponemos el edit=1 para que no añada visita cuando entre al post de nuevo.
        }
        else {
            echo "No se ha podido actualizar el post";
        }
    }else{
        $statement = $conexion->ejecutarConsulta("UPDATE post SET titulo = ?, contenido = ?, seccion = ? WHERE titulo = ?"); //Ponemos el edit=1 para que no añada visita cuando entre al post de nuevo.

        if($statement->execute(array($titulo, $contenido, $seccion, $tituloAntiguo ))){
            echo "post insertado en la bdd";
            header("Location: /aprendiendoaprogramar.com/view_post.php?" . "post=".$titulo."&edit='1'");
        }
        else {
            echo "No se ha podido actualizar el post";
        }
    }


    function validaFoto(String $format, int $size){
        $formatosValidos = array("image/.jpg", "image/jpeg", "image/png");

        if(in_array($format, $formatosValidos) && $size <= 500000){
            return true;
        }
    }
?>