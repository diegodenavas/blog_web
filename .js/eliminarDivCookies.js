$('document').ready(function(){
    $('#aceptar').click(function(){
        $("#aceptarCookies").remove();
        document.cookie = "cookiesAceptadas=aceptadas; max-age=3600; path=/";
    });
});