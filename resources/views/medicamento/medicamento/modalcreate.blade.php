<form role="form" id="formAgregarMedicamento">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>Nombre del medicamento</label>
                <input type="text" id="medicamento" class="form-control" placeholder="">
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <label>Marca</label>
                <select id="idmarca" class="form-control select2" data-live-search="true">
                @if (isset($marca))
                    @foreach($marca as $mar)
                        <option value="{{$mar->idmarca}}">{{$mar->marca}}</option>
                    @endforeach
                @endif
                </select>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" id="divENF">
                <label>Tipo</label>
                <select id="idtipo" class="form-control select2" data-live-search="true">
                @if (isset($tipomedicamento))
                @foreach($tipomedicamento as $tip)
                    <option value="{{$tip->idtipo}}">{{$tip->tipomedic}}</option>
                @endforeach
                @endif
                </select>
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