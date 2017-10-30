//$(document).on('click','.btntd',function(){
$("#btntd").click(function(){
    $('#inputTitletd').html("Nuevo tipo de donativo");
    $('#formAgregartd').trigger("reset");
    $('#formModaltd').modal('show');
});

$("#btnGuardartd").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var miurl='bienhechor/instipodon';
    var formData = {
            tdonativo:$("#tdonativo").val(),
        };


    $.ajax({
            type: 'POST',
            url: miurl,
            data: formData,
            dataType: 'json',

            success: function (data) {
                $(data).each(function(i,v){
                    $("#tipodonativo").append('<option selected value='+v.idtipodonacion+'">'+v.donaciontipo+'</option>');
                });
                $('#formModaltd').modal('hide');        
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

$(document).on('click','.btn-addDB1',function(){
    $("#fechadona").val("");
    $("#cantidad").val("");
    $("#observaciones").val("");
    var idbi=$(this).val();
    var miurl="/bienhechor/listarbienhe";
    $.get(miurl+'/'+ idbi,function(data){
        $('#idbi').val(data.idpersona);
        $('#nombreD').val(data.nombre+' '+data.apellido);
        $('#inputTitleD').html("Nuevo Donativo");
        $('#btnGuardarD1').val('add');
        $('#formModalD').modal('show');
    });
});

$(document).on('click','.btneditdb',function(){
                var idb=$(this).val();
                var miurl="/bienhechor/listardetallesb/listarupdonativo";
                $.get(miurl+'/'+ idb,function(data){
                	$('#iddona').val(data.idbienhechor);
                    $('#fechadona').val(data.fechadonacion);
                    $('#cantidad').val(data.monto);
                    $('#observaciones').val(data.descripcion);
                    $('#nombreD').val(data.nombre+' '+data.apellido);
                    $('#inputTitleD').html("Modificar datos de donación");
                    $('#btnGuardarD1').val('upd');
                    $('#formModalD').modal('show');                
                });
            });

$(document).on('click','.btneliminardb',function(){
        var idco=$(this).val(); //obtenemo id de la fila que deceamos eliminar
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                swal(
                    {
                        title: "¡Hecho!",
                        text: "Solicitud rechazada con éxito!!!",
                        type: "success"
                    },
                    function()
                    {
                        $.ajax({
                            type: "DELETE", //DELETE significa el tipon de metodo que estamos utiliando para la eliminación 
                            url: 'deletecredito/' + idco, //mandamos el id a la url para que elimine el campo de la DB
                            success: function (data) {
                                //console.log(data);//cargamos la data
                                $("#donativo" + idco).remove();//eliminamos la fila de la tabla 
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                );
            })
    });


$("#btnGuardarD1").click(function(e){
//$(document).on('click','#btnGuardarD',function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var miurl;
        var state=$("#btnGuardarD1").val();
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
                miurl = '/bienhechor/listardetallesb/addonativo';
            }

        if (state == "upd") 
            {
                type="PUT";
                miurl='/bienhechor/updonativo/'+idbd;
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
                    item += '<td><button class="btn  btn-warning btn-md btneditdb" title="Editar" value="'+data.idbienhechor+'"><i class="fa fa-pencil"></i></button></td></tr>';
                if (state == "add")
                    {   
                        swal("Gracias!","Se a guardado exitosamente el donativo!","success");
                        $('#donativos').append(item);
                    }
                if (state == "upd")
                    {
                        swal("Gracias!","Cambios guardados exitosamente","success");
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