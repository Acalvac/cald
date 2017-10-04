<label class="col-md-2">Ubicacion</label>
                <div class="col-md-6">
                @if (isset($ubicacion))
                    <input type="text" id="ubicacion" value="{{$ubicacion->habitacion.' '.$ubicacion->estanteria.' '. $ubicacion->coordenada}}" class="form-control" disabled=""> 
                    <input type="hidden" name="" value="{{$ubicacion->idubicacion}}" id="idubicacion">
                @endif
               </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(7);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevotipomedicamento" title="Nuevo Tipo medicamento" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(7);">
                        <button type="button" class="btn btn-info btn-md" id="nuevotipomedicamento" title="Buscar ubicacion" value=""><i class="fa fa-search"></i></button>
                    </a>
                </div> 
