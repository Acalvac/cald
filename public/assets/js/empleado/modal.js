function cargarmodalempleado(arg){
	var urlraiz=$("#url_raiz_proyecto").val();

	if(arg==1){
		var miurl=urlraiz+"/seguridad/add";
		var errHTML="";

		$.ajax({
			url: miurl
		}).done( function(resul) 
		{
			$("#lisadoEmp").html(resul);
			$("#idempleado").append(resul);

			$('#inputTitleUsuario').html("Nuevo ingreo de usuario");
        	$('#formAgregarUsuario').html(resul);
        	$('#formModalUsuario').modal('show');

		}).fail(function() 
		{
			$("#lisadoEmp").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
		}) ;
	}
}