$("document").ready(function(){

    $('#botonEnviar').click(function(){

        var data = $("#login").serialize();
        
        if($.trim(user).length > 0 && $.trim(pass).length > 0){

            $.ajax({
                url:  ".php/controllers/loginController.php",
                method: "POST",
                data: data,
                cache: "false",
                beforeSend: function(){
                    $("#botonEnviar").val("...");
                },
                success: function(msg){
                    $("#botonEnviar").val("Enviar");

                    if(msg=="El usuario o la contraseña son correctos"){
                        $(location).attr("href", "index.php")
                    }else{
                        $("#msgError").css("display", "inherit");

                        for (let i = 0; i < 4; i++) {
                            $("#msgError").animate({marginLeft:"4px"}, 30);
                            $("#msgError").animate({marginLeft:"0px"}, 30); 
                        }
                    }

                }

            });

        }

    });

});