<form role="form" id="formAgregarRequisicion">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="medi">
                <label class="col-md-2">Medicamento</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Medicamento a descargar" class="form-control" disabled="">
                </div>

                <div class="col-md-4">
                    <!--
                    <a href="javascript:void(0);" onclick="cargarmodal(2);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Tipo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    -->
                    <a href="javascript:void(0);" onclick="cargarbusqueda(2);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prov">
                <div><br></div>
                <label class="col-md-2">Paciente</label>
                <div class="col-md-6">
                    <input type="text" name="" placeholder="Paciente..." class="form-control" disabled="">
                
                </div>

                <div class="col-md-4">
                    <!--
                    <a href="javascript:void(0);" onclick="cargarmodal(6);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Proveedor" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    -->
                    <a href="javascript:void(0);" onclick="cargarbusqueda(6);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>
        </div>
        <!--
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ubic">
                <label class="col-md-2">Ubicacion</label>
                <div class="col-md-6">
                    <input type="text" name="" id="ubicacion" placeholder="Habitacion-Estanteria-Coordenada" class="form-control" disabled=""> 
               </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(7);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Tipo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(7);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>
        </div>
        -->
        <!--
        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha compra</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="buy_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha vencimiento</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>
            </div>
        </div>
        -->
        <!--
        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Precio</label>
                <input type="number" id="precio" class="form-control" placeholder="Q00.00">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cantidad</label>
                <input type="number" id="cantidad" class="form-control" placeholder="0">
            </div>
        </div>
        -->
        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cantidad</label>
                <input type="number" id="cantidad" class="form-control" placeholder="0">
            </div>
        </div>
    </form>

<script type="text/javascript">
    /*
    var cont = 0;
    function agregar(){

        idrol =$("#idrol option:selected").val(); 
        rol =$("#idrol option:selected").text();

        var item  = '<tr class="even gradeA" id="rol'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idrol[]" value="'+idrol+'">'+rol+'</td>';

        $('#rolUsuario').append(item);
    }

    $(document).ready(function() {
        $('#bt_addrol').click(function() {
            agregar();
        });
    });

    function eliminar(index){
       $("#rol" + index).remove();
       cont--;
   }*/

</script>