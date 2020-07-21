$('document').ready(function(){

    $('#editar').click(function(){

        let tituloPost = $("#tituloPagina").html();
        let contenidoPost = $("#cuerpoPost").html();

        contenidoSinBr = contenidoPost.replace(/<br>/gi, "");

        $("#cuerpoPost").remove();

        $("section").append("<form action='.php/controllers/actualizaPost.php' method='POST' enctype='multipart/form-data'>"+
                                "<label for='imgPrincipal'>Imagen principal</label>"+
                                "<input type='hidden' name='MAX_FILE_SIZE' value='2000000'/>"+
                                "<input type='file' name='imgPrincipal' id='imgPrincipal'>"+
                                "<input type='hidden' name='tituloAntiguo' value='" + tituloPost + "'>"+
                                "<label for='titulo'>Título</label>"+
                                "<input type='text' name='titulo' value='" + tituloPost + "'>"+
                                "<label for='contenido'>Contenido</label>"+
                                "<div>"+
                                    "<span id='negrita'>N</span>"+
                                    "<span id='cursiva'>K</span>"+
                                    "<span id='subrayado'>S</span>"+
                                    "<input type='hidden' name='MAX_FILE_SIZE' value='2000000' />"+
                                    "<span>"+
                                        "<input type='file' name='imgIntoPost' id='imgIntoPost'>"+
                                    "</span>"+
                                "</div>"+
                                "<textarea name='contenido' id='content'>" + contenidoSinBr + "</textarea>"+
                                "<select name='seccion'>"+
                                    "<option>JavaScript</option>"+
                                    "<option>MySQL</option>"+
                                    "<option>PHP</option>"+
                                    "<option>Java</option>"+
                                "</select><br>"+
                                "<input type='submit' value='Enviar'>"+
                                "</form>");
    });

});