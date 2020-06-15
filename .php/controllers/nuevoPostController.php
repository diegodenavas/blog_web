<?php
    require("../models/post.php");
    require("../models/conexionBDD.php");

    session_start();

    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $seccion = $_POST["seccion"];

    $post = new Post($titulo, $contenido, $seccion, $_SESSION["nick_usuario"]);

    $archivo = fopen("../../posts/" . $post->getTitulo() . ".php", 'w') or die("Se produjo un error al crear el archivo");

    //$texto = <<<_END
    
    //_END;
  
    require ("../scripts/scriptNuevaPagina.php");

    fwrite($archivo, $miScript) or die("No se pudo escribir en el archivo");
    
    fclose($archivo);
    
    echo "Se ha escrito sin problemas";

    $conexionPost = new ConexionBDD();

    $statement = $conexionPost->ejecutarConsulta("INSERT INTO post(titulo, contenido, seccion, id_usuario, fecha, url) VALUES(?, ?, ?, (SELECT id FROM usuario WHERE nick=?), CURDATE(), ?)");

    if($statement->execute(array($post->getTitulo(), $post->getContenido(), $post->getSeccion(), $post->getUsuario(), "/aprendiendoaprogramar.com/posts/".$post->getTitulo()))){
        echo "post insertado en la bdd";
        $_SESSION["nombre_post"] = $post->getTitulo();
        header("Location: /aprendiendoaprogramar.com/posts/" . $post->getTitulo() . ".php");
    }

?>
