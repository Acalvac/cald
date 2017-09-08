$(document).on('click','.btn-btnGuardarTMedicamento',function(e){
        var urlraiz=$("#url_raiz_proyecto").val();
        var miurl = urlraiz+"/medicamento/tipomedicamento/store";

   
        var formData = {
            tipo_medicamento: $('#tipomedicamento').val(),
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
                var cursos = $("#idtipo");
                    $(data).each(function(i, v){ // indice, valor
                        cursos.append('<option value="' + v.idtipo + '">' + v.tipomedic + '</option>');
                })
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                alert('Se registro un nuevo tipo de medicamento');

                $('#formAgregarTMedicamento').trigger("reset");
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