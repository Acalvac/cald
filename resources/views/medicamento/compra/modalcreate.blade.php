<form role="form" id="formAgregarMedicamento">
        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Medicamento</label>
                <select  id="idmedicamento" class="form-control select2" data-live-search="true">
                @if (isset($medicamento))
                    @foreach($medicamento as $med)
                        <option value="{{$med->idmedicamento}}">{{$med->medicamento}}</option>
                    @endforeach
                @endif
                </select>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="divENF">
                <label>Proveedor</label>
                <select id="proveedor" class="form-control select2" data-live-search="true">
                @if (isset($proveedor))
                @foreach($proveedor as $pro)
                    <option value="{{$pro->idproveedor}}">{{$pro->proveedor}}</option>
                @endforeach
                @endif
                </select>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha compra</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="buy_date" type="text" class="form-control" value="dd/mm/yyyy">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Fecha vencimiento</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="expiration_date" type="text" class="form-control" value="dd/mm/yyyy">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Precio</label>
                <input type="number" id="precio" class="form-control" placeholder="Q00.00">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Cantidad</label>
                <input type="number" id="cantidad" class="form-control" placeholder="Q00.00">
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