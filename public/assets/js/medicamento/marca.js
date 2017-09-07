$(document).on('click','.btn-nuevomarca',function(e){
        var itemsData=[];
        var miurl = "store";
        var urlraiz=$("#url_raiz_proyecto").val();

        $('#detalles tr').each(function(){
            var id = $(this).closest('tr').find('input[type="hidden"]').val();
            var expiration_date = $(this).find('td').eq(2).html();
            valor = new Array(id,expiration_date);
            itemsData.push(valor);
            
        });
        
        var formData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            direccion: $('#direccion').val(),
            telefono: $('#telefono').val(),
            estadocivil: $('#estadocivil').val(),
            dpi: $('#dpi').val(),
            nit: $('#nit').val(),
            correo: $('#correo').val(),
            fecha_nacimiento: $('#birth_date').val(),
            idtipopersona: $('#idtipopersona').val(),
            fecha_inicio: $('#date_work_start').val(),
            salario: $('#salario').val(),
            idpuesto: $('#idpuesto').val(),

            items: itemsData,};
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                /*
                swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                },
                function(){
                    window.location.href="/empleado/listado"
                });*/
                
                swal({
                    title: '¿Desea agregar un usuario?',
                    text: "Precione si para realizar un nuevo registro, no para cerrar este mensaje.",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si!',
                    cancelButtonText: 'No!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                    }).then(function () {
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
                        });
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            swal({ 
                                title:"Envio correcto",
                                text: "Se guardado correctamente un nuevo empleado",
                                type: "success"
                            }).then(function(){
                                window.location.href="/empleado/index"
                            });
                        }
                    });                               
            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON){
                        errHTML+="<li>"+data.responseJSON[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
                    }
                $("#erroresContentEmpleado").html(errHTML); 
                $('#erroresModalEmpleado').modal('show');
            },
        });
    });