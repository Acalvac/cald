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
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */
                var urlraiz=$("#url_raiz_proyecto").val();
                var miurl=urlraiz+"/medicamento/marca/idmarca/"+data.idmarca;
                $.ajax({
                url: miurl
                }).done( function(resul) 
                {
                    $("#marcaselect").html(resul);
                }).fail( function() 
                {
                    $("#marcaselect").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                });


                alert('Se registro una nueva marca');

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
                        errHTML+='<li>Error.</li>';
                    }
                $("#erroresContentMarca").html(errHTML); 
                $('#erroresModalMarca').modal('show');
            },
        });
    });