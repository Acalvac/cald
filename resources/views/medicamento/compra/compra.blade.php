   <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
				<div class="tab-pan active" id="contentsecundario">
					@if(isset($compras))
				        <h4 class="box-title" align="center">Listado Compra Medicamento</h4>
				        
				        <div class="ibox-content" style="border-color:black;">
                    		<div class="table-responsive">
                        	<table class="table table-striped table-bordered table-hover dataTables-example" >
                            	<thead>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 20%">Medicamento</th>
                                        <th style="width: 10%">Fecha Compra</th>
                                        <th style="width: 10%">Fecha Vencimiento</th>
                                        <th style="width: 10%">Cantidad</th>
                                        <th style="width: 10%">Precio</th>
                                        <th style="width: 10%">Proveedor</th>
                                        <th style="width: 10%">Usuario</th>
                                        <th style="width: 20%">Opciones</th>
                            	</thead>
                            	<tbody id="listempleado">
                                	@foreach ($compras as $com)
                                    <tr class="even gradeA" id="medicamento{{$com->idcompra}}">
                                        <td>{{$com->idcompra}}</td>
                                        <td>{{$com->medicamento.' '.$com->marca}}</td>
                                        <td>{{$com->fechacompra}}</td>
                                        <td>{{$com->fechavencimiento}}</td>
                                        <td>{{$com->cantidad}} Unidades</td>
                                        <td>{{$com->precio}} Q</td>
                                        <td>{{$com->proveedor}}</td>
                                        <td>{{$com->name}}</td>
                                        <td>
                                            <a href="#">
                                            <button class="btn btn-primary btn-md btn-detalle-empleado" title="Detalles" value="{{$com->idcompra}}"><i class="fa fa-address-card"></i></button>
                                            </a>
                                            <a href="#">
                                            <button class="btn  btn-warning btn-md btn-editar-empleado" title="Editar" value="{{$com->idcompra}}"><i class="fa fa-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-md btneliminarb" id="FWEF" value="{{$com->idcompra}}" title="Eliminar" ><i class="fa fa-remove"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
				    @else
				    	<br><div class="rechazado"><label style='color:#FA206A'>..No se ha encontrado ninguna compra</label></div>
				    @endif
				</div>
			</div>
		</div>
	</div>