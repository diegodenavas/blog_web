<?php
    require("../models/usuario.php");
    require("../models/administraContenido.php");

            $nick = $_POST["nick"];
            $pass = $_POST["pass"];
            $recordarDatos = $_POST["recordarDatos"];

            $usuarioAux = Usuario::usuarioLogin($nick, $pass);

            if($usuarioAux->validaUsuario()){

                $administraContenido = new AdministraContenido();

                $usuario = $administraContenido->getUsuarios('SELECT * FROM usuario WHERE nick="'. $nick .'"');

                session_start();

                $_SESSION["id"] = $usuario[0]->getId();
                $_SESSION["nick_usuario"] = $usuario[0]->getNick();
                $_SESSION["name"] = $usuario[0]->getName();
                $_SESSION["surname1"] = $usuario[0]->getSurname1();
                $_SESSION["surname2"] = $usuario[0]->getSurname2();
                $_SESSION["birthday"] = $usuario[0]->getBirthday();
                $_SESSION["registerDate"] = $usuario[0]->getDateRegister();
                $_SESSION["email"] = $usuario[0]->getEmail();
                $_SESSION["rol"] = $usuario[0]->getRol();

                if(isset($recordarDatos)){
                    setcookie("nick", $_SESSION["nick_usuario"], time()+3600, "/");
                    setcookie("name", $_SESSION["name"], time()+3600, "/");
                    setcookie("surname1", $_SESSION["surname1"], time()+3600, "/");
                    setcookie("surname2", $_SESSION["surname2"], time()+3600, "/");
                    setcookie("birthday", $_SESSION["birthday"], time()+3600, "/");
                    setcookie("registerDate", $_SESSION["registerDate"], time()+3600, "/");
                    setcookie("email", $_SESSION["email"], time()+3600, "/");
                    setcookie("rol", $_SESSION["rol"], time()+3600, "/");
                }

                header("Location: /aprendiendoaprogramar.com/");
            }
            else {
                header("Location: /aprendiendoaprogramar.com/login.php");
            }
?>