    <label class="col-md-2">Medicamento</label>
                <div class="col-md-6">
                @if (isset($medicamento))

                <input type="text" name="" value="{{$medicamento->medicamento.' '.$medicamento->marca.' '.$medicamento->presentacion}}" class="form-control" disabled="">

                <input type="hidden" name="" value="{{$medicamento->idmedicamento}}" id="idmedicamento">
                @endif
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(2);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Tipo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(2);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>