$("#btnGuardarCompra").click(function(e){
	var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/compra/store";

    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        idproveedor: $("#idproveedor").val(),
        idmedicamento: $("#idmedicamento").val(),
        fecha_compra: $("#buy_date").val(),
        fecha_vencimiento: $("#expiration_date").val(),
        precio: $("#precio").val(),
        cantidad: $("#cantidad").val(),
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

$(document).on('click','.btn-btnGuardarCom',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/medicamento/compra/store";


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var formData = {
        idproveedor: $("#idproveedor").val(),
        idmedicamento: $("#idmedicamento").val(),
        fecha_compra: $("#buy_date").val(),
        fecha_vencimiento: $("#expiration_date").val(),
        precio: $("#precio").val(),
    };
        
        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                var cursos = $("#idmarca");
                    $(data).each(function(i, v){ // indice, valor
                        cursos.append('<option value="' + v.idmarca + '">' + v.marca + '</option>');
                })
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro una nueva compra');

                $('#formAgregarCompra').trigger("reset");
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
                $("#erroresContentMarca").html(errHTML); 
                $('#erroresModalMarca').modal('show');
            },
        });
    });