<?php
    require("post.php");
    require("conexionBDD.php");

    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $seccion = $_POST["seccion"];

    $post = new Post($titulo, $contenido, $seccion);

    $archivo = fopen("../" . $post->getTitulo() . ".php", 'w') or die("Se produjo un error al crear el archivo");

    $texto = <<<_END
    
    _END;
  
    require ("scriptNuevaPagina.php");

    fwrite($archivo, $miScript) or die("No se pudo escribir en el archivo");
    
    fclose($archivo);
    
    echo "Se ha escrito sin problemas";

    $conexionPost = new ConexionBDD();

    $statement = $conexionPost->ejecutarConsulta("INSERT INTO post(titulo, contenido) VALUES(?, ?)");

    if($statement->execute(array($post->getTitulo(), $post->getContenido()))){
        echo "post insertado en la bdd";
    }

    header("Location: /aprendiendoaprogramar.com/" . $post->getTitulo() . ".php");

?>
