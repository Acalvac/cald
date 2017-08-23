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

function anular(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    return (tecla != 13);
}
            
function anularEspacios(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    return (tecla == 8);
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
            
var cont = 0;


function agregar(){

        idtipoantecedente =$("#idtipoantecedente option:selected").val(); 
        tipoantecedente =$("#idtipoantecedente option:selected").text();
        fechavencimiento = $('#expiration_date').val();

        var item  = '<tr class="even gradeA" id="tipoantecedente'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idtipoantecedente[]" value="'+idtipoantecedente+'">'+tipoantecedente+'</td>';
            item += '<td>'+fechavencimiento+'</td><tr>';
            cont++;

        $('#detalles').append(item);
        evaluar();
    }

    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        });
    });

    function evaluar(){
        if (cont>0){
            $("#btnGuardarEmpleado").show();
        }
        else{
            $("#btnGuardarEmpleado").hide();
        }
    }

    function eliminar(index){
       $("#tipoantecedente" + index).remove();
       cont--;
       evaluar();
   }
 
    $(document).on('click','.btn-btnGuardarEmpleado',function(e){
        var itemsData=[];
        var miurl = "store";
        var urlraiz=$("#url_raiz_proyecto").val();

        $('#detalles tr').each(function(){
            var id = $(this).closest('tr').find('input[type="hidden"]').val();
            var expiration_date = $(this).find('td').eq(2).html();
            valor = new Array(id,expiration_date);
            itemsData.push(valor);
            
        });
        
        var formData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            direccion: $('#direccion').val(),
            telefono: $('#telefono').val(),
            estadocivil: $('#estadocivil').val(),
            dpi: $('#dpi').val(),
            nit: $('#nit').val(),
            correo: $('#correo').val(),
            fecha_nacimiento: $('#birth_date').val(),
            idtipopersona: $('#idtipopersona').val(),
            fecha_inicio: $('#date_work_start').val(),
            salario: $('#salario').val(),
            idpuesto: $('#idpuesto').val(),

            items: itemsData,};
        
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
                /*
                swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                },
                function(){
                    window.location.href="/empleado/listado"
                });*/

                swal({
                    title: "¿Ingresar nuevo usuario?",
                    text: "nuevo registro de un usuario",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si",
                    closeOnConfirm: true,
                    closeOnCancel:false
                },function () {

                    var miurl=urlraiz+"/seguridad/add";
                    var errHTML="";
                    $.ajax({
                        url: miurl
                    }).done( function(resul) 
                    {
                        $("#lisadoEmp").html(resul);
                        $("#idempleado").append(resul);

                        $('#inputTitleUsuario').html("Nuevo ingreo de usuario");
                        $('#formAgregarUsuario').html(resul);
                        $('#formModalUsuario').modal('show');

                    }).fail(function() 
                    {
                        $("#lisadoEmp").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                    });
                });                
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


     $(document).on('click','.btn-guardarAsecenso',function(e){
                var itemsData=[];
                var miurl = "addasecenso";

                $('#detalle7 tr').each(function(){
                    var jefe = $(this).find('td').eq(2).html();
                    var notificar = $(this).find('td').eq(3).html();
                    valor = new Array(jefe,notificar);
                    itemsData.push(valor);
                });

                var formData = {
                    idpuesto: $('#idpuesto').val(),
                    idempleado: $('#idempleado').val(),
                    fecha: $('#dato1').val(),
                    salario: $('#salario').val(),
                    descripcion: $('#descripcion').val(),
                    idafiliado: $('#idafiliado').val(),
                    idcaso: $('#idcaso').val(),
                    items: itemsData,
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
                    //beforeSend: function(){ $f.data('locked', true);  // (2)
                    //},

                    success: function (data) {
                        swal({ 
                            title:"Envio correcto",
                            text: "Gracias",
                            type: "success"
                        },
                        function(){
                            window.location.href="/empleado/listado"
                        });                                
                    },
                    error: function (data) {
                        $('#loading').modal('hide');
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                            for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                            }
                        }else{
                            errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
                        }
                        $("#erroresContent").html(errHTML); 
                        $('#erroresModal').modal('show');
                    },
                    //complete: function(){ $f.data('locked', false);  // (3)
                     //}
                });             
            });
