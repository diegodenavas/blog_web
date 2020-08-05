$('document').ready(function(){
    $('#aceptar').click(function(){
        document.cookie = "cookiesAceptadas=aceptadas; max-age=1728000; path=/";
        $("#aceptarCookies").remove();
    });

    $('#denegar').click(function(){
        document.cookie = "cookiesAceptadas=denegadas; max-age=86400; path=/";
        $("#aceptarCookies").remove();
    });
});