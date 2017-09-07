$(document).on('click','.btn-btnGuardarMarca',function(e){
        var urlraiz=$("#url_raiz_proyecto").val();
        var miurl = urlraiz+"/medicamento/marca/store";

   
        var formData = {
            marca: $('#marca').val(),
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
                var cursos = $("#idmarca");
                    $(data).each(function(i, v){ // indice, valor
                        cursos.append('<option value="' + v.idmarca + '">' + v.marca + '</option>');
                    }) 

                    swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                });

                $('#formAgregarMarca').trigger("reset");
                $('#formModal').modal('hide');

                
                                         
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