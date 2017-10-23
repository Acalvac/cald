<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                @if (isset($medicamento))
                <label>Medicamento</label>
                <input type="text" name="" value="{{$medicamento->medicamento.' '.$medicamento->marca.' '.$medicamento->presentacion}}" class="form-control" disabled="" id="medica">

                <input type="hidden" name="" value="{{$medicamento->idmedicamento}}" id="idmedicamento">
                <input type="text" name="" class="form-control" disabled value="{{$medicamento->cantidad}}" id="cantexistente">
                @endif
</div>

<div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
    <br>
    <a href="javascript:void(0);" onclick="cargarbusqueda(9);">
        <button type="button" class="btn btn-info btn-md" id="brmedi" title="Buscar Medicamento" value=""><i class="fa fa-search"></i></button>
    </a>
</div>


