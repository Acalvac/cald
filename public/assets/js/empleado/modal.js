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

