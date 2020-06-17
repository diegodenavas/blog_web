$("document").ready(function(){

    $(".iconoPapelera").hover(
        function(){
            $(".iconoPapelera").attr("src", "imagenes/icono_papelera.png");
        },
        function(){
            $(".iconoPapelera").attr("src", "imagenes/icono_papelera_cerrada.png");
        });

});