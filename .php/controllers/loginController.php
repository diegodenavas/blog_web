<?php
    require("../models/usuario.php");

            $nick = $_POST["nick"];
            $pass = $_POST["pass"];

            $usuario = Usuario::usuarioLogin($nick, $pass);

            if($usuario->validaUsuario()){

                session_start();

                $_SESSION["nick_usuario"] = $usuario->getNick();

                header("Location: /aprendiendoaprogramar.com/");
            }
            else {
                header("Location: /aprendiendoaprogramar.com/login.php");
            }
?>