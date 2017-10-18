$(document).on('click','.btn-btnGuardarPro',function(e){
        var urlraiz=$("#url_raiz_proyecto").val();
        var miurl = urlraiz+"/medicamento/proveedor/store";

        var formData = {
            proveedor: $('#proveedor').val(),
            telefono: $('#telefono').val(),
            direccion: $('#direccion').val(),
            nit: $('#nit').val(),
            cuenta: $('#cuenta').val(),
            encargado_cheque: $('#cheque').val(),
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
                var cursos = $("#idproveedor");
                    $(data).each(function(i, v){ // indice, valor
                        cursos.append('<option value="' + v.idproveedor + '">' + v.proveedor + '</option>');
                })
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro un proveedor nuevo');

                $('#formAgregarProveedor').trigger("reset");
                $('#formModal').modal('hide');

            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON){
                        errHTML+="<li>"+data.responseJSON[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error.</li>';
                    }
                $("#erroresContentProveedor").html(errHTML); 
                $('#erroresModalProveedor').modal('show');
            },
        });
    });


$(document).on('click','.btn-editar-proveedor',function(){
    var idprove=$(this).val();
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl= urlraiz+"/medicamento/proveedor/listaredit/"+idprove;
    
    $.get(miurl,function(data){
        $('#idprove').val(data.idproveedor);
        $('#proveedor').val(data.proveedor);
        $('#direccion').val(data.direccion);
        $('#cuenta').val(data.cuenta);
        $('#cheque').val(data.chequenombre);
        $('#telefono').val(data.telefono);
        $('#nit').val(data.nit);

        $('#inputTitleUsuario').html("Modificar información del proveedor");
        $('#formModalUsuario').modal('show');     
        $("#btnGuardarProveedor").val('update');
    });
});

$(document).on('click','.btn-btnGuardarProveedor',function(e){
    var state=$("#btnGuardarProveedor").val();
    var urlraiz=$("#url_raiz_proyecto").val();
    var type;
    var miurl
    var idprove=$('#idprove').val();
 
    if (state == "update") 
    {
        type="PUT";
        miurl = urlraiz+"/medicamento/proveedor/update/"+idprove;
    }
    if (state == "add") 
    {
        type="POST";
        miurl = urlraiz+"/medicamento/proveedor/store";
    }

    var formData = {
        proveedor: $('#proveedor').val(),
        telefono: $('#telefono').val(),
        direccion: $('#direccion').val(),
        nit: $('#nit').val(),
        cuenta: $('#cuenta').val(),
        encargado_cheque: $('#cheque').val(),
    };
        
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: type,
        url: miurl,
        data: formData,
        dataType: 'json',
            
        success: function (data) {
            if (state == "add"){
                var cursos = $("#idproveedor");
                $(data).each(function(i, v){ // indice, valor
                    cursos.append('<option value="' + v.idproveedor + '">' + v.proveedor + '</option>');
                });

                $('#formAgregarProveedor').trigger("reset");
                $('#formModalUsuario').modal('hide');

                    
                swal({
                    title:"Se registro un proveedor nuevo",
                    text: "Gracias",
                    type: "success"
                }).then(function () {
                    var urlraiz=$("#url_raiz_proyecto").val();
                    $("#capa_modal").html($("#cargador_empresa").html());
                    var miurl=urlraiz+"/medicamento/proveedor/index";

                    $.ajax({
                    url: miurl
                    }).done( function(resul) 
                    {
                     $("#capa_modal").html(resul);
                   
                    }).fail( function() 
                    {
                        $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                    });
                });
            }

            if (state == "update")
            {
                $('#formAgregarProveedor').trigger("reset");
                $('#formModalUsuario').modal('hide');

                var item =  '<tr class="even gradeA" id="proveedor'+data.idproveedor+'">';
                    item += '<td>'+data.idproveedor+'</td>';
                    item += '<td>'+data.proveedor+'</td>';
                    item += '<td>'+data.nit+ '</td>';
                    item += '<td>'+data.telefono+'</td>';
                    item += '<td>'+data.direccion+'</td>';
                    item += '<td>'+data.cuenta+'</td>';
                    item += '<td>'+data.chequenombre+'</td>';
                    item += '<td><button class="btn btn-warning btn-md btn-editar-proveedor" title="Editar" value="'+data.idproveedor+'">';
                    item +=  '<i class="fa fa-pencil"></i></button>';
                    item += '<button class="btn btn-danger btn-md btn-eliminarpro" title="Eliminar proveedor" value="'+data.idproveedor+'">';
                    item += '<i class="fa fa-remove"></i></button></td></tr>';
                $("#proveedor"+idprove).replaceWith(item);
            }

        },
        error: function (data) {
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON){
                    errHTML+="<li>"+data.responseJSON[er]+"</li>";
                }
                }else{
                    errHTML+='<li>Error.</li>';
            }
            $("#erroresContentProveedor").html(errHTML); 
            $('#erroresModalProveedor').modal('show');
        },
    });
});

$(document).on('click','.btn-eliminarpro',function(e){
    var id = $(this).val();
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/medicamento/proveedor/eliminar";
        var formData = {
        idproveedor: id,
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    swal({
        title: '¿Desea eliminar este registro?',
        text: "Precione si para eliminar proveedor, no para cerrar este mensaje.",
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
                    $("#proveedor" + id).remove();
                    swal( 
                        "Regitro eliminado",
                        "",
                        "success"
                    )
                }
            });                        
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal( 
                    "Cancelado",
                    "No se ha borrado",
                    "error"
                )
            }
        });   
    });
