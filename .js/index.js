$("document").ready(function(){

    $("#flechaAbajo").click(function(){
        $("html, body").animate({
            scrollTop: $("section article:first-child").offset().top
        }, 500);
    })


    $("section").scroll(function(event){
        var nombreNodo = event.target.nodeName;
        console.log(nombreNodo);

        if($(event.target = "section")){

            $("html, body").animate(function(){
                scrollTop: $("section article:nth-child(2)").offset().top
            }, 500);
        }
    })

    $("article").mouseup(function(){
        console.log("mousehover");
    })

});
