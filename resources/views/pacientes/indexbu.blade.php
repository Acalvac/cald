    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<!--Contenido-->
<div class="tabs-container" id="contpaciente">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 align="center">Listado general de pacietes</h2>
			<div><br></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @include('pacientes.buscarpas')
            </div>
			<a <a href="javascript:void(0);" onclick="cargarindex(22);"><button class="btn btn-primary" value="addb">Nuevo Paciente</button></a>
			<div><br></div>
		</div>
	</div>
	<div class="row" id="divcontable">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tale-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Ingreso</th>
						<th>Encargado</th>
						<th>Teléfono</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($paciente as $pas)
                            <tr class="even gradeA" id="paci{{$pas->idpaciente}}">
                                        <td>{{$pas->idpaciente}}</td>
                                        <td>{{$pas->nombrepa}}</td>
                                        <td>{{$pas->fechaingreso}}</td>
                                        <td>{{$pas->nombre}}</td>
                                        <td>{{$pas->telefono}}</td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detalle(21,{{$pas->idpaciente}});"><button class="btn btn-primary btn-md btndetalles" title="Detalles generales del niño"><i class="fa fa-address-card"></i></button></a>
                                            <a href="javascript:void(0);" onclick="detalle(9,{{$pas->idpaciente}});"><button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles de examenes del niño"><i class="fa fa-file-text-o"></i></button></a>
                                            <button class="btn  btn-warning btn-md btneditp" id="btneditp" title="Editar datos del niño" value="{{$pas->idpaciente}}"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-md" id="btndebaja" title="Eliminar" value="{{$pas->idpaciente}}"><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>
<div class="col-lg-12">
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitle"></h4>
                            </div>

                        <form role="form" id="formAgregar">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label">Nombres y apellidos</label>
                                        <input id="nombrep" type="text" maxlength="44" class="form-control" aria-describedby="basic-addon1">   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Fecha de nacimiento</label>
                                            <input type="text" id="fechanac" maxlength="10" class="form-control"> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Talla</label>
                                        <input id="talla" type="text" class="form-control" maxlength="5" aria-describedby="basic-addon1" onkeypress="return valida(event);">   
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Peso</label>
                                        <input id="peso" type="text" class="form-control" maxlength="5" aria-describedby="basic-addon1">   
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Procedencia</label>
                                        <input type="text" maxlength="44" id="procedencia" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
	                                <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">    
	                                    <div class="form-group">
	                                        <label>Lugar de origen</label>
	                                        <select id="origens" class="form-control">
	                                            @if (isset($origen))
                                                    @foreach($origen as $org)
                                                        <option value="{{$org->idmunicipio}}">{{$org->municipio}}</option>
                                                    @endforeach
                                                @endif
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
	                                    <br>    
	                                        <button type="button" id="btntd" class="btn btn-success btn-md btntd" title="Agregar"><i class="fa fa-window-restore"></i></button>
	                                </div>
                                </div>
                                
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardarp">Guardar</button>
                            <input type="hidden" id="idb" name="idb" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-lg-12">
                <div class="modal fade" id="formModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitlel"></h4>
                            </div>

                        <form role="form" id="formAgregarl">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label class="control-label">Nombre</label>
                                        <input id="nombre" name="nombre" type="text" class="form-control" aria-describedby="basic-addon1">   
                                    </div>
                                </div>
                            </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="modal fade" id="erroresModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Errores</h4>
          </div>

          <div class="modal-body">
            <ul style="list-style-type:circle" id="erroresContent"></ul>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

<script src="{{asset('assets/js/pacientes/pacientelista.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/dist/sweetalert2.js')}}"></script>