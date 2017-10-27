<form role="form" id="formAgregarPrincipio">
        <div class="modal-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label>Nombre de la sustancia medica</label>
                <input type="text" id="nombre" class="form-control" placeholder="">
            </div>
        </div>

        <div class="modal-header">
            
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div><br></div>
                <label class="col-md-2">Tipo</label>
                <div class="col-md-6" id="tiposelect">
                    <select id="idtipo" class="chosen-select" data-live-search="true">
                    @if (isset($tipomedicamento))
                    @foreach($tipomedicamento as $tip)
                        <option value="{{$tip->idtipo}}">{{$tip->tipomedic}}</option>
                    @endforeach
                    @endif
                    </select>
                </div>

                <div class="col-md-4">
                    <a href="javascript:void(0);" onclick="cargarmodal4(8);">
                        <button type="button" class="btn btn-primary btn-md" id="nuevasustancia" title="Nueva Sustancia medica" value=""><i class="fa fa-plus-square"></i></button>
                    </a>
                </div>
            </div>
        </div>
    </form>