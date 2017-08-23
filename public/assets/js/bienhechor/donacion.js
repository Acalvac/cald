$(document).on('click','.btn-addDB',function(){
    $("#fechadona").val("");
    $("#cantidad").val("");
    $("#observaciones").val("");
    var idbi=$(this).val();
    var miurl="listarbienhe";
    $.get(miurl+'/'+ idbi,function(data){
        $('#idbi').val(data.idpersona);
        $('#nombreD').val(data.nombre+' '+data.apellido);
        $('#inputTitleD').html("Nuevo Donativo");
        $('#btnGuardarD').val('add');
        $('#formModalD').modal('show');
    });
});

$(document).on('click','.btneditdb',function(){
                var idb=$(this).val();
                var miurl="listarupdonativo";
                $.get(miurl+'/'+ idb,function(data){
                	$('#iddona').val(data.idbienhechor);
                    $('#fechadona').val(data.fechadonacion);
                    $('#cantidad').val(data.monto);
                    $('#observaciones').val(data.descripcion);
                    $('#nombreD').val(data.nombre+' '+data.apellido);
                    $('#inputTitleD').html("Modificar datos de donación");
                    $('#btnGuardarD').val('upd');
                    $('#formModalD').modal('show');                
                });
            });

	$("#btnGuardarD").click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var miurl;
        var state=$("#btnGuardarD").val();
        var idbd=$('#iddona').val();
        var type;
        var formData = {
                fechadona:$("#fechadona").val(),
                tipodonativo:$("#tipodonativo").val(),
                cantidad:$("#cantidad").val(),
                observaciones:$("#observaciones").val(),
                idb:$('#idbi').val(),
            };
        if (state == "add") 
            {
                type="POST";
                miurl = 'addonativo';
            }

        if (state == "upd") 
            {
                type="PUT";
                miurl='updonativo/'+idbd;
            }
         tipodonativo=$("#tipodonativo option:selected").text(),
        $.ajax({
            type: type,
            url: miurl,
            data: formData,
            dataType: 'json',

            success: function (data) {
            	var item = '<tr class="even gradeA" id="donativo'+data.idbienhechor+'">';
                    item += '<td>'+data.idbienhechor+'</td>';
                    item += '<td>'+tipodonativo+'</td>'+'<td>'+data.monto+'</td>'+'<td>' +data.fechadonacion+ '</td>'+'<td>'+data.descripcion+'</td>';
                    item += '<td><button class="btn  btn-warning btn-md btneditdb" title="Editar" value="'+data.idbienhechor+'"><i class="fa fa-pencil"></i></button>';
                    item += '<button class="btn btn-danger btn-md btneliminardb" value="'+data.idbienhechor+'" title="Eliminar" ><i class="fa fa-remove"></i></button></td></tr>';
                if (state == "add")
                    {
                        $('#donativos').append(item);
                    }
                if (state == "upd")
                    {
                    	$("#donativo"+idbd).replaceWith(item);
                    }
                $('#formModalD').modal('hide');        
            },
            error: function (data) {
                $('#loading').modal('hide');
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON){
                        errHTML+="<li>"+data.responseJSON[er]+"</li>";
                    }
                }else{
                    errHTML+='<li>Error al intentar guardar un nuevo registro, intente mas tarde.</li>';
                }
                $("#erroresContent").html(errHTML); 
                $('#erroresModal').modal('show');
            }
        });
    });