<form role="form" id="formAgregarMedicamento">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>Nombre del medicamento</label>
                <input type="text" id="medicamento" class="form-control" placeholder="">
            </div>
        </div>

        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="marca" class="col-md-2 col-sm-2 control-label">Marca</label>
                <div class="col-md-6 col-sm-6" id="marcaselect">
                    <select id="idmarca" class="chosen-select" data-live-search="true">
                    @if (isset($marca))
                    @foreach($marca as $mar)
                        <option value="{{$mar->idmarca}}">{{$mar->marca}}</option>
                    @endforeach
                    @endif
                    </select>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(4);">

                        <button type="button" class="btn btn-primary btn-md " id="nuevomarca" title="Nueva marca" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div><br></div>
                <label class="col-md-2 col-sm-2">Presentaci&oacute;n</label>
                <div class="col-md-6 col-sm-6" id="presentacionselect">
                    <select id="idpresentacion" class="chosen-select" data-live-search="true">
                    @if (isset($presentacion))
                    @foreach($presentacion as $pre)
                        <option value="{{$pre->idpresentacion}}">{{$pre->nombre}}</option>
                    @endforeach
                    @endif
                    </select>
                </div>

                <div class="col-md-4 col-sm-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(11);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevapresentacion" title="Nueva presentacion medicamento"><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prin">
                <div><br></div>
            
                <label class="col-md-2 col-sm-2">Sustancia</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" placeholder="Sustancia..." class="form-control" id="sustancia" disabled>
                    <input type="hidden" id="idprincipio">
                </div>

                <div class="col-md-4 col-sm-4">
                    <a href="javascript:void(0);" onclick="cargarmodal(8);">
                        <button type="button" class="btn btn-primary btn-md" title="Nueva sustancia"><i class="fa fa-plus-square"></i></button>
                    </a>
                    <a href="javascript:void(0);" onclick="cargarbusqueda(8);">
                        <button type="button" class="btn btn-info btn-md"  title="Buscar sustancia"><i class="fa fa-search"></i></button>
                    </a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="prov">
                <br>
                <label class="col-md-2 col-sm-2">Concentraci&oacute;n</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" id="concentracion" class="form-control" placeholder="">
                </div>
                <div class="col-md-4 col-sm-4">
                    <button type="button" id="addconcentracion" class="btn btn-info btn-addcon" title="Añadir"><i class="fa fa-plus-circle"></i>&nbsp;Añadir</button>                    
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <br>
                            <table id="detallecompo" class="table table-striped table-bordered table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Composici&oacute;n</th>
                                        <th>Concentraci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
            </div>
        </div>
    </form>