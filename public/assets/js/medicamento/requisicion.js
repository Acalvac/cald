var cont = 0;
function agregar(){
    idmedicamento =$("#idmedicamento").val(); 
    medicamento =$("#medica").val();
    cantidad = $('#cantidad').val();
    cantexistente = $('#cantexistente').val();

    if(idmedicamento != '' && cantidad != '' && medicamento != '' && cantidad > 0)
    {
        if(cantexistente >= cantidad)
        {
            var item  = '<tr class="even gradeA" id="medicamento'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idmedicamento[]" value="'+idmedicamento+'">'+medicamento+'</td>';
            item += '<td>'+cantidad+'</td><tr>';
            cont++;
                
            limpiar();
            evaluar();
            $('#detallerequi').append(item);
        }
        else
        {
            alert("La cantidad requerida no debe ser mayor a la cantidad existente");
        }
    }
    else{
        alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
    }

    function limpiar(){
        $("#idmedicamento").val("");
        $("#medica").val("");
        $("#cantidad").val("");
        $("#cantexistente").val("");
    }
}

$(document).ready(function() {
    $('#bt_addm').click(function() {
        agregar();
    });
});

function evaluar(){
    if (cont>0){
        $("#btnGuardarRequisicion").show();
    }
    else{
        $("#btnGuardarRequisicion").hide();
    }
}

function eliminar(index){
    $("#medicamento" + index).remove();
    cont--;
    evaluar();
}

$(document).on('click','.btn-btnGuardarRequisicion',function(e){
    var itemsData=[];
    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl = urlraiz+"/medicamento/requisicion/store";
        
    $('#detallerequi tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        var cant = $(this).find('td').eq(2).html();
        valor = new Array(id,cant);
        itemsData.push(valor);
    });
        
    var formData = {
        paciente: $('#idpaciente').val(),
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
            
        success: function (data) {
            swal({ 
                title:"Envio correcto",
                text: "Información guardada correctamente",
                type: "success"
            },
            function(){
            
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