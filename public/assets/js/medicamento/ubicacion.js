$("#btnGuardarCompra").click(function(e){
	var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/ubicacion/store";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        habitacion: $("#habitacion").val(),
        estanteria: $("#estanteria").val(),
        coordenada: $("#coordenada").val(),
    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {

            $('#formAgregarCompra').trigger("reset");
            $('#formModalUsuario').modal('hide');

            swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                }).then(function(){
                    window.location.href="/empleado/index"                
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

$(document).on('click','.btn-btnGuardarUbi',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/ubicacion/store";


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        habitacion: $("#habitacion").val(),
        estanteria: $("#estanteria").val(),
        coordenada: $("#coordenada").val(),
        valor: 1,
    };
        
        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro una nueva ubicacion para un medicamento');
                console.log(data);
                console.log(data.habitacion);

                document.getElementById("ubicacion").value=data.habitacion+' '+data.estanteria+' '+data.coordenada;
                $('#formAgregarUbicacion').trigger("reset");
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
                $("#erroresContentUbicacion").html(errHTML); 
                $('#erroresModalUbicacion').modal('show');
            },
        });
    });


$(document).on('click','.btn-btnGuardarPri',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/principio/store";


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        nombre: $("#nombre").val(),
        familia: $("#idtipo").val(),
        valor: 1,
    };
        
        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro una nueva sustancia para un medicamento');
                console.log(data);
                document.getElementById("idprincipio").value = data.idprincipio;
                document.getElementById("sustancia").value=data.nombre+' '+data.familia;
                $('#formAgregarPrincipio').trigger("reset");
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
                $("#erroresContentPrincipio").html(errHTML); 
                $('#erroresModalPrincipio').modal('show');
            },
        });
});