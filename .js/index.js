$("document").ready(function(){

    $("#flechaAbajo").click(function(){
        $("html, body").animate({
            scrollTop: $("section").offset().top - 70
        }, 500);
    })

});
