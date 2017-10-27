var cont = 0;
    function agregar(){
        observacion = $("#observacion").val();

        var item  = '<tr class="even gradeA" id="examen'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td>'+observacion+'</td><tr>';
            cont++;

        $('#examen').append(item);
        //evaluar();
    }
    
    $(document).on('click','.btn_addexamen',function(e){
        agregar();
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
       $("#examen" + index).remove();
       cont--;
       //evaluar();
    }

$(document).ready(function(){
    $("#hmedico").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onFinishing: function(e){
            var form = $(this);
            var itemsData=[];
            var urlraiz=$("#url_raiz_proyecto").val();
            var miurl = urlraiz+"/paciente/historial/store";

            $('#examen tr').each(function(){
                //var id = $(this).closest('tr').find('input[type="hidden"]').val();
                var observacion = $(this).find('td').eq(1).html();
                valor = new Array(observacion);
                itemsData.push(valor);
            });
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            

            var formData = {
                temperatura:$("#temperatura").val(),
                presion_arterial:$("#parterial").val(),
                respiracion_minuto:$("#respiracion").val(),
                pulso_radial:$("#pulso").val(),
                circunferencia_cefalica:$("#circuferencia").val(),
                piel:$("#piel").val(),
                cabeza:$("#cabeza").val(),
                ojos:$("#ojos").val(),
                oidos:$("#oidos").val(),
                nariz:$("#nariz").val(),
                boca_y_faringe:$("#boca").val(),
                cuello:$("#cuello").val(),
                corazon:$("#corazon").val(),
                pulmones:$("#pulmones").val(),
                torax:$("#torax").val(),
                manos_axilas:$("#manos").val(),
                columna:$("#columna").val(),
                abdomen:$("#abdomen").val(),
                extremidades_superiores:$("#extremidades").val(),
                extremidades_inferiores:$("#extremidadesi").val(),
                sistema_musco_esqueletico:$("#sistemamus").val(),
                genitales:$("#genitales").val(),
                motor: $("#motor").val(),
                reflejos :$("#reflejos").val(),
                estado_mental :$("#estadomental").val(),
                reconoce :$("#reconoce").val(),
                observacion: itemsData,
                paciente: $("#idpaciente").val(),
            }
            
            $.ajax({
                type: "POST",
                url: miurl,
                data: formData,
                dataType: 'json',

                success: function (data) {
                    swal({ 
                        title:"Envio correcto",
                        text: "Información guardada correctamente",
                        type: "success"
                    }).then(function () {
                        cargarindex(21);
                        /*
                            var urlraiz=$("#url_raiz_proyecto").val();
                            $("#capa_modal").html($("#cargador_empresa").html());
                            var miurl=urlraiz+"/medicamento/proveedor/index";
                            $.ajax({
                            url: miurl
                            }).done( function(resul) 
                            {
                             $("#capa_modal").html(resul);
                           
                            }).fail( function() 
                            {
                                $("#capa_modal").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                            });*/
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
                        errHTML+='<li>Error, intente mas tarde gracias.</li>';
                    }
                    $("#erroresContentExamen").html(errHTML); 
                    $('#erroresModalExamen').modal('show');
                }
            });
        }
    });

    $('#fechanacp').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#fenacfam').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

});


function pacientepe(){
    var urlraiz=$("#url_raiz_proyecto").val();
    var id=$("#idpaciente").val();
    
    var url=urlraiz+"/paciente/historial/busqueda/"+id;

    //$("#contentsecundario").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        $(resul).each(function(i,v){
            $("#peso").append(v.peso);
            document.getElementById("peso").value = v.peso;
            document.getElementById("talla").value = v.talla;
        });
    })
}

