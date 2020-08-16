<?php    
    session_start();

    if(!isset($_SESSION["usuario"])){
        setcookie("nick", $_SESSION["nick_usuario"], time()-1, "/");
        setcookie("name", $_SESSION["name"], time()-1, "/");
        setcookie("surname1", $_SESSION["surname1"], time()-1, "/");
        setcookie("surname2", $_SESSION["surname2"], time()-1, "/");
        setcookie("birthday", $_SESSION["birthday"], time()-1, "/");
        setcookie("registerDate", $_SESSION["registerDate"], time()-1, "/");
        setcookie("email", $_SESSION["email"], time()-1, "/");

        session_destroy();

        header("Location: /programaycompila.com/login.php");
    }
?>