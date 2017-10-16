<!--Contenido-->
<div class="tabs-container" id="contpaciente">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 align="center">Listado general de pacietes</h2>
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
                                            <a href="javascript:void(0);" onclick="detalle(21,{{$pas->idpaciente}});"><button class="btn btn-primary btn-md btndetalles" title="Detalles"><i class="fa fa-address-card"></i></button></a>
                                            
                                            <a href="javascript:void(0);" onclick="detalle(9,{{$pas->idpaciente}});">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles Examen"><i class="fa fa-file-text-o"></i></button></a>
                                            <button class="btn btn-success btn-md btnrecupera" title="Recuperar" value="{{$pas->idpaciente}}"><i class="fa fa-star"></i></button>
                                        </td>
                                    </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>

<script src="{{asset('assets/js/pacientes/pacientelista.js')}}"></script>