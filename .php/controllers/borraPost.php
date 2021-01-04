<?php
    require("../models/administraContenido.php");

    session_start();

    $administraContenido = new AdministraContenido();

    $titulo = $_GET["name"];

    $post = $administraContenido->getPosts("SELECT * FROM post WHERE titulo = '" . $titulo ."'");

    if(isset($_SESSION["nick_usuario"])){

                if(($_SESSION["rol"] == 3 || $_SESSION["rol"] == 4) || ($_SESSION["rol"] == 2 && $post[0]->getUsuario() == $_SESSION["id"])){
                    
                    $administraContenido->borraPost($titulo);
                    header("Location: /view_section.php?section=" . $post[0]->getSeccion());

                }else{
                    header("Location: /");
                }
    }else{
        header("Location: /");
    }
?>