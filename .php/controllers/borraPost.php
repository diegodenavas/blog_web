<?php
    require("../models/administraContenido.php");

    $administraContenido = new AdministraContenido();

    $titulo = $_GET["name"];

    $administraContenido->borraPost($titulo); //post es el id para camuflarlo en el navegador.

    header("Location: /aprendiendoaprogramar.com/view_section.php?section=javascript");
?>