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

    $usuario = Usuario::usuarioRegistro($nick, $contraseña, $nombre, $primerApellido, $segundoApellido, $fechaNacimiento, $email);

    var_dump($usuario->getDateRegister());

    if ($usuario->validaUsuario() == false) {
        $conex = new ConexionBDD();

        $statement = $conex->ejecutarConsulta("INSERT INTO usuario(nick, pass, name, surname1, surname2, birthday, registerDate, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

        if($statement->execute(array($usuario->getNick(), password_hash($usuario->getPass(), PASSWORD_DEFAULT), $usuario->getName(), $usuario->getSurname1(), $usuario->getSurname2(), $usuario->getBirthday(), $usuario->getDateRegister(), $usuario->getEmail() ))){
           
            echo "usuario insertado en la bdd";

            session_start();
            $_SESSION["nick_usuario"] = $usuario->getNick();
            header("Location: /aprendiendoaprogramar.com/");
    }
    }
?>