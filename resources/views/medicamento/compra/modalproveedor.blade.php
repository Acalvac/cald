                <div><br></div>
                
                <label class="col-md-2">Proveedor</label>
                <div class="col-md-6">
                    @if (isset($proveedor))

                <input type="text" name="" value="{{$proveedor->proveedor}}" class="form-control" disabled="">

                <input type="hidden" name="" value="{{$proveedor->idproveedor}}" id="idproveedor">
                @endif
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(6);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Proveedor" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(6);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar Proveedor" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div>
