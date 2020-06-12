<?php

$miScript = 
"<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>

    <!--Cargamos nuestras hojas de estilo-->
    <link rel='stylesheet' href='.css/plantillaReset.css'>
    <link rel='stylesheet' href='.css/general.css'>
    <link rel='stylesheet' href='.css/estilosPaginasGeneral.css'>

    <!--Cargamos jquery y nuestros scripts-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

    <?php
        session_start();
    ?>
</head>

<body>
    <nav>
        <menu>
            <ul class='divisionesMenu'>
                <li class='elementosMenu'><a href='javascript.php'>JavaScript</a></li>
                <li class='elementosMenu'><a href=''>PHP</a></li>
                <li class='elementosMenu'><a href=''>MySQL</a></li>
                <li class='elementosMenu'><a href=''>Java</a></li>
                <?php
                    if(!isset($" . "_SESSION['nick_usuario'])) printf('<li class=elementosMenu><a href=login.php>Login</a></li>');
                    else echo 'Bienvenido ' . $" . "_SESSION['nick_usuario'];
                ?>
            </ul>
            <p class='divisionesMenu' id='logoMenu'><a href='index.php'>aprendiendoaprogramar.com</a></p>
        </menu>
    </nav>

    <?php
        require('.php/conexionBDD.php');

        $"."conex = new ConexionBDD();

        $"."resultado = $"."conex->ejecutarConsulta('SELECT * FROM post WHERE id=1');
        
        if($"."resultado->execute(array())){

            $"."fila = $"."resultado->fetch(PDO::FETCH_NUM);

            echo 
            '<h1 id=tituloPagina>' . $"."fila[1] . '</h1>
            
            <section>
                <p>' . $"."fila[2] . '</p>
            </section>';
        }
    ?>

    <aside>
        <h4>Post mas visitados</h4>
        <p>Primeros pasos</p>
        <p>Terminando el index</p>
        <p>Creando contenido</p>
    </aside>
</html>"
?>
