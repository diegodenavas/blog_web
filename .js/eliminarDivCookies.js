$('document').ready(function(){
    $('#aceptar').click(function(){
        document.cookie = "cookiesAceptadas=aceptadas; max-age=3600; path=/";
        $("#aceptarCookies").remove();
    });

    $('#denegar').click(function(){
        document.cookie = "cookiesAceptadas=denegadas; max-age=3600; path=/";
        $("#aceptarCookies").remove();
    });
});