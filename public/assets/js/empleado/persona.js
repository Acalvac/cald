var cont = 0;
    function agregar(){

        idtipoantecedente =$("#idtipoantecedente option:selected").val(); 
        tipoantecedente =$("#idtipoantecedente option:selected").text();
        fechavencimiento = $('#expiration_date').val();

        var item  = '<tr class="even gradeA" id="tipoantecedente'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idtipoantecedente[]" value="'+idtipoantecedente+'">'+tipoantecedente+'</td>';
            item += '<td>'+fechavencimiento+'</td><tr>';
            cont++;

        $('#detalles').append(item);
        evaluar();
    }

    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        });
    });

    function evaluar(){
        if (cont>0){
            $("#btnGuardarEmpleado").show();
        }
        else{
            $("#btnGuardarEmpleado").hide();
        }
    }

    function eliminar(index){
       $("#tipoantecedente" + index).remove();
       cont--;
       evaluar();
    }
 
    $(document).on('click','.btn-btnGuardarEmpleado',function(e){
        var itemsData=[];
        var miurl = "empleado/store";
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
            idcivil: $('#idcivil').val(),
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
                                cargarindex(1);
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

    $(document).on('click','.btn-btnUpdateEmpleado',function(e){
        var idpersona=$(this).val();
        var urlraiz=$("#url_raiz_proyecto").val();
        
        var miurl = urlraiz+"/empleado/update/"+idpersona;
        console.log(miurl);
        
        var formData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            direccion: $('#direccion').val(),
            telefono: $('#telefono').val(),
            idcivil: $('#idcivil').val(),
            dpi: $('#dpi').val(),
            nit: $('#nit').val(),
            correo: $('#correo').val(),
            fecha_nacimiento: $('#birth_date').val(),
            idtipopersona: $('#idtipopersona').val(),
            fecha_inicio: $('#date_work_start').val(),
            salario: $('#salario').val(),
            idpuesto: $('#idpuesto').val(),
        };
        
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
                
                swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                }).then(function(){
                    cargarindex(1);                
                });

                /* 
                                swal({ 
                                    title:"Envio correcto",
                                    text: "Se guardado correctamente un nuevo empleado",
                                    type: "success"
                                    },
                                    function(){
                                    window.location.href="/empleado/index"
                                    });
                            }
                        });*/                               
            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON){
                        errHTML+="<li>"+data.responseJSON[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error al guardar el registro</li>';
                    }
                $("#erroresContentEmpleado").html(errHTML); 
                $('#erroresModalEmpleado').modal('show');
            },
        });
    });

$(document).on('click','.btn-eliminaremp',function(e){
    var id = $(this).val();
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/empleado/delete";
        var formData = {
        empleado: id,
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    swal({
        title: '¿Desea eliminar este registro?',
        text: "Precione si para eliminar empleado, no para cerrar este mensaje.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function () {
        $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',
                success: function() {
                    $("#empleado" + id).remove();
                    swal( 
                        "Regitro eliminado",
                        "",
                        "success"
                    )
                }
        });                        
    }, 
    function (dismiss) {
        if (dismiss === 'cancel') {
            swal( 
                "Cancelado",
                "No se ha borrado",
                "error"
            )
        }
    });   
});


