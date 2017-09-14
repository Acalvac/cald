function cargarmodalempleado(arg){
	var urlraiz=$("#url_raiz_proyecto").val();

	if(arg==1){var miurl=urlraiz+"/seguridad/add"; var titulo="Nuevo ingreo de usuario" ;}
	if(arg==2){var miurl=urlraiz+"/medicamento/add"; var titulo="Nuevo ingreo de medicamento" ; }
  	if(arg==3){var miurl=urlraiz+"/medicamento/compra/add"; var titulo="Nuevo ingreo de medicamento" ; }
  	if(arg==4){var miurl=urlraiz+"/medicamento/marca/add"; var titulo="Nuevo ingreo de una marca"; $('#nuevomarca').val('add');}
  	if(arg==5){var miurl=urlraiz+"/medicamento/tipomedicamento/add"; var titulo="Nuevo ingreso de un tipo de medicamento";}
  	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/add"; var titulo="Nuevo ingreso de un proveedor";}



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


function cargarmodal(arg){
	var urlraiz=$("#url_raiz_proyecto").val();

	if(arg==1){var miurl=urlraiz+"/seguridad/add"; var titulo="Nuevo ingreo de usuario" ;}
	if(arg==2){var miurl=urlraiz+"/medicamento/addm"; var titulo="Nuevo ingreo de medicamento" ; }
	
  	if(arg==3){var miurl=urlraiz+"/medicamento/compra/addm"; var titulo="Nuevo ingreo de medicamento" ; }

  	if(arg==4){var miurl=urlraiz+"/medicamento/marca/addm"; var titulo="Nuevo ingreso de una marca";}
  	if(arg==5){var miurl=urlraiz+"/medicamento/tipomedicamento/addt"; var titulo="Nuevo ingreso de un tipo de medicamento";}
  	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/addp"; var titulo="Nuevo ingreso de un proveedor";}


	var errHTML="";

	$.ajax({
		url: miurl
	}).done( function(resul) 
	{
		$("#modales1").html(resul);
		$('#inputTitle').html(titulo);
        $('#formModal').modal('show');
	}).fail(function() 
	{
		$("#modales1").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
	}) ;
}

function cargarindex(arg){
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());
	


	if(arg==1){var miurl=urlraiz+"/empleado/index";}
	if(arg==2){var miurl=urlraiz+"/empleado/add";}
	if(arg==3){var miurl=urlraiz+"/seguridad/index";}
	if(arg==4){var miurl=urlraiz+"/medicamento/index";}
	if(arg==5){var miurl=urlraiz+"/medicamento/compra/index";}
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/index";}

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}
	if(arg==21){var miurl=urlraiz+"/paciente/index";}
	if(arg==22){var miurl=urlraiz+"/paciente/nuevo";}
 	
    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
     $("#capa_modal").html(resul);
   
    }).fail( function() 
   {
    $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   }) ;
}

function editar(arg,id){

  	var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());
	
	if(arg==1){var miurl =urlraiz+"/empleado/edit/"+id+"";}
	if(arg==2){var miurl=urlraiz+"/empleado/add";}
	if(arg==3){var miurl=urlraiz+"/seguridad/index";}

	$.ajax({
		url: miurl
    }).done( function(resul) 
    {
    	$("#capa_modal").html(resul);
    }).fail( function() 
   	{
   		$("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   	});
}

function detalle(arg,id)
{
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#capa_modal").html($("#cargador_empresa").html());

	if(arg==1){var miurl =urlraiz+"/empleado/show/"+id+"";}
	if(arg==2){var miurl=urlraiz+"/empleado/add";}
	if(arg==3){var miurl=urlraiz+"/seguridad/index";}


	if(arg==20){var miurl=urlraiz+"/bienhechor/listardetallesb/"+id+"";}
	$.ajax({
		url: miurl
    }).done( function(resul) 
    {
    	$("#capa_modal").html(resul);
    }).fail( function() 
   	{
   		$("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
   	});


}
