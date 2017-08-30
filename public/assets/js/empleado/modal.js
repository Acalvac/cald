function cargarmodalempleado(arg){
	var urlraiz=$("#url_raiz_proyecto").val();

	if(arg==1){var miurl=urlraiz+"/seguridad/add"; var titulo="Nuevo ingreo de usuario" ;}
	if(arg==2){var miurl=urlraiz+"/medicamento/add"; var titulo="Nuevo ingreo de medicamento" ; }
  if(arg==3){var miurl=urlraiz+"/medicamento/compra/add"; var titulo="Nuevo ingreo de medicamento" ; }
	var errHTML="";

	$.ajax({
		url: miurl
	}).done( function(resul) 
	{
		$("#modales").html(resul);
		$('#inputTitleUsuario').html(titulo);
        $('#formModalUsuario').modal('show');
	}).fail(function() 
	{
		$("#modales").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
	}) ;
}

function cargar_formularioRH(arg){
  var urlraiz=$("#url_raiz_proyecto").val();

   $("#capa_modal").show();
   $("#capa_formularios").show();
   var screenTop = $(document).scrollTop();
   $("#capa_formularios").css('top', screenTop);
   $("#capa_formularios").html($("#cargador_empresa").html());
   //if(arg==1){ var miurl=urlraiz+"/form_nuevo_usuario"; }
   if(arg==1){ var miurl=urlraiz+"/empleado/psolicitado"; }
   if(arg==2){ var miurl=urlraiz+"/empleado/pconfirmado"; }
   if(arg==3){ var miurl=urlraiz+"/empleado/prechazado"; }

   //Listado de Jefe Inmediato Autorizaciones Vacacioens Y permisos

   if(arg==4){ var miurl=urlraiz+"/empleado/vautorizadopv"; }
 
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