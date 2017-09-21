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

function cargarbusqueda(arg){
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#modales2").html($("#cargador_empresa").html());
	
	if(arg==1){var miurl=urlraiz+"/seguridad/cargarbusqueda"; var titulo="Buscar usuario" ;}
	if(arg==2){var miurl=urlraiz+"/medicamento/cargarbusqueda"; var titulo="Buscar medicamento" ;}
	if(arg==3){var miurl=urlraiz+"/medicamento/ubicacion/cargarbusqueda"; var titulo="Buscar ubicacion" ; }
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/cargarbusqueda"; var titulo="Buscar proveedor" ;}
	if(arg==7){var miurl=urlraiz+"/medicamento/ubicacion/cargarbusqueda"; var titulo="Buscar ubicacion" ; }

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}

	var errHTML="";

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {
    	$("#modales2").html(resul);
		$('#inputTitleBuscar').html(titulo);
        $('#formModalBuscar').modal('show');
    }).fail( function() 
    {
    	$("#modales2").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
}

function busqueda(arg,id){
	var urlraiz=$("#url_raiz_proyecto").val();
	$("#modales2").html($("#cargador_empresa").html());

	var cursos = $("#select6");
	
	if(arg==1){var miurl=urlraiz+"/seguridad/busqueda/"+id; }
	if(arg==2){var miurl=urlraiz+"/medicamento/busqueda/"+id; }
	if(arg==3){var miurl=urlraiz+"/medicamento/ubicacion/busqueda/"+id;  }
	if(arg==6){var miurl=urlraiz+"/medicamento/proveedor/busqueda/"+id;  }
	if(arg==7){var miurl=urlraiz+"/medicamento/ubicacion/busqueda/"+id;  }

	if(arg==20){var miurl=urlraiz+"/bienhechor/index";}

	var errHTML="";

    $.ajax({
    url: miurl
    }).done( function(resul) 
    {    	console.log(resul);

/*
    	$("#select6" ).text(resul.telefono);
    	$("#select"+arg ).val(resul.idproveedor);*/
    	$('#formModalBuscar').modal('hide');
      cursos.find('option').remove();
      cursos.append('<option value="' + resul.idproveedor + '">' + resul + '</option>');
            $("select6").find('option').remove();

      $("#select6").append('<option value="' + resul.idproveedor + '">' + resul + '</option>');

      $("#car").append(resul);
      $("#prov").html(resul);
      console.log($("#car").val());
      console.log($("#car").text());



    }).fail( function() 
    {
    	$("#modales2").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
}


$(document).on('click','.btn-vacaciones',function(){
            var errHTML="";
            idempleado=$(this).val();
            $.get('empleados/calculardias/'+idempleado,function(data){
               
                var horas = '';
                var dias = '';
                var tdh;

                $.each(data,function(){
                    horas = data[0];
                    dias = data[1];
                    autorizacion = data[2];
                })

                $('#inputTitle').html("Saldo de vacaciones");
                $('#formAgregar').trigger("reset");
                $('#formModal').modal('show');
                $('#datomar').attr('disabled', 'disabled');
                $('#hhoras').attr('disabled', 'disabled');
                $('#dacumulado').attr('disabled', 'disabled');
                $('#btnguardarV').attr('disabled', 'disabled'); 

                tdh = (dias + ' ' + 'dias' + ' ' + 'con' +' '+ horas +' '+ 'horas');
                document.getElementById('dacumulado').value = tdh;
                document.getElementById('tdias').value = dias;
                document.getElementById('thoras').value = horas;
                
            });
        });

