$("document").ready(function(){

    $("#replypass").blur(function(){

        if($(this).val() != $("#pass").val()){

            $(this).css("color","red");
        }
        else{
            $(this).css("color","black");
        }

    });

});