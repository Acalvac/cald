//Insertar municipio
$("#btntd").click(function(){
    $('#inputTitlel').html("Nuevo lugar de origen");
    $('#formAgregarl').trigger("reset");
    $('#formModall').modal('show');
});

$("#btnGuardar").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var miurl = 'paciente/addlugar';

    var formData = {
            nombre:$("#nombre").val(),
        };


    $.ajax({
            type: 'POST',
            url: miurl,
            data: formData,
            dataType: 'json',

            success: function (data) {
                $(data).each(function(i,v){
                    $("#origens").append('<option selected value='+v.idmunicipio+'">'+v.municipio+'</option>');
                });
                $('#formModall').modal('hide');        
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
//Edita paciente
$(document).on('click','.btneditp',function(){
    var idb=$(this).val();
    var miurl="/paciente/listaruppas";
    $.get(miurl+'/'+ idb,function(data){
        $('#idb').val(data.idpaciente);
        $('#nombrep').val(data.nombrepa);
        $('#fechanac').val(data.fechana);
        $('#talla').val(data.talla);
        $('#peso').val(data.peso);
        $('#procedencia').val(data.procedencia);
        $('#origens option:selected').val(data.idmunicipio);
        $('#origens option:selected').text(data.lorigen);
        $('#fechain').val(data.fechaingreso);
        $('#encargado').val(data.nombre);
        $('#telefono').val(data.telefono);
        $('#inputTitle').html("Modificar datos del paciente");
        $('#formModal').modal('show');
    });
});
//Guardad cambios en paciente
$("#btnGuardarp").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var idb=$('#idb').val();
    var miurl='/paciente/uppasdatos/'+idb;
    var formData = {
        nombrep:$("#nombrep").val(),
        fechanac:$("#fechanac").val(),
        talla:$("#talla").val(),
        peso:$("#peso").val(),
        procedencia:$("#procedencia").val(),
        origens:$("#origens").val(),
    };
    var fec= $('#fechain').val();
    var enc= $('#encargado').val();
    var tel= $('#telefono').val();

    $.ajax({
        type: 'PUT',
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {
            var item = '<tr class="even gradeA" id="paci'+data.idpaciente+'">';
                item += '<td>'+data.idpaciente+'</td>';
                item += '<td>'+data.nombrepa+'</td>'+'<td>' +fec+ '</td>'+'<td>'+enc+'</td>'+'<td>'+tel+'</td>';
                item += '<td><a href="javascript:void(0);" onclick="detalle(21,'+data.idpaciente+');"><button class="btn btn-primary btn-md btndetalles" title="Detalles generales del niño"><i class="fa fa-address-card"></i></button></a>';
                item += '<a href="javascript:void(0);" onclick="detalle(9,'+data.idpaciente+');"><button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles de examenes del niño"><i class="fa fa-file-text-o"></i></button></a>';
                item += '<button class="btn  btn-warning btn-md btneditp" id="btneditp" title="Editar datos del niño" value="'+data.idpaciente+'"><i class="fa fa-pencil"></i></button>';
                item += '<button class="btn btn-danger btn-md" id="btndebaja" title="Eliminar" value="'+data.idpaciente+'"><i class="fa fa-remove"></i></button></td></tr>';

            swal("¡Hecho!","Se actualizaron correctamente los datos del Paciente","success");
            $('#formModal').modal('hide');
            $("#paci"+idb).replaceWith(item);

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
//Debaja paciente
$("#btndebaja").click(function(){
    	var idpas=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Esta seguro de cambiar de estado a esta persona?',
            text: "Precione si para continuar, no para cerrar este mensaje.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
            }).then(function () {
                $.ajax({
                    type: "PUT",
                    url: '/paciente/baja/' + idpas,
                    success: function (data) {
                        console.log(data);
                        $("#paci" + idpas).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                'Canceladoo!',
                'No se realizo ningun cambio :)',
                'error'
                )
            }
        });
});

//Recuperar a paciente
 $(document).on('click','.btnrecupera',function(){
        var idpas=$(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        swal({
            title: '¿Está seguro de cambiar el estado a esta persona?',
            text: "Precione si para continuar, no para cerrar este mensaje.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
            }).then(function () {
                $.ajax({
                    type: "PUT",
                    url: '/paciente/recuperarp/' + idpas,
                    success: function (data) {
                        console.log(data);
                        $("#paci" + idpas).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                'Canceladoo!',
                'No se realizo ningun cambio :)',
                'error'
                )
            }
        });
        $("#erroresContent").html(errHTML); 
        $('#erroresModal').modal('show');
    });