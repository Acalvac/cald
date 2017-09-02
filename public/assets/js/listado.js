function cargar_formulario(arg){
  var urlraiz=$("#url_raiz_proyecto").val();

    $("#capa_modal").show();
    $("#capa_formularios").show();
    var screenTop = $(document).scrollTop();
    $("#capa_formularios").css('top', screenTop);
    $("#capa_formularios").html($("#cargador_empresa").html());
    //Listado de medicamentos
    if(arg==1){ var miurl=urlraiz+"/medicamento/medicamentoindex"; }
    if(arg==2){ var miurl=urlraiz+"/empleado/pconfirmado"; }
    if(arg==3){ var miurl=urlraiz+"/empleado/prechazado"; }

    //Listado de compra medicamento

    if(arg==4){ var miurl=urlraiz+"/medicamento/compra/compraindex"; }
 
    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_formularios").html(resul);
   
    }).fail( function() 
   {
    $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;
}