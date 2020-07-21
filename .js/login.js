$("document").ready(function(){

    $("#login").submit(function(){

        var datosForm = {nick:$("#nick").val(),
                         pass:$("#pass").val()
        }

        console.log(datosForm);

        $.post("/.php/controllers/loginController", datosForm, respuesta);

        
    });


    function respuesta(resultado){
        
        if(resultado == "false"){

            $("#nick").after("<p id='mensajeUsuarioExistente'>Usuario o contraseña incorrectos</p>");
        }

    }

});