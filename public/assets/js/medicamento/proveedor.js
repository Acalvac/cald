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
                $("#erroresContentMarca").html(errHTML); 
                $('#erroresModalMarca').modal('show');
            },
        });
    });