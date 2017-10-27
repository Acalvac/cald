$(document).on('click','.btn-btnGuardarPresentacion',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/medicamento/presentacion/store";

    var formData = {
        presentacion: $('#presentacion').val(),
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
           
            var urlraiz=$("#url_raiz_proyecto").val();
            var miurl=urlraiz+"/medicamento/presentacion/idpresentacion/"+data.idpresentacion;
            console.log(miurl);
            $.ajax({
                url: miurl
            }).done( function(resul) 
            {
                $("#presentacionselect").html(resul);
            }).fail( function() 
            {
                    $("#presentacionselect").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
            });
                /*
                swal({
                    title:"Se registro una nueva marca",
                    text: "Gracias",
                    type: "success"
                });
                */


            alert('Se registro una nueva marca');

            $('#formAgregarPresentacion').trigger("reset");
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
                $("#erroresContentPresentacion").html(errHTML); 
                $('#erroresModalPresentacion').modal('show');
            },
        });
    }); 

$(document).on('click','.btn-btnGuardarPre',function(e){
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/medicamento/presentacion/store";

    var formData = {
        presentacion: $('#presentacion').val(),
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
            var urlraiz=$("#url_raiz_proyecto").val();
            var miurl=urlraiz+"/medicamento/presentacion/idpresentacion/"+data.idpresentacion;
            $.ajax({
                url: miurl
            }).done( function(resul) 
            {
                $("#presentacionselect").html(resul);
            }).fail( function() 
            {
                    $("#presentacionselect").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
            });
           

 
            $('#formAgregarPresentacion').trigger("reset");
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
                $("#erroresContentPresentacion").html(errHTML); 
                $('#erroresModalPresentacion').modal('show');
            },
        });
    });