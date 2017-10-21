var cont = 0;
    function agregar(){

        idmedicamento =$("#idmedicamento").val(); 
        medicamento =$("#medica").val();
        cantidad = $('#cantidad').val();

        if(idmedicamento != '' && cantidad != '' && medicamento != '' && cantidad > 0)
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
        else{
            alert("Error al ingresar el detalle del ingreso, revise los datos del articulo")
        }

        function limpiar(){
        $("#idmedicamento").val("");
        $("#medica").val("");
        $("#cantidad").val("");
    }

    }

    $(document).ready(function() {
        $('#bt_addm').click(function() {
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
       $("#medicamento" + index).remove();
       cont--;
       evaluar();
    }