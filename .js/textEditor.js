$("document").ready(function(){

  //Para obtener la posición del cursor en el textarea
  var editor = $("#content");


  function getSelected()
  {
    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;

    return [u.substring(0, start), u.substring(end), u.substring(start, end)];
  }


  let negritaActivado = 0;
  let cursivaActivado = 0;
  let subrayadoActivado = 0;
  let fuenteGrandeActivado = 0;
  let fuenteMuyGrandeActivado = 0;

  $("#negrita").click(function(){

    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;
    subs = u.substring(start, end);

    if (subs.length > 0){

      var select = getSelected();
      editor.val(select[0]+'<strong>'+select[2]+'</strong>'+select[1]);

    }else{

      if(negritaActivado == 0){
        $("#negrita").css("background-color", "rgb(207, 207, 207)");
        var select = getSelected();
        editor.val(select[0] + '<strong>' + select[2] + select[1]);
        negritaActivado = 1;
      }else{
        $("#negrita").css("background-color", "rgb(247, 247, 247)");
        var select = getSelected();
        editor.val(select[0] + '</strong>' + select[2] + select[1]);
        negritaActivado = 0;   
      }

    }

  });


  $("#cursiva").click(function(){

    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;
    subs = u.substring(start, end);

    if (subs.length > 0){

      var select = getSelected();
      editor.val(select[0]+'<em>'+select[2]+'</em>'+select[1]);

    }else{

      if(cursivaActivado == 0){
        $("#cursiva").css("background-color", "rgb(207, 207, 207)");
        var select = getSelected();
        editor.val(select[0] + '<em>' + select[2] + select[1]);
        cursivaActivado = 1;
      }else{
        $("#cursiva").css("background-color", "rgb(247, 247, 247)");
        var select = getSelected();
        editor.val(select[0] + '</em>' + select[2] + select[1]);
        cursivaActivado = 0;   
      }  

    }
    
  });


  $("#subrayado").click(function(){

    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;
    subs = u.substring(start, end);

    if (subs.length > 0){

      var select = getSelected();
      editor.val(select[0]+'<u>'+select[2]+'</u>'+select[1]);

    }else{

      if(subrayadoActivado == 0){
        $("#subrayado").css("background-color", "rgb(207, 207, 207)");
        var select = getSelected();
        editor.val(select[0] + '<u>' + select[2] + select[1]);
        subrayadoActivado = 1;
      }else{
        $("#subrayado").css("background-color", "rgb(247, 247, 247)");
        var select = getSelected();
        editor.val(select[0] + '</u>' + select[2] + select[1]);
        subrayadoActivado = 0;   
      }  

    }
    
  });
  

  $("#imgIntoPostSpan").on("change", ".imgIntoPost", function(){

    $foto = $("#imgIntoPostId").val().split('\\').pop();

    var select = getSelected();

    editor.val(select[0] + "<img src='imagenes_posts/" + $foto + "'>" + select[2] + select[1]);

    $(".imgIntoPost").css("display", "none");

    $("#imgIntoPostId").removeAttr("id");

    $("#imgIntoPostSpan").append("<input type='file' name='imgIntoPost[]' multiple class='imgIntoPost' id='imgIntoPostId'>");

  });

  
  $("#fuenteGrande").click(function(){

    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;
    subs = u.substring(start, end);

    if (subs.length > 0){

      var select = getSelected();
      editor.val(select[0]+"<span class='fuentesGrandes' style='font-size: 1.2em'>" + select[2] + "</span>" + select[1]);

    }else{

      if(fuenteGrandeActivado == 0){
        $("#fuenteGrande").css("background-color", "rgb(207, 207, 207)");
        var select = getSelected();
        editor.val(select[0] + "<span class='fuentesGrandes' style='font-size: 1.2em'>" + select[2] + select[1]);
        fuenteGrandeActivado = 1;
      }else{
        $("#fuenteGrande").css("background-color", "rgb(247, 247, 247)");
        var select = getSelected();
        editor.val(select[0] + '</span>' + select[2] + select[1]);
        fuenteGrandeActivado = 0;   
      }  

    } 

  });


  $("#fuenteMuyGrande").click(function(){

    var u     = editor.val();
    var start = editor.get(0).selectionStart;
    var end   = editor.get(0).selectionEnd;
    subs = u.substring(start, end);

    if (subs.length > 0){

      var select = getSelected();
      editor.val(select[0]+"<span class='fuentesMuyGrandes' style='font-size: 1.4em'>" + select[2] + "</span>" + select[1]);

    }else{

      if(fuenteMuyGrandeActivado == 0){
        $("#fuenteMuyGrande").css("background-color", "rgb(207, 207, 207)");
        var select = getSelected();
        editor.val(select[0] + "<span class='fuentesMuyGrandes' style='font-size: 1.4em>" + select[2] + select[1]);
        fuenteMuyGrandeActivado = 1;
      }else{
        $("#fuenteMuyGrande").css("background-color", "rgb(247, 247, 247)");
        var select = getSelected();
        editor.val(select[0] + '</span>' + select[2] + select[1]);
        fuenteMuyGrandeActivado = 0;   
      }  

    } 

  });

});