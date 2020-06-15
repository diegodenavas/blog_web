<?php
    require("../models/usuario.php");

            $nick = $_POST["nick"];
            $pass = $_POST["pass"];

            var_dump($nick);

            echo $nick;

            $usuario = new Usuario($nick, $pass);

            if($usuario->validaUsuario()){

                session_start();

                $_SESSION["nick_usuario"] = $usuario->getNick();
                $_SESSION["pass_usuario"] = $usuario->getPass();
                $_SESSION["fecha_usuario"] = $usuario->getDate();

                header("Location: /aprendiendoaprogramar.com/");
            }
            else {
                header("Location: /aprendiendoaprogramar.com/login.php");
            }
?>