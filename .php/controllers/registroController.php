<?php
    require("../models/usuario.php");
    require_once("../models/conexionBDD.php");

    $nick = $_POST["nick"];
    $contraseña = $_POST["pass"];
    $nombre = $_POST["name"];
    $primerApellido = $_POST["surname1"];
    $segundoApellido = $_POST["surname2"];
    $fechaNacimiento = $_POST["age"];
    $email = $_POST["email"];

    echo $fechaNacimiento;

    $insertarUsuario = Usuario::usuarioRegistro($nick, $contraseña, $nombre, $primerApellido, $segundoApellido, $fechaNacimiento, $email);

    if ($insertarUsuario->validaUsuario() == false) {
        $conex = new ConexionBDD();

        $statement = $conex->ejecutarConsulta("INSERT INTO usuario(nick, pass, name, surname1, surname2, birthday, registerDate, email, rol) VALUES(?, ?, ?, ?, ?, ?, ?, ?, 1)");

        if($statement->execute(array($insertarUsuario->getNick(), password_hash($insertarUsuario->getPass(), PASSWORD_DEFAULT), $insertarUsuario->getName(), $insertarUsuario->getSurname1(), $insertarUsuario->getSurname2(), $insertarUsuario->getBirthday(), $insertarUsuario->getDateRegister(), $insertarUsuario->getEmail() ))){
           
            echo "usuario insertado en la bdd";

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
            
            header("Location: /aprendiendoaprogramar.com/");
    }
    }
?>