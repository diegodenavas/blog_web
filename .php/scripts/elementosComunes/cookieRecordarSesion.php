<?php
    if(isset($_COOKIE["nick"])){
        if(isset($_COOKIE["nick"])) $_SESSION["nick_usuario"] = $_COOKIE["nick"];
        if(isset($_COOKIE["name"])) $_SESSION["name"] = $_COOKIE["name"];
        if(isset($_COOKIE["surname1"])) $_SESSION["surname1"] = $_COOKIE["surname1"];
        if(isset($_COOKIE["surname2"])) $_SESSION["surname2"] = $_COOKIE["surname2"];
        if(isset($_COOKIE["birthday"])) $_SESSION["birthday"] = $_COOKIE["birthday"];
        if(isset($_COOKIE["registerDate"])) $_SESSION["registerDate"] = $_COOKIE["registerDate"];
        if(isset($_COOKIE["email"])) $_SESSION["email"] = $_COOKIE["email"];
    }
?>