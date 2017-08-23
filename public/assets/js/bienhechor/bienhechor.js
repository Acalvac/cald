
            $(document).on('click','.btn-addB',function(){
                $('#inputTitle').html("Nuevo bienhechor");
                $('#formAgregar').trigger("reset");
                $('#btnGuardar').val('addb');
                $('#formModal').modal('show');
            });

            

            $(document).on('click','.btneditb',function(){
                var idb=$(this).val();
                var miurl="listarupbienhe";
                $.get(miurl+'/'+ idb,function(data){
                    $('#idb').val(data.idpersona);
                    $('#nombreb').val(data.nombre);
                    $('#apellidob').val(data.apellido);
                    $('#telefono').val(data.telefono);
                    $('#correo').val(data.correo);
                    $('#direccion').val(data.direccion);
                    $('#nit').val(data.nit);
                    $('#tipobienhechor').val(data.permanente);
                    $('#inputTitle').html("Modificar datos de bienhechor");
                    $('#formModal').modal('show');
                    $('#btnGuardar').val('up');
                });
            });

            $("#btnGuardar").click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var miurl;
                var state=$("#btnGuardar").val();
                var idb=$('#idb').val();
                var type;
                var formData = {
                            nombreb:$("#nombreb").val(),
                            apellidob:$("#apellidob").val(),
                            correo:$("#correo").val(),
                            telefono:$("#telefono").val(),
                            nit:$("#nit").val(),
                            direccion:$("#direccion").val(),
                            tipobienhechor:$("#tipobienhechor").val(),
                            tipopersona:$("#tipopersona").val(),
                        };

                if (state == "addb") 
                    {
                        type="POST";
                        miurl = 'add';
                    }

                if (state == "up") 
                    {
                        type="PUT";
                        miurl='upbienhe/'+idb;
                    }

                $.ajax({
                    type: type,
                    url: miurl,
                    data: formData,
                    dataType: 'json',

                    success: function (data) {
                        var item = '<tr class="even gradeA" id="bien'+data.idpersona+'">';
                            item += '<td>'+data.idpersona+'</td>';
                            item += '<td>'+data.nombre+' '+data.apellido+'</td>'+'<td>' +data.direccion+ '</td>'+'<td>'+data.telefono+'</td>'+'<td>'+data.correo+'</td>';
                            item += '<td><button class="btn  btn-success btn-md btnnd" title="Nuevo Donativo" value="'+data.idpersona+'"><i class="fa fa-heart"></i></button>';
                            item += '<button class="btn btn-primary btn-md btndb" value="'+data.idpersona+'" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>';
                            item += '<button class="btn  btn-warning btn-md btneditb" title="Editar" value="'+data.idpersona+'"><i class="fa fa-pencil"></i></button>';
                            item += '<button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="'+data.idpersona+'" title="Eliminar" ><i class="fa fa-remove"></i></button></td></tr>';
                            //<a c>
                        if (state == "addb")
                        {
                            $('#listbienhechor').append(item);
                            swal({
                              title: '¿Desea realizar una donación?',
                              text: "Precione si para realizar una donación, no para cerrar este mensaje.",
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
                                var idbi=data.idpersona;
                                var miurl="listarbienhe";
                                $.get(miurl+'/'+ idbi,function(data){
                                    $('#idbi').val(data.idpersona);
                                    $('#nombreD').val(data.nombre+' '+data.apellido);
                                    $('#inputTitleD').html("Nuevo Donativo");
                                    $('#formModalD').modal('show');
                                });
                            }, function (dismiss) {
                              // dismiss can be 'cancel', 'overlay',
                              // 'close', and 'timer'
                              if (dismiss === 'cancel') {
                                swal(
                                  '¡Hecho!',
                                  'Se ha guardado un nuevo Bienhechor :)',
                                  'success'
                                )
                              }
                            });
                        }
                        if (state == "up")
                        {
                            swal("¡Hecho!",
                            "Se actualizaron correctamente los datos del Bienhechor",
                            "success");
                            $("#bien"+idb).replaceWith(item);
                        }
                        $('#formModal').modal('hide');
                        
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



/////Donación
    $(document).on('click','.btnnd',function(){

        $("#fechadona").val("");
        $("#cantidad").val("");
        $("#observaciones").val("");

        var idbi=$(this).val();
        var miurl="listarbienhe";
        $.get(miurl+'/'+ idbi,function(data){
            $('#idbi').val(data.idpersona);
            $('#nombreD').val(data.nombre+' '+data.apellido);
            $('#inputTitleD').html("Nuevo Donativo");
            $('#formModalD').modal('show');
        });
    });

    $("#btnGuardarD").click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var miurl="addonativo";
        var type="POST";
        var formData = {
                fechadona:$("#fechadona").val(),
                tipodonativo:$("#tipodonativo").val(),
                cantidad:$("#cantidad").val(),
                observaciones:$("#observaciones").val(),
                idb:$('#idbi').val(),
            };

        $.ajax({
            type: type,
            url: miurl,
            data: formData,
            dataType: 'json',

            success: function (data) {
                swal({
                    title: "Gracias!",
                    text: "Se a guardado exitosamente el donativo!",
                    type: "success"
                });

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
//Detalles de bienhechor

    $(document).on('click','.btndb',function(){
        var idbi=$(this).val();
        location.href="listardetallesb/"+idbi;

    });
//Validaciones Letras y numeros
    function valida(e){
        tecla = e.keyCode || e.which;
        tecla_final = String.fromCharCode(tecla);
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8 || tecla==37 || tecla==39 ||tecla==46 ||tecla==9)
            {
                return true;
            } 
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        //patron =/^\d{9}$/;
        return patron.test(tecla_final);

    }
            //Se utiliza para que el campo de texto solo acepte letras
    function validaL(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ63";//Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 37, 39, 46, 9]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial){
            //alert('Tecla no aceptada');
            return false;
            }
    }