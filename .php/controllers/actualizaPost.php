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

    if($imgName != ""){
        //Movemos la imagen del directorio temporal al directorio escogido
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
?>