<?php
    require("../models/administraContenido.php");

    $borraPost = new AdministraContenido();

    $id = $_GET["post"];

    $borraPost->borraPost($id); //post es el id para camuflarlo en el navegador.

    header("Location: /aprendiendoaprogramar.com/javascript.php");
?>