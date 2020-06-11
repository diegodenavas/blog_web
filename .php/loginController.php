<?php
    include("usuario.php");

            $nick = $_POST["nick"];
            $pass = $_POST["pass"];

            $usuario = new Usuario($nick, $pass);

            if($usuario->validaUsuario()){
                session_start();
                $_SESSION["nick_usuario"] = $usuario->getNick();
                $_SESSION["pass_usuario"] = $usuario->getPass();

                header("Location: /aprendiendoaprogramar.com/");
            }
            else {
                header("Location: /aprendiendoaprogramar.com/login.php");
            }
?>