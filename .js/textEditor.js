$("document").ready(function(){

  //Para poner el texto en negrita
  $("#negrita").click(function(){
    let desde = $("#content")[0].selectionStart;
    let hasta = $("#content")[0].selectionEnd;
    let todoTexto = $("#content").val();
    let subs = todoTexto.substring(desde, hasta);
    
    if (subs.length > 0) {
      document.getElementById("content").setRangeText("<strong>"+subs+"</strong>",desde,hasta);
    }
  });

  //Para poner el texto en cursiva
  $("#cursiva").click(function(){
    let desde = $("#content")[0].selectionStart;
    let hasta = $("#content")[0].selectionEnd;
    let todoTexto = $("#content").val();
    let subs = todoTexto.substring(desde, hasta);
    
    if (subs.length > 0) {
      document.getElementById("content").setRangeText("<em>"+subs+"</em>",desde,hasta);
    }
  });

  //Para poner el texto subrayado
  $("#subrayado").click(function(){
    let desde = $("#content")[0].selectionStart;
    let hasta = $("#content")[0].selectionEnd;
    let todoTexto = $("#content").val();
    let subs = todoTexto.substring(desde, hasta);
    
    if (subs.length > 0) {
      document.getElementById("content").setRangeText("<u>"+subs+"</u>",desde,hasta);
    }
  });

  $("#imgIntoPost").change(function(){
    let desde = $("#content")[0].selectionStart;
    let hasta = $("#content")[0].selectionEnd;


    let fileName = $("#imgIntoPost").val().split('\\').pop();

    document.getElementById("content").value += "<img src='imagenes/" + fileName + "'>";

  });
});