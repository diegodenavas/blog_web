<?php
    if(!isset($_COOKIE["cookiesAceptadas"])){
        echo
        "<div id='aceptarCookies'>
        <p>Utilizamos cookies propias para mejorar la experiencia del usuario. Puede cambiar la configuración u obtener más información en 
        el siguiente enlace: <a href='infoCookies.php'>Leer más</a></p>
        <form id='formCookies'>
            <input type='button' name='aceptar' value='Aceptar' id='aceptar' class='botonesCookies'>
            <input type='button' name='denegar' value='Denegar' id='denegar' class='botonesCookies'>
        </form>
        </div>";
    }
?>