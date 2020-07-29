$("document").ready(function(){

    $("#iconoPapelera").click(function(){

        $("#optionsAdminContainer").css("display", "none");
        $("#confirmarBorrarPost").css("display", "initial");

    });


    $("#confirmarBorrarPostNo").click(function(){

        $("#confirmarBorrarPost").css("display", "none");
        $("#optionsAdminContainer").css("display", "inline-block");

    });

});