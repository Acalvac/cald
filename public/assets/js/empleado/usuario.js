$("#btnGuardarUsuario").click(function(e){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/seguridad/store";
    var itemsData=[];

    $('#rolUsuario tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        valor = new Array(id);
        itemsData.push(valor);
            
    });

    var formData = {
        name: $("#name").val(),
        password: $("#password").val(),
        email: $("#email").val(),
        idpersona: $("#idpersona").val(),
        items: itemsData,
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
    });
});

function  verinfo_usuario(arg){

  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/seguridad/editar_usuario/"+arg+""; 
   

    $("#contentsecundario").show();
    var screenTop = $(document).scrollTop();
    $("#capa_formularios").css('top', screenTop);
  $("#contentsecundario").html($("#cargador_empresa").html());

  $.ajax({
    url: miurl
  }).done( function(resul) 
  {
    $("#contentsecundario").html(resul);
  }).fail( function() 
  {
    $("#contentsecundario").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
  }) ;
}

