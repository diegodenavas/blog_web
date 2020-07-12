$("document").ready(function(){

    $("#iconoPapelera").hover(
        function(){
            $("#iconoPapelera").attr("src", "imagenes/icono_papelera.png");
        },
        function(){
            $("#iconoPapelera").attr("src", "imagenes/icono_papelera_cerrada.png");
    });

    $("#editar").hover(
        function(){
            $("#editar").attr("src", "imagenes/editarHover.png");
        },
        function(){
            $("#editar").attr("src", "imagenes/editar.png");
    });

});