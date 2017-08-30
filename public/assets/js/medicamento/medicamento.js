$("#btnGuardarMedicamento").click(function(e){
        var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";

    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";

    var formData = {
        idmarca: $("#idmarca").val(),
        idtipo: $("#idtipo").val(),
        medicamento: $("#medicamento").val(),

    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {

            $('#formAgregarUsuario').trigger("reset");
            $('#formModalUsuario').modal('hide');

            swal({
                    title: '¿Desea agregar medicamento al inventario?',
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
                        var miurl=urlraiz+"/medicamento/compra/add";
                        var errHTML="";
                        $.ajax({
                            url: miurl
                        }).done( function(resul) 
                        {
                            $("#modales").html(resul);
                            $('#inputTitleUsuario').html("Nuevo ingreso medicamento al invetario");
                            $('#formModalUsuario').modal('show');
                        }).fail(function() 
                        {
                            $("#modales").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                        });
                    }, function (dismiss) {
                        // dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                        if (dismiss === 'cancel') {
                            swal({ 
                                title:"Envio correcto",
                                text: "Se guardado correctamente un nuevo ingreso de medicamento al invetario",
                                type: "success"
                            }).then(function(){
                                window.location.href="/empleado/index"
                            });
                        }
                    });
                            
        },
        error: function (data) {
            $('#loading').modal('hide');
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON){
                    errHTML+="<li>"+data.responseJSON[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error</li>';
            }

            $("#erroresContentMedicamento").html(errHTML); 
            $('#erroresModalMedicamento').modal('show');
        }
    });
    
    
});
/*
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/store";

    var formData = {
        name: $("#name").val(),
        password: $("#password").val(),
        email: $("#email").val(),
        idpersona: $("#idpersona").val(),
    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {

            $('#formAgregarUsuario').trigger("reset");
            $('#formModalUsuario').modal('hide');
                            
        },
        error: function (data) {
            $('#loading').modal('hide');
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON){
                    errHTML+="<li>"+data.responseJSON[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error</li>';
            }

            $("#erroresContentEmpleado").html(errHTML); 
            $('#erroresModalEmpleado').modal('show');
        }
    });*/

