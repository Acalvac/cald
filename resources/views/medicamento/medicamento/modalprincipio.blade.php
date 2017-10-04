<label class="col-md-2 col-sm-2">Sustancia</label>
                <div class="col-md-6 col-sm-6">
                @if (isset($principioactivo))
                    <input type="text" id="sustancia"  value="{{$principioactivo->nombre.' '.$principioactivo->familia}}" class="form-control" disabled=""> 
                    <input type="hidden" name="" value="{{$principioactivo->idprincipio}}" id="idprincipio">
                @endif
               </div>

				<div class="col-md-4 col-sm-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(8);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Proveedor" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(8);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>


