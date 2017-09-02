   <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
				<div class="tab-pan active" id="contentsecundario">
					@if(isset($medicamentos))
				        <h4 class="box-title" align="center">Listado Medicamento</h4>
				        <hr style="border-color:black;"/>

				        <div class="ibox-content">
                    		<div class="table-responsive">
                        	<table class="table table-striped table-bordered table-hover dataTables-example" >
                            	<thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 20%">Medicamento</th>
                                        <th style="width: 20%">Marca</th>
                                        <th style="width: 10%">Tipo</th>
                                        <th style="width: 20%">Opciones</th>
                            	</thead>
                            	<tbody id="listempleado">
                                	@foreach ($medicamentos as $med)
                                    <tr class="even gradeA" id="medicamento{{$med->idmedicamento}}">
                                        <td>{{$med->idmedicamento}}</td>
                                        <td>{{$med->medicamento}}</td>
                                        <td>{{$med->marca}}</td>
                                        <td>{{$med->tipo}}</td>
                                        <td>
                                            <a href="#">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles" value="{{$med->idmedicamento}}"><i class="fa fa-address-card"></i></button>
                                            </a>
                                            <a href="#">
                                            <button class="btn  btn-warning btn-md btn-editar-empleado" title="Editar" value="{{$med->idmedicamento}}"><i class="fa fa-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$med->idmedicamento}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
				    @else
				    	<br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ningun medicamento</label></div>
				    @endif
				</div>
			</div>
		</div>
	</div>