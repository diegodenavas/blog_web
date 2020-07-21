<?php
    if(!isset($_COOKIE["cookiesAceptadas"])){
        echo
        "<div id='aceptarCookies'>
        <p>Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada 
        con sus preferencias mediante el análisis de sus hábitos de navegación. Si continúa navegando, consideramos 
        que acepta su uso. Puede cambiar la configuración u obtener más información.</p>
        <form>
            <input type='button' name='aceptar' value='Aceptar' id='aceptar' class='botonesCookies'>
            <input type='button' name='denegar' value='Denegar' id='denegar' class='botonesCookies'>
        </form>
        </div>";
    }
?>